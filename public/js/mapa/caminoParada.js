// Obtener la ubicación del usuario y dibujar el camino hasta una parada.

export async function calcularCaminoParada(
    latitudUsuario,
    longitudUsuario,
    latitudParada,
    longitudParada
) {
    const url =  `https://router.project-osrm.org/route/v1/foot/` +
        `${longitudUsuario},${latitudUsuario};` +
        `${longitudParada},${latitudParada}` +
        `?overview=full&geometries=geojson&alternatives=true`;

    console.log("Solicitud camino a OSRM:");
    console.log(url);

    const respuesta = await fetch(url);

    if (!respuesta.ok) {
        throw new Error("No se pudo conectar con OSRM");
    }

    const datos = await respuesta.json();

    console.log("Cantidad de rutas:", datos.routes.length);

    datos.routes.forEach((ruta, indice) => {

            const distanciaKm = ruta.distance / 1000;

            const velocidadPeatonal = 5;

            const minutos = Math.round(
                (distanciaKm / velocidadPeatonal) * 60 );

            console.log("RUTA");
            
            console.log( "Distancia:", distanciaKm.toFixed(2),"km");

            console.log( "Tiempo estimado a pie:", minutos, "minutos");
        }
    );

    return datos;
}

export function dibujarCaminoParada(map, datosRuta) {
    if (!datosRuta || datosRuta.code !== "Ok" || !datosRuta.routes || datosRuta.routes.length === 0)
    {
        console.error("No se pudo calcular el camino hasta la parada.");
        return null;
    }

    const ruta = datosRuta.routes[0];

    const coordenadas = ruta.geometry.coordinates.map(function(coordenada) {
        return [coordenada[1], coordenada[0]];
    });

    const camino = L.polyline(coordenadas,
        {
            color: "blue",
            weight: 5,
            opacity: 0.8
        }
    );

    if (camino) {
        map.fitBounds(camino.getBounds(),
            {
                padding: [30, 30]
            }
        );
    }

    camino.addTo(map);
    return {
        camino: camino,
        distancia: ruta.distance,
        duracion: ruta.duration
    };
}