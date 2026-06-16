<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>BusGo</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <h1>Bienvenido <?= htmlspecialchars($_SESSION['nombre'] ?? 'Invitado', ENT_QUOTES, 'UTF-8') ?> a BusGo</h1>

    <p>Rol: <?= htmlspecialchars($_SESSION['rol'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?></p>

    <br><br>

    <?php if(isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin'): ?>

        <a href="/Pruebas/BusGo/public/usuarios/create">Registrar Usuario</a>

        <br><br>

        <a href="/Pruebas/BusGo/public/usuarios">Gestionar Usuarios</a>

        <br><br>

        <a href="/Pruebas/BusGo/public/ruta">Ver rutas</a>

    <?php elseif(isset($_SESSION['rol']) && $_SESSION['rol'] === 'conductor'): ?>

        <a href="#">Mis Rutas Asignadas</a>

    <?php elseif(isset($_SESSION['rol']) && $_SESSION['rol'] === 'cliente'): ?>

        <a href="/Pruebas/BusGo/public/ruta">Ver rutas</a>

    <?php endif; ?>

    <br><br>

    <p>
        <a href="/Pruebas/BusGo/public/logout">Cerrar Sesión</a>
    </p>

</body>

</html>