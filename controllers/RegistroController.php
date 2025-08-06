<?php
require_once '../models/Usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'username' => $_POST['username'] ?? '',
        'password' => $_POST['password'] ?? '',
        'nombre' => $_POST['nombre'] ?? '',
        'apellidos' => $_POST['apellidos'] ?? '',
        'correo' => $_POST['correo'] ?? '',
        'telefono' => $_POST['telefono'] ?? '',
        'ruta_imagen' => '', // podrías implementar subida de imagen o usar una imagen por defecto
    ];

    $usuarioModel = new Usuario();
    $exito = $usuarioModel->registrar($data);

    if ($exito) {
        header("Location: ../views/login.php?registro=ok");
        exit;
    } else {
        header("Location: ../views/registro.php?error=1");
        exit;
    }
}
