<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Rutas</title>
    <link rel="stylesheet" href="/Pruebas/BusGo/public/css/style.css">
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1>Lista de Rutas</h1>
        </div>

        <p>
            <a href="/Pruebas/BusGo/public/">Volver al inicio</a>
        </p>

        <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin'): ?>
            <p>
                <a href="/Pruebas/BusGo/public/ruta/create">Crear nueva ruta</a>
            </p>
        <?php endif; ?>

        <?php require_once __DIR__ . '/../partials/flash.php'; ?>

        <?php $rutas = $rutas ?? []; ?>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Origen</th>
                <th>Destino</th>
                <th>Empresa</th>
                <th>Recorrido</th>
                <th>Acciones</th>
            </tr>

            <?php foreach ($rutas as $ruta): ?>
            <tr>
                <td><?= htmlspecialchars($ruta['id_ruta'] ?? '') ?></td>
                <td><?= htmlspecialchars($ruta['nombre_ruta'] ?? '') ?></td>
                <td><?= htmlspecialchars($ruta['origen'] ?? '') ?></td>
                <td><?= htmlspecialchars($ruta['destino'] ?? '') ?></td>
                <td><?= htmlspecialchars($ruta['nombre_empresa'] ?? $ruta['id_empresa'] ?? '') ?></td>
                <td>
                    <a href="/Pruebas/BusGo/public/ruta/verRecorrido?id=<?= urlencode($ruta['id_ruta'] ?? '') ?>">
                        Ver recorrido
                    </a>
                </td>
                <td>
                    <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin'): ?>
                        <a href="/Pruebas/BusGo/public/ruta/edit?id=<?= urlencode($ruta['id_ruta'] ?? '') ?>">Editar</a>
                        |
                        <a href="/Pruebas/BusGo/public/ruta/delete?id=<?= urlencode($ruta['id_ruta'] ?? '') ?>"
                           onclick="return confirm('¿Seguro que quieres eliminar esta ruta?');">
                            Eliminar
                        </a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
