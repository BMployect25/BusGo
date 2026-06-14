<?php

require_once __DIR__ . '/Models/User.php';
require_once __DIR__ . '/../Middleware/Auth.php';
require_once __DIR__ . '/../Middleware/Role.php';

class UserController
{
    /// Muestra la lista de usuarios
    public function index()
    {
        $userModel = new User();
        $usuarios = $userModel->getAll();

        require_once __DIR__ . '/Views/usuarios.php';
    }

    // Muestra el formulario para crear un nuevo usuario
    public function create()
    {
        Auth::check();
        Role::admin();
        require_once __DIR__ . '/Views/usuarios/create.php';
    }

    // Procesa el formulario de creación de usuario
    public function store(){
        Auth::check();
        Role::admin();

        $nombre = trim($_POST['nombre']);
        $correo = trim($_POST['correo'] ?? '');
        $password = password_hash($_POST['contrasena'] ?? '', PASSWORD_DEFAULT);
        $rol = $_POST['rol'] ?? 'cliente';

        $userModel = new User();
        $userModel->create($nombre, $correo, $password, $rol);
        header("Location: /Pruebas/BusGo/public/usuarios");
        exit;
    }
}