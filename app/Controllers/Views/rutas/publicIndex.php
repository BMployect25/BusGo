<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rutas disponibles - BusGo</title>
    <link rel="stylesheet" href="/Pruebas/BusGo/public/css/style.css">
</head>

<body>

    <div class="container">

        <a href="http://localhost/Pruebas/BusGo/public/">
            Volver
        </a>

        <h1>Rutas disponibles </h1>

        <?php foreach ($rutas as $ruta): ?>

            <div class="ruta-card">

                <h2>
                    <?= htmlspecialchars($ruta['nombre_ruta']) ?>
                </h2>

                <p>
                    <strong>Origen: </strong>

                    <?= htmlspecialchars($ruta['origen']) ?>
                </p>

                <p>
                    <strong>Destino: </strong>

                    <?= htmlspecialchars($ruta['destino']) ?>
                </p>
                <a href="/Pruebas/BusGo/public/rutas/ver?id=<?= urlencode($ruta['id_ruta']) ?>">
                    Ver recorrido
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>