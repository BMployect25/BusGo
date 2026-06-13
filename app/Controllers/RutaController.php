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

    public function store(){
        // Capturar los datos
        $nombre_ruta = trim($_POST['nombre_ruta']);
        $origen = trim($_POST['origen']);
        $destino = trim($_POST['destino']);

        // Aqui se valida
        if(empty($nombre_ruta) || empty($origen) || empty($destino)){
            die("Todos los campos son obligatorios");
        }

        //redirige al listado
        header('Location: /Pruebas/BusGo/public/css/ruta');
        exit;
    }

    public function create(){
        require_once __DIR__ . '/Views/ruta/create.php';
    }

    public function edit(){
        $id = $_GET['id'];
        echo "Editando ruta ID: " . $id;
    }
}