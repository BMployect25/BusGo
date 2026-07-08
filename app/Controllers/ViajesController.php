<?php

require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/Models/Viaje.php';
require_once __DIR__ . '/Models/VehiculoRuta.php';
require_once __DIR__ . '/Models/Conductor.php';
require_once __DIR__ . '/../Middleware/Auth.php';
require_once __DIR__ . '/../Middleware/Role.php';

class ViajesController extends BaseController
{
    public function index()
    {
        Auth::check();
        Role::admin();

        $viajeModel = new Viaje();
        $viajes = $viajeModel->getAll();

        $vista = 'viajes.php';

        $this->view($vista, ['viajes' => $viajes]);
    }

    public function create()
    {
        Auth::check();
        Role::admin();

        $vehiculoRutaModel = new VehiculoRuta();
        $conductorModel = new Conductor();

        $vehiculoRutas = $vehiculoRutaModel->getAll();
        $conductores = $conductorModel->getAll();

        $this->view('viajes/create.php', ['vehiculoRutas' => $vehiculoRutas, 'conductores' => $conductores]);
    }

    public function store()
    {
        Auth::check();
        Role::admin();

        $idVehiculoRuta = $_POST['id_vehiculo_ruta'];
        $idConductor = $_POST['id_conductor'];
        $horaInicio = trim($_POST['hora_inicio']);
        $horaFin = trim($_POST['hora_fin']);
        $kilometros = trim($_POST['kilometros']);
        $estado = $_POST['estado'];

        $viajeModel = new Viaje();
        $viajeModel->create(
            $idVehiculoRuta,
            $idConductor,
            $horaInicio,
            $horaFin,
            $kilometros,
            $estado
        );

        $this->success("Viaje creado correctamente.");
        $this->redirect('/viajes');
    }

    public function edit()
    {
        Auth::check();
        Role::admin();

        $id = $_GET['id'];

        $viajeModel = new Viaje();
        $vehiculoRutaModel = new VehiculoRuta();
        $conductorModel = new Conductor();

        $viaje = $viajeModel->find($id);
        $vehiculoRutas = $vehiculoRutaModel->getAll();
        $conductores = $conductorModel->getAll();

        $this->view('viajes/edit.php', ['viaje' => $viaje, 'vehiculoRutas' => $vehiculoRutas, 'conductores' => $conductores]);
    }

    public function update()
    {
        Auth::check();
        Role::admin();

        $viajeModel = new Viaje();

        $viajeModel->update(
            $_POST['id_viaje'], 
            $_POST['id_vehiculo_ruta'],
            $_POST['id_conductor'],
            trim($_POST['hora_inicio']),
            trim($_POST['hora_fin']),
            trim($_POST['kilometros']),
            $_POST['estado']
        );

        $this->success("Viaje actualizado correctamente.");
        $this->redirect('/viajes');
    }

    public function delete()
    {
        Auth::check();
        Role::admin();

        $id = $_GET['id'];

        $viajeModel = new Viaje();
        $viajeModel->delete($id);

        $this->success("Viaje eliminado correctamente.");
        $this->redirect('/viajes');
    }
}
