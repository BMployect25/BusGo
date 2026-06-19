<?php

require_once __DIR__ . '/../../../config/database.php';

class Vehiculo
{
    private PDO $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getAll(){
        $stmt = $this->db->query(
        "SELECT
            v.*,
            e.nombre AS empresa,
            CONCAT(c.nombre,' ',c.apellido) AS conductor

        FROM vehiculos v

        INNER JOIN empresas e
            ON v.id_empresa=e.id_empresa
        INNER JOIN conductores c
            ON v.id_conductor=c.id_conductor"
        );

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(
        $placa,
        $modelo,
        $capacidad,
        $idEmpresa,
        $idConductor
    )
    {
        $stmt = $this->db->prepare(
            "INSERT INTO vehiculos
            (
                placa,
                modelo,
                capacidad,
                id_empresa,
                id_conductor
            )
            VALUES
            (?, ?, ?, ?, ?)"
        );

        return $stmt->execute([
            $placa,
            $modelo,
            $capacidad,
            $idEmpresa,
            $idConductor
        ]);
    }

    public function find($id){
        $stmt = $this->db->prepare(
            "SELECT * FROM vehiculos
            WHERE id_vehiculo=?"
        );

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(
        $id,
        $placa,
        $modelo,
        $capacidad,
        $idEmpresa,
        $idConductor
    )
    {
        $stmt = $this->db->prepare(
            "UPDATE vehiculos SET

            placa=?,
            modelo=?,
            capacidad=?,
            id_empresa=?,
            id_conductor=?

            WHERE id_vehiculo=?"
        );

        return $stmt->execute([
            $placa,
            $modelo,
            $capacidad,
            $idEmpresa,
            $idConductor,
            $id
        ]);
    }

    public function delete($id){
        $stmt = $this->db->prepare(
            "DELETE FROM vehiculos
            WHERE id_vehiculo=?"
        );

        return $stmt->execute([$id]);
    }
}