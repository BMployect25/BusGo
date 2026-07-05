<?php

require_once __DIR__ . '/../Middleware/Auth.php';
require_once __DIR__ . '/../Middleware/Role.php';

class HomeController{
    public function index(){
        Auth::check();
        require_once __DIR__ . '/Views/home.php';
    }

    public function admin(){
        Auth::check();
        Role::admin();
        require_once __DIR__ . '/Views/admin.php';
    }
}