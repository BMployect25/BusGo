<?php

require_once __DIR__ . '/../Middleware/Role.php';
require_once __DIR__ . '/../Middleware/Auth.php';
require_once __DIR__ . '/Models/Ruta.php';

class RutaController
{
    private $rutaModel;

    public function index()
    {
        $rutaModel = new Ruta();
        $rutas = $rutaModel->getAll();

        require_once __DIR__ . '/Views/ruta.php';
    }

    public function create()
    {
        Auth::check();
        Role::admin();
        require_once __DIR__ . '/Views/rutas/create.php';
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

        if ($rutaId === false) {
            header('Location: /Pruebas/BusGo/public/css/ruta');
            exit;
        }

        header('Location: /Pruebas/BusGo/public/css/ruta/created?id=' . $rutaId);
        exit;
    }

    public function created()
    {
        $idRuta = $_GET['id'] ?? null;

        if (!$idRuta) {
            header('Location: /Pruebas/BusGo/public/css/ruta');
            exit;
        }

        $rutaModel = new Ruta();
        $ruta = $rutaModel->find($idRuta);

        require_once __DIR__ . '/Views/rutas/created.php';
    }

    public function createRecorrido()
    {
        $idRuta = $_GET['id'] ?? null;

        if (!$idRuta) {
            header('Location: /Pruebas/BusGo/public/css/ruta');
            exit;
        }

        $rutaModel = new Ruta();
        $ruta = $rutaModel->find($idRuta);

        require_once __DIR__ . '/Views/rutas/createRecorrido.php';
    }

    public function verRecorrido()
    {
        $idRuta = $_GET['id'];
        $rutaModel = new Ruta();
        $recorrido = $rutaModel->obtenerRecorrido($idRuta);

        require_once __DIR__ . '/Views/recorrido.php';
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

    // Constructor para asegurar que el usuario esté autenticado antes de acceder a cualquier método
    public function __construct(){
        Auth::check();
        $this->rutaModel = new Ruta();
    }
}