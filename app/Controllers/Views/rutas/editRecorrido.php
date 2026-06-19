<h1>Cambiar orden</h1>

<form method="POST"
action="/public/css/ruta/updateRecorrido">

<input
type="hidden"
name="id_ruta_parada"
value="<?= $registro['id_ruta_parada'] ?>">

<input
type="hidden"
name="id_ruta"
value="<?= $registro['id_ruta'] ?>">

<label>Nuevo orden</label>

<br>

<input
type="number"
name="orden_recorrido"
value="<?= $registro['orden_recorrido'] ?>"
required>

<br><br>

<button>

Guardar cambios

</button>

</form>