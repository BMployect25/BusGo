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

    '/login/authenticate' => [
        'controller' => 'AuthController',
        'method' => 'authenticate'
    ],

    '/usuarios' => [
        'controller' => 'UserController',
        'method' => 'index'
    ],

    '/ruta' => [
        'controller' => 'RutaController',
        'method' => 'index'
    ],

    '/ruta/create' => [
        'controller' => 'RutaController',
        'method' => 'create'
    ],

    '/ruta/store' => [
        'controller' => 'RutaController',
        'method' => 'store'
    ],

    '/ruta/created' => [
        'controller' => 'RutaController',
        'method' => 'created'
    ],

    '/ruta/createRecorrido' => [
        'controller' => 'RutaController',
        'method' => 'createRecorrido'
    ],

    '/ruta/delete' => [
        'controller' => 'RutaController',
        'method' => 'delete'
    ],

    '/ruta/verRecorrido' => [
        'controller' => 'RutaController',
        'method' => 'verRecorrido'
    ],
    
    '/usuarios/create' => [
        'controller' => 'UserController',
        'method' => 'create'
    ],

    '/usuarios/store' => [
        'controller' => 'UserController',
        'method' => 'store'
    ]
];