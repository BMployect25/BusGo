<?php

require_once __DIR__.'/BaseModel.php';

class Ruta extends BaseModel
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function getAll(): array
    {
        $stmt = $this->db->query(
            'SELECT r.id_ruta, r.nombre_ruta, r.origen, r.destino, r.id_empresa, e.nombre AS nombre_empresa
             FROM rutas r
             LEFT JOIN empresas e ON r.id_empresa = e.id_empresa'
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerRecorrido($idRuta)
    {
        $stmt = $this->db->prepare("
            SELECT
                r.nombre_ruta,
                p.nombre_parada,
                rp.orden_recorrido,
                p.latitud,
                p.longitud
            FROM ruta_paradas rp
            INNER JOIN rutas r ON rp.id_ruta = r.id_ruta
            INNER JOIN paradas p ON rp.id_parada = p.id_parada
            WHERE rp.id_ruta = ?
            ORDER BY rp.orden_recorrido
        ");

        $stmt->execute([$idRuta]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($nombre_ruta, $origen, $destino, $id_empresa)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO rutas
            (
                nombre_ruta,
                origen,
                destino,
                id_empresa
            )
            values
            (
                ?,
                ?,
                ?,
                ?
            )"
        );

        $success = $stmt->execute([
            $nombre_ruta,
            $origen,
            $destino,
            $id_empresa
        ]);

        return $success ? $this->db->lastInsertId() : false;
    }

    public function find($id_ruta)
    {
        $stmt = $this->db->prepare("select * from rutas where id_ruta = ?");
        $stmt->execute([$id_ruta]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id_ruta, $nombre_ruta, $origen, $destino, $id_empresa) {
        $stmt =
        $this->db->prepare(
        "UPDATE rutas SET
         nombre_ruta = ?,
         origen = ?,
         destino = ?,
         id_empresa = ?
         WHERE id_ruta = ?"
        );
    
        return $stmt->execute([$nombre_ruta, $origen, $destino, $id_empresa, $id_ruta]);
    }

    public function delete($id) {
        $stmt =
        $this->db->prepare(

        "DELETE FROM rutas WHERE id_ruta=?"
        );

        return $stmt->execute([ $id ]);
    }
}