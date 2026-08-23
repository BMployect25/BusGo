<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Buscar rutas - BusGo</title>

    <link rel="stylesheet" href="/Pruebas/BusGo/public/css/style.css">
</head>

<body>

    <?php require_once __DIR__ . '/../partials/header.php'; ?>

    <main class="busqueda-container">

        <div class="busqueda-card">

            <h1>🔎 Buscar una ruta</h1>

            <p class="busqueda-descripcion">
                Encuentra una ruta desde tu ubicación
                hasta el lugar donde quieres llegar.
            </p>

            <form method="GET" action="/Pruebas/BusGo/public/buscar/rutas">

                <div class="form-group">

                    <label for="origen">
                        Tu ubicación
                    </label>

                    <button type="button" id="usar-ubicacion" class="btn-ubicacion">
                        📍 Usar mi ubicación
                    </button>

                    <!-- Inputs ocultos para guardar coordenadas -->
                    <input type="hidden" name="latitud" id="latitud" value="">
                    <input type="hidden" name="longitud" id="longitud" value="">

                    <!-- Mensaje de estado de ubicación -->
                    <p id="ubicacion-mensaje" style="margin-top: 10px; font-size: 14px; color: #666;"></p>

                </div>
                
                <br>

                <div class="form-group">

                    <label for="destino">
                        ¿A dónde quieres ir?
                    </label>

                    <select name="destino" id="destino" required>

                        <option value="">
                            Selecciona una parada
                        </option>

                        <?php foreach ($paradas as $parada): ?>

                            <option value="<?= $parada['id_parada'] ?>">

                                <?= htmlspecialchars( $parada['nombre_parada']) ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <br><br>
                
                <button type="submit" class="btn-buscar">

                    🔎 Buscar rutas

                </button>

            </form>

        </div>

    </main>

    <?php require_once __DIR__ . '/../partials/footer.php'; ?>

    <script src="/Pruebas/BusGo/public/js/mapa/busquedaUbicacion.js"></script>

</body>

</html>