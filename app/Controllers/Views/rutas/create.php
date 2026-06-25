<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva Ruta</title>
    <link rel="stylesheet" href="/Pruebas/BusGo/public/css/style.css">
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1>Nueva Ruta</h1>
        </div>

        <form method="POST" action="/Pruebas/BusGo/public/ruta/store">
            <label for="nombre_ruta">Nombre Ruta</label>
            <input type="text" id="nombre_ruta" name="nombre_ruta" required>

            <label for="origen">Origen</label>
            <input type="text" id="origen" name="origen" required>

            <label for="destino">Destino</label>
            <input type="text" id="destino" name="destino" required>

            <label for="id_empresa">Empresa</label>
            <select id="id_empresa" name="id_empresa">
                <?php foreach($empresas as $empresa): ?>
                <option value="<?= $empresa['id_empresa'] ?>"><?= $empresa['nombre'] ?></option>
                <?php endforeach; ?>
            </select>

            <div class="actions">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <a class="btn btn-secondary" href="/Pruebas/BusGo/public/css/ruta">Volver a rutas</a>
            </div>
        </form>
    </div>
</body>
</html>