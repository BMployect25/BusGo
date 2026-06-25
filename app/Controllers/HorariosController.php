<?php

require_once __DIR__ . '/Models/Horario.php';
require_once __DIR__ . '/Models/VehiculoRuta.php';

require_once __DIR__ . '/../Middleware/Auth.php';
require_once __DIR__ . '/../Middleware/Role.php';

class HorariosController{
    public function index(){
        Auth::check();
        Role::admin();

        $horarioModel = new Horario();

        $horarios = $horarioModel->getAll();

        require_once __DIR__ . '/Views/horarios.php';
    }

    public function create(){
        Auth::check();
        Role::admin();

        $vehiculoRutaModel = new VehiculoRuta();

        $vehiculoRutas = $vehiculoRutaModel->getAll();

        require_once __DIR__ . '/Views/horarios/create.php';
    }

    public function store(){
        Auth::check();
        Role::admin();

        $horarioModel = new Horario();

        $horarioModel->create(

            $_POST['id_vehiculo_ruta'],
            $_POST['hora_salida'],
            $_POST['hora_llegada'],
            $_POST['frecuencia_minutos'],
            $_POST['dias_operacion'],
            $_POST['estado']

        );

        header("Location: /Pruebas/BusGo/public/horarios");

        exit;
    }

    public function edit(){
        Auth::check();
        Role::admin();

        $id = $_GET['id'];

        $horarioModel = new Horario();
        $vehiculoRutaModel = new VehiculoRuta();

        $horario = $horarioModel->find($id);
        $vehiculoRutas = $vehiculoRutaModel->getAll();

        require_once __DIR__ . '/Views/horarios/edit.php';
    }

    public function update(){
        Auth::check();
        Role::admin();

        $horarioModel = new Horario();

        $horarioModel->update(

            $_POST['id_horario'],
            $_POST['id_vehiculo_ruta'],
            $_POST['hora_salida'],
            $_POST['hora_llegada'],
            $_POST['frecuencia_minutos'],
            $_POST['dias_operacion'],
            $_POST['estado']

        );

        header("Location: /Pruebas/BusGo/public/horarios");

        exit;
    }

    public function delete(){
        Auth::check();
        Role::admin();

        $id = $_GET['id'];

        $horarioModel = new Horario();

        $horarioModel->delete($id);

        header("Location: /Pruebas/BusGo/public/horarios");

        exit;
    }
}