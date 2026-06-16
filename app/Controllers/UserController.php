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
         Role::admin();

        require_once __DIR__ .
        '/Views/usuarios/create.php';
    }

    // Procesa el formulario de creación de usuario
    public function store(){
        Auth::check();
        Role::admin();

        $nombre = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);
        $correo = trim($_POST['correo'] ?? '');
        $telefono = trim($_POST['telefono'] ?? '');
        $rol = $_POST['rol'] ?? 'cliente';

        // esto es para validar la contraseña
        $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $userModel = new User();
        $userModel->create($nombre, $apellido, $correo, $telefono, $passwordHash, $rol);
        header("Location: /Pruebas/BusGo/public/usuarios");
        exit;
    }

    public function edit(){
        Auth::check();
        Role::admin();

        $id = $_GET['id'];
    
        $userModel = new User();
        $usuario = $userModel->find($id);
    
        require_once __DIR__ . '/Views/usuarios/edit.php';
    }

    public function update(){
        Auth::check();
        Role::admin();

        $userModel = new User();
        $userModel->update(
            $_POST['id'],
            trim($_POST['nombre']),
            trim($_POST['apellido']),
            trim($_POST['correo'] ?? ''),
            trim($_POST['telefono'] ?? ''),
            password_hash($_POST['password'], PASSWORD_DEFAULT),
            $_POST['rol'] ?? 'cliente'
        );
        header("Location: /Pruebas/BusGo/public/usuarios");
        exit;
    }

    public function delete(){
        Auth::check();
        Role::admin();

        $id = $_GET['id'];
        $userModel = new User();
        $userModel->delete($id);
        header("Location: /Pruebas/BusGo/public/usuarios");
        exit;
    }
}