<!DOCTYPE html>
<html>

<head>
    <title>Editar Viaje</title>
</head>

<body>

    <h1>Editar Viaje</h1>

    <form method="POST" action="/Pruebas/BusGo/public/viajes/update">

    <input type="hidden" name="id_viaje" value="<?= $viaje['id_viaje'] ?>">

    Vehículo - Ruta

    <br>

    <select name="id_vehiculo_ruta">

    <?php foreach($vehiculoRutas as $vr): ?>

    <option value="<?= $vr['id_vehiculo_ruta'] ?>"
    <?= ($vr['id_vehiculo_ruta'] == $viaje['id_vehiculo_ruta']) ? 'selected' : '' ?>>

    <?= $vr['placa'] ?> -
    <?= $vr['nombre_ruta'] ?>

    </option>

    <?php endforeach; ?>

    </select>

    <br><br>

    Conductor

    <br>

    <select name="id_conductor">

    <?php foreach($conductores as $conductor): ?>

    <option value="<?= $conductor['id_conductor'] ?>"
    <?= ($conductor['id_conductor'] == $viaje['id_conductor']) ? 'selected' : '' ?>>

    <?= $conductor['nombre'] ?>

    </option>

    <?php endforeach; ?>

    </select>

    <br><br>

    Hora Inicio

    <br>

    <input type="datetime-local" name="hora_inicio"
    value="<?= date('Y-m-d\TH:i', strtotime($viaje['hora_inicio'])) ?>">

    <br><br>

    Hora Fin

    <br>

    <input type="datetime-local" name="hora_fin"
    value="<?= !empty($viaje['hora_fin']) ? date('Y-m-d\TH:i', strtotime($viaje['hora_fin'])) : '' ?>">

    <br><br>

    Kilómetros

    <br>

    <input type="number" step="0.01" name="kilometros"
    value="<?= $viaje['kilometros'] ?>">

    <br><br>

    Estado

    <br>

    <select name="estado">

    <option value="en_proceso"
    <?= ($viaje['estado'] == 'en_proceso') ? 'selected' : '' ?>>
    En Proceso
    </option>

    <option value="finalizado"
    <?= ($viaje['estado'] == 'finalizado') ? 'selected' : '' ?>>
    Finalizado
    </option>

    <option value="cancelado"
    <?= ($viaje['estado'] == 'cancelado') ? 'selected' : '' ?>>
    Cancelado
    </option>

    </select>

    <br><br>

    <button>
        Actualizar Viaje
    </button>

    </form>

</body>
</html>