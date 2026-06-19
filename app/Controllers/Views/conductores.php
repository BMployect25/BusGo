<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Conductores</title>
</head>

<body>
    <h1>Lista de Conductores</h1>
    
    <p>
        <a href="/BusGo/public/">Volver al inicio</a>
    </p>

    <p>
        <a href="/BusGo/public/conductores/create">Registrar conductor</a>
    </p>

    <table border="1"> 

    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Telefono</th>
        <th>Licencia</th>
        <th>Empresa</th>
        <th>Acciones</th>
    </tr>

    <?php foreach($conductores as $conductor): ?>

    <tr>
        <td>
            <?= $conductor['id_conductor'] ?>
        </td>

        <td>
            <?= $conductor['nombre'] ?>
        </td>

        <td>
            <?= $conductor['apellido'] ?>
        </td>

        <td>
            <?= $conductor['telefono'] ?>
        </td>

        <td>
            <?= $conductor['licencia'] ?>
        </td>

        <td>
            <?= $conductor['empresa'] ?>
        </td>

        
    <td>
        <a href="/Pruebas/BusGo/public/conductores/edit?id=<?= $conductor['id_conductor'] ?>">
        Editar </a>

    |

        <a href="/Pruebas/BusGo/public/conductores/delete?id=<?= $conductor['id_conductor'] ?>"
        onclick="return confirm('¿Eliminar conductor?')">
        Eliminar </a>
    </td>

</tr>

<?php endforeach; ?>

</table>

</body>

</html>