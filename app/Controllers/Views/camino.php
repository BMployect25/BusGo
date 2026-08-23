<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cómo llegar - BusGo</title>

    <link rel="stylesheet" href="/Pruebas/BusGo/public/css/style.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">

</head>

<body>

    <?php require_once __DIR__ . '/partials/header.php'; ?>

    <main class="resultados-container">

        <a href="/Pruebas/BusGo/public/buscar">
            Volver a buscar
        </a>


        <h1>Cómo llegar a la parada</h1>


        <div class="ubicacion-card">

            <h2>📍 Tu ubicación</h2>

            <p>
                Has seleccionado:
                <strong>Tu ubicación actual</strong>
            </p>

        </div>


        <div class="ruta-card">

            <h2>Parada de destino</h2>

            <p>

                <strong>
                    <?= htmlspecialchars($parada['nombre_parada']) ?>
                </strong>

            </p>

        </div>

        <div id="map"></div>

        <div id="informacion-camino">
            <h2>🚶 Camino hasta la parada</h2>

            <p id="distancia-camino">Calculando distancia...</p>

            <p id="tiempo-camino">Calculando tiempo...</p>
        </div>

    </main>


    <script>

        const ubicacionUsuario = {

            latitud: <?= json_encode($latitud) ?>,

            longitud: <?= json_encode($longitud) ?>
        };


        const parada = {

            latitud: <?= json_encode($parada['latitud']) ?>,

            longitud: <?= json_encode($parada['longitud']) ?>,

            nombre: <?= json_encode($parada['nombre_parada']) ?>
        };


        console.log("Ubicación usuario:", ubicacionUsuario);

        console.log("Parada:", parada);

    </script>


    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>


    <script type="module" src="/Pruebas/BusGo/public/js/mapa/caminoParadaMain.js"></script>

</body>

</html>