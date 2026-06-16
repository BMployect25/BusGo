<?php

require_once __DIR__ . '/../Middleware/Auth.php';

class HomeController{
    public function index(){
        Auth::check();
        require_once __DIR__ . '/Views/home.php';
    }
}