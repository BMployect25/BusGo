<?php

require_once __DIR__ . '/Models/Empresa.php';
require_once __DIR__ . '/../Middleware/Auth.php';
require_once __DIR__ . '/../Middleware/Role.php';

class EmpresaController extends BaseController{
    public function index(){
        Auth::check();
        Role::admin();

        $empresaModel = new Empresa();
        $empresas = $empresaModel->getAll();

        $vista = 'empresas.php';

        $this->view($vista, ['empresas' => $empresas]);
    }

    public function create(){
        Auth::check();
        Role::admin();

        $this->view('empresas/create.php');
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


        $this->success("Empresa creada correctamente.");
        $this->redirect('/empresas');
    }

    // Método para mostrar el formulario de edición
    public function edit(){
        Auth::check();
        Role::admin();

        require_once __DIR__ . '/Models/Empresa.php';

        $empresaModel = new Empresa();

        $empresas = $empresaModel->getAll();

        $this->view('empresas/edit.php', ['empresas' => $empresas]);
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

    $this->success("Empresa actualizada correctamente.");
        $this->redirect('/empresas');
    }

    public function delete(){
        Auth::check();
        Role::admin();

        $id = $_GET['id'];

        $empresaModel = new Empresa();

        $empresaModel->delete($id);

        $this->success("Empresa eliminada correctamente.");
        $this->redirect('/empresas');
    }
}
