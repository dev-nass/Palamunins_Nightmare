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

        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $this->databas->query('INSERT INTO users (email, password) VALUE (:email, :password)', [
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_BCRYPT)
        ]);

        return redirect('login');

    }
}