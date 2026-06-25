<?php

require_once __DIR__ . '/Models/Vehiculo.php';
require_once __DIR__ . '/Models/Empresa.php';
require_once __DIR__ . '/Models/Conductor.php';
require_once __DIR__ . '/../Middleware/Auth.php';
require_once __DIR__ . '/../Middleware/Role.php';

class VehiculosController{

    public function index(){
        Auth::check();
        Role::admin();

        $vehiculoModel = new Vehiculo();
        $vehiculos = $vehiculoModel->getAll();

        require_once __DIR__ . '/Views/vehiculos.php';
    }

    public function create(){
        Auth::check();
        Role::admin();

        $empresaModel = new Empresa();
        $conductorModel = new Conductor();

        $empresas = $empresaModel->getAll();
        $conductores = $conductorModel->getAll();

        require_once __DIR__ . '/Views/vehiculos/create.php';
    }

    public function store(){
        Auth::check();
        Role::admin();

        $placa = trim($_POST['placa']);
        $modelo = trim($_POST['modelo']);
        $capacidad = trim($_POST['capacidad']);
        $idEmpresa = $_POST['id_empresa'];
        $idConductor = $_POST['id_conductor'];

        $vehiculoModel = new Vehiculo();
        $vehiculoModel->create(
            $placa,
            $modelo,
            $capacidad,
            $idEmpresa,
            $idConductor
        );

        header('Location: /Pruebas/BusGo/public/vehiculos');
        exit;
    }

    public function edit(){
        Auth::check();
        Role::admin();

        $id = $_GET['id'];

        $vehiculoModel = new Vehiculo();
        $empresaModel = new Empresa();
        $conductorModel = new Conductor();

        $vehiculo = $vehiculoModel->find($id);
        $empresas = $empresaModel->getAll();
        $conductores = $conductorModel->getAll();

        require_once __DIR__ . '/Views/vehiculos/edit.php';
    }

    public function update(){
        Auth::check();
        Role::admin();

        $vehiculoModel = new Vehiculo();

        $vehiculoModel->update(
            $_POST['id_vehiculo'], 
            trim($_POST['placa']),
            trim($_POST['modelo']),
            trim($_POST['capacidad']),
            $_POST['id_empresa'],
            $_POST['id_conductor']
        );

        header('Location: /Pruebas/BusGo/public/vehiculos');
        exit;
    }

    public function delete(){
        Auth::check();
        Role::admin();

        $id = $_GET['id'];

        $vehiculoModel = new Vehiculo();
        $vehiculoModel->delete($id);

        header('Location: /Pruebas/BusGo/public/vehiculos');
        exit;
    }
}
