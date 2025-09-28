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

        return view('user/homepage.view.php');
    }


}