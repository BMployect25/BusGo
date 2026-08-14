import { crearMapa } from "./configMapa.js";
import { crearMarcadores } from "./marcadores.js";
import { dibujarRecorrido } from "./recorridos.js";
import { calcularRuta } from "./osrm.js";
import { obtenerUbicacion } from "./geolocalizacion.js";

export async function iniciarMapa(recorrido) 
{
    // Crear el mapa
    const map = crearMapa();

    // Crear marcadores de las paradas con coordenadas
    crearMarcadores(map, recorrido);

    // Crear arreglo de coordenadas
    const puntos = [];

    recorrido.forEach(function(parada) {

        if (
            parada.latitud !== null &&
            parada.longitud !== null &&
            parada.latitud !== "" &&
            parada.longitud !== ""
        ) {

            puntos.push([Number(parada.latitud), Number(parada.longitud)]);
        }
    });

    // Calcular ruta mediante OSRM
    const rutaReal = await calcularRuta(puntos);

    // Dibujar la ruta únicamente si OSRM devolvió una ruta
    if (rutaReal.length > 0) {
        dibujarRecorrido(map, rutaReal, "red");
    }

    try {
        const ubicacion = await obtenerUbicacion(map);

        console.log("Ubicación del usuario:", ubicacion);

        if (ubicacion && map) {
            map.setView([ubicacion.latitud, ubicacion.longitud], 16);
        }
    } catch (error) {
        console.log("No se pudo obtener la ubicación del usuario:", error);
    }

    return map;
}