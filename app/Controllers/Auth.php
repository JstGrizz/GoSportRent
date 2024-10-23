<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        $session = session();
        $model = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $user = $model->verifyUser($username, $password);

        if ($user && $user['role'] === 'admin') {
            $session->set([
                'id' => $user['id'],
                'username' => $user['username'],
                'role' => $user['role'],
                'isLoggedIn' => true
            ]);
            return redirect()->to(base_url('admin/users'));
        } else if ($user && $user['role'] === 'user') {
            $session->set([
                'id' => $user['id'],
                'username' => $user['username'],
                'role' => $user['role'],
                'isLoggedIn' => true
            ]);
            return redirect()->to(base_url('user_profile'));
        } else {
            return redirect()->to(base_url('login'))->with('error', 'Username or Password is incorrect');
        }
    }

    public function register()
    {
        $session = session();
        $model = new UserModel();

        // Get input values
        $username = $this->request->getVar('username');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $confirmPassword = $this->request->getVar('confirm_password');

        // Check if user or email already exists
        if ($model->where('username', $username)->first() || $model->where('email', $email)->first()) {
            return redirect()->to(base_url('register'))->with('error', 'Username or Email already exists');;
        }

        // Save user details
        $data = [
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role' => 'user'
        ];

        $model->save($data);

        // Set success message and redirect to login
        $_SESSION['success'] = 'Registration successful. Please log in.';
        return redirect()->to(base_url('login'));
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
