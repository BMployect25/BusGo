<?php
require 'C:\xampp\htdocs\Pruebas\BusGo\config\config.php';
require 'C:\xampp\htdocs\Pruebas\BusGo\config\database.php';
require 'C:\xampp\htdocs\Pruebas\BusGo\app\Controllers\Models\BaseModel.php';
require 'C:\xampp\htdocs\Pruebas\BusGo\app\Controllers\Models\RutaParada.php';
$m = new RutaParada();
$rows = $m->obtenerRutasPorParada(8);
if (!empty($rows)) {
    echo 'FIRST_KEYS=' . implode(',', array_keys($rows[0])) . PHP_EOL;
}
echo 'ROWS=' . count($rows) . PHP_EOL;