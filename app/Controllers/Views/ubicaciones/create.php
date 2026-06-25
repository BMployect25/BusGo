<!DOCTYPE html>
<html>

<head>
    <title>Nueva Ubicación</title>
</head>

<body>

    <h1>Registrar Ubicación</h1>

    <form method="POST" action="/Pruebas/BusGo/public/ubicaciones/store">
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

    Latitud

    <br>

    <input type="text" name="latitud" required>

    <br><br>

    Longitud

    <br>

    <input type="text" name="longitud" required>

    <br><br>

    Estado

    <br>

    <select name="estado">

    <option value="en_ruta">
    En Ruta
    </option>

    <option value="detenido">
    Detenido
    </option>

    <option value="fuera_servicio">
    Fuera de Servicio
    </option>

    <option value="finalizado">
    Finalizado
    </option>

    </select>

    <br><br>

    <button>
        Guardar
    </button>

    </form>

</body>
</html>