<?php

require_once __DIR__ . '/Models/User.php';

class UserController
{
    public function index()
    {
        $userModel = new User();
        $usuarios = $userModel->getAll();

        require_once __DIR__ . '/Views/usuarios.php';
    }
}