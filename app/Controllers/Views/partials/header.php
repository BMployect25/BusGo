<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BusGo</title>
    <link rel="stylesheet" href="/Pruebas/BusGo/public/css/style.css">
</head>
<body>
    <header class="header">

    <h1>BusGo</h1>

    <p>
        Bienvenido
        <strong><?= htmlspecialchars($_SESSION['nombre']) ?></strong>
    </p>

    <p>
        Rol:
        <strong><?= htmlspecialchars($_SESSION['rol']) ?></strong>
    </p>
    </header>
    <main class="container">
