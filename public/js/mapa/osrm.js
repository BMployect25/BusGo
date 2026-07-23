// async es pára poder usar await dentro de la función
//await es para esperar a que se resuelva la promesa antes de continuar con la ejecución del código
export async function calcularRuta(puntos) {

    // Comprobar que existan al menos dos puntos
    if (puntos.length < 2) {

        console.error("Se necesitan al menos dos puntos para calcular una ruta");

        return [];
    }

    const coordenadas = puntos.map(function(punto) {

        return punto[1] + "," + punto[0];
    });

    const ruta = coordenadas.join(";");

    const url =`https://router.project-osrm.org/route/v1/driving/${ruta}?overview=full&geometries=geojson`;

    try {

        const respuesta = await fetch(url);
        const datos = await respuesta.json();

        console.log("Respuesta de OSRM:");
        console.log(datos);

        if (datos.code !== "Ok" || !datos.routes || datos.routes.length === 0) 
        {
            console.error("OSRM no pudo calcular la ruta");

            return [];
        }

        return datos.routes[0].geometry.coordinates.map(
            function(punto) {

                return [punto[1], punto[0]];
            }
        );

    } catch (error) {

        console.error("Error al consultar OSRM:", error);

        return [];
    }
}