<?php

require_once __DIR__ . '/Models/Empresa.php';
require_once __DIR__ . '/../Middleware/Auth.php';
require_once __DIR__ . '/../Middleware/Role.php';

class EmpresaController{
    public function index(){
        Auth::check();
        Role::admin();

        $empresaModel = new Empresa();
        $empresas = $empresaModel->getAll();

        require_once __DIR__ . '/Views/empresas.php';
    }

    public function create(){
        Auth::check();
        Role::admin();

        require_once __DIR__ . '/Views/empresas/create.php';
    }

    public function store(){
        Auth::check();
        Role::admin();

        $nombre = trim($_POST['nombre']);
        $nit = trim($_POST['nit']);
        $telefono = trim($_POST['telefono']);
        $correo = trim($_POST['correo']);

        $empresaModel = new Empresa();
        $empresaModel->create($nombre, $nit, $telefono, $correo);

        header('Location: /Pruebas/BusGo/public/empresas');
        exit;
    }

    // Método para mostrar el formulario de edición
    public function edit(){
        Auth::check();
        Role::admin();

        require_once __DIR__ . '/Models/Empresa.php';

        $empresaModel = new Empresa();

        $empresas = $empresaModel->getAll();

        require_once __DIR__ . '/Views/create.php';
    }

    public function update(){
    Auth::check();
    Role::admin();

    $empresaModel = new Empresa();

    $empresaModel->update(
        $_POST['id_empresa'],
        trim($_POST['nombre']),
        trim($_POST['nit']),
        trim($_POST['telefono']),
        trim($_POST['correo'])
    );

    header(
        "Location: /Pruebas/BusGo/public/empresas"
    );

    exit;
}

public function delete(){
    Auth::check();
    Role::admin();

    $id = $_GET['id'];

    $empresaModel = new Empresa();

    $empresaModel->delete($id);

    header(
        "Location: /Pruebas/BusGo/public/empresas"
    );

    exit;
}
}