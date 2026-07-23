export function crearMarcadores(map, paradas) {

    paradas.forEach(function(parada) {

        // Verificar si la parada tiene coordenadas
        if (
            parada.latitud !== null &&
            parada.longitud !== null &&
            parada.latitud !== "" &&
            parada.longitud !== ""
        ) {

            const icono = L.divIcon({

                className: "marcador-parada",

                html: `<div class="numero-parada">
                        ${parada.orden_recorrido}
                    </div>`,

                iconSize: [35, 35],

                iconAnchor: [17, 35],

                popupAnchor: [0, -35]
            });

            const contenidoPopup = `
                <strong>📍 ${parada.nombre_parada}</strong>
                <br><br>
                <strong>🚌 Ruta:</strong>
                ${parada.nombre_ruta}
                <br>
                <strong>🔢 Orden:</strong>
                ${parada.orden_recorrido}
                <br>
                <strong>🌐 Coordenadas:</strong>
                ${parada.latitud},
                ${parada.longitud}`;

            L.marker([Number(parada.latitud), Number(parada.longitud)],
                {
                    icon: icono
                }
            )
            .addTo(map)
            .bindPopup(contenidoPopup)
            .bindTooltip(
                parada.orden_recorrido +
                ". " +
                parada.nombre_parada,
                {
                    direction: "top"
                }
            );

        } else {

            console.warn("⚠️ La parada no tiene coordenadas:", parada.nombre_parada);
        }
    });
}