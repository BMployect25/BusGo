<?php

require_once __DIR__.'/../../../config/database.php';

class Horario
{
    private PDO $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getAll(){
        $stmt = $this->db->query(
            "SELECT
                h.*,
                v.placa,
                r.nombre_ruta
            FROM horarios h

            INNER JOIN vehiculo_rutas vr
                ON h.id_vehiculo_ruta = vr.id_vehiculo_ruta

            INNER JOIN vehiculos v
                ON vr.id_vehiculo = v.id_vehiculo

            INNER JOIN rutas r
                ON vr.id_ruta = r.id_ruta"
        );

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(
    $idVehiculoRuta,
    $horaSalida,
    $horaLlegada,
    $frecuencia,
    $dias,
    $estado){
        $stmt = $this->db->prepare(

            "INSERT INTO horarios
            (
                id_vehiculo_ruta,
                hora_salida,
                hora_llegada,
                frecuencia_minutos,
                dias_operacion,
                estado
            )

            VALUES
            (?, ?, ?, ?, ?, ?)"
        );

        return $stmt->execute([
            $idVehiculoRuta,
            $horaSalida,
            $horaLlegada,
            $frecuencia,
            $dias,
            $estado
        ]);
    }

   public function find($id){
        $stmt = $this->db->prepare(

            "SELECT *
            FROM horarios
            WHERE id_horario=?"
        );

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(
    $id,
    $idVehiculoRuta,
    $horaSalida,
    $horaLlegada,
    $frecuencia,
    $dias,
    $estado){
        $stmt = $this->db->prepare(

            "UPDATE horarios SET
            id_vehiculo_ruta=?,
            hora_salida=?,
            hora_llegada=?,
            frecuencia_minutos=?,
            dias_operacion=?,
            estado=?

            WHERE id_horario=?"
        );

        return $stmt->execute([
            $idVehiculoRuta,
            $horaSalida,
            $horaLlegada,
            $frecuencia,
            $dias,
            $estado,
            $id
        ]);
    }

    public function delete($id){
        $stmt = $this->db->prepare(

        "DELETE FROM horarios WHERE id_horario=?"
        );

        return $stmt->execute([$id]);
    }
}