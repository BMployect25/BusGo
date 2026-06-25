<!DOCTYPE html>
<html>

<head>
    <title>Editar Ubicación</title>
</head>

<body>

<h1>Editar Ubicación</h1>

    <form method="POST" action="/Pruebas/BusGo/public/ubicaciones/update">

    <input type="hidden" name="id_ubicacion" value="<?= $ubicacion['id_ubicacion'] ?>">
    Vehículo

    <br>

    <select name="id_vehiculo">

    <?php foreach($vehiculos as $vehiculo): ?>

    <option value="<?= $vehiculo['id_vehiculo'] ?>"

    <?= ($vehiculo['id_vehiculo']==$ubicacion['id_vehiculo']) ? 'selected' : '' ?>

    >

    <?= $vehiculo['placa'] ?>

    </option>

    <?php endforeach; ?>

    </select>

    <br><br>

    Latitud

    <br>

    <input type="text" name="latitud" value="<?= $ubicacion['latitud'] ?>">

    <br><br>

    Longitud

    <br>

    <input type="text" name="longitud" value="<?= $ubicacion['longitud'] ?>">

    <br><br>

    Estado

    <br>

    <select name="estado">

    <option value="en_ruta"
    <?= ($ubicacion['estado']=="en_ruta") ? "selected" : "" ?>>
    En Ruta
    </option>

    <option value="detenido"
    <?= ($ubicacion['estado']=="detenido") ? "selected" : "" ?>>
    Detenido
    </option>

    <option value="fuera_servicio"
    <?= ($ubicacion['estado']=="fuera_servicio") ? "selected" : "" ?>>
    Fuera de Servicio
    </option>

    <option value="finalizado"
    <?= ($ubicacion['estado']=="finalizado") ? "selected" : "" ?>>
    Finalizado
    </option>

    </select>

    <br><br>

    <button>
        Actualizar
    </button>

    </form>

</body>
</html>