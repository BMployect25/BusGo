<!DOCTYPE html>
<html>

<head>
    <title>Nuevo Horario</title>
</head>

<body>

    <h1>Registrar Horario</h1>

    <form method="POST"
    action="/Pruebas/BusGo/public/horarios/store">
    Vehículo - Ruta

    <br>

    <select name="id_vehiculo_ruta">

    <?php foreach($vehiculoRutas as $vr): ?>

    <option value="<?= $vr['id_vehiculo_ruta'] ?>">

    <?= $vr['placa'] ?> - <?= $vr['nombre_ruta'] ?>

    </option>

    <?php endforeach; ?>

    </select>

    <br><br>

    Hora de salida

    <br>

    <input type="time" name="hora_salida" required>

    <br><br>

    Hora de llegada

    <br>

    <input type="time" name="hora_llegada">

    <br><br>

    Frecuencia (minutos)

    <br>

    <input type="number" name="frecuencia_minutos">

    <br><br>

    Días de operación

    <br>

    <input type="text" name="dias_operacion" placeholder="Lunes-Viernes">

    <br><br>

    Estado

    <br>

    <select name="estado">

    <option value="activo">
        Activo
    </option>

    <option value="inactivo">
        Inactivo
    </option>

    </select>

    <br><br>

    <button>
        Guardar
    </button>

    </form>

</body>
</html>