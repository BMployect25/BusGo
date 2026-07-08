<?php

require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/Models/Ruta.php';
require_once __DIR__ . '/Models/Vehiculo.php';
require_once __DIR__ . '/Models/Empresa.php';
require_once __DIR__ . '/Models/Conductor.php';
require_once __DIR__ . '/../Middleware/Auth.php';
require_once __DIR__ . '/../Middleware/Role.php';

class VehiculosController extends BaseController{

    public function index(){
        Auth::check();
        Role::admin();

        $vehiculoModel = new Vehiculo();
        $vehiculos = $vehiculoModel->getAll();

        $vista = 'vehiculos.php';

        $this->view($vista, ['vehiculos' => $vehiculos]);
    }

    public function create(){
        Auth::check();
        Role::admin();

        $empresaModel = new Empresa();
        $conductorModel = new Conductor();

        $empresas = $empresaModel->getAll();
        $conductores = $conductorModel->getAll();

        $this->view('vehiculos/create.php', ['empresas' => $empresas, 'conductores' => $conductores]);
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

        $this->success("Vehículo creado correctamente.");
        $this->redirect('/vehiculos');
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

        $this->view('vehiculos/edit.php', ['vehiculo' => $vehiculo, 'empresas' => $empresas, 'conductores' => $conductores]);
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


        $this->success("Vehículo actualizado correctamente.");
        $this->redirect('/vehiculos');
    }

    public function delete(){
        Auth::check();
        Role::admin();

        $id = $_GET['id'];

        $vehiculoModel = new Vehiculo();
        $vehiculoModel->delete($id);

        $this->success("Vehículo eliminado correctamente.");
        $this->redirect('/vehiculos');
    }
}
