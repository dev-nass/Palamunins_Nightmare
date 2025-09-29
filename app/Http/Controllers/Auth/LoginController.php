<?php

namespace App\Http\Controllers\Auth;

use Core\Database;
use Core\Session;

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
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->database->query("SELECT * FROM users WHERE email = :email", [
            'email' => $email,
        ])->find();


        if (empty($user)) {
            Session::set('__flash', [
                'email' => 'Account does not exist'
            ]);

            return redirect('login');
        }

        if (!password_verify($password, $user['password'])) {
            Session::set('__flash', [
                'password' => 'Incorrect password'
            ]);

            return redirect('login');
        }

        $_SESSION['__credentials'] = $user;

        return redirect('homepage');

    }
}