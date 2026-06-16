<form method="POST" action="/Pruebas/BusGo/public/usuarios/update">

    <input type="hidden" name="id" value="<?php echo htmlspecialchars($usuario['id_usuario'] ?? '', ENT_QUOTES); ?>">

    <br><input type="text"
           name="nombre"
           placeholder="Nombre"
           value="<?php echo htmlspecialchars($usuario['nombre'] ?? '', ENT_QUOTES); ?>">

    <br><input type="text"
           name="apellido"
           placeholder="Apellido"
           value="<?php echo htmlspecialchars($usuario['apellido'] ?? '', ENT_QUOTES); ?>">

    <br><input type="email"
           name="correo"
           placeholder="Correo"
           value="<?php echo htmlspecialchars($usuario['correo'] ?? '', ENT_QUOTES); ?>">

    <br><input type="password"
           name="password"
           placeholder="Contraseña">

    <br><input type="text"
           name="telefono"
           placeholder="Teléfono"
           value="<?php echo htmlspecialchars($usuario['telefono'] ?? '', ENT_QUOTES); ?>">

    <br><br>

    <select name="rol">

        <option value="cliente" <?php echo (isset($usuario['rol']) && $usuario['rol'] === 'cliente') ? 'selected' : ''; ?>>
            Cliente
        </option>

        <option value="conductor" <?php echo (isset($usuario['rol']) && $usuario['rol'] === 'conductor') ? 'selected' : ''; ?>>
            Conductor
        </option>

        <option value="admin" <?php echo (isset($usuario['rol']) && $usuario['rol'] === 'admin') ? 'selected' : ''; ?>>
            Administrador
        </option>

    </select>

    <br><br>

    <button type="submit">Actualizar Usuario</button>

</form>

<p>
    <br><br>
    |<a href="/Pruebas/BusGo/public/usuarios">Volver a usuarios</a>
</p>
