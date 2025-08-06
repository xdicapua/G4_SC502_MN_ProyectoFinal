<?php
class Categoria {
    private $conn;
    private $tabla = "categoria";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Obtener categorías por tipo (ej: 'tour' o 'hotel')
    public function obtenerPorTipo($tipo) {
        $query = "SELECT * FROM {$this->tabla} WHERE tipo = :tipo ORDER BY id_categoria DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":tipo", $tipo);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Agregar nueva categoría
    public function agregar($nombre, $descripcion, $tipo, $activo = 1) {
        $query = "INSERT INTO {$this->tabla} (nombre, descripcion, tipo, activo) 
                  VALUES (:nombre, :descripcion, :tipo, :activo)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":tipo", $tipo);
        $stmt->bindParam(":activo", $activo, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Eliminar categoría
    public function eliminar($id) {
        $sql = "DELETE FROM {$this->tabla} WHERE id_categoria = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Editar categoría existente
    public function editar($id, $nombre, $descripcion, $activo) {
        $sql = "UPDATE {$this->tabla} 
                SET nombre = :nombre, descripcion = :descripcion, activo = :activo 
                WHERE id_categoria = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':activo', $activo);
        return $stmt->execute();
    }

    // Obtener categoría por ID
    public function obtenerPorId($id) {
        $sql = "SELECT * FROM {$this->tabla} WHERE id_categoria = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
