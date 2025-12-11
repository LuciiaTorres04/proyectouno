<?php
require_once __DIR__."/../Modelos/ProductoBBDDModelo.php";
class ProductosControlador {

  private $productoBBDD;

  public function __construct(){
    $this->productoBBDD = new ProductoBBDDModelo();
    $this->Index();
  }

  private function Index(){
    session_start();
      if (!isset($_SESSION['usuarioId'])) {
      // Usuario NO autenticado → enviar a login
      header('Location: ../Controladores/LoginControlador.php');
      exit;
    }
    $productos = $this->productoBBDD->index();
    require_once __DIR__ . '/../Vistas/ProductosVista.php';
  }
}

new ProductosControlador();