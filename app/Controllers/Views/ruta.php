<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Rutas</title>
</head>

<body>
    <h1>Lista de Rutas</h1>
    <p><a href="/Pruebas/BusGo/public/css/">Volver al inicio</a></p>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Origen</th>
            <th>Destino</th>
            <th>Empresa</th>
            <TH>Recorrido</TH>
        </tr>

        <?php foreach ($rutas as $ruta): ?>
        <tr>
            <td><?= $ruta['id_ruta'] ?></td>
            <td><?= $ruta['nombre_ruta'] ?></td>
            <td><?= $ruta['origen'] ?></td>
            <td><?= $ruta['destino'] ?></td>
            <td><?= $ruta['id_empresa'] ?></td>


        <td>
            <a href="/Pruebas/BusGo/public/css/ruta/verRecorrido?id=<?= $ruta['id_ruta'] ?>">
                Ver recorrido
            </a>
        </td>
    
        </tr>
        <?php endforeach; ?>

    </table>
</body>

</html>
