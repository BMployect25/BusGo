<?php

require_once __DIR__.'/../../../config/database.php';

class VehiculoRuta{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getAll(){
        $stmt = $this->db->query(
        " 
        SELECT
            vr.id_vehiculo_ruta,
            v.placa,
            r.nombre_ruta

        FROM vehiculo_rutas vr

        INNER JOIN vehiculos v
            ON vr.id_vehiculo=v.id_vehiculo

        INNER JOIN rutas r
            ON vr.id_ruta=r.id_ruta
        ");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($idVehiculo, $idRuta ){
        $stmt = $this->db->prepare(
        "
        INSERT INTO vehiculo_rutas
        (
            id_vehiculo,
            id_ruta
        )
        VALUES
        (?, ?)
        ");

        return $stmt->execute([
            $idVehiculo,
            $idRuta
        ]);
    }

    public function delete($id){
        $stmt = $this->db->prepare(
        "
        DELETE FROM vehiculo_rutas
        WHERE id_vehiculo_ruta=?
        ");

        return $stmt->execute([$id]);
    }
}