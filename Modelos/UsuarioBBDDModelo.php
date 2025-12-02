<?php
require_once __DIR__."/../Configuraciones/Conexion.php";
class UsuarioBBDD {

    private $db;

    public function __construct() {
      $this->db=(new Conexion()); 
      $this->db=$this->db->conexion();
      var_dump($this->db);
    }

    public function registrar($dni, $apellidos, $nombre, $email, $password) {
        $sql = "INSERT INTO usuarios (dni, apellidos, nombre, email, password)
                VALUES (:dni, :apellidos, :nombre, :email, :password)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':dni' => $dni,
            ':apellidos' => $apellidos,
            ':nombre' => $nombre,
            ':email' => $email,
            ':password' => password_hash($password, PASSWORD_DEFAULT)
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
