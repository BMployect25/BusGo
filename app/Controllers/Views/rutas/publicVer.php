<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>
        <?= htmlspecialchars($ruta['nombre_ruta']) ?>
    </title>

    <link rel="stylesheet" href="/Pruebas/BusGo/public/css/style.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">

    <style>
        #map {
            height: 600px;
            width: 100%;
        }
    </style>

</head>

<body>

    <?php require_once __DIR__ . '/../partials/header.php'; ?>

    <div class="container">

    <a href="http://localhost/Pruebas/BusGo/public/rutas">
        Volver
    </a>

        <h1>
            <?= htmlspecialchars($ruta['nombre_ruta']) ?>
        </h1>

        <p>
            <strong>Origen:</strong>
            <?= htmlspecialchars($ruta['origen']) ?>
        </p>

        <p>
            <strong>Destino:</strong>
            <?= htmlspecialchars($ruta['destino']) ?>
        </p>

        <div id="map"></div>

        <h2>Paradas del recorrido</h2>

        <div class="lista-paradas">
            <?php foreach ($recorrido as $parada): ?>

                <div class="parada-item">

                    <span class="numero-parada-lista">
                        <?= htmlspecialchars($parada['orden_recorrido']) ?>
                    </span>

                    <span class="nombre-parada-lista">
                        <?= htmlspecialchars($parada['nombre_parada']) ?>
                    </span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <script>

        window.recorrido = <?= json_encode($recorrido) ?>;

        console.log("Recorrido público:", window.recorrido);
        
    </script>


    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>


    <script type="module">
        import { iniciarMapa } from "/Pruebas/BusGo/public/js/mapa/main.js";
        
        document.addEventListener("DOMContentLoaded", function() {
            iniciarMapa(window.recorrido);
        });
    </script>

</body>

</html>