<?php
/// Este middleware se encarga de verificar si el usuario ha iniciado sesión antes de permitirle acceder a ciertas rutas protegidas. Si el usuario no ha iniciado sesión, será redirigido a la página de inicio de sesión.
class Auth{
    public static function check(){
        if(!isset($_SESSION['id_usuario'])){
            header("Location: /Pruebas/BusGo/public/login");
            exit;
        }
    }
}