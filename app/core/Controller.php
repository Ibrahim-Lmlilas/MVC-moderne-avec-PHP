<?php

namespace App\Core;

abstract class Controller {
    protected function view($name, $data = []) {
        extract($data);
        require_once __DIR__ . "/../views/{$name}.php";
    }
    
    protected function json($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
