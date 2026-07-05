<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cambiar orden</title>
    <link rel="stylesheet" href="/Pruebas/BusGo/public/css/style.css">
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1>Cambiar orden</h1>
        </div>

        <form class="form-card" method="POST" action="/public/css/ruta/updateRecorrido">
            <input type="hidden" name="id_ruta_parada" value="<?= htmlspecialchars($registro['id_ruta_parada'] ?? '') ?>">
            <input type="hidden" name="id_ruta" value="<?= htmlspecialchars($registro['id_ruta'] ?? '') ?>">

            <label for="orden_recorrido">Nuevo orden</label>
            <input id="orden_recorrido" type="number" name="orden_recorrido" value="<?= htmlspecialchars($registro['orden_recorrido'] ?? '') ?>" required>

            <br><br>
            
            <div class="actions">
                <button class="btn btn-primary" type="submit">Guardar cambios</button>
                <a class="btn btn-secondary" href="/Pruebas/BusGo/public/css/ruta">Volver a rutas</a>
            </div>
        </form>

        <?php
            $modulo = "Rutas";
            $accion = "Editar recorrido";
            require_once __DIR__ . "/../partials/breadcrumb.php";
        ?>
    </div>
</body>
</html>