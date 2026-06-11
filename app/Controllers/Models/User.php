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
}