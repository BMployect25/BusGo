import { crearMapa } from "./configMapa.js";
import { crearMarcadores } from "./marcadores.js";
import { dibujarRecorrido } from "./recorridos.js";
import { calcularRuta } from "./osrm.js";

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

    console.log("Puntos enviados a OSRM:");
    console.log(puntos);

    // Calcular ruta mediante OSRM
    const rutaReal = await calcularRuta(puntos);

    console.log("Ruta calculada por OSRM:");
    console.log(rutaReal);

    // Dibujar la ruta únicamente si OSRM devolvió una ruta
    if (rutaReal.length > 0) {

        dibujarRecorrido(map, rutaReal, "red");

    } else {

        console.error("No se pudo dibujar la ruta");
    }

    return map;
}