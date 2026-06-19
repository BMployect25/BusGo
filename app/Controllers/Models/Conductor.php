<?php

require_once __DIR__.'/../../../config/database.php';

class Conductor
{
    private PDO $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getAll(){
        $stmt = $this->db->query(
            "SELECT
                c.*,
                e.nombre AS empresa
            FROM conductores c
            INNER JOIN empresas e
             ON c.id_empresa = e.id_empresa"
        );

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(
        $nombre,
        $apellido,
        $telefono,
        $licencia,
        $idEmpresa
    )
    {
        $stmt = $this->db->prepare(
            "INSERT INTO conductores
            (
                nombre,
                apellido,
                telefono,
                licencia,
                id_empresa
            )
            VALUES (?, ?, ?, ?, ?)"
        );

        return $stmt->execute([
            $nombre,
            $apellido,
            $telefono,
            $licencia,
            $idEmpresa
        ]);
    }

    public function find($id){
        $stmt = $this->db->prepare(
            "SELECT * FROM conductores
            WHERE id_conductor=?"
        );

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(
        $id,
        $nombre,
        $apellido,
        $telefono,
        $licencia,
        $idEmpresa
    )
    {
        $stmt = $this->db->prepare(
            "UPDATE conductores SET

            nombre=?,
            apellido=?,
            telefono=?,
            licencia=?,
            id_empresa=?

            WHERE id_conductor=?"
        );

        return $stmt->execute([
            $nombre,
            $apellido,
            $telefono,
            $licencia,
            $idEmpresa,
            $id
        ]);
    }

    public function delete($id){
        $stmt = $this->db->prepare(
            "DELETE FROM conductores
            WHERE id_conductor=?"
        );

        return $stmt->execute([$id]);
    }
}