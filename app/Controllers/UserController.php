<?php

require_once __DIR__ . '/Models/User.php';
require_once __DIR__ . '/../Middleware/Auth.php';
require_once __DIR__ . '/../Middleware/Role.php';

class UserController
{
    /// Muestra la lista de usuarios
    public function index()
    {
        Auth::check();
        Role::admin();

        $userModel = new User();
        $usuarios = $userModel->getAll();

        $vista = "usuarios.php";

        require_once __DIR__.'/Views/layout.php';
    }

    // Muestra el formulario para crear un nuevo usuario
    public function create()
    {
        Auth::check();
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

        if($userModel->create($nombre, $apellido, $correo, $telefono, $passwordHash, $rol)){
            $_SESSION['success'] = "Usuario registrado correctamente.";

        }else{
            $_SESSION['error'] = "No se pudo registrar el usuario.";

        }

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
        $resultado = $userModel->update(
            $_POST['id'],
            trim($_POST['nombre']),
            trim($_POST['apellido']),
            trim($_POST['correo'] ?? ''),
            trim($_POST['telefono'] ?? ''),
            password_hash($_POST['password'], PASSWORD_DEFAULT),
            $_POST['rol'] ?? 'cliente'
        );
       
            if($resultado){
                $_SESSION['success'] = "Usuario actualizado correctamente.";
            }else{
                $_SESSION['error'] = "No se pudo actualizar el usuario.";
            }

        header("Location: /Pruebas/BusGo/public/usuarios");
        exit;
    }

    public function delete(){
        Auth::check();
        Role::admin();

        $id = $_GET['id'];
        $userModel = new User();
        
        if($userModel->delete($id)){

            $_SESSION['success'] = "Usuario eliminado correctamente.";
        }else{

            $_SESSION['error'] = "No se pudo eliminar el usuario.";
        }

        header("Location: /Pruebas/BusGo/public/usuarios");
        exit;
    }
}