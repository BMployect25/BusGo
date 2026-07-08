<?php

class BaseController {

    protected function view($archivo, array $data = []){
        $vista = $archivo;
        extract($data);
        require_once __DIR__.'/Views/layout.php';
    }

    protected function redirect($ruta){
        header("Location: /Pruebas/BusGo/public".$ruta);
        exit;
    }

    protected function redirectTo($ruta){
        header("Location: ".$ruta);
        exit;
    }

    protected function success($mensaje){
        $_SESSION['success'] = $mensaje;
    }

    protected function error($mensaje){
        $_SESSION['error'] = $mensaje;
    }
}