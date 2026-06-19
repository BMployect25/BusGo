<?php

require_once __DIR__ . '/../../../config/database.php';

class RutaParada
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
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
            p.nombre_parada
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
}