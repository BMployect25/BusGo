<?php

require_once __DIR__ . '/Models/Parada.php';
require_once __DIR__ . '/Models/Parada.php';
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

        $nombre = trim($_POST['nombre_parada']);
        $paradaModel = new Parada();
        $paradaModel->create($nombre);
        $this->success("Parada creada correctamente.");
        $this->redirect('/paradas');
    }

    public function edit(){
        Auth::check();
        Role::admin();

        $id = $_GET['id'];

        $paradaModel = new Parada();
        $paradas = $paradaModel->find($id);


        $this->view('paradas/edit.php', ['parada' => $paradas]);
    }

    public function update(){
        Auth::check();
        Role::admin();

        $paradaModel = new Parada();

        $paradaModel->update($_POST['id_parada'], trim($_POST['nombre_parada']));

        $this->success("Parada actualizada correctamente.");
        $this->redirect('/paradas');
        exit;
    }

    public function delete(){
        Auth::check();
        Role::admin();

        $id = $_GET['id'];

        $paradaModel = new Parada();
        $paradaModel->delete($id);

        $this->success("Parada eliminada correctamente.");
        $this->redirect('/paradas');
    }
}