export function dibujarRecorrido(map, recorrido, color = "blue") 
{
    const puntos = [];

    recorrido.forEach(function(punto) {

        // Caso 1: datos provenientes de la base de datos
        if (punto.latitud && punto.longitud) {

            puntos.push([Number(punto.latitud), Number(punto.longitud)]);
        }

        // Caso 2: coordenadas provenientes de OSRM
        else if (Array.isArray(punto)) {

            puntos.push([Number(punto[0]), Number(punto[1])]);
        }
    });

    return L.polyline(
        puntos,
        {
            color: color,
            weight: 5,
            opacity: 0.8
        }
    ).addTo(map);
}