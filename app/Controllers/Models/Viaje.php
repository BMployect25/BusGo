<?php

require_once __DIR__ . '/../../../config/database.php';

class Viaje{
    private PDO $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getAll(){
        $stmt = $this->db->query(
            "SELECT
                vi.*,
                ve.placa,
                r.nombre_ruta,
                c.nombre

            FROM viajes vi

            INNER JOIN vehiculo_rutas vr
                ON vi.id_vehiculo_ruta = vr.id_vehiculo_ruta

            INNER JOIN vehiculos ve
                ON vr.id_vehiculo = ve.id_vehiculo

            INNER JOIN rutas r
                ON vr.id_ruta = r.id_ruta

            INNER JOIN conductores c
                ON vi.id_conductor = c.id_conductor"
        );

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(
        $idVehiculoRuta,
        $idConductor,
        $horaInicio,
        $horaFin,
        $kilometros,
        $estado
    ){
        $stmt = $this->db->prepare(

            "INSERT INTO viajes
            (
                id_vehiculo_ruta,
                id_conductor,
                hora_inicio,
                hora_fin,
                kilometros,
                estado
            )

            VALUES
            (?, ?, ?, ?, ?, ?)"

        );

        return $stmt->execute([
            $idVehiculoRuta,
            $idConductor,
            $horaInicio,
            $horaFin,
            $kilometros,
            $estado
        ]);
    }

    public function find($id){
        $stmt = $this->db->prepare(

            "SELECT *
            FROM viajes
            WHERE id_viaje=?"
        );

        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(
        $id,
        $idVehiculoRuta,
        $idConductor,
        $horaInicio,
        $horaFin,
        $kilometros,
        $estado
    ){
        $stmt = $this->db->prepare(

            "UPDATE viajes SET

                id_vehiculo_ruta=?,
                id_conductor=?,
                hora_inicio=?,
                hora_fin=?,
                kilometros=?,
                estado=?

            WHERE id_viaje=?"
        );

        return $stmt->execute([
            $idVehiculoRuta,
            $idConductor,
            $horaInicio,
            $horaFin,
            $kilometros,
            $estado,
            $id
        ]);
    }

    public function delete($id){
        $stmt = $this->db->prepare(

            "DELETE FROM viajes
            WHERE id_viaje=?"
        );

        return $stmt->execute([$id]);
    }
}