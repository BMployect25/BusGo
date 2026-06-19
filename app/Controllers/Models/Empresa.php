<?php

require_once __DIR__ . '/../../../config/database.php';

class Empresa{
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    // Obtiene todas las empresas
    public function getAll(){
        $stmt = $this->db->query("SELECT * FROM empresas");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($nombre, $nit, $telefono, $correo){
        $stmt = $this->db->prepare(
            "INSERT INTO empresas (nombre, nit, telefono, correo) VALUES (?, ?, ?, ?)"
        );

        return $stmt->execute([$nombre, $nit, $telefono, $correo]);
    }

    public function find($id){
        $stmt = $this->db->prepare("SELECT * FROM empresas WHERE id_empresa = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $nombre, $nit, $telefono, $correo){
        $stmt = $this->db->prepare("UPDATE empresas SET nombre = ?, nit = ?, telefono = ?, correo = ? WHERE id_empresa = ?");
        return $stmt->execute([$nombre, $nit, $telefono, $correo, $id]);
    }

    public function delete($id){
        $stmt = $this->db->prepare("DELETE FROM empresas WHERE id_empresa = ?");
        return $stmt->execute([$id]);
    }
}