<!DOCTYPE html>
<html>

<head>
    <title>Viajes</title>
    <link rel="stylesheet" href="/Pruebas/BusGo/public/css/style.css">
</head>

<body>

<h1>Historial de Viajes</h1>

    <p>
        <a href="/Pruebas/BusGo/public/">Volver al inicio</a>
    </p>

    <p>
        <a href="/Pruebas/BusGo/public/viajes/create">Registrar Viaje</a>
    </p>

    <table border="1">

    <tr>
        <th>Placa</th>
        <th>Ruta</th>
        <th>Conductor</th>
        <th>Inicio</th>
        <th>Fin</th>
        <th>Kilómetros</th>
        <th>Estado</th>
        <th>Acciones</th>
    </tr>

    <?php foreach($viajes as $viaje): ?>

    <tr>

    <td><?= $viaje['placa'] ?></td>
    <td><?= $viaje['nombre_ruta'] ?></td>
    <td><?= $viaje['nombre'] ?></td>
    <td><?= $viaje['hora_inicio'] ?></td>
    <td><?= $viaje['hora_fin'] ?></td>
    <td><?= $viaje['kilometros'] ?></td>
    <td><?= $viaje['estado'] ?></td>

    <td>

    <a href="/Pruebas/BusGo/public/viajes/edit?id=<?= $viaje['id_viaje'] ?>">
    Editar
    </a>

    |

    <a href="/Pruebas/BusGo/public/viajes/delete?id=<?= $viaje['id_viaje'] ?>"
    onclick="return confirm('¿Eliminar viaje?')">
    Eliminar

    </a>

    </td>

    </tr>

    <?php endforeach; ?>

    </table>

</body>
</html>