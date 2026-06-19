<!-- Mostrar el formulario para registrar un vehículo. -->

<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Vehículo</title>
</head>

<body>

    <h1>Registrar Vehículo</h1>

    <form method="POST" action="/Pruebas/BusGo/public/vehiculos/store"> 
        Placa

    <br>

    <input type="text" name="placa" required>

    <br><br>

    Modelo

    <br>

    <input type="text" name="modelo">

    <br><br>

    Capacidad

    <br>

    <input type="number" name="capacidad">

    <br><br>

    Empresa

    <br>

    <select name="id_empresa">

    <?php foreach($empresas as $empresa): ?>

    <option value="<?= $empresa['id_empresa'] ?>">

    <?= $empresa['nombre'] ?>

    </option>

    <?php endforeach; ?>

    </select>

    <br><br>

    Conductor

    <br>

    <select name="id_conductor">

    <?php foreach($conductores as $conductor): ?>

    <option value="<?= $conductor['id_conductor'] ?>">

    <?= $conductor['nombre'] ?> <?= $conductor['apellido'] ?>

    </option>

    <?php endforeach; ?>

    </select>

    <br><br>

    <button>
    Guardar
    </button>

    </form>

</body>
</html>