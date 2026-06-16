<!DOCTYPE html>
<html lang="en">
<head>
    <title>Editar Empresa</title>
</head>

<body>
    <h1>Editar Empresa</h1>
    
    <form method="POST" action="/Pruebas/BusGo/public/empresas/update">

        <input type="hidden" name="id_empresa" value="<?= htmlspecialchars($empresa['id_empresa'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        <label for="nombre">Nombre:</label>

        <br>

        <input type="text" name="nombre" value="<?= htmlspecialchars($empresa['nombre'] ?? '', ENT_QUOTES, 'UTF-8') ?>">

        <br><br>

        <label>NIT</label>

        <br>

        <input type="text" name="nit" value="<?= htmlspecialchars($empresa['nit'] ?? '', ENT_QUOTES, 'UTF-8') ?>">

        <br><br>

        <label>Telefono</label>

        <br>

        <input type="text" name="telefono" value="<?= htmlspecialchars($empresa['telefono'] ?? '', ENT_QUOTES, 'UTF-8') ?>">

        <br><br>

        <label>Correo</label>

        <br>

        <input type="email" name="correo" value="<?= htmlspecialchars($empresa['correo'] ?? '', ENT_QUOTES, 'UTF-8') ?>">

        <br><br>

        <button type="submit">Actualizar Empresa</button>

    </form>
</body>
</html>