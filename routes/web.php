<?php
return [

    //login

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
    
    //usuarios

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

    //ruta

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

    '/ruta/edit' => [
        'controller' => 'RutaController',
        'method' => 'edit'
    ],

    '/ruta/update' => [
        'controller' => 'RutaController',
        'method' => 'update'
    ],

    '/ruta/verRecorrido' => [
        'controller' => 'RutaController',
        'method' => 'verRecorrido'
    ],

    '/ruta/storeRecorrido' => [
        'controller' => 'RutaController',
        'method' => 'storeRecorrido'
    ],

    '/ruta/deleteRecorrido' => [
        'controller' => 'RutaController',
        'method' => 'deleteRecorrido'
    ],

    '/ruta/editRecorrido' => [
        'controller' => 'RutaController',
        'method' => 'editRecorrido'
    ],

    '/ruta/updateRecorrido' => [
        'controller' => 'RutaController',
        'method' => 'updateRecorrido'
    ],

    //empresas

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
    ],

    //paradas

    '/paradas' => [
        'controller' => 'ParadaController',
        'method' => 'index'
    ],

    '/paradas/create' => [
        'controller' => 'ParadaController',
        'method' => 'create'
    ],

    '/paradas/store' => [
        'controller' => 'ParadaController',
        'method' => 'store'
    ],

    '/paradas/edit' => [
        'controller' => 'ParadaController',
        'method' => 'edit'
    ],

    '/paradas/update' => [
        'controller' => 'ParadaController',
        'method' => 'update'
    ],

    '/paradas/delete' => [
        'controller' => 'ParadaController',
        'method' => 'delete'
    ],

    //conductores

    '/conductores' => [
        'controller'=>'ConductoresController',
    '   method'=>'index'
    ],

    '/conductores/create' => [
        'controller'=>'ConductoresController',
        'method'=>'create'
    ],

    '/conductores/store' => [
        'controller'=>'ConductoresController',
        'method'=>'store'
    ],

    '/conductores/edit' => [
        'controller'=>'ConductoresController',
        'method'=>'edit'
    ],

    '/conductores/update' => [
        'controller'=>'ConductoresController',
        'method'=>'update'
    ],

    '/conductores/delete' => [
        'controller'=>'ConductoresController',
        'method'=>'delete'
    ],

    //vehiculos

    '/vehiculos' => [
        'controller' => 'VehiculosController',
        'method' => 'index'
    ],

    '/vehiculos/create' => [
        'controller' => 'VehiculosController',
        'method' => 'create'
    ],

    '/vehiculos/store' => [
        'controller' => 'VehiculosController',
        'method' => 'store'
    ],

    '/vehiculos/edit' => [
        'controller' => 'VehiculosController',
        'method' => 'edit'
    ],

    '/vehiculos/update' => [
        'controller' => 'VehiculosController',
        'method' => 'update'
    ],

    '/vehiculos/delete' => [
        'controller' => 'VehiculosController',
        'method' => 'delete'
    ],

    '/vehiculo_rutas' => [
        'controller' => 'VehiculoRutaController',
        'method' => 'index'
    ],

    '/vehiculo_rutas/create' => [
        'controller' => 'VehiculoRutaController',
        'method' => 'create'
    ],

    '/vehiculo_rutas/store' => [
        'controller' => 'VehiculoRutaController',
        'method' => 'store'
    ],

    '/vehiculo_rutas/delete' => [
        'controller' => 'VehiculoRutaController',
        'method' => 'delete'
    ]
];