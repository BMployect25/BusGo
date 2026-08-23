document.addEventListener('DOMContentLoaded', function() {
    const boton = document.getElementById("usar-ubicacion");
    const latitud = document.getElementById("latitud");
    const longitud = document.getElementById("longitud");
    const mensaje = document.getElementById("ubicacion-mensaje");

    if (boton && latitud && longitud && mensaje) {
        boton.addEventListener("click", function () {
            if (!navigator.geolocation) {
                mensaje.textContent = "❌ Tu navegador no permite obtener la ubicación.";
                return;
            }

            mensaje.textContent = "📍 Obteniendo ubicación...";

            navigator.geolocation.getCurrentPosition(
                function (posicion) {
                    const lat = posicion.coords.latitude;
                    const lng = posicion.coords.longitude;

                    latitud.value = lat;
                    longitud.value = lng;

                    console.log("Latitud guardada:", latitud.value);
                    console.log("Longitud guardada:", longitud.value);

                    mensaje.textContent = "✅ Ubicación actual seleccionada.";
                },
                function (error) {
                    console.error("Error de ubicación:", error);
                    mensaje.textContent = "❌ No fue posible obtener tu ubicación.";
                }
            );
        });
    }
});