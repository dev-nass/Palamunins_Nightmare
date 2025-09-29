<?php

namespace App\Http\Controllers\Auth;

use Core\Session;
use Core\Database;

class RegistrationController
{

    protected $databas;

    public function __construct()
    {
        $this->databas = new Database();
    }

    public function create()
    {
        return view('auth/registration.view.php');
    }

    public function store()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirmation = $_POST['password_confirmation'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            Session::set('__flash', [
                'email' => 'Enter a valid email'
            ]);

            return redirect('registration');
        }

        if ($password !== $password_confirmation) {
            Session::set('__flash', [
                'password' => 'Password does not match'
            ]);

            return redirect('registration');
        }

        $this->databas->query('INSERT INTO users (email, password) VALUE (:email, :password)', [
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ]);

        return view('user/homepage.view.php');

    }
}