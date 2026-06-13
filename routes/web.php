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
    ],

    '/ruta/create' => [
        'controller' => 'RutaController',
        'method' => 'create'
    ],

    '/css/ruta' => [
        'controller' => 'RutaController',
        'method' => 'index'
    ],
    
    '/ruta/store' => [
        'controller' => 'RutaController',
        'method' => 'store'
    ],

    '/ruta/edit' => [
        'controller' => 'RutaController',
        'method' => 'edit'
    ]
];