<!-- Permite modificar los datos de un vehículo. -->

<!DOCTYPE html>
<html>
<head>
    <title>Editar Vehículo</title>
</head>

<body>

    <h1>Editar Vehículo</h1>

    <form method="POST" action="/Pruebas/BusGo/public/vehiculos/update">

    <input type="hidden" name="id_vehiculo" value="<?= $vehiculo['id_vehiculo'] ?>">

    Placa

    <br>

    <input type="text" name="placa" value="<?= $vehiculo['placa'] ?>">

    <br><br>

    Modelo

    <br>

    <input type="text" name="modelo" value="<?= $vehiculo['modelo'] ?>">

    <br><br>

    Capacidad

    <br>

    <input type="number" name="capacidad" value="<?= $vehiculo['capacidad'] ?>">

    <br><br>

    Empresa

    <br>

    <select name="id_empresa">

    <?php foreach($empresas as $empresa): ?>

    <option value="<?= $empresa['id_empresa'] ?>"
    <?= ($empresa['id_empresa']==$vehiculo['id_empresa']) ? 'selected' : '' ?>>

    <?= $empresa['nombre'] ?>

    </option>

    <?php endforeach; ?>

    </select>

    <br><br>

    Conductor

    <br>

    <select name="id_conductor">

    <?php foreach($conductores as $conductor): ?>

    <option value="<?= $conductor['id_conductor'] ?>"
    <?= ($conductor['id_conductor']==$vehiculo['id_conductor']) ? 'selected' : '' ?>>

    <?= $conductor['nombre'] ?> <?= $conductor['apellido'] ?>

    </option>

    <?php endforeach; ?>

    </select>

    <br><br>

    <button>
    Actualizar
    </button>

    </form>

</body>
</html>