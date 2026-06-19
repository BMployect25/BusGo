<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Recorrido de la Ruta</h1>

    <p>
        <a href="/Pruebas/BusGo/public/css/ruta">
            Volver a rutas
        </a>

        <br><br>

        <a href="/Pruebas/BusGo/public/ruta/createRecorrido?id=<?= $ruta['id_ruta'] ?>">
                Agregar parada
        </a>
    </p>

    <table border="1">

    <tr>
        <th>Ruta</th>
        <th>Parada</th>
        <th>Orden</th>
        <?php if($_SESSION['rol']=='admin'): ?>
            <th>Acciones</th>
        <?php endif; ?>
    </tr>

    <?php foreach($recorrido as $fila): ?>

    <tr>

        <td><?= htmlspecialchars($fila['nombre_ruta']) ?></td>
        <td><?= htmlspecialchars($fila['nombre_parada']) ?></td>
        <td><?= htmlspecialchars($fila['orden_recorrido']) ?></td>

    <?php if($_SESSION['rol']=='admin'): ?>

    <td>

    <a href="/Pruebas/BusGo/public/css/ruta/editRecorrido?id=<?= $fila['id_ruta_parada'] ?>">
        Editar
    </a>

    |

    <a href="/Pruebas/BusGo/public/css/ruta/deleteRecorrido?id=<?= $fila['id_ruta_parada'] ?>"
    onclick="return confirm('¿Eliminar parada del recorrido?')">
        Eliminar
    </a>

    </td>

    <?php endif; ?>

    </tr>

    <?php endforeach; ?>

    </table>

    <br><br>

</body>
</html>