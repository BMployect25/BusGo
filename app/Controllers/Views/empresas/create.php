<!DOCTYPE html>
<html lang="en">
<head>
    <title>Nueva Empresa</title>
</head>
<body>

<h1>Registrar Empresa</h1>

<form method="POST" action="/Pruebas/BusGo/public/empresas/store">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>

    <br><br>

    <label>NIT</label>
    <br>
    <input type="text" name="nit" required>

    <br><br>

    <label>Teléfono</label>
    <br>
    <input type="text" name="telefono" required>

    <br><br>

    <label>Correo</label>
    <br>
    <input type="email" name="correo" required>

    <br><br>

    <button type="submit">Guardar</button>
    
</body>
</html>