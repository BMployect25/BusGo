<?php

require_once __DIR__ . '/Models/Parada.php';
require_once __DIR__ . '/../Middleware/Auth.php';
require_once __DIR__ . '/../Middleware/Role.php';

class ParadaController{

    public function index(){
        Auth::check();
        Role::admin();

        $paradaModel = new Parada();
        $paradas = $paradaModel->getAll();
        require_once __DIR__ . '/Views/paradas.php';
    }

    public function create(){
        Auth::check();
        Role::admin();

        require_once __DIR__ . '/Views/paradas/create.php';
    }

    public function store(){
        Auth::check();
        Role::admin();

        $nombre = trim($_POST['nombre_parada']);
        $paradaModel = new Parada();
        $paradaModel->create($nombre);
        header('Location: /Pruebas/BusGo/public/paradas');
    }

    public function edit(){
        Auth::check();
        Role::admin();

        $id = $_GET['id'];

        $paradaModel = new Parada();
        $paradas = $paradaModel->find($id);

        require_once __DIR__ . '/Views/paradas/edit.php';
    }

    public function update(){
        Auth::check();
        Role::admin();

        $paradaModel = new Parada();

        $paradaModel->update($_POST['id_parada'], trim($_POST['nombre_parada']));

        header('Location: /Pruebas/BusGo/public/paradas');
        exit;
    }

    public function delete(){
        Auth::check();
        Role::admin();

        $id = $_GET['id'];

        $paradaModel = new Parada();
        $paradaModel->delete($id);

        header('Location: /Pruebas/BusGo/public/paradas');
        exit;
    }
}