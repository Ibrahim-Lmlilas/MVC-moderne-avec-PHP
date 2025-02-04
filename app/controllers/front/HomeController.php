<?php

namespace App\Controllers\Front;

use App\Core\Controller;
use App\Core\Security;
use App\Core\Session;

class HomeController extends Controller {
    public function index() {
        // Example of using Security class
        $token = Security::generateCsrfToken();
        
        // Example of using Session flash messages
        Session::flash('welcome', 'Welcome to our MVC Framework!');
        
        $this->view('front/home', [
            'token' => $token,
            'message' => Session::flash('welcome')
        ]);
    }
}
