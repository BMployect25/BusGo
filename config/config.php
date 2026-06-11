<?php

/* carga variables .env*/
$env = parse_ini_file(__DIR__ . '/../.env');

/* constantes globales */
define('DB_HOST', $env['DB_HOST']);
define('DB_NAME', $env['DB_NAME']);
define('DB_USER', $env['DB_USER']);
define('DB_PASS', $env['DB_PASS']);

define('APP_ENV', $env['APP_ENV']);