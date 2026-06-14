<?php
/// Este middleware se encarga de verificar si el usuario tiene el rol de admin antes de permitirle acceder a ciertas rutas o funcionalidades.

class Role
{
    public static function admin()
    {
        if ( !isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin'){
            die('Acceso denegado');
        }
    }
}