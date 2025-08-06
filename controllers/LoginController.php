<?php
session_start();
require_once '../models/Usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $usuarioModel = new Usuario();
    $user = $usuarioModel->obtenerPorUsername($username);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['id_usuario'] = $user['id_usuario'];
        $_SESSION['nombre'] = $user['nombre'];
        $_SESSION['apellidos'] = $user['apellidos'];
        header("Location: ../public/index.php");
        exit;
    } else {
        header("Location: ../views/login.php?error=1");
        exit;
    }
}
