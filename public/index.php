<?php

//Permite guardar información del usuario mientras navega.
session_start();

require_once __DIR__ . '/../config/config.php';
$routes = require __DIR__ . '/../routes/web.php';

/* Obtener URL actual */
$basePath = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/';

if ($basePath !== '' && str_starts_with($url, $basePath)) {
    $url = substr($url, strlen($basePath)) ?: '/';
}

if ($url === '/index.php') {
    $url = '/';
}

/* Verifica la conexión */
if (array_key_exists($url, $routes)) {
    $controllerName = $routes[$url]['controller'];
    $methodName = $routes[$url]['method'];

    require_once __DIR__ . "/../app/Controllers/$controllerName.php";

    $controller = new $controllerName();

    $controller->$methodName();

} else {
    http_response_code(404);
    echo "Pagina no necontrada";
}

/* Ejecutar método
$controller->$methodName();

Equivale a:
$controller->login(); */
