<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Resultados - BusGo</title>

    <link rel="stylesheet" href="/Pruebas/BusGo/public/css/style.css">
</head>

<body>

    <?php require_once __DIR__ . '/../partials/header.php'; ?>

    <main class="resultados-container">

        <h1>Resultados de búsqueda</h1>

        <section class="ubicacion-card">

            <h2>📍 Tu ubicación</h2>

            <p>
                La parada más cercana es:
                <strong>
                    <?= htmlspecialchars( $paradaCercana['nombre_parada']) ?>
                </strong>
            </p>

            <p>
                <strong>Distancia aproximada:</strong>

                <?php
                    $distancia = $paradaCercana['distancia_metros'];

                    if ($distancia >= 1000) {

                        echo round( $distancia / 1000, 1) . ' km';

                    } else {

                        echo round($distancia) . ' metros';
                    }
                ?>

            </p>

            <a
                class="btn-secundario"
                href="/Pruebas/BusGo/public/buscar/camino?latitud=<?= urlencode($_GET['latitud'] ?? '') ?>&longitud=<?= urlencode($_GET['longitud'] ?? '') ?>&parada=<?= urlencode($paradaCercana['id_parada']) ?>"
                >
                🗺️ Cómo llegar a la parada
            </a>

        </section>

        <section class="resultado-seccion">

            <h2> Rutas directas</h2>

            <?php if (!empty($rutasEncontradas)): ?>

                <?php foreach ($rutasEncontradas as $ruta): ?>

                    <div class="ruta-card">

                        <h3>
                            🚌
                            <?= htmlspecialchars( $ruta['nombre_ruta']) ?>
                        </h3>

                        <p>
                            <strong>🏢 Empresa:</strong>

                            <?= htmlspecialchars( $ruta['nombre_empresa']) ?>
                        </p>

                        <p>
                            <?= htmlspecialchars( $ruta['origen']) ?>

                            →

                            <?= htmlspecialchars( $ruta['destino']) ?>
                        </p>

                        <a
                            class="btn-secundario" href="/Pruebas/BusGo/public/rutas/ver?id=<?= urlencode($ruta['id_ruta']) ?>"
                        >
                            🗺️ Ver recorrido
                        </a>

                    </div>

                <?php endforeach; ?>

            <?php else: ?>

                <div class="mensaje-info">

                    <p>
                        No encontramos una ruta directa
                        desde tu parada hasta el destino
                        seleccionado.
                    </p>

                </div>

            <?php endif; ?>

        </section>

        <section class="resultado-seccion">

            <h2>🚌 Rutas disponibles cerca de ti</h2>

            <?php if (!empty($rutasDisponibles)): ?>

                <?php foreach ($rutasDisponibles as $ruta): ?>

                    <div class="ruta-card">

                        <h3>
                            <?= htmlspecialchars( $ruta['nombre_ruta']) ?>
                        </h3>


                        <p>
                            <strong>Empresa:</strong>

                            <?= htmlspecialchars( $ruta['nombre_empresa']) ?>
                        </p>


                        <p>
                            <strong>
                                Parada de abordaje:
                            </strong>

                            <?= htmlspecialchars( $paradaCercana['nombre_parada']) ?>
                        </p>


                        <p>
                            <strong>Distancia:</strong>

                            <?php

                                if ($distancia >= 1000) {

                                    echo round($distancia / 1000, 1) . ' km';

                                } else {

                                    echo round($distancia) . ' metros';
                                }

                            ?>

                        </p>

                        <p class="ruta-direccion">

                            <?= htmlspecialchars( $ruta['origen']) ?>

                            →

                            <?= htmlspecialchars( $ruta['destino']) ?>

                        </p>


                        <a
                            class="btn-secundario" href="/Pruebas/BusGo/public/rutas/ver?id=<?= urlencode($ruta['id_ruta']) ?>"
                        >
                            🗺️ Ver recorrido
                        </a>

                    </div>

                    <br>

                <?php endforeach; ?>

            <?php else: ?>

                <div class="mensaje-info">

                    <p>
                        No encontramos rutas disponibles
                        cerca de tu ubicación.
                    </p>

                </div>

            <?php endif; ?>

        </section>

        <div class="nueva-busqueda">

            <a href="/Pruebas/BusGo/public/buscar">
                ← Nueva búsqueda
            </a>

        </div>

    </main>


    <?php require_once __DIR__ . '/../partials/footer.php'; ?>

</body>

</html>