<?php
/// Este middleware se encarga de verificar si el usuario tiene el rol de admin antes de permitirle acceder a ciertas rutas o funcionalidades.

class Role
{
    public static function admin()
    {
        if (!isset($_SESSION['id_usuario'])) {
            $_SESSION['error'] = 'Debes iniciar sesión para acceder.';
            header('Location: /Pruebas/BusGo/public/login');
            exit;
        }

        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
            $_SESSION['error'] = 'Acceso denegado. Se requiere rol de administrador.';
            header('Location: /Pruebas/BusGo/public/');
            exit;
        }
    }
}