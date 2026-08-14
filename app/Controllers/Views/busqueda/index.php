<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/Pruebas/BusGo/public/css/style.css">
</head>

<body>
    
    <a href="http://localhost/Pruebas/BusGo/public/">
        Volver
    </a>

    <h1>¿A dónde quieres ir?</h1>

    <form method="GET" action="/Pruebas/BusGo/public/buscar/rutas">

        <label for="origen"> Origen </label>

        <select name="origen" id="origen" required>

            <option value=""> Selecciona el origen </option>

            <?php foreach ($paradas as $parada): ?>

                <option value="<?= $parada['id_parada'] ?>" >

                    <?= htmlspecialchars($parada['nombre_parada']) ?>

                </option>

            <?php endforeach; ?>

        </select>


        <label for="destino"> Destino </label>

        <select name="destino" id="destino" required>

            <option value=""> Selecciona el destino </option>

            <?php foreach ($paradas as $parada): ?>

                <option value="<?= $parada['id_parada'] ?>">

                    <?= htmlspecialchars($parada['nombre_parada']) ?>

                </option>

            <?php endforeach; ?>

        </select>

        <br><br>

        <button type="submit"> Buscar rutas </button>

    </form>
</body>
</html>