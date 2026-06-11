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
    </p>

    <table border="1">
    <tr>
        <th>Ruta</th>
        <th>Parada</th>
        <th>Orden</th>
    </tr>

    <?php foreach($recorrido as $fila): ?>
    <tr>
        <td><?= $fila['nombre_ruta']; ?></td>
        <td><?= $fila['nombre_parada']; ?></td>
        <td><?= $fila['orden_recorrido']; ?></td>
    </tr>
    <?php endforeach; ?>
    </table>

</body>
</html>