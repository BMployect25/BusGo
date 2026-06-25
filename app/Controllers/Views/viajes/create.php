<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registrar Viaje</title>
    <link rel="stylesheet" href="/Pruebas/BusGo/public/css/style.css">
</head>

<body>
    <div class="container">
        <div class="page-header">
            <h1>Registrar Viaje</h1>
        </div>

        <form method="POST" action="/Pruebas/BusGo/public/viajes/store">
            <label for="id_vehiculo_ruta">Vehículo - Ruta</label>
            <select id="id_vehiculo_ruta" name="id_vehiculo_ruta">
                <?php foreach($vehiculoRutas as $vr): ?>
                <option value="<?= $vr['id_vehiculo_ruta'] ?>"><?= $vr['placa'] ?> - <?= $vr['nombre_ruta'] ?></option>
                <?php endforeach; ?>
            </select>

            <label for="id_conductor">Conductor</label>
            <select id="id_conductor" name="id_conductor">
                <?php foreach($conductores as $conductor): ?>
                <option value="<?= $conductor['id_conductor'] ?>"><?= $conductor['nombre'] ?></option>
                <?php endforeach; ?>
            </select>

            <label for="hora_inicio">Hora Inicio</label>
            <input type="datetime-local" id="hora_inicio" name="hora_inicio" required>

            <label for="hora_fin">Hora Fin</label>
            <input type="datetime-local" id="hora_fin" name="hora_fin">

            <label for="kilometros">Kilómetros</label>
            <input type="number" step="0.01" id="kilometros" name="kilometros">

            <label for="estado">Estado</label>
            <select id="estado" name="estado">
                <option value="en_proceso">En Proceso</option>
                <option value="finalizado">Finalizado</option>
                <option value="cancelado">Cancelado</option>
            </select>

            <div class="actions">
                <button class="btn btn-primary" type="submit">Guardar Viaje</button>
                <a class="btn btn-secondary" href="/Pruebas/BusGo/public/viajes">Volver</a>
            </div>
        </form>
    </div>
</body>
</html>