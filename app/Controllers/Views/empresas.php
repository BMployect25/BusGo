<!DOCTYPE html>
<html>
<head>
    <title>Empresas</title>
    <link rel="stylesheet" href="/Pruebas/BusGo/public/css/style.css">
</head>

<body>

<h1>Empresas de Transporte</h1>

<p>
    <a href="/Pruebas/BusGo/public/">Inicio</a>
</p>

<p>
    <a href="/Pruebas/BusGo/public/empresas/create">Nueva Empresa</a>
</p>

<table border="1">

<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>NIT</th>
    <th>Teléfono</th>
    <th>Correo</th>
    <th>Acciones</th>
</tr>

<?php foreach($empresas as $empresa): ?>

<tr>

<td><?= $empresa['id_empresa'] ?></td>

<td><?= $empresa['nombre'] ?></td>

<td><?= $empresa['nit'] ?></td>

<td><?= $empresa['telefono'] ?></td>

<td><?= $empresa['correo'] ?></td>

<td>

<a href="/Pruebas/BusGo/public/empresas/edit?id=<?= $empresa['id_empresa'] ?>">Editar</a>

<a href="/Pruebas/BusGo/public/empresas/delete?id=<?= $empresa['id_empresa'] ?>"
onclick="return confirm('¿Eliminar empresa?')">Eliminar</a>

</td>

</tr>

<?php endforeach; ?>

</table>

</body>
</html>