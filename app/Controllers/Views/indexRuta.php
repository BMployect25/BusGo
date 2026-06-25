<!DOCTYPE html>
<html>

<head>
    <title>Ruta</title>
    <link rel="stylesheet" href="/Pruebas/BusGo/public/css/style.css">
</head>

<h1>Rutas Busgo</h1>
<a href="/ruta/create">
    Nueva Ruta
</a>

<hr>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Ruta</th>
        <th>origen</th>
        <th>destino</th>
    </tr>

    <?php foreach($rutas as $ruta): ?>
    <tr>
        <td>
            <?= $ruta['id'] ?>
        </td>

        <td>
            <?= $ruta['nombre_ruta'] ?>
        </td>

        <td>
            <?= $ruta['origen'] ?>
        </td>

        <td>
            <?= $ruta['destino'] ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>