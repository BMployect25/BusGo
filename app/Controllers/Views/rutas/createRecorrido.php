<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear recorrido</title>
</head>
<body>
    <h1>Agregar Parada al Recorrido</h1>

    <form method="POST"
    action="/Pruebas/BusGo/public/ruta/storeRecorrido">

    <input type="hidden" name="id_ruta" value="<?= $idRuta ?>">

    <label>Parada</label>

    <select name="id_parada">

    <?php foreach($paradas as $parada): ?>

    <option value="<?= $parada['id_parada'] ?>">

    <?= $parada['nombre_parada'] ?>

    </option>

    <?php endforeach; ?>

    </select>

    <br><br>

    <label>Orden del recorrido</label>

    <input type="number" name="orden_recorrido" required>

    <br><br>

    <button>
        Guardar
    </button>

    </form>

    <br><br>   
    
     <a href="javascript:history.back()" class="btn-volver">
            Volver a Recorridos
    </a>

</body>
</html>