<?php

require_once __DIR__ . '/../../../config/database.php';

class User
{
    private PDO $db;

    // Es la conexión a la base de datos
    public function __construct()
    {
        $this->db = Database::connect();
    }

    // Método para obtener todos los usuarios
    public function getAll(){
        $sql = "SELECT * FROM usuarios";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para encontrar un usuario por correo electrónico
    public function findByEmail($correo){
        $stmt = $this->db->prepare("select * from usuarios where correo = ?");
        $stmt->execute([$correo]);
        // Si el usuario no existe, fetch() devolverá false
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para crear un nuevo usuario
    public function create( $nombre, $apellido, $correo, $telefono, $passwordHash, $rol){
        $stmt = $this->db->prepare(
            "INSERT INTO usuarios (nombre, apellido, correo, telefono, password_hash, rol)
            VALUES (?, ?, ?, ?, ?, ?)"
        );

        return $stmt->execute([$nombre, $apellido, $correo, $telefono, $passwordHash, $rol]);
    }

    public function find($id){
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE id_usuario = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $nombre, $apellido, $correo, $telefono, $passwordHash, $rol){
        $stmt = $this->db->prepare("UPDATE usuarios  SET nombre = ?, apellido = ?, correo = ?, telefono = ?, password_hash = ?, rol = ?
                WHERE id_usuario = ?");
    
            return $stmt->execute([$nombre, $apellido, $correo, $telefono, $passwordHash, $rol, $id]);
        }

    public function delete($id){
        $stmt = $this->db->prepare("DELETE FROM usuarios WHERE id_usuario = ?");
        return $stmt->execute([$id]);
    }
}