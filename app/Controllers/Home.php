<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // Redirect the root URL directly to our authentication system
        return redirect()->to('/login');
    }
}