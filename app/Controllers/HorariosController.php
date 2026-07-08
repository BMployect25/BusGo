<?php

require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/Models/Horario.php';
require_once __DIR__ . '/Models/VehiculoRuta.php';

require_once __DIR__ . '/../Middleware/Auth.php';
require_once __DIR__ . '/../Middleware/Role.php';

class HorariosController extends BaseController{
    public function index(){
        Auth::check();
        Role::admin();

        $horarioModel = new Horario();

        $horarios = $horarioModel->getAll();

        $vista = 'horarios.php';

        $this->view($vista, ['horarios' => $horarios]);
    }

    public function create(){
        Auth::check();
        Role::admin();

        $vehiculoRutaModel = new VehiculoRuta();

        $vehiculoRutas = $vehiculoRutaModel->getAll();

        $this->view('horarios/create.php', ['vehiculoRutas' => $vehiculoRutas]);
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

        $this->success("Horario creado correctamente.");
        $this->redirect('/horarios');
    }

    public function edit(){
        Auth::check();
        Role::admin();

        $id = $_GET['id'];

        $horarioModel = new Horario();
        $vehiculoRutaModel = new VehiculoRuta();

        $horario = $horarioModel->find($id);
        $vehiculoRutas = $vehiculoRutaModel->getAll();

        $this->view('horarios/edit.php', ['horario' => $horario, 'vehiculoRutas' => $vehiculoRutas]);
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

        $this->success("Horario actualizado correctamente.");
        $this->redirect('/horarios');
    }

    public function delete(){
        Auth::check();
        Role::admin();

        $id = $_GET['id'];

        $horarioModel = new Horario();

        $horarioModel->delete($id);

        $this->success("Horario eliminado correctamente.");
        $this->redirect('/horarios');
    }
}