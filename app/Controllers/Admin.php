<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index(): string
    {
        return view('login');
    }

    public function dashboard(): string
    {
        return view('admin/header')
            . view('admin/sidebar')
            . view('login/dashboard')
            . view('admin/footer');
    }
}
