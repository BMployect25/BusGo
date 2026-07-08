<?php

require_once __DIR__.'/BaseModel.php';

class User extends BaseModel
{
    // Constructor que llama al constructor de la clase BaseModel
    public function __construct()
    {
        parent::__construct();
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