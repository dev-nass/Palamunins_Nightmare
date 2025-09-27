<?php

namespace Core;

class Session
{


    /**
     * value can be an array of properties too (key, value)
     * or it can be just a plain value
     */
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }


    public static function get($key, $default = '')
    {

        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }

        return $_SESSION[$key] ?? $default;

    }


    public static function unflash($key = "__flash")
    {
        unset($_SESSION[$key]);
    }
}