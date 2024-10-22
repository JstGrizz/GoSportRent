<?php

namespace App\Controllers;

class UserController extends BaseController
{
    public function index()
    {
        // Ensure you have an admin dashboard view
        return view('dashboard');
    }
}
