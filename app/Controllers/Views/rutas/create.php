<h1>Nueva Ruta</h1>

<form method="POST" action="/ruta/store">

    <input type="hidden" name="id_empresa" value="1">

    <label>Nombre Ruta</label>

    <input
    type="text"
    name="nombre_ruta">

    <br><br>

    <label>Origen</label>

    <input
    type="text"
    name="origen">

    <br><br>

    <label>Destino</label>

    <input
    type="text"
    name="destino">

    <br><br>

    <button type="submit">
        Guardar
    </button>

</form>

<body>
    <br><br>
    <p>
        |<a href="/Pruebas/BusGo/public/css/ruta">Volver a rutas</a>
    </p>
</body>