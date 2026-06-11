<!DOCTYPE html>
<html>
<head>
    <title>Usuarios</title>
</head>

<body>
    <h1>Lista de Usuarios</h1>
    <p><a href="/Pruebas/BusGo/public/css/">Volver al inicio</a></p>
    <table border="1">
    <tr>

    <th>ID</th>

    <th>Nombre</th>

    <th>Correo</th>
    </tr>

    <?php foreach($usuarios as $usuario): ?>
    <tr>

    <td>
    <?= $usuario['id_usuario'] ?>
    </td>

    <td>
    <?= $usuario['nombre'] ?>
    </td>

    <td>
    <?= $usuario['correo'] ?>
    </td>

    </tr>

    <?php endforeach; ?>

    </table>

</body>

</html>