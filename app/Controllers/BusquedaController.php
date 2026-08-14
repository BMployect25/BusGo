<?php

require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/Models/Parada.php';
require_once __DIR__ . '/Models/RutaParada.php';
require_once __DIR__ . '/../Middleware/Auth.php';

class BusquedaController extends BaseController
{
    public function index()
    {
        Auth::check();

        $paradaModel = new Parada();

        $paradas = $paradaModel->getAll();

        $this->view(
            'busqueda/index.php', ['paradas' => $paradas]
        );
    }

    public function buscar()
    {
        Auth::check();

        $idOrigen = $_GET['origen'] ?? null;

        $idDestino = $_GET['destino'] ?? null;

        if (!$idOrigen || !$idDestino) {

            $this->error('Debes seleccionar un origen y un destino.');

            $this->redirect('/buscar');

            return;
        }

        if ($idOrigen == $idDestino) {

            $this->error('El origen y destino no pueden ser iguales.');

            $this->redirect('/buscar');

            return;
        }

        $rutaParadaModel = new RutaParada();

        $rutas = $rutaParadaModel->buscarRutas($idOrigen, $idDestino);

        $this->view(
            'busqueda/resultados.php', ['rutas' => $rutas]
        );
    }

    public function paradaCercana()
    {

        Auth::check();

        $latitud = $_GET['latitud'] ?? null;
        $longitud = $_GET['longitud'] ?? null;

        if ($latitud === null || $longitud === null) 
        {
            http_response_code(400);

            echo json_encode([
                'success' => false,
                'message' => 'No se recibieron coordenadas.'
            ]);

            return;
        }

        $paradaModel = new Parada();

        $parada = $paradaModel->obtenerMasCercana($latitud, $longitud);

        header('Content-Type: application/json; charset=utf-8');

        if (!$parada) {

            echo json_encode([
                'success' => false,
                'message' => 'No se encontró ninguna parada.'
            ]);

            return;
        }

            echo json_encode([
                'success' => true,
                'parada' => $parada
            ]);
    }
}
