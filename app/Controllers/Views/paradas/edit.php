<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <title>Editar parada</title>

    <link rel="stylesheet" href="/Pruebas/BusGo/public/css/style.css">
</head>

<body>

    <div class="container">

        <h1>Editar parada</h1>

        <form action="/Pruebas/BusGo/public/paradas/update" method="POST">

            <!-- Identificador de la parada -->

            <input type="hidden" name="id_parada" 
            value="<?= htmlspecialchars($parada['id_parada']) ?>">

            <div class="form-group">

                <label for="nombre_parada">
                    Nombre de la parada:
                </label>

                <input type="text" id="nombre_parada" name="nombre_parada"
                    value="<?= htmlspecialchars($parada['nombre_parada']) ?>" required>
            </div>

            <div class="form-group">

                <label for="latitud">
                    Latitud:
                </label>

                <input type="number" step="any" id="latitud" name="latitud"
                    value="<?= htmlspecialchars($parada['latitud'] ?? '') ?>"required>
            </div>

            <div class="form-group">

                <label for="longitud">
                    Longitud:
                </label>

                <input type="number" step="any" id="longitud" name="longitud"
                    value="<?= htmlspecialchars($parada['longitud'] ?? '') ?>" required>
            </div>

            <button type="submit">
                Guardar cambios
            </button>
        </form>

        <br>

        <a href="/Pruebas/BusGo/public/paradas">
            Volver a paradas
        </a>

    </div>
</body>
</html>