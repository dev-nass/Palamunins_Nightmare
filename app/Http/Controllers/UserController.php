<?php

namespace App\Http\Controllers;

use Core\Database;

class UserController
{

    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function index()
    {

        $users = $this->database->query("SELECT * FROM users WHERE email = :email", [
            'email' => 'tampol@gmail.com'
        ])->get();

        $email = $users[0]['email'];

        return view('index.view.php', [
            'email' => $email
        ]);
    }


}