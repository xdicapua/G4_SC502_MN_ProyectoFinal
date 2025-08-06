<?php
require_once '../config/Database.php';
require_once '../models/Categoria.php';

$db = new Database();
$conn = $db->connect();
$categoriaModel = new Categoria($conn);

// AGREGAR o EDITAR
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? '';

    if ($accion === 'agregar') {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $tipo = $_POST['tipo']; // puede ser 'tour' o 'hotel'
        $activo = isset($_POST['activo']) ? 1 : 0;

        $categoriaModel->agregar($nombre, $descripcion, $tipo, $activo);
    }

    if ($accion === 'editar') {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $activo = isset($_POST['activo']) ? 1 : 0;

        $categoriaModel->editar($id, $nombre, $descripcion, $activo);
    }

    // Redirigir a la vista (para evitar reenvío del formulario)
    header('Location: ../views/categorias.php');
    exit;
}

// ELIMINAR
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $categoriaModel->eliminar($id);

    header('Location: ../views/categorias.php');
    exit;
}
?>
