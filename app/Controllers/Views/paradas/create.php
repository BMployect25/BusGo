<!DOCTYPE html>
<html>
<head>
    <title>Nueva parada</title>
</head>
<body>
    <form action="/Pruebas/BusGo/public/paradas/store" method="post">
        <div class="form-group">
            <label for="nombre_parada">Nombre</label>
            <input type="text" name="nombre_parada" id="nombre_parada" required>
        </div>

        <div class="form-group">
            <label for="latitud">Latitud</label>
            <input type="text" name="latitud" id="latitud" required>
        </div>

        <div class="form-group">
            <label for="longitud">Longitud</label>
            <input type="text" name="longitud" id="longitud" required>
        </div>

        <button type="submit">Guardar</button>
    </form>
</body>
</html>