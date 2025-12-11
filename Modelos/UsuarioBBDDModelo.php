<?php
require_once __DIR__."/../Configuraciones/Conexion.php";
class UsuarioBBDD {

    private $db;

    public function __construct() {
      $this->db=(new Conexion()); 
      $this->db=$this->db->conexion();
    }

    public function registrar($nombres, $apellidos, $dni, $email, $contrasena) {
        $sql = "INSERT INTO usuarios (dni, apellidos, nombres, email, contrasena, estado)
                VALUES (:dni, :apellidos, :nombre, :email, :contrasena, 1)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':dni' => $dni,
            ':apellidos' => $apellidos,
            ':nombre' => $nombres,
            ':email' => $email,
            ':contrasena' => $contrasena
        ]);
        return true;
    }

    public function login(string $email) {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->db->prepare($sql); // stmt se refiere a la declaracion del sql
        $stmt->execute([':email' => $email]); // stmt se refiere a la ejecución del sql
        return $stmt->fetch(); // stmt se refiere a la obtención del sql
    }
}
