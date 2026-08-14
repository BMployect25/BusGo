export function obtenerUbicacion(map = null)
{
    if (!navigator.geolocation) {
        console.error("La geolocalización no está disponible.");
        return null;
    }

    return new Promise(function(resolve, reject) {
        navigator.geolocation.getCurrentPosition(
            function(posicion) {
                const latitud = posicion.coords.latitude;
                const longitud = posicion.coords.longitude;
                const ubicacion = { latitud, longitud };

                if (map && typeof L !== "undefined" && map.setView && L.marker) {
                    L.marker([latitud, longitud])
                        .addTo(map)
                        .bindPopup("📍Tu ubicación")
                        .openPopup();

                    map.setView([latitud, longitud], 15);
                }

                resolve(ubicacion);
            },

            function(error) {
                console.error("No se pudo obtener la ubicación:", error);
                reject(error);
            }
        );
    });
}