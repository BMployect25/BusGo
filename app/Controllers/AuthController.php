<?php
class AuthController
{
    public function login(){
        require_once __DIR__ . '/Views/login.php';
    }

    /*Cuando el usuario escriba:
    Correo y Contraseña
    BusGo debe buscar si existe en la base de datos.*/

    public function authenticate(){
        //Incluye el modelo para acceder a la base de datos
        require_once __DIR__ . '/Models/User.php';

        // Obtiene los datos
        $correo = trim($_POST['correo'] ?? '');
        $contrasena = trim($_POST['contrasena'] ?? '');

        $userModel = new User();
        $usuario = $userModel->findByEmail($correo);

        if (!$usuario){
            die('Usuario no encontrado');
        }

        // Soportar distintos nombres de columna de contraseña
        $pwKey = array_key_exists('password_hash', $usuario) ? 'password_hash' : (
            array_key_exists('contrasena', $usuario) ? 'contrasena' : (
                (array_key_exists('contraseña', $usuario) ? 'contraseña' : 'password')
            )
        );

        $storedPassword = $usuario[$pwKey] ?? '';
        $isHashed = preg_match('/^\$2[axy]\$|^\$argon2/i', $storedPassword) === 1;

        $passwordOk = $isHashed
            ? password_verify($contrasena, $storedPassword)
            : hash_equals($storedPassword, $contrasena);

        if (!$passwordOk){
            die('Contraseña incorrecta');
        }

        $_SESSION['id_usuario'] = $usuario['id_usuario'] ?? null;
        $_SESSION['nombre'] = $usuario['nombre'] ?? null;
        $_SESSION['rol'] = $usuario['rol'] ?? null;

        header("Location: /Pruebas/BusGo/public/");
        exit;
    }

    // Método para cerrar sesión
    public function logout(){
        // Limpia la sesión y redirige al login
        session_unset();
        session_destroy();
        header("Location: /Pruebas/BusGo/public/login");
        exit;
    }
    
}