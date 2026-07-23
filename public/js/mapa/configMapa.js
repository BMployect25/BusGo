export function crearMapa() {

    // Crear el mapa y establecer la vista inicial
    const map = L.map("map");

    map.setView([7.8939, -72.5078], 13);

    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",{
            attribution: "© OpenStreetMap contributors"
        }
    ).addTo(map);

    return map;
}