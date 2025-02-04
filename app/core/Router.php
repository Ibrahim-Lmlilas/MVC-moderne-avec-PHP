<?php

namespace App\Core;

class Router {
    protected $routes = [];
    
    public function add($method, $path, $controller) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller
        ];
    }
    
    public function dispatch() {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        
        foreach ($this->routes as $route) {
            if ($route['path'] === $uri && $route['method'] === $method) {
                // Call controller
                $controller = new $route['controller']();
                $controller->index();
                return;
            }
        }
        
        // 404 Not Found
        header("HTTP/1.0 404 Not Found");
        echo '404 Not Found';
    }
}
