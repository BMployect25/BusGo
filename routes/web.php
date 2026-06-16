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

    '/logout' => [
        'controller' => 'AuthController',
        'method' => 'logout'
    ],
    
    '/usuarios' => [
        'controller' => 'UserController',
        'method' => 'index'
    ],

    '/usuarios/create' => [
        'controller' => 'UserController',
        'method' => 'create'
    ],

    '/usuarios/store' => [
        'controller' => 'UserController',
        'method' => 'store'
    ],

    '/usuarios/edit' => [
        'controller' => 'UserController',
        'method' => 'edit'
    ],

    '/usuarios/update' => [
        'controller' => 'UserController',
        'method' => 'update'
    ],

    '/usuarios/delete' => [
        'controller' => 'UserController',
        'method' => 'delete'
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

    '/empresas' => [
        'controller' => 'EmpresaController',
        'method' => 'index'
    ],

    '/empresas/create' => [
        'controller' => 'EmpresaController',
        'method' => 'create'
    ],

    '/empresas/store' => [
        'controller' => 'EmpresaController',
        'method' => 'store'
    ],

    '/empresas/edit' => [
        'controller' => 'EmpresaController',
        'method' => 'edit'
    ],

    '/empresas/update' => [
        'controller' => 'EmpresaController',
        'method' => 'update'
    ],

    '/empresas/delete' => [
        'controller' => 'EmpresaController',
        'method' => 'delete'
    ]
];