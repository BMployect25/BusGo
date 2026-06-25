<?php 

require_once __DIR__ . '/../../../config/database.php';

class Ubicacion{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
    } 

    public function getAll(){
        $stmt = $this->db->query(
            "SELECT
                u.*,
                v.placa,
                v.modelo
            FROM ubicaciones u
            INNER JOIN vehiculos v
            ON u.id_vehiculo = v.id_vehiculo"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(
        $idVehiculo,
        $latitud,
        $longitud,
        $estado
    ){
        $stmt = $this->db->prepare(
            "INSERT INTO ubicaciones
            (
                id_vehiculo,
                lantitud,
                longitud,
                estado
            )
            VALUES(?, ?, ?, ?)"
        );

        return $stmt->execute([
            $idVehiculo,
            $latitud,
            $longitud,
            $estado
        ]);
    }

    public function find($id){  
        $stmt = $this->db->prepare(
            "SELECT *
            FROM ubicaciones
            WHERE id_ubicacion=?"
        );

        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(
        $id,
        $idVehiculo,
        $latitud,
        $longitud,
        $estado
    ){
        $stmt = $this->db->prepare(
            "UPDATE ubicaciones SET
            id_vehiculo=?,
            latitud=?,
            longitud=?,
            estado=?

            WHERE id_ubicacion=?"
        );

        return $stmt->execute([
            $idVehiculo,
            $latitud,
            $longitud,
            $estado,
            $id
        ]);
    }

    public function delete($id){
        $stmt = $this->db->prepare(
            "DELETE FROM ubicaciones

            WHERE id_ubicacion=?"
        );

        return $stmt->execute([$id]);
    }
}