<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>BusGo</title>
    <link rel="stylesheet" href="/Pruebas/BusGo/public/css/style.css">
</head>

<body>

    <div class="header">

        <h1>BusGo</h1>

        <p>
            Bienvenido
            <strong><?= htmlspecialchars($_SESSION['nombre']) ?></strong>
        </p>

        <p>
            Rol:
            <strong><?= htmlspecialchars($_SESSION['rol']) ?></strong>
        </p>

    </div>

    <div class="menu">

    <?php if($_SESSION['rol'] === 'admin'): ?>

        <a href="/Pruebas/BusGo/public/usuarios/create">
            Registrar Usuario
        </a>

        <a href="/Pruebas/BusGo/public/usuarios">
            Gestionar Usuarios
        </a>

        <a href="/Pruebas/BusGo/public/ruta">
            Gestionar Rutas
        </a>

        <a href="/Pruebas/BusGo/public/vehiculos">
            Vehículos
        </a>

        <a href="/Pruebas/BusGo/public/viajes">
            Viajes
        </a>

    <?php elseif($_SESSION['rol'] === 'conductor'): ?>

        <a href="#">
            Mis Rutas
        </a>

    <?php elseif($_SESSION['rol'] === 'cliente'): ?>

        <a href="/Pruebas/BusGo/public/ruta">
            Ver Rutas
        </a>

        <a href="/Pruebas/BusGo/public/horarios">
            Ver Horarios
        </a>

    <?php endif; ?>

    </div>

    <div class="logout">

        <a href="/Pruebas/BusGo/public/logout">
            Cerrar Sesión
        </a>

    </div>

</body>
</html>