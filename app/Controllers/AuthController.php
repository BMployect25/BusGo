<?php

require_once __DIR__.'/BaseController.php';

class AuthController extends BaseController
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
            $this->error('Usuario no encontrado');
            $this->redirect('/login');
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
            $this->error('Contraseña incorrecta');
            $this->redirect('/login');
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

    public function register(){
        require_once __DIR__ . '/Views/auth/register.php';
    }

    public function storeRegister(){
        require_once __DIR__.'/Models/User.php';

        $nombre = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);
        $correo = trim($_POST['correo']);
        $telefono = trim($_POST['telefono']);
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        if(
            empty($nombre) ||
            empty($apellido) ||
            empty($correo) ||
            empty($telefono) ||
            empty($password) ||
            empty($confirmPassword)
        ){
            $this->error("Todos los campos son obligatorios.");
            $this->redirect("/registro");
        }

        if($password !== $confirmPassword){
            $this->error("Las contraseñas no coinciden.");
            $this->redirect("/registro");
        }

        $userModel = new User();
        $usuarioExistente = $userModel->findByEmail($correo);

        if($usuarioExistente){
            $this->error("El correo ya está registrado.");
            $this->redirect("/registro");
        }

        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        if($userModel->create($nombre, $apellido, $correo, $telefono, $passwordHash, "usuario")){
            $this->success("Registro exitoso. Ahora puedes iniciar sesión.");
            $this->redirect("/login");
        } else {
            $this->error("Error al registrar el usuario.");
            $this->redirect("/registro");
        }
    }
}
