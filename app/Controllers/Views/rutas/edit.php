<h1>Editar Ruta</h1>

<form method="POST" action="/ruta/update">
    <input type="hidden" name="id_ruta" value="<?= htmlspecialchars($ruta['id_ruta']) ?>">

    <label>Nombre Ruta</label>
    <input
        type="text"
        name="nombre_ruta"
        value="<?= htmlspecialchars($ruta['nombre_ruta']) ?>"
        required>

    <br><br>

    <label>Origen</label>
    <input
        type="text"
        name="origen"
        value="<?= htmlspecialchars($ruta['origen']) ?>"
        required>

    <br><br>

    <label>Destino</label>
    <input
        type="text"
        name="destino"
        value="<?= htmlspecialchars($ruta['destino']) ?>"
        required>

    <br><br>

    <label>Empresa</label>
    <select name="id_empresa" required>
        <?php foreach ($empresas as $empresa): ?>
            <option value="<?= htmlspecialchars($empresa['id_empresa']) ?>" <?= $empresa['id_empresa'] == $ruta['id_empresa'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($empresa['nombre']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>

    <button type="submit">Guardar cambios</button>
</form>

<body>
    <br><br>
    <p>
        |<a href="/Pruebas/BusGo/public/css/ruta">Volver a rutas</a>
    </p>
</body>
