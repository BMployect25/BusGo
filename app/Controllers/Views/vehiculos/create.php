<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Vehículo</title>
    <link rel="stylesheet" href="/Pruebas/BusGo/public/css/style.css">
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1>Registrar Vehículo</h1>
        </div>

        <form method="POST" action="/Pruebas/BusGo/public/vehiculos/store">
            <label for="placa">Placa</label>
            <input type="text" id="placa" name="placa" required>

            <label for="modelo">Modelo</label>
            <input type="text" id="modelo" name="modelo">

            <label for="capacidad">Capacidad</label>
            <input type="number" id="capacidad" name="capacidad">

            <label for="id_empresa">Empresa</label>
            <select id="id_empresa" name="id_empresa">
                <?php foreach($empresas as $empresa): ?>
                <option value="<?= $empresa['id_empresa'] ?>"><?= $empresa['nombre'] ?></option>
                <?php endforeach; ?>
            </select>

            <label for="id_conductor">Conductor</label>
            <select id="id_conductor" name="id_conductor">
                <?php foreach($conductores as $conductor): ?>
                <option value="<?= $conductor['id_conductor'] ?>"><?= $conductor['nombre'] ?> <?= $conductor['apellido'] ?></option>
                <?php endforeach; ?>
            </select>

            <div class="actions">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <a class="btn btn-secondary" href="/Pruebas/BusGo/public/vehiculos">Volver</a>
            </div>
        </form>
    </div>
</body>
</html>