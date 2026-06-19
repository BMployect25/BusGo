<?php

require_once __DIR__ . '/../../../config/database.php';

class Parada{
    private PDO $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getAll(){
        $stmt = $this->db->query("SELECT * FROM paradas");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id){
        $stmt = $this->db->prepare("SELECT * FROM paradas WHERE id_parada = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nombre){
        $stmt = $this->db->prepare("INSERT INTO paradas (nombre_parada) VALUES (?)");
        return $stmt->execute([$nombre]);
    }

    public function update($id, $nombre){
        $stmt = $this->db->prepare("UPDATE paradas SET nombre_parada = ? WHERE id_parada = ?");
        return $stmt->execute([$nombre, $id]);
    }

    public function delete($id){
        $stmt = $this->db->prepare("DELETE FROM paradas WHERE id_parada = ?");
        return $stmt->execute([$id]);
    }
}