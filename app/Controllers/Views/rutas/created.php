<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ruta guardada</title>
</head>
<body>
    <h1>Ruta guardada correctamente</h1>

    <?php if (!empty($ruta)): ?>
        <p><strong>Ruta:</strong> <?= htmlspecialchars($ruta['nombre_ruta']) ?></p>
        <p><strong>Origen:</strong> <?= htmlspecialchars($ruta['origen']) ?></p>
        <p><strong>Destino:</strong> <?= htmlspecialchars($ruta['destino']) ?></p>
    <?php endif; ?>

    <p>
        Ahora puedes guardar el recorrido completo para esta ruta.
    </p>

    <p>
        <a href="/Pruebas/BusGo/public/css/ruta/createRecorrido?id=<?= urlencode($ruta['id_ruta']) ?>">Guardar recorrido completo</a>
    </p>

    <p>
        <a href="/Pruebas/BusGo/public/css/ruta">Volver a la lista de rutas</a>
    </p>
</body>
</html>
