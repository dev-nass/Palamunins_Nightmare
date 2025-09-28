<?php

use Core\Session;

session_start();

// Set the default timezone to Philippine Time (PHT)
date_default_timezone_set('Asia/Manila');

const BASE_PATH = __DIR__;


require BASE_PATH . "/vendor/autoload.php";
require BASE_PATH . "/Core/functions.php";


// loads the .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$route = new Core\Router;
require BASE_PATH . "/routes/web.php";

$route->find_route($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

Session::unflash();