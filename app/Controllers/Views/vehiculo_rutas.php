<!-- Muestra todas las asignaciones entre vehículos y rutas. -->

<!DOCTYPE html>
<html>
<head>
    <title>Vehículos y Rutas</title>
</head>

<body>

    <h1>Asignaciones Vehículo-Ruta</h1>

    <p>
        <a href="/Pruebas/BusGo/public/">Volver al inicio</a>
    </p>

    <p>
        <a href="/Pruebas/BusGo/public/vehiculo_rutas/create">Nueva asignación</a>
    </p>

    <table border="1">

    <tr>
        <th>ID</th>
        <th>Placa</th>
        <th>Ruta</th>
        <th>Acciones</th>
    </tr>

    <?php foreach($asignaciones as $asignacion): ?>

    <tr>

    <td><?= $asignacion['id_vehiculo_ruta'] ?></td>

    <td><?= $asignacion['placa'] ?></td>

    <td><?= $asignacion['nombre_ruta'] ?></td>

    <td>

    <a
    href="/Pruebas/BusGo/public/vehiculo_rutas/delete?id=<?= $asignacion['id_vehiculo_ruta'] ?>"
    onclick="return confirm('¿Eliminar asignación?')">
    Eliminar
    </a>

    </td>

    </tr>

    <?php endforeach; ?>

    </table>

</body>
</html>