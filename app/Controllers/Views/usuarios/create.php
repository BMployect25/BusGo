<form method="POST" action="public/usuario/store">

    <label>Nombre</label>
    <input type="text" name="nombre">

    <br><br>
    <label>Correo</label>
    <input type="email" name="correo">

    <br><br>

    <label>Contraseña</label>
    <input type="password" name="contrasena">

    <br><br>

    <label>Rol</label>
    <select name="rol">
        <option value="usuario">Usuario</option>
        <option value="admin">Administrador</option>
    </select>

    <br><br>

    <button type="submit">Crear Usuario</button>
</form>
<body>
    <p>
        <br><br>
        |<a href="/Pruebas/BusGo/public/css">Volver al inicio</a>
    </p>
</body>