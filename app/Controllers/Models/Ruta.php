<?php

require_once __DIR__ . '/../../../config/database.php';

class Ruta
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getAll(): array
    {
        $stmt = $this->db->query('SELECT id_ruta, nombre_ruta, origen, destino, id_empresa FROM rutas');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerRecorrido($idRuta)
    {
        $stmt = $this->db->query("
            SELECT
                r.nombre_ruta,
                p.nombre_parada,
                rp.orden_recorrido
            FROM ruta_paradas rp
            INNER JOIN rutas r ON rp.id_ruta = r.id_ruta
            INNER JOIN paradas p ON rp.id_parada = p.id_parada
            WHERE rp.id_ruta = $idRuta
            ORDER BY rp.orden_recorrido
        ");
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($nombre_ruta,$origen,$destino){
        $stmt = $this->db->prepare(
            "INSERT INTO rutas
            (
                nombre_ruta,
                origen,
                destino            
            )
            values
            (
                ?,
                ?,
                ?
            )"
        );

        return $stmt->execute([
            $nombre_ruta,
            $origen,
            $destino
        ]);
    }

    public function find($id_ruta){
        $stmt = $this->db->prepare("select * from rutas where id = ?");
        $stmt->execute([$id_ruta]);

        return $stmt->fetch();
    }

    public function update($id_ruta, $nombre_ruta, $origen, $destino) {
        $stmt =
        $this->db->prepare(
        "UPDATE rutas SET
         nombre_ruta=?,
         origen=?,
         destino=?

         WHERE id=?"
        );
    
        return $stmt->execute([$nombre_ruta, $origen, $destino, $id_ruta]);
    }

    public function delete($id) {
        $stmt =
        $this->db->prepare(

        "DELETE FROM rutas WHERE id=?"
        );

        return $stmt->execute([ $id ]);
    }
}