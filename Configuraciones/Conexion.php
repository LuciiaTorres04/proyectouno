<?php
class Conexion {
    private $host = '127.0.0.1';
    private $puerto = '3307'; // ← PUERTO AÑADIDO
    private $usuario = "root";
    private $password = "";
    private $basedatos = "proyectouno";
    private $conexion;

    public function __construct() {
        $this->conectar();
    }

    private function conectar() {
        try {
            // Conexión PDO con puerto
            $this->conexion = new PDO(
                "mysql:host=$this->host;port=$this->puerto;dbname=$this->basedatos;charset=utf8",
                $this->usuario,
                $this->password
            );

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function conexion() {
        return $this->conexion;
    }

    public function __destruct() {
        $this->conexion = null;
    }
}
