<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>BusGo</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <h1>Bienvenido a BusGo</h1>
    <p>Primera vista cargada correctamente</p>

    <?php if($_SESSION['rol'] === 'admin'): ?>

        <a href="/Pruebas/BusGo/public/usuarios/create">
            Registrar Usuario
        </a>

    <?php endif; ?>

    <br><br>
    <a href="usuarios">Ver usuarios</a>
    <br><br>
    <a href="ruta">Ver rutas</a>
</body>

</html>