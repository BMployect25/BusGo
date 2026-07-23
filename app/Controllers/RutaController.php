<?php

//esto es para que solo los administradores puedan acceder a las rutas de este controlador
require_once __DIR__ . '/../Middleware/Role.php';
require_once __DIR__ . '/../Middleware/Auth.php';
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/Models/Ruta.php';
require_once __DIR__ . '/Models/Empresa.php';
require_once __DIR__ . '/Models/Parada.php';
require_once __DIR__ . '/Models/RutaParada.php';

class RutaController extends BaseController
{
    private $rutaModel;

    public function index()
    {
        Auth::check();
        Role::admin();

        $rutaModel = new Ruta();
        $rutas = $rutaModel->getAll();

        $this->view('rutas/index.php', ['rutas' => $rutas]);
    }

    public function create()
    {
        Auth::check();
        Role::admin();

        // Crear objeto del modelo Empresa
         $empresaModel = new Empresa();

        // Obtener todas las empresas de la BD
        $empresas = $empresaModel->getAll();

        $this->view('rutas/create.php', ['empresas' => $empresas]);
    }

    public function store()
    {
        Auth::check();
        Role::admin();
        $nombre_ruta = $_POST['nombre_ruta'] ?? '';
        $origen = $_POST['origen'] ?? '';
        $destino = $_POST['destino'] ?? '';
        $id_empresa = $_POST['id_empresa'] ?? 1;

        $rutaModel = new Ruta();
        $rutaId = $rutaModel->create($nombre_ruta, $origen, $destino, $id_empresa);

        if ($rutaId) {
            $this->success("Ruta creada correctamente.");
        } else {
            $this->error("No se pudo crear la ruta.");
        }

        $this->redirect('/rutas');
    }

    public function created()
    {
        Auth::check();
        Role::admin();

        $idRuta = $_GET['id'] ?? null;

        if (!$idRuta) {
            header('Location: /Pruebas/BusGo/public/css/ruta');
            exit;
        }

        $rutaModel = new Ruta();
        $ruta = $rutaModel->find($idRuta);

        $this->view('rutas/created.php', ['ruta' => $ruta]);
    }

    public function createRecorrido()
    {
        Auth::check();
        Role::admin();

        $idRuta = $_GET['id'];
        $paradaModel = new Parada();
        $paradas = $paradaModel->getAll();

        $this->view('rutas/createRecorrido.php', ['paradas' => $paradas]);
    }

    public function verRecorrido()
    {
        Auth::check();
        Role::admin();

        $idRuta = $_GET['id'];
        $rutaModel = new Ruta();
        
        $recorrido = $rutaModel->obtenerRecorrido($idRuta);

        // Proveer también los datos de la ruta individual a la vista
        $ruta = $rutaModel->find($idRuta);

        $this->view('rutas/verRecorrido.php', ['ruta' => $ruta, 'recorrido' => $recorrido]);
    }

    public function delete()
    {
        Auth::check();
        Role::admin();
        $idRuta = $_GET['id'] ?? null;

        if (!$idRuta) {
            header('Location: /Pruebas/BusGo/public/css/ruta');
            exit;
        }

        $rutaModel = new Ruta();
        $rutaModel->delete($idRuta);

        header('Location: /Pruebas/BusGo/public/css/ruta');
        exit;
    }

    public function edit()
    {
        Auth::check();
        Role::admin();

        $idRuta = $_GET['id'] ?? null;

        if (!$idRuta) {
            header('Location: /Pruebas/BusGo/public/css/ruta');
            exit;
        }

        $ruta = $this->rutaModel->find($idRuta);

        if (!$ruta) {
            header('Location: /Pruebas/BusGo/public/css/ruta');
            exit;
        }

        $empresaModel = new Empresa();
        $empresas = $empresaModel->getAll();

        $this->view('rutas/edit.php', ['ruta' => $ruta, 'empresas' => $empresas]);
    }

    public function update()
    {
        Auth::check();
        Role::admin();

        $idRuta = $_POST['id_ruta'] ?? null;
        $nombre_ruta = $_POST['nombre_ruta'] ?? '';
        $origen = $_POST['origen'] ?? '';
        $destino = $_POST['destino'] ?? '';
        $id_empresa = $_POST['id_empresa'] ?? 1;

        if (!$idRuta) {
            header('Location: /Pruebas/BusGo/public/css/ruta');
            exit;
        }

        $this->rutaModel->update($idRuta, $nombre_ruta, $origen, $destino, $id_empresa);

        if ($this->rutaModel) {
            $this->success("Ruta actualizada correctamente.");
        } else {
            $this->error("No se pudo actualizar la ruta.");
        }

        $this->redirect('/rutas');
    }

    // Constructor para asegurar que el usuario esté autenticado antes de acceder a cualquier método
    public function __construct(){
        Auth::check();
        $this->rutaModel = new Ruta();
    }

    public function storeRecorrido(){

        Auth::check();
        Role::admin();

        require_once __DIR__ . '/Models/RutaParada.php';

        $rutaParada = new RutaParada();

        $rutaParada->create(

            $_POST['id_ruta'],
            $_POST['id_parada'],
            $_POST['orden_recorrido']

        );

        $this->success("Recorrido agregado correctamente.");
        $this->redirect('/rutas/verRecorrido?id=' . $_POST['id_ruta']);
    }

    public function deleteRecorrido(){
        Auth::check();
        Role::admin();

        $idRutaParada = $_GET['id'];
        $rutaParadaModel = new RutaParada();
        $registro = $rutaParadaModel->find($idRutaParada);

        $idRuta = $registro['id_ruta'];
        $rutaParadaModel->delete($idRutaParada);

        $this->success("Recorrido eliminado correctamente.");
        $this->redirect('/rutas/verRecorrido?id=' . $idRuta);

        exit;
    }

    public function editRecorrido(){
        Auth::check();
        Role::admin();

        $idRutaParada = $_GET['id'];
        $rutaParadaModel = new RutaParada();

        $registro = $rutaParadaModel->find($idRutaParada);

        $this->view('rutas/editRecorrido.php', ['registro' => $registro]);
    }

    public function updateRecorrido(){
        Auth::check();
        Role::admin();

        $rutaParadaModel = new RutaParada();

        $rutaParadaModel->update(
            $_POST['id_ruta_parada'],
            $_POST['orden_recorrido']
        );

        $this->success("Recorrido actualizado correctamente.");
        $this->redirect('/rutas/verRecorrido?id=' . $_POST['id_ruta']);

        exit;
    }
}