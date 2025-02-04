<?php

// Define your routes here
$router->add('GET', '/', 'App\Controllers\Front\HomeController');
$router->add('GET', '/admin', 'App\Controllers\Back\DashboardController');
