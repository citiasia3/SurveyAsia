<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    
    public function index()
    {
        # show login page
        return view('auth/daftar');
    }
}