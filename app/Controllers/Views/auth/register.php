<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Registro - BusGo</title>

    <link rel="stylesheet"
    href="/Pruebas/BusGo/public/css/style.css">

</head>

<body>
    <div class="container">
        <div class="card">
            <h2>Crear Cuenta</h2>
            <form action="/Pruebas/BusGo/public/registro/store" method="POST">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" required>
                </div>
                <div class="form-group">
                    <label for="correo">Correo:</label>
                    <input type="email" id="correo" name="correo" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" id="telefono" name="telefono" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirmar Contraseña:</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
                <br>
                <button type="submit">Registrarse</button>

                <p>
                    ¿ya tienes una cuenta? 
                    <a href="/Pruebas/BusGo/public/login">Iniciar sesión</a>
                </p>
            </form>
        </div>
    </div>
</body>

</html>