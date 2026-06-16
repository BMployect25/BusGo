<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Usuarios</title>
</head>

<body>
    <h1>Lista de Usuarios</h1>
    <p>
        <a href="/Pruebas/BusGo/public/css/">Volver al inicio</a>
    </p>
    <p>
        <a href="/Pruebas/BusGo/public/usuarios/create">Nuevo Usuario</a>
    </p>
    <table border="1">
    
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Correo</th>
        <th>Telefono</th>
        <th>Rol</th>
        <th>Acciones</th>
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
            <?= $usuario['apellido'] ?>
        </td>

        <td>
            <?= $usuario['correo'] ?>
        </td>

        <td>
            <?= $usuario['telefono'] ?>
        </td>

        <td>
            <?= $usuario['rol'] ?>
        </td>

        <td>
            <a href="/Pruebas/BusGo/public/usuarios/edit?id=<?= $usuario['id_usuario'] ?>">Editar</a>
            <a href="/Pruebas/BusGo/public/usuarios/delete?id=<?= $usuario['id_usuario'] ?>" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?');">Eliminar</a>
        </td>
    </tr>

    <?php endforeach; ?>

    </table>

</body>

</html>