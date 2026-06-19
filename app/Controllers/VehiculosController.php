<?php

require_once __DIR__ . '/Models/Vehiculo.php';
require_once __DIR__ . '/../Middleware/Auth.php';
require_once __DIR__ . '/../Middleware/Role.php';

class VehiculosController{

    public function index(){
        Auth::check();
        Role::admin();

        $vehiculoModel = new Parada();
        $paradas = $vehiculoModel->getAll();
        require_once __DIR__ . '/Views/vehiculos.php';
    }

    public function create(){
        Auth::check();
        Role::admin();

        require_once __DIR__ . '/Views/vehiculo/create.php';
    }

    public function store(){
        Auth::check();
        Role::admin();

        $nombre = trim($_POST['id_vehiculo']);
        $paradaModel = new Parada();
        $paradaModel->create($nombre);
        header('Location: /Pruebas/BusGo/public/vehiculo');
    }

    public function edit(){
        Auth::check();
        Role::admin();

        $id = $_GET['id'];

        $paradaModel = new Parada();
        $paradas = $paradaModel->find($id);

        require_once __DIR__ . '/Views/vehiculo/edit.php';
    }

    public function update(){
        Auth::check();
        Role::admin();

        $paradaModel = new Parada();

        $paradaModel->update($_POST['placa'], trim($_POST['id_vehiculo']));

        header('Location: /Pruebas/BusGo/public/vehiculo');
        exit;
    }

    public function delete(){
        Auth::check();
        Role::admin();

        $id = $_GET['id'];

        $paradaModel = new Parada();
        $paradaModel->delete($id);

        header('Location: /Pruebas/BusGo/public/vehiculo');
        exit;
    }
}