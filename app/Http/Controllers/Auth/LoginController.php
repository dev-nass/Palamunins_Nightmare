<?php

namespace App\Http\Controllers\Auth;

use Core\Database;
use Core\Authenticator;
use Core\Request;

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

        $request = new Request();

        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        Authenticator::attempt($data);

        return redirect('homepage');

    }

    public function destroy()
    {
        Authenticator::logout();

        return redirect('homepage');
    }
}