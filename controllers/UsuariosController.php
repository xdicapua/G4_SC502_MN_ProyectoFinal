<?php
require_once '../config/Database.php';
require_once '../models/Usuarios.php';

class UsuariosController {
    private $usuariosModel;

    public function __construct() {
        $database = new Database();
        $db = $database->connect();
        $this->usuariosModel = new Usuarios($db);
    }

    // Listar todos los usuarios
    public function listar() {
        return $this->usuariosModel->obtenerTodos();
    }

    // Agregar usuario
    public function agregar($datos) {
        // Hashear la contraseña antes de agregar
        if (isset($datos['password'])) {
            $datos['password'] = password_hash($datos['password'], PASSWORD_BCRYPT);
        }
        return $this->usuariosModel->agregar($datos);
    }

    // Obtener usuario por id
    public function obtenerPorId($id) {
        return $this->usuariosModel->obtenerPorId($id);
    }

    // Actualizar usuario
    public function actualizar($id, $datos) {
        // Si actualizan contraseña, hashearla
        if (isset($datos['password']) && !empty($datos['password'])) {
            $datos['password'] = password_hash($datos['password'], PASSWORD_BCRYPT);
        } else {
            // Si no envían password, eliminarlo para no actualizar ese campo
            unset($datos['password']);
        }
        return $this->usuariosModel->actualizar($id, $datos);
    }

    // Eliminar usuario
    public function eliminar($id) {
        return $this->usuariosModel->eliminar($id);
    }
}

// Manejo de petición
$controller = new UsuariosController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion'])) {
        if ($_POST['accion'] === 'agregar') {
            $datos = [
                'username' => $_POST['username'],
                'password' => $_POST['password'],
                'nombre' => $_POST['nombre'],
                'apellidos' => $_POST['apellidos'],
                'correo' => $_POST['correo'] ?? null,
                'telefono' => $_POST['telefono'] ?? null,
                'ruta_imagen' => $_POST['ruta_imagen'] ?? null,
                'activo' => isset($_POST['activo']) ? 1 : 0
            ];
            $controller->agregar($datos);
            header("Location: ../views/usuarios.php");
            exit();
        }

        if ($_POST['accion'] === 'editar') {
            $id = (int)$_POST['id_usuario'];
            $datos = [
                'username' => $_POST['username'],
                // El password puede estar vacío si no quiere cambiarlo
                'password' => $_POST['password'] ?? '',
                'nombre' => $_POST['nombre'],
                'apellidos' => $_POST['apellidos'],
                'correo' => $_POST['correo'] ?? null,
                'telefono' => $_POST['telefono'] ?? null,
                'ruta_imagen' => $_POST['ruta_imagen'] ?? null,
                'activo' => isset($_POST['activo']) ? 1 : 0
            ];
            $controller->actualizar($id, $datos);
            header("Location: ../views/usuarios.php");
            exit();
        }
    }
}

if (isset($_GET['eliminar'])) {
    $id = (int)$_GET['eliminar'];
    $controller->eliminar($id);
    header("Location: ../views/usuarios.php");
    exit();
}
