<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    public function index()
    {
        // Ensure you have an admin dashboard view
        return view('admin/dashboard');
    }
}
