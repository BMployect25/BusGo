<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear recorrido</title>
</head>
<body>
    <h1>Crear recorrido para la ruta</h1>

    <?php if (!empty($ruta)): ?>
        <p><strong>Ruta:</strong> <?= htmlspecialchars($ruta['nombre_ruta']) ?></p>
        <p><strong>Origen:</strong> <?= htmlspecialchars($ruta['origen']) ?></p>
        <p><strong>Destino:</strong> <?= htmlspecialchars($ruta['destino']) ?></p>
    <?php endif; ?>

    <p>
        Aquí puedes comenzar a guardar el recorrido completo de la ruta.
    </p>

    <p>
        <em>Esta pantalla es el punto de partida para agregar paradas y orden de recorrido.</em>
    </p>

    <p>
        <a href="/Pruebas/BusGo/public/css/ruta">Volver a la lista de rutas</a>
    </p>
</body>
</html>
