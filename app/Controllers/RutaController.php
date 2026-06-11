<?php

require_once __DIR__ . '/Models/Ruta.php';

class RutaController
{
    public function index()
    {
        $rutaModel = new Ruta();
        $rutas = $rutaModel->getAll();

        require_once __DIR__ . '/Views/ruta.php';
    }

    public function verRecorrido()
    {
        $idRuta = $_GET['id'];
        $rutaModel = new Ruta();
        $recorrido = $rutaModel->obtenerRecorrido($idRuta);

        require_once __DIR__ . '/Views/recorrido.php';
    }
}