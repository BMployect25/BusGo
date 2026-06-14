<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Iniciar Sesión</h1>
    
    <form method="POST" action="login/authenticate">
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
</body>

</html>
