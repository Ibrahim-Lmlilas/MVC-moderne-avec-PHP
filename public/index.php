<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;
use Dotenv\Dotenv;

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Initialize Router
$router = new Router();

// Load routes
require_once __DIR__ . '/../config/routes.php';

// Dispatch the request
$router->dispatch();
