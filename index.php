<?php


const BASE_PATH = __DIR__;


require BASE_PATH . "/vendor/autoload.php";
require BASE_PATH . "/Core/functions.php";


// loads the .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$route = new Core\Router;
require BASE_PATH . "/routes/web.php";

$route->find_route($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);