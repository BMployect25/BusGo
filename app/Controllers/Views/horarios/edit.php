<!DOCTYPE html>
<html>

<head>
    <title>Editar Horario</title>
</head>

<body>

<h1>Editar Horario</h1>

    <form method="POST" action="/Pruebas/BusGo/public/horarios/update">

    <input type="hidden" name="id_horario" value="<?= $horario['id_horario'] ?>">
    Vehículo - Ruta

    <br>

    <select name="id_vehiculo_ruta">

    <?php foreach($vehiculoRutas as $vr): ?>

    <option value="<?= $vr['id_vehiculo_ruta'] ?>"

    <?= ($vr['id_vehiculo_ruta']==$horario['id_vehiculo_ruta']) ? 'selected' : '' ?>

    >

    <?= $vr['placa'] ?>

    -

    <?= $vr['nombre_ruta'] ?>

    </option>

    <?php endforeach; ?>

    </select>

    <br><br>

    Hora salida

    <br>

    <input type="time" name="hora_salida" value="<?= $horario['hora_salida'] ?>">

    <br><br>

    Hora llegada

    <br>

    <input type="time" name="hora_llegada" value="<?= $horario['hora_llegada'] ?>">

    <br><br>

    Frecuencia

    <br>

    <input type="number" name="frecuencia_minutos" value="<?= $horario['frecuencia_minutos'] ?>">

    <br><br>

    Días de operación

    <br>

    <input type="text" name="dias_operacion" value="<?= $horario['dias_operacion'] ?>">

    <br><br>

    Estado

    <br>

    <select name="estado">

    <option value="activo"
    <?= ($horario['estado']=="activo") ? "selected" : "" ?>>

    Activo

    </option>

    <option value="inactivo"
    <?= ($horario['estado']=="inactivo") ? "selected" : "" ?>>

    Inactivo

    </option>

    </select>

    <br><br>

    <button>
        Actualizar
    </button>

    </form>

</body>
</html>