<?php

require_once __DIR__.'/BaseModel.php';

class RutaParada extends BaseModel
{

    public function __construct()
    {
        parent::__construct();
    }

    // Obtener recorrido completo de una ruta
    public function getByRuta($idRuta)
    {
        $stmt = $this->db->prepare(
        "
        SELECT
            rp.id_ruta_parada,
            r.nombre_ruta,
            rp.orden_recorrido,
            p.nombre_parada,
            p.latitud,
            p.longitud
        FROM ruta_paradas rp
        INNER JOIN rutas r
            ON rp.id_ruta = r.id_ruta
        INNER JOIN paradas p
            ON rp.id_parada = p.id_parada
        WHERE rp.id_ruta = ?
        ORDER BY rp.orden_recorrido
        ");

        $stmt->execute([$idRuta]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Agregar parada al recorrido
    public function create(
        $idRuta,
        $idParada,
        $orden
    )
    {
        $stmt = $this->db->prepare(
        "
        INSERT INTO ruta_paradas
        (
            id_ruta,
            id_parada,
            orden_recorrido
        )
        VALUES
        (?, ?, ?)
        ");

        return $stmt->execute([
            $idRuta,
            $idParada,
            $orden
        ]);
    }

    public function find($idRutaParada){
        $stmt = $this->db->prepare(
            "SELECT * FROM ruta_paradas WHERE id_ruta_parada=?"
        );

        $stmt->execute([$idRutaParada]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($idRutaParada){
        $stmt = $this->db->prepare(
            "DELETE FROM ruta_paradas
            WHERE id_ruta_parada=?"
        );

        return $stmt->execute([$idRutaParada]);
    }

   public function update($idRutaParada, $orden){
    $stmt = $this->db->prepare(
        "UPDATE ruta_paradas
         SET orden_recorrido=?
         WHERE id_ruta_parada=?"
    );

    return $stmt->execute([$orden, $idRutaParada]);}

    public function buscarRutas($idOrigen, $idDestino){
        $stmt = $this->db->prepare(
            "SELECT
                r.id_ruta,
                r.nombre_ruta,
                r.origen,
                r.destino
            FROM rutas r
            
            INNER JOIN ruta_paradas rp_origen
                ON r.id_ruta = rp_origen.id_ruta
                
            INNER JOIN ruta_paradas rp_destino
                ON r.id_ruta = rp_destino.id_ruta
            
            WHERE
                rp_origen.id_parada = ?
                AND
                rp_destino.id_parada = ?
                AND
                
                rp_origen.orden_recorrido
                <
                rp_destino.orden_recorrido"
        );

        $stmt->execute([$idOrigen, $idDestino]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerRutasPorParada($idParada){
        $stmt = $this->db->prepare(
            "SELECT
                rp.id_ruta,
                r.nombre_ruta,
                r.origen,
                r.destino,
                rp.orden_recorrido,

                e.id_empresa,
                e.nombre AS nombre_empresa
                
            FROM ruta_paradas rp
            
            INNER JOIN rutas r
                ON rp.id_ruta = r.id_ruta

            LEFT JOIN empresas e
                ON r.id_empresa = e.id_empresa
            
            WHERE rp.id_parada = ?

            ORDER BY r.nombre_ruta
            "
        );
        $stmt->execute([$idParada]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerRutaEntreParadas($idParadaOrigen, $idParadaDestino)
    {
        $stmt = $this->db->prepare(
            "
            SELECT
                r.id_ruta,
                r.nombre_ruta,
                r.origen,
                r.destino,

                e.id_empresa,
                e.nombre AS nombre_empresa,

                origen.orden_recorrido AS orden_origen,
                destino.orden_recorrido AS orden_destino

            FROM rutas r

            INNER JOIN empresas e
                ON r.id_empresa = e.id_empresa

            INNER JOIN ruta_paradas origen
                ON r.id_ruta = origen.id_ruta

            INNER JOIN ruta_paradas destino
                ON r.id_ruta = destino.id_ruta

            WHERE origen.id_parada = ?
                AND destino.id_parada = ?
                AND origen.orden_recorrido < destino.orden_recorrido
            
            ORDER BY origen.orden_recorrido
            "
        );
        $stmt->execute([$idParadaOrigen, $idParadaDestino]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}