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

        $users = $this->database->query("SELECT * FROM users LIMIT 10")->get();


        return view('index.view.php', [
            'users' => $users
        ]);
    }


}