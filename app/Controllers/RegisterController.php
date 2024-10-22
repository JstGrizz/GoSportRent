<?php

namespace App\Controllers;

class RegisterController extends BaseController
{
    public function index()
    {
        // Ensure you have an admin dashboard view
        return view('register');
    }
}
