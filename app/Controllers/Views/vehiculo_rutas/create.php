<!-- Permite seleccionar:
Un vehículo.
Una ruta.
y crear la relación entre ambos. -->

<!DOCTYPE html>
<html>
<head>
    <title>Asignar Ruta a Vehículo</title>
</head>

<body>

    <h1>Asignar Vehículo a Ruta</h1>

    <form method="POST"
    action="/Pruebas/BusGo/public/vehiculo_rutas/store">
    Vehículo

    <br>

    <select name="id_vehiculo">

    <?php foreach($vehiculos as $vehiculo): ?>

    <option value="<?= $vehiculo['id_vehiculo'] ?>">

    <?= $vehiculo['placa'] ?>

    </option>

    <?php endforeach; ?>

    </select>

    <br><br>

    Ruta

    <br>

    <select name="id_ruta">

    <?php foreach($rutas as $ruta): ?>

    <option value="<?= $ruta['id_ruta'] ?>">

    <?= $ruta['nombre_ruta'] ?>

    </option>

    <?php endforeach; ?>

    </select>

    <br><br>

    <button type="submit">
    Guardar
    </button>

    </form>

    <br><br>

    <a href="/Pruebas/BusGo/public/vehiculo_rutas">
    Volver
    </a>

</body>
</html>