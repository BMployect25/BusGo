<?php

require_once __DIR__ . '/Models/Vehiculo.php';
require_once __DIR__ . '/Models/Ruta.php';
require_once __DIR__ . '/../Middleware/Auth.php';
require_once __DIR__ . '/../Middleware/Role.php';

class VehiculoRutaController{
    public function index(){
        Auth::check();
        Role::admin();

        $vehiculoRutaModel = new VehiculoRuta();
        $asignaciones = $vehiculoRutaModel->getAll();

        require_once __DIR__ . '/Views/vehiculo_rutas.php';
    }

    //Cargar Vehiculos y Rutas
    public function create(){
        Auth::check();
        Role::admin();

        $vehiculoModel = new Vehiculo();
        $rutaModel = new Ruta();

        $vehiculos = $vehiculoModel->getAll();
        $rutas = $rutaModel->getAll();

        require_once __DIR__ . '/Views/vehiculo_rutas/create.php';
    }

    public function store(){
        Auth::check();
        Role::admin();

        $vehiculoRutaModel = new VehiculoRuta();

        $vehiculoRutaModel->create(

            $_POST['id_vehiculo'],
            $_POST['id_ruta']
        );

        header("Location: /Pruebas/BusGo/public/vehiculo_rutas");

        exit;
    }

    public function delete(){
        Auth::check();
        Role::admin();

        $vehiculoRutaModel = new VehiculoRuta();

        $vehiculoRutaModel->delete($_GET['id']);

        header("Location: /Pruebas/BusGo/public/vehiculo_rutas");

        exit;
    }
}