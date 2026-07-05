<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Ruta</title>
    <link rel="stylesheet" href="/Pruebas/BusGo/public/css/style.css">
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1>Editar Ruta</h1>
        </div>

        <form class="form-card" method="POST" action="/ruta/update">
            <input type="hidden" name="id_ruta" value="<?= htmlspecialchars($ruta['id_ruta']) ?>">

            <label for="nombre_ruta">Nombre Ruta</label>
            <input id="nombre_ruta" type="text" name="nombre_ruta" value="<?= htmlspecialchars($ruta['nombre_ruta']) ?>" required>

            <label for="origen">Origen</label>
            <input id="origen" type="text" name="origen" value="<?= htmlspecialchars($ruta['origen']) ?>" required>

            <label for="destino">Destino</label>
            <input id="destino" type="text" name="destino" value="<?= htmlspecialchars($ruta['destino']) ?>" required>

            <label for="id_empresa">Empresa</label>
            <select id="id_empresa" name="id_empresa" required>
                <?php foreach ($empresas as $empresa): ?>
                    <option value="<?= htmlspecialchars($empresa['id_empresa']) ?>" <?= $empresa['id_empresa'] == $ruta['id_empresa'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($empresa['nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <br><br>

            <div class="actions">
                <button class="btn btn-primary" type="submit">Guardar cambios</button>
                <a class="btn btn-secondary" href="/Pruebas/BusGo/public/css/ruta">Volver a rutas</a>
            </div>
        </form>

        <?php
            $modulo = "Rutas";
            $accion = "Editar rutas";
            require_once __DIR__ . "/../partials/breadcrumb.php";
        ?>
    </div>
</body>
</html>
