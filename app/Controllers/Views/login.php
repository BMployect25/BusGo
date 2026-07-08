<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" href="/Pruebas/BusGo/public/css/style.css">
</head>

<body class="login-page">
    <div class="login-content">
        <h1>Iniciar Sesión</h1>
        <form class="login-form" method="POST" action="login/authenticate">
        <input
            type="email"
            name="correo"
            placeholder="Correo">
            
        <br><br>

        <input
            type="password"
            name="contrasena"
            placeholder="Contraseña">

        <br><br>

        <button type="submit">
            Entrar
        </button>

        </form>

        <p style="text-align: center; margin-top: 20px;">
            ¿No tienes cuenta? 
            <a href="/Pruebas/BusGo/public/registro" style="color: #3498db; text-decoration: none;">Regístrate aquí</a>
        </p>
        
    </div>
</body>

</html>
