<?php

require_once __DIR__ . '/Models/Ubicacion.php';
require_once __DIR__ . '/Models/Vehiculo.php';

require_once __DIR__ . '/../Middleware/Auth.php';
require_once __DIR__ . '/../Middleware/Role.php';

class UbicacionesController{

    public function index(){
        Auth::check();
        Role::admin();

        $ubicacionModel = new Ubicacion();
        $ubicaciones = $ubicacionModel->getAll();

        require_once __DIR__ . '/Views/ubicaciones.php';
    }

    public function create(){
        Auth::check();
        Role::admin();

        $vehiculoModel = new Vehiculo();
        $vehiculos = $vehiculoModel->getAll();

        require_once __DIR__ . '/Views/ubicaciones/create.php';
    }

    public function store(){
        Auth::check();
        Role::admin();

        $ubicacionModel = new Ubicacion();
        $ubicacionModel->create(

            $_POST['id_vehiculo'],
            $_POST['latitud'],
            $_POST['longitud'],
            $_POST['estado']
        );

        header("Location: /Pruebas/BusGo/public/ubicaciones");

        exit;
    }

    public function edit(){
        Auth::check();
        Role::admin();

        $id = $_GET['id'];
        $ubicacionModel = new Ubicacion();
        $vehiculoModel = new Vehiculo();

        $ubicacion = $ubicacionModel->find($id);
        $vehiculos = $vehiculoModel->getAll();

        require_once __DIR__ . '/Views/ubicaciones/edit.php';
    }

    public function update(){
        Auth::check();
        Role::admin();

        $ubicacionModel = new Ubicacion();

        $ubicacionModel->update(

            $_POST['id_ubicacion'],
            $_POST['id_vehiculo'],
            $_POST['latitud'],
            $_POST['longitud'],
            $_POST['estado']
        );

        header("Location: /Pruebas/BusGo/public/ubicaciones");

        exit;
    }

    public function delete(){
        Auth::check();
        Role::admin();

        $id = $_GET['id'];

        $ubicacionModel = new Ubicacion();
        $ubicacionModel->delete($id);

        header("Location: /Pruebas/BusGo/public/ubicaciones");

        exit;
    }
}