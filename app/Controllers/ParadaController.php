<?php

require_once __DIR__ . '/Models/Parada.php';
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../Middleware/Auth.php';
require_once __DIR__ . '/../Middleware/Role.php';

class ParadaController extends BaseController{

    public function index(){
        Auth::check();
        Role::admin();

        $paradaModel = new Parada();
        $paradas = $paradaModel->getAll();
        $this->view('paradas.php', ['paradas' => $paradas]);
    }

    public function create(){
        Auth::check();
        Role::admin();

        $this->view('paradas/create.php');
    }

    public function store(){
        Auth::check();
        Role::admin();

        $nombre = trim($_POST['nombre_parada'] ?? '');
        $latitud = trim($_POST['latitud'] ?? '');
        $longitud = trim($_POST['longitud'] ?? '');

        if ($nombre === '' || $latitud === '' || $longitud === '') {
            $this->error('Todos los campos son obligatorios.');
            $this->redirect('/paradas/create');
        }

        $latitudValue = (float) $latitud;
        $longitudValue = (float) $longitud;

        if ($latitudValue < -90 || $latitudValue > 90) {
            $this->error('Latitud inválida.');
            $this->redirect('/paradas/create');
        }

        if ($longitudValue < -180 || $longitudValue > 180) {
            $this->error('Longitud inválida.');
            $this->redirect('/paradas/create');
        }

        $paradaModel = new Parada();
        $paradaModel->create($nombre, $latitudValue, $longitudValue);

        $this->success('Parada creada correctamente.');
        $this->redirect('/paradas');
    }

    public function edit(){
        Auth::check();
        Role::admin();

        $id = $_GET['id'] ?? null;

        if (!$id) {
            $this->redirect('/paradas');
        }

        $paradaModel = new Parada();
        $parada = $paradaModel->find($id);

        if (!$parada) {
            $this->error('La parada no existe.');
            $this->redirect('/paradas');
        }

        $this->view('paradas/edit.php', ['parada' => $parada]);
    }

    public function update(){
        Auth::check();
        Role::admin();

        $paradaModel = new Parada();

        $id = $_POST['id_parada'] ?? 0;
        $nombre = trim($_POST['nombre_parada'] ?? '');
        $latitud = trim($_POST['latitud'] ?? '');
        $longitud = trim($_POST['longitud'] ?? '');

        if ($id <= 0 || $nombre === '' || $latitud === '' || $longitud === '') {
            $this->error('Todos los campos son obligatorios.');
            $this->redirect('/paradas/edit?id=' . $id);
        }

        $latitudValue = (float) $latitud;
        $longitudValue = (float) $longitud;

        if ($latitudValue < -90 || $longitudValue > 90) {
            $this->error('La latitud no es valida.');
            $this->redirect('/paradas/edit?id=' . $id);
        }

        if ($latitudValue < -180 || $longitudValue > 180) {
            $this->error('La longitud no es valida.');
            $this->redirect('/parada/edit?id=' . $id);
        }

        $paradaModel = new Parada();

        $resultado = $paradaModel->update($id, $nombre, $latitudValue, $longitudValue);

        if ($resultado) {
            $this->success('Parada actualizacion correctamente.');
        } else {
            $this->error('No se puede actualizar la parada.');
        }

        $this->redirect('/paradas');
    }

    public function delete(){
        Auth::check();
        Role::admin();

        $id = $_GET['id'];

        $paradaModel = new Parada();
        $paradaModel->delete($id);

        $this->success('Parada eliminada correctamente.');
        $this->redirect('/paradas');
    }
}