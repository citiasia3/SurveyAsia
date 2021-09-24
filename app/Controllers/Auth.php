<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Myth\Auth\Controllers\AuthController;

class Auth extends BaseController
{
    private $auth;
    private $config;
    private $autorization;

	public function __construct() {
		$this->auth = new AuthController();
	}

    public function index()
    {
        # show login page
        return view('auth/daftar');
    }

    /**
     * Fungsi untuk menampilkan halaman login
     */
    public function login()
    {
        //cek apakah user sudah login
        
    }

    public function doLogin()
    {
        # code...
    }

    public function register()
    {
        # code...
    }

    public function doRegister()
    {
        # code...
    }

    public function doLogout()
	{
		# code...
		return $this->auth->logout();
	}
}
