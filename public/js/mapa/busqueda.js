export async function buscarParadaCercana(latitud, longitud)
{
    console.log("Consultando parada cercana...");

    const url =  `/Pruebas/BusGo/public/busqueda/parada-cercana?latitud=${latitud}&longitud=${longitud}`;

    console.log("URL:", url);

    try {
        const respuesta = await fetch(url);

        if (!respuesta.ok) {
            throw new Error(`Error HTTP: ${respuesta.status}`);
        }

        const datos = await respuesta.json();

        console.log("Resultado de parada cercana:", datos);

        return datos;

    } catch (error) {
        console.error("Error buscando la parada cercana:", error);

        return null;
    }
}