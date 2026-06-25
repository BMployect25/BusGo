<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="/Pruebas/BusGo/public/css/style.css">
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1>Registrar Usuario</h1>
            <p>Completa los datos para crear un nuevo usuario del sistema.</p>
        </div>

        <form method="POST" action="/Pruebas/BusGo/public/usuarios/store">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>

            <label for="apellido">Apellido</label>
            <input type="text" id="apellido" name="apellido" placeholder="Apellido" required>

            <label for="correo">Correo</label>
            <input type="email" id="correo" name="correo" placeholder="Correo" required>

            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" placeholder="Contraseña" required>

            <label for="telefono">Teléfono</label>
            <input type="text" id="telefono" name="telefono" placeholder="Teléfono">

            <label for="rol">Rol</label>
            <select id="rol" name="rol">
                <option value="cliente">Cliente</option>
                <option value="conductor">Conductor</option>
                <option value="admin">Administrador</option>
            </select>

            <div class="actions">
                <button class="btn btn-primary" type="submit">Crear Usuario</button>
                <a class="btn btn-secondary" href="/Pruebas/BusGo/public/usuarios">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>