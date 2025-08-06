<?php
require_once 'Database.php';

class TestConexion {
    public static function probar() {
        $db = new Database();
        $conn = $db->connect();

        if ($conn) {
            echo "✅ Conexión exitosa a la base de datos TRAVEX con el usuario configurado.";
        } else {
            echo "❌ Error al conectar con la base de datos. Revisa las credenciales.";
        }
    }
}

// Ejecuta la prueba automáticamente al abrir el archivo
TestConexion::probar();
