<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Paradas</title>
    <link rel="stylesheet" href="/Pruebas/BusGo/public/css/style.css">
</head>

<body>
    <div class="container">

        <h1>Paradas</h1>

        <a href="/Pruebas/BusGo/public/paradas/create">
            ➕ Crear nueva parada
        </a>

        <br><br>

        <a href="/Pruebas/BusGo/public/ruta/verRecorrido?id=1">
            🔙 Volver al recorrido de la ruta
        </a>

        <br><br>

        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Latitud</th>
                    <th>Longitud</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($paradas as $parada): ?>

                    <tr>
                        <td>
                            <?= htmlspecialchars($parada['id_parada']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($parada['nombre_parada']) ?>
                        </td>

                        <td>

                            <?php if ($parada['latitud'] !== null): ?>

                                <?= htmlspecialchars($parada['latitud']) ?>

                            <?php else: ?>

                                <span style="color: red;">
                                    Sin coordenadas
                                </span>

                            <?php endif; ?>
                        </td>

                        <td>
                            <?php if ($parada['longitud'] !== null): ?>

                                <?= htmlspecialchars($parada['longitud']) ?>

                            <?php else: ?>

                                <span style="color: red;">
                                    Sin coordenadas
                                </span>

                            <?php endif; ?>
                        </td>

                        <td>
                            <a href="/Pruebas/BusGo/public/paradas/edit?id=<?= urlencode($parada['id_parada']) ?>">

                                ✏️ Editar
                            </a>

                            |

                            <a href="/Pruebas/BusGo/public/paradas/delete?id=<?= urlencode(
                                $parada['id_parada']
                            ) ?>"
                            onclick="return confirm('¿Eliminar esta parada?');">

                                🗑️ Eliminar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>