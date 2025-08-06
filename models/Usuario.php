<?php
require_once __DIR__ . '/../config/Database.php';

class Usuario
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }

    // 🔐 Login
    public function obtenerPorUsername($username)
    {
        if ($this->conn) {
            $stmt = $this->conn->prepare("SELECT * FROM usuario WHERE username = :username AND activo = 1");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return null;
    }

    // 📝 Registro
    public function registrar($data)
    {
        if ($this->conn) {
            $stmt = $this->conn->prepare("
                INSERT INTO usuario (username, password, nombre, apellidos, correo, telefono, ruta_imagen, activo)
                VALUES (:username, :password, :nombre, :apellidos, :correo, :telefono, :ruta_imagen, 1)
            ");

            $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT);

            $stmt->bindParam(':username', $data['username']);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':nombre', $data['nombre']);
            $stmt->bindParam(':apellidos', $data['apellidos']);
            $stmt->bindParam(':correo', $data['correo']);
            $stmt->bindParam(':telefono', $data['telefono']);
            $stmt->bindParam(':ruta_imagen', $data['ruta_imagen']);

            return $stmt->execute();
        }
        return false;
    }
}
