<form method="POST"
      action="/Pruebas/BusGo/public/usuarios/store">

    <br><input type="text"
           name="nombre"
           placeholder="Nombre">

    <br><input type="text"
           name="apellido"
           placeholder="Apellido">

    <br><input type="email"
           name="correo"
           placeholder="Correo">

    <br><input type="password"
           name="password"
           placeholder="Contraseña">

    <br><input type="text"
           name="telefono"
           placeholder="Teléfono">

    <br><br>

    <select name="rol">

        <option value="cliente">
            Cliente
        </option>

        <option value="conductor">
            Conductor
        </option>

        <option value="admin">
            Administrador
        </option>

    </select>

    <br><br>

</form>

<button type="submit">
        Crear Usuario
</button>

<body>
    <p>
        <br><br>
        |<a href="/Pruebas/BusGo/public/css">Volver al inicio</a>
    </p>
</body>