<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resultados de búsqueda</title>
    <link rel="stylesheet" href="/Pruebas/BusGo/public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Resultados encontrados</h1>

        <?php if(count($rutas) > 0): ?>   
            <?php foreach($rutas as $ruta): ?>
                <div class="ruta-card">
                    <h2>
                        <?= htmlspecialchars($ruta['nombre_ruta']) ?>
                    </h2>

                    <p>
                        <strong>Origen:</strong>
                        <?= htmlspecialchars($ruta['origen']) ?>
                    </p>

                    <p>
                        <strong>Destino</strong>
                        <?= htmlspecialchars($ruta['destino']) ?>
                    </p>

                    <a href="/Pruebas/BusGo/public/rutas/ver?id=<?= $ruta['id_ruta'] ?>">
                        Ver recorrido en el mapa
                    </a>
                    
                </div>

                <?php endforeach; ?>

            <?php else: ?>
                <h2>
                    No se encontró ninguna ruta disponible.
                </h2>
            <?php endif; ?>

            <br>

            <a href="/Pruebas/BusGo/public/buscar">
                ← Nueva búsqueda
            </a>
    </div>
</body>
</html>