<?php

namespace Core;

class Router
{
    private $routes = [];

    private function add($method, $uri, $action, $controller)
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $_ENV['APP_URL'] . $uri,
            'action' => $action,
            'controller' => $controller
        ];
    }

    public function get($uri, $action, $controller)
    {
        return $this->add('GET', $uri, $action, $controller);
    }


    public function post($uri, $action, $controller)
    {
        return $this->add('POST', $uri, $action, $controller);
    }


    public function find_route($method, $uri)
    {

        foreach ($this->routes as $route) {

            if ($route['method'] === $method && $route['uri'] === $uri) {


                $controller_class_path = '\\App\Http\Controllers\\' . $route['controller'];
                $controller_class_instance = new $controller_class_path();
                $controller_class_actions = get_class_methods($controller_class_instance);

                foreach ($controller_class_actions as $action) {
                    if ($action === $route['action']) {
                        call_user_func([$controller_class_instance, $action]);
                        return;
                    }
                }
            }

        }



    }



}