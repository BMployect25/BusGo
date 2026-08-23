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
        return $this->buscarRutas();
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

    public function buscarRutas()
    {
        Auth::check();

        $latitud = $_GET['latitud'] ?? null;
        $longitud = $_GET['longitud'] ?? null;
        $destino = $_GET['destino'] ?? null;

        // verificar datos recibidos

        if ($latitud === null || $longitud === null || $destino === null || $latitud === '' || $longitud === '' || $destino === '')
            {
                $this->error('Debes indicar tu ubicación y el destino.');
                $this->redirect('/buscar');
                return;
            }

            // crear modelo de paradas

            $paradaModel = new Parada();

            $paradaCercana = $paradaModel->obtenerMasCercana(
                $latitud,
                $longitud
            );

            // Validar que se encontró una parada cercana
            if (!$paradaCercana) {
                $this->error('No se encontró ninguna parada cercana a tu ubicación.');
                $this->redirect('/buscar');
                return;
            }

            $rutaParadaModel = new RutaParada();
            $rutasPorParada = $rutaParadaModel->obtenerRutasPorParada(
                $paradaCercana['id_parada']
            );

            $rutasEncontradas = $rutaParadaModel->obtenerRutaEntreParadas(
                $paradaCercana['id_parada'],
                $destino
            );
            
            $this->view('busqueda/resultados.php',
            [
                'paradaCercana' => $paradaCercana,
                'rutasDisponibles' => $rutasPorParada,
                'rutasEncontradas' => $rutasEncontradas,
                'destino' => $destino,
                'latitudUsuario' => $latitud,
                'longitudUsuario' => $longitud
            ]
        );
    }

    public function camino()
    {
        Auth::check();

        $latitud = $_GET['latitud'] ?? null;
        $longitud = $_GET['longitud'] ?? null;
        $idParada = $_GET['parada'] ?? null;

        if (
            $latitud === null ||
            $longitud === null ||
            $idParada === null
        ) {
            $this->error('No se recibio la informacion necesaria.');

            $this->redirect('/buscar');

            return;
        }

        $paradaModel = new Parada();

        $parada = $paradaModel->find($idParada);

        if (!$parada) {
            $this->error('No se encontro la parada');

            $this->redirect('/buscar');

            return;
        }

        $this->view('camino.php',
            [
                'latitud' => $latitud,
                'longitud' => $longitud,
                'parada' => $parada
            ]
        );
    }
}
