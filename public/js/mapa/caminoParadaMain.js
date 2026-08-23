import {
    calcularCaminoParada,
    dibujarCaminoParada
} from "./caminoParada.js";

console.log("Mapa de camino iniciado");

const map = L.map("map").setView(
    [
        Number(ubicacionUsuario.latitud),
        Number(ubicacionUsuario.longitud)
    ],
    14
);

L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
    {
        attribution: '&copy; OpenStreetMap contributors'
    }
).addTo(map);

L.marker([
    Number(ubicacionUsuario.latitud),
    Number(ubicacionUsuario.longitud)
])
.addTo(map)
.bindPopup("📍Tu ubicacion")

L.marker([
    Number(parada.latitud),
    Number(parada.longitud)
])
.addTo(map)
.bindPopup(
    "🚌 " + parada.nombre
);

try {
    const datosRuta = await calcularCaminoParada(
        Number(ubicacionUsuario.latitud),
        Number(ubicacionUsuario.longitud),
        Number(parada.latitud),
        Number(parada.longitud)
    );

    const resultado = dibujarCaminoParada(map, datosRuta);

    if (resultado) {
        const distanciaKm = resultado.distancia / 1000;

        const velocidadPeatonal = 5;

        const minutos = Math.round(
            (distanciaKm / velocidadPeatonal) * 60
        );

        const elementoDistancia = document.getElementById("distancia-camino");

        const elementoTiempo = document.getElementById("tiempo-camino");

        elementoDistancia.textContent = 
            `📏 Distancia: ${distanciaKm.toFixed(2)} km`;

        elementoTiempo.textContent =
             `⏱️ Tiempo estimado: ${minutos} minutos`;

        if (resultado.camino) {
            map.fitBounds(resultado.camino.getBounds(),
                {
                    padding: [30, 30]
                }
            );
        }

    }

} catch (error) {
    console.error("Error calculando el camino:", error);
}