<!DOCTYPE html>
<html>

<head>
    <title>Ubicaciones</title>
    <link rel="stylesheet" href="/Pruebas/BusGo/public/css/style.css">
</head>

<body>

    <h1>Ubicación y Estado de los Vehículos</h1>

    <p>
        <a href="/Pruebas/BusGo/public/">Volver al inicio</a>
    </p>

    <p>
        <a href="/Pruebas/BusGo/public/ubicaciones/create">Nueva ubicación</a>
    </p>

    <table border="1">

    <tr>
        <th>Placa</th>
        <th>Modelo</th>
        <th>Latitud</th>
        <th>Longitud</th>
        <th>Estado</th>
        <th>Última actualización</th>
        <th>Acciones</th>
    </tr>

    <?php foreach($ubicaciones as $ubicacion): ?>

    <tr>
        <td><?= $ubicacion['placa'] ?></td>
        <td><?= $ubicacion['modelo'] ?></td>
        <td><?= $ubicacion['latitud'] ?></td>
        <td><?= $ubicacion['longitud'] ?></td>
        <td><?= $ubicacion['estado'] ?></td>
        <td><?= $ubicacion['ultima_actualizacion'] ?></td>
    <td>

    <a href="/Pruebas/BusGo/public/ubicaciones/edit?id=<?= $ubicacion['id_ubicacion'] ?>">
    Editar
    </a>

    |

    <a
    href="/Pruebas/BusGo/public/ubicaciones/delete?id=<?= $ubicacion['id_ubicacion'] ?>"
    onclick="return confirm('¿Eliminar ubicación?')">
    Eliminar
    </a>

    </td>

    </tr>

    <?php endforeach; ?>

    </table>

</body>
</html>