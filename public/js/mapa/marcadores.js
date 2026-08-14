export function crearMarcadores(map, paradas) {

    paradas.forEach(function(parada) {

        // Verificar si la parada tiene coordenadas
        if (
            parada.latitud !== null &&
            parada.longitud !== null &&
            parada.latitud !== "" &&
            parada.longitud !== "" &&
            !isNaN(Number(parada.latitud)) &&
            !isNaN(Number(parada.longitud))
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
                parada.orden_recorrido + ". " + parada.nombre_parada,
                {
                    direction: "top"
                }
            );

        } else {

            console.warn("⚠️ La parada no tiene coordenadas:", parada.nombre_parada);
        }
    });
}

export function marcarParadaCercana(map, parada) {

    if (!parada) {
        console.warn("No se recibio una parada cercana.");
        return;
    }

    if (parada.latitud === null || parada.longitud === null) {
        console.warn("La parada no tiene coordenadas.");
        return;
    }

    const icono = L.divIcon({
        className: "marcador-parada",
        html: `<div class="numero-cercano"> 📍 </div>`,
        iconSize: [40, 40],
        iconAnchor: [20, 40],
        popupAnchor: [0, -40]
    });

    const distancia = Number(parada.distancia_metros);

    const contenidoPopup = `
        <strong>🚏 Parada más cercana</strong>
        <br><br>

        <strong> 📍Parada:</strong> ${parada.nombre_parada}
        <br><br>

        <strong> 📏 Distancia:</strong> ${distancia.toFixed(2)} metros`;

        L.marker([parada.latitud, parada.longitud],
            {
                icon: icono
            }
        )
        .addTo(map)
        .bindPopup(contenidoPopup)
        .openPopup();
}