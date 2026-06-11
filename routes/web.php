<?php
return [
    '/' => [
        'controller' => 'HomeController',
        'method' => 'index'
    ],

    '/login' => [
        'controller' => 'AuthController',
        'method' => 'login'
    ],

    '/usuarios' => [
        'controller' => 'UserController',
        'method' => 'index'
    ],

    '/ruta' => [
        'controller' => 'RutaController',
        'method' => 'index'
    ],

    '/ruta/verRecorrido' => [
        'controller' => 'RutaController',
        'method' => 'verRecorrido'
    ]
];