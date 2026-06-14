<?php

require_once __DIR__ . '/../../../config/database.php';

class User
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getAll(): array
    {
        $stmt = $this->db->query('SELECT id_usuario, nombre, correo FROM usuarios');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findByEmail($correo){
        $stmt = $this->db->prepare("select * from usuarios where correo = ?");
        $stmt->execute([$correo]);
        // Si el usuario no existe, fetch() devolverá false
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create( $nombre, $correo, $password, $rol){
        $stmt = $this->db->prepare(
            "INSERT INTO usuarios (nombre, correo, password_hash, rol)
            VALUES (?, ?, ?, ?)"
        );

        return $stmt->execute([$nombre, $correo, $password, $rol]);
    }
}