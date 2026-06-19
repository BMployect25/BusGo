<!DOCTYPE html>
<html lang="es">
<head>
    <title>Nuevo conductor</title>
</head>

<body>
    <h1>Registrar Conductor</h1>

    <form method="POST" action="/Pruebas/BusGo/public/conductores/store">

    <label>Nombre</label>

    <br>

    <h1>Registrar Conductor</h1>

    <form method="POST" action="/Pruebas/BusGo/public/conductores/store">

        <label>Nombre</label>

        <br>

        <input type="text" name="nombre" required>

        <br><br>

        <label>Apellido</label>

        <br>

        <input type="text" name="apellido" required>

        <br><br>

        <label>Teléfono</label>

        <br>

        <input type="text" name="telefono">

        <br><br>

        <label>Licencia</label>

        <br>

        <input type="text" name="licencia">

        <br><br>

        <label>Empresa</label>

        <br>

        <select name="id_empresa">

        <?php foreach($empresas as $empresa): ?>

        <option value="<?= $empresa['id_empresa'] ?>">

        <?= $empresa['nombre'] ?>

        </option>

        <?php endforeach; ?>

        </select>

        <br><br>

        <button>
        Guardar
        </button>

    </form>
</body>
</html>