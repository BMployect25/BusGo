<?php 

//requirimientos
require_once __DIR__ . '/Models/Conductor.php';
require_once __DIR__ . '/Models/Empresa.php';
require_once __DIR__ . '/../Middleware/Auth.php';
require_once __DIR__ . '/../Middleware/Role.php';

class ConductoresController{
    //Mostrar todos los conductores
    public function index(){
        Auth::check();
        Role::admin();

        $conductorModel = new Conductor();
        $conductores = $conductorModel->getAll();

        require_once __DIR__ . '/Views/conductores.php';
    }

    //Mostrar formulario para registrar conductores 
    public function create(){
        Auth::check();
        Role::admin();

        $empresaModel = new Empresa();
        $empresas = $empresaModel->getAll();

        require_once __DIR__ . '/Views/conductores/create.php';
    }

    //Guardar el conductor en MySQL
    public function store(){
        Auth::check();
        Role::admin();

        $nombre = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);
        $telefono = trim($_POST['telefono']);
        $licencia= trim($_POST['licencia']);
        $idEmpresa = ($_POST['id_empresa']);

        $conductorModel = new Conductor();

        $conductorModel->create(
            $nombre,
            $apellido,
            $telefono,
            $licencia,
            $idEmpresa
        );
        header("Location: /Pruebas/BusGo/public/conductores");

        exit;
    }

    //Cargar un conductor para modificarlo
    public function edit(){
        Auth::check();
        Role::admin();

        $id = $_GET['id'];

        $conductorModel = new Conductor();
        $empresaModel = new Empresa();

        $conductor = $conductorModel->find($id);
        $empresas = $empresaModel->getAll();

        require_once __DIR__ . '/Views/conductores/edit.php';
    }

    //Actualizar datos del conductor
    public function update(){
        Auth::check();
        Role::admin();

        $conductorModel = new Conductor();

        $conductorModel->update(
            $_POST['id_conductor'],
            trim($_POST['nombre']),
            trim($_POST['apellido']),
            trim($_POST['telefono']),
            trim($_POST['licencia']),
            $_POST['id_empresa']
        );

        header("Location: /Pruebas/BusGo/public/conductores");

        exit;
    }

    //Eliminar conductor
    public function delete()
    {
        Auth::check();
        Role::admin();

        $id = $_GET['id'];

        $conductorModel = new Conductor();
        $conductorModel->delete($id);

        header("Location: /Pruebas/BusGo/public/conductores");

        exit;
    }
}