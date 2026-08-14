import { crearMapa } from "./configMapa.js";
import { crearMarcadores, marcarParadaCercana } from "./marcadores.js";
import { dibujarRecorrido } from "./recorridos.js";
import { calcularRuta } from "./osrm.js";

import { obtenerUbicacion } from "./geolocalizacion.js";
import { buscarParadaCercana } from "./busqueda.js";

console.log("Main.js iniciado");


export async function iniciarMapa(recorrido) {

    const map = crearMapa();

    // 1. CREAR MARCADORES
    crearMarcadores(map, recorrido);

    // 2. CREAR PUNTOS
    const puntos = [];

    recorrido.forEach(function(parada) {

        if (
            parada.latitud !== null &&
            parada.longitud !== null &&
            parada.latitud !== "" &&
            parada.longitud !== ""
        ) {

            puntos.push([
                Number(parada.latitud),
                Number(parada.longitud)
            ]);
        }
    });

    // 3. CALCULAR RUTA CON OSRM
    const rutaReal = await calcularRuta(puntos);

    console.log("Ruta calculada por OSRM:", rutaReal);

    // 4. DIBUJAR RUTA
    if (rutaReal.length > 0) {
        dibujarRecorrido(map, rutaReal, "red");
    } else {
        console.error("No se pudo dibujar la ruta");
    }

    // 5. OBTENER UBICACIÓN DEL USUARIO
    let ubicacion = null;

    try {
        ubicacion = await obtenerUbicacion(map);
    } catch (error) {
        console.log("No se pudo obtener la ubicación del usuario:", error);
    }

    if (ubicacion) {
        console.log("Ubicación obtenida:", ubicacion);

        const resultado = await buscarParadaCercana(
            ubicacion.latitud,
            ubicacion.longitud
        );

        console.log("Parada más cercana:", resultado);

        if (resultado && resultado.success && resultado.parada) {
            marcarParadaCercana(map, resultado.parada);
        }
    }

    return map;
}