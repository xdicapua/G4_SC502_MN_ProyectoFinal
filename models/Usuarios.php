<?php
class Usuarios {
    private $conn;
    private $tabla = "usuario";

    // Constructor recibe la conexión PDO
    public function __construct($db) {
        $this->conn = $db;
    }

    // Obtener todos los usuarios
    public function obtenerTodos() {
        $sql = "SELECT * FROM " . $this->tabla . " ORDER BY id_usuario DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Agregar un nuevo usuario
    public function agregar($datos) {
        $sql = "INSERT INTO " . $this->tabla . " (username, password, nombre, apellidos, correo, telefono, ruta_imagen, activo) 
                VALUES (:username, :password, :nombre, :apellidos, :correo, :telefono, :ruta_imagen, :activo)";
        $stmt = $this->conn->prepare($sql);

        // Hashear la contraseña antes de guardar
        $passwordHash = password_hash($datos['password'], PASSWORD_DEFAULT);

        $stmt->bindParam(':username', $datos['username']);
        $stmt->bindParam(':password', $passwordHash);
        $stmt->bindParam(':nombre', $datos['nombre']);
        $stmt->bindParam(':apellidos', $datos['apellidos']);
        $stmt->bindParam(':correo', $datos['correo']);
        $stmt->bindParam(':telefono', $datos['telefono']);
        $stmt->bindParam(':ruta_imagen', $datos['ruta_imagen']);
        $stmt->bindParam(':activo', $datos['activo'], PDO::PARAM_BOOL);

        return $stmt->execute();
    }

    // Obtener usuario por id
    public function obtenerPorId($id) {
        $sql = "SELECT * FROM " . $this->tabla . " WHERE id_usuario = :id LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar usuario
    public function actualizar($id, $datos) {
        $sql = "UPDATE " . $this->tabla . " SET username = :username, nombre = :nombre, apellidos = :apellidos,
                correo = :correo, telefono = :telefono, ruta_imagen = :ruta_imagen, activo = :activo
                WHERE id_usuario = :id";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':username', $datos['username']);
        $stmt->bindParam(':nombre', $datos['nombre']);
        $stmt->bindParam(':apellidos', $datos['apellidos']);
        $stmt->bindParam(':correo', $datos['correo']);
        $stmt->bindParam(':telefono', $datos['telefono']);
        $stmt->bindParam(':ruta_imagen', $datos['ruta_imagen']);
        $stmt->bindParam(':activo', $datos['activo'], PDO::PARAM_BOOL);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    // Eliminar usuario
    public function eliminar($id) {
        $sql = "DELETE FROM " . $this->tabla . " WHERE id_usuario = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
