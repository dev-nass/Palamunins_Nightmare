<?php

namespace Core;

use Core\Database;
use Core\Session;

class Authenticator
{

    protected static $database;

    public static function init()
    {
        static::$database = new Database();
    }


    public static function attempt($credentials)
    {

        static::init();


        $user = static::$database->query("SELECT * FROM users WHERE email = :email", [
            'email' => $credentials['email']
        ])->find();

        if (empty($user)) {
            Session::set('__flash', [
                'email' => 'Account does not exist'
            ]);

            return redirect($_SERVER['HTTP_REFERER']);
        }


        if (!password_verify($credentials['password'], $user['password'])) {
            Session::set('__flash', [
                'password' => 'Incorrect password'
            ]);

            return redirect($_SERVER['HTTP_REFERER']);
        }

        static::login($credentials);

        return true;

    }


    public static function login($credentials)
    {
        if (empty($credentials)) {
            return false;
        }

        Session::set('__credentials', [
            'id' => $credentials['id'],
            'email' => $credentials['email'],
        ]);

        session_regenerate_id(true);

        return true;
    }


    public static function logout()
    {
        unset($_SESSION['__credentials']);
    }

}