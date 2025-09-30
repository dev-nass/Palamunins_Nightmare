<?php

namespace App\Http\Controllers\Auth;

use Core\Controller;
use Core\Request;
use Core\Session;
use Core\Database;

class RegistrationController extends Controller
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

        $request = new Request();

        // $email = $this->request('email');
        // $password = $this->request('password');
        // $password_confirmation = $this->request('password_confirmation');

        // $data = $this->request()->validate([
        //     'email' => 'required|email'
        // ]);

        $data = $request->validate([
            'password' => 'required'
        ]);

        dd($data);


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