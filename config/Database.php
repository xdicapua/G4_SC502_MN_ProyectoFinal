<?php
class Database
{
    private $host = "localhost";
    private $db_name = "TRAVEX";
    private $username = "usuario_pruebatravex";
    private $password = "Usuario_Clavetravex.";

    public $conn;

    public function connect()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=127.0.0.1;port=3307;dbname=TRAVEX;charset=utf8mb4",
                $this->username,
                $this->password
            );

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
