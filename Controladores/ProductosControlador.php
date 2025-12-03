<?php
require_once __DIR__."/../Modelos/ProductoBBDDModelo.php";
class ProductosControlador {

  private $productoBBDD;

  public function __construct(){
    $this->productoBBDD = new ProductoBBDDModelo();
    $this->Index();
  }

  private function Index(){
    $productos = $this->productoBBDD->index();
    require_once __DIR__ . '/../Vistas/ProductosVista.php';
  }
}

new ProductosControlador();