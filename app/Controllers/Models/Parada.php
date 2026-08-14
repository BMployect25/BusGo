<?php

require_once __DIR__ . '/BaseModel.php';

class Parada extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM paradas ORDER BY id_parada");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id_parada)
    {
        $stmt = $this->db->prepare("SELECT * FROM paradas WHERE id_parada = ?");

        $stmt->execute([$id_parada]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nombre, $latitud, $longitud)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO paradas
            (
                nombre_parada,
                latitud,
                longitud
            )
            VALUES (?, ?, ?)"
        );

        return $stmt->execute([$nombre, $latitud, $longitud]);
    }

    public function update($id, $nombre, $latitud, $longitud) 
    {
        $stmt = $this->db->prepare(
            "UPDATE paradas
             SET
                nombre_parada = ?,
                latitud = ?,
                longitud = ?
             WHERE id_parada = ?"
        );

        return $stmt->execute([$nombre, $latitud, $longitud, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare(
            "DELETE FROM paradas
             WHERE id_parada = ?"
        );

        return $stmt->execute([$id]);
    }

    // Recibir una coordenada y devolver la parada más cercana

    public function obtenerMasCercana($latitud, $longitud)
    {
        $sql = "
            SELECT
                id_parada,
                nombre_parada,
                latitud,
                longitud,

                (
                    6371000 * ACOS(
                        COS(RADIANS(?))
                        * COS(RADIANS(latitud))
                        * COS(
                            RADIANS(longitud) - RADIANS(?)
                        )
                        + SIN(RADIANS(?))
                        * SIN(RADIANS(latitud))
                    )
                ) AS distancia_metros

            FROM paradas

            WHERE latitud IS NOT NULL
            AND longitud IS NOT NULL

            ORDER BY distancia_metros ASC

            LIMIT 1
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            $latitud,
            $longitud,
            $latitud
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}