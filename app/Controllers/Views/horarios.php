<!DOCTYPE html>
<html>

<head>
    <title>Horarios</title>
    <link rel="stylesheet" href="/Pruebas/BusGo/public/css/style.css">
</head>

<body>

<h1>Lista de Horarios</h1>

<p>
    <a href="/Pruebas/BusGo/public/">Volver al inicio</a>
</p>

<p>
    <a href="/Pruebas/BusGo/public/horarios/create">Crear horario</a>
</p>

    <table border="1">

    <tr>

        <th>Placa</th>
        <th>Ruta</th>
        <th>Salida</th>
        <th>Llegada</th>
        <th>Frecuencia</th>
        <th>Días</th>
        <th>Estado</th>
        <th>Acciones</th>

    </tr>

    <?php foreach($horarios as $horario): ?>

    <tr>

    <td><?= $horario['placa'] ?></td>

    <td><?= $horario['nombre_ruta'] ?></td>

    <td><?= $horario['hora_salida'] ?></td>

    <td><?= $horario['hora_llegada'] ?></td>

    <td><?= $horario['frecuencia_minutos'] ?></td>

    <td><?= $horario['dias_operacion'] ?></td>

    <td><?= $horario['estado'] ?></td>  

    <td>

    <a href="/Pruebas/BusGo/public/horarios/edit?id=<?= $horario['id_horario'] ?>">
    Editar</a>

    |

    <a href="/Pruebas/BusGo/public/horarios/delete?id=<?= $horario['id_horario'] ?>"
    onclick="return confirm('¿Eliminar horario?')">
    Eliminar</a>

    </td>

    </tr>

    <?php endforeach; ?>

    </table>

</body>
</html>