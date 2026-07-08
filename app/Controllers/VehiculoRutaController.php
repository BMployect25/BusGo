<?php

require_once __DIR__ . '/Models/VehiculoRuta.php';
require_once __DIR__ . '/Models/Vehiculo.php';
require_once __DIR__ . '/Models/Ruta.php';
require_once __DIR__ . '/../Middleware/Auth.php';
require_once __DIR__ . '/../Middleware/Role.php';

class VehiculoRutaController extends BaseController{
    public function index(){
        Auth::check();
        Role::admin();

        $vehiculoRutaModel = new VehiculoRuta();
        $asignaciones = $vehiculoRutaModel->getAll();

        $this->view('vehiculo_rutas.php', ['asignaciones' => $asignaciones]);
    }

    //Cargar Vehiculos y Rutas
    public function create(){
        Auth::check();
        Role::admin();

        $vehiculoModel = new Vehiculo();
        $rutaModel = new Ruta();

        $vehiculos = $vehiculoModel->getAll();
        $rutas = $rutaModel->getAll();

        $this->view('vehiculo_rutas/create.php', ['vehiculos' => $vehiculos, 'rutas' => $rutas]);
    }

    public function store(){
        Auth::check();
        Role::admin();

        $vehiculoRutaModel = new VehiculoRuta();

        $vehiculoRutaModel->create(

            $_POST['id_vehiculo'],
            $_POST['id_ruta']
        );

        $this->success("Asignación creada correctamente.");
        $this->redirect('/vehiculo_rutas');
    }

    public function delete(){
        Auth::check();
        Role::admin();

        $vehiculoRutaModel = new VehiculoRuta();

        $vehiculoRutaModel->delete($_GET['id']);

        $this->success("Asignación eliminada correctamente.");
        $this->redirect('/vehiculo_rutas');
    }
}