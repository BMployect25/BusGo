<?php

require_once __DIR__.'/BaseModel.php';

class Parada extends BaseModel{

    public function __construct(){
        parent::__construct();
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

    public function create($nombre, $latitud, $longitud){
        $stmt = $this->db->prepare("INSERT INTO paradas (nombre_parada, latitud, longitud) VALUES (?, ?, ?)");
        return $stmt->execute([$nombre, $latitud, $longitud]);
    }

    public function update($id, $nombre, $latitud, $longitud){
        $stmt = $this->db->prepare("UPDATE paradas SET nombre_parada = ?, latitud = ?, longitud = ? WHERE id_parada = ?");
        return $stmt->execute([$nombre, $latitud, $longitud, $id]);
    }

    public function delete($id){
        $stmt = $this->db->prepare("DELETE FROM paradas WHERE id_parada = ?");
        return $stmt->execute([$id]);
    }
}