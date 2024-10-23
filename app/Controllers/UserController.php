<?php

namespace App\Controllers;

class UserController extends BaseController
{
    public function index()
    {
        // Ensure you have an admin dashboard view
        return view('dashboard');
    }

    public function userProfile()
    {
        $session = session();
        $userId = $session->get('id');  // Assuming user_id is stored in session

        if (!$userId) {
            return redirect()->to(base_url('/login'))->with('error', 'Please log in to view your profile.');
        }

        $userModel = new \App\Models\UserModel();
        $user = $userModel->find($userId);

        if (!$user) {
            return redirect()->to(base_url('/login'))->with('error', 'User not found.');
        }

        return view('user_profile', ['user' => $user]);
    }

    public function editProfile()
    {
        $session = session();
        $userId = $session->get('id');

        if (!$userId) {
            return redirect()->to(base_url('/login'))->with('error', 'Please log in to edit your profile.');
        }

        $userModel = new \App\Models\UserModel();
        $user = $userModel->find($userId);

        if (!$user) {
            return redirect()->to(base_url('/login'))->with('error', 'User not found.');
        }

        return view('edit_profile', ['user' => $user]);
    }

    public function updateProfile()
    {
        $session = session();
        $userId = $session->get('id');

        if (!$userId) {
            return redirect()->to(base_url('/login'))->with('error', 'Please log in to update your profile.');
        }

        $userModel = new \App\Models\UserModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ];

        if ($userModel->update($userId, $data)) {
            return redirect()->to('user_profile')->with('success', 'Profile updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update profile.');
        }
    }
}
