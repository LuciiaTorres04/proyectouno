<?php
require_once __DIR__."/../Configuraciones/Conexion.php";
class ProductoBBDDModelo {
    private $db;

    public function __construct() {
      $this->db=(new Conexion()); 
      $this->db=$this->db->conexion();
    }

    public function index() {
        $sql = "SELECT * FROM productos WHERE estado = :estado";
        $stmt = $this->db->prepare($sql); // stmt se refiere a la declaracion del sql
        $stmt->execute([':estado' => 1]); // stmt se refiere a la ejecución del sql
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // stmt se refiere a la obtención del sql
    }
}
