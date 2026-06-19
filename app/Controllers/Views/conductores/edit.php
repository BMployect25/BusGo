<!DOCTYPE html>
<html>
<head>
    <title>Editar conductor</title>
</head>

<body>

    <h1>Editar Conductor</h1>

    <form method="POST" action="/Pruebas/BusGo/public/conductores/update">

    <input type="hidden" name="id_conductor" value="<?= $conductor['id_conductor'] ?>">

    <label>Nombre</label>

    <br>

    <input type="text" name="nombre" value="<?= $conductor['nombre'] ?>" required>

    <br><br>

    <label>Apellido</label>

    <br>

    <input type="text" name="apellido" value="<?= $conductor['apellido'] ?>" required>

    <br><br>

    <label>Teléfono</label>

    <br>

    <input type="text" name="telefono" value="<?= $conductor['telefono'] ?>">

    <br><br>

    <label>Licencia</label>

    <br>

    <input type="text" name="licencia" value="<?= $conductor['licencia'] ?>">

    <br><br>

    <label>Empresa</label>

    <br>

    <select name="id_empresa">

    <!-- recorremos todas las empresas para llenar automáticamente el <select> -->
    <?php foreach($empresas as $empresa): ?>

    <option value="<?= $empresa['id_empresa'] ?>"

    <?= ($empresa['id_empresa']==$conductor['id_empresa']) ? 'selected' : '' ?>>

    <?= $empresa['nombre'] ?>

    </option>

    <?php endforeach; ?>

    </select>

    <br><br>

    <button>

    Actualizar

    </button>

    </form>

</body>
</html>