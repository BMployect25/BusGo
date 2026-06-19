<!-- Muestra la lista de vehículos registrados. -->
<!DOCTYPE html>
<html>
<head>
    <title>Vehículos</title>
</head>
<body>

    <h1>Lista de Vehículos</h1>

    <p>
        <a href="/Pruebas/BusGo/public/">Volver al inicio</a>
    </p>

    <p>
        <a href="/Pruebas/BusGo/public/vehiculos/create">Registrar vehículo</a>
    </p>

    <table border="1">

    <tr>
        <th>Placa</th>
        <th>Modelo</th>
        <th>Capacidad</th>
        <th>Empresa</th>
        <th>Conductor</th>
        <th>Acciones</th>
    </tr>

    <?php foreach($vehiculos as $vehiculo): ?>

    <tr>

    <td><?= $vehiculo['placa'] ?></td>

    <td><?= $vehiculo['modelo'] ?></td>

    <td><?= $vehiculo['capacidad'] ?></td>

    <td><?= $vehiculo['empresa'] ?></td>

    <td><?= $vehiculo['conductor'] ?></td>

    <td>

    <a href="/Pruebas/BusGo/public/vehiculos/edit?id=<?= $vehiculo['id_vehiculo'] ?>">
    Editar
    </a>

    |

    <a href="/Pruebas/BusGo/public/vehiculos/delete?id=<?= $vehiculo['id_vehiculo'] ?>"
    onclick="return confirm('¿Eliminar vehículo?')">
    Eliminar
    </a>

    </td>

    </tr>

    <?php endforeach; ?>

    </table>

</body>
</html>