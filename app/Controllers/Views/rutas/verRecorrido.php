<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recorrido de la ruta</title>
    <link rel="stylesheet" href="/Pruebas/BusGo/public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Recorrido de la Ruta</h1>

        <p>
            <a href="/Pruebas/BusGo/public/ruta">Volver a rutas</a>
        </p>

        <?php if (!empty($ruta)): ?>
            <p><strong>Ruta:</strong> <?= htmlspecialchars($ruta['nombre_ruta'] ?? '') ?></p>
        <?php endif; ?>

        <p>
            <a href="/Pruebas/BusGo/public/ruta/createRecorrido?id=<?= urlencode($ruta['id_ruta'] ?? '') ?>">Agregar parada</a>
        </p>

        <table border="1">
            <tr>
                <th>Ruta</th>
                <th>Parada</th>
                <th>Orden</th>
                <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin'): ?>
                    <th>Acciones</th>
                <?php endif; ?>
            </tr>

            <?php foreach ($recorrido as $fila): ?>
            <tr>
                <td><?= htmlspecialchars($fila['nombre_ruta'] ?? '') ?></td>
                <td><?= htmlspecialchars($fila['nombre_parada'] ?? '') ?></td>
                <td><?= htmlspecialchars($fila['orden_recorrido'] ?? '') ?></td>
                <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin'): ?>
                    <td>
                        <a href="/Pruebas/BusGo/public/ruta/editRecorrido?id=<?= urlencode($fila['id_ruta_parada'] ?? '') ?>">Editar</a>
                        |
                        <a href="/Pruebas/BusGo/public/ruta/deleteRecorrido?id=<?= urlencode($fila['id_ruta_parada'] ?? '') ?>"
                           onclick="return confirm('¿Eliminar parada del recorrido?');">
                            Eliminar
                        </a>
                    </td>
                <?php endif; ?>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
