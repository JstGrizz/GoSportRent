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
        return view('admin/header');
        return view('admin/sidebar');
        return view('admin/dashboard');
        return view('admin/footer');
    }
}
