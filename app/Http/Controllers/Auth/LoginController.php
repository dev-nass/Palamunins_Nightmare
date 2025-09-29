<?php

namespace App\Http\Controllers\Auth;

use Core\Database;
use Core\Session;
use Core\Authenticator;

class LoginController
{

    protected $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function create()
    {
        return view('auth/login.view.php');
    }

    public function store()
    {
        $credentials = array_merge($_POST);

        $attempt = Authenticator::attempt($credentials);

        if (!$attempt) {
            return redirect('login');
        }

        return redirect('homepage');

    }
}