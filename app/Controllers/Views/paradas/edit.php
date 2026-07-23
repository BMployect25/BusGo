<!DOCTYPE html>
<html lang="en">
<head>
    <title>Editar paradas</title>
</head>
<body>
    <input type="text" name="nombre" value="<?= $parada['nombre'] ?>">

    <div class="form-group">
        <label>Latitud</label>
        <input type="text" name="latitud" value="<?= htmlspecialchars($parada['latitud']) ?>"
        required>
    </div>
    <div class="form-group">
        <label>Longitud</label>
        <input type="text" name="longitud" value="<?= htmlspecialchars($parada['longitud']) ?>"
        required>
    </div>
</body>
</html>