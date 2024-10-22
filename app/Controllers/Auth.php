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
                'username' => $user['username'],
                'role' => $user['role'],
                'isLoggedIn' => true
            ]);
            return redirect()->to(base_url('admin/dashboard'));
        } else if ($user && $user['role'] === 'user') {
            $session->set([
                'username' => $user['username'],
                'role' => $user['role'],
                'isLoggedIn' => true
            ]);
            return redirect()->to(base_url('dashboard'));
        } else {
            return redirect()->back()->with('error', 'Username or Password is incorrect');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
