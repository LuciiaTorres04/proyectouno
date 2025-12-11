<?php
require_once __DIR__."/../Modelos/UsuarioBBDDModelo.php";
class RegistroControlador {

    private $UsuarioBBDDModelo;

  public function __construct(){

    $this->UsuarioBBDDModelo = new UsuarioBBDD();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nombres = $_POST["nombres"];  
        $apellidos = $_POST["apellidos"];
        $dni = $_POST["dni"];
        $email = $_POST["email"];
        $contrasena = $_POST["contrasena"];
        $this->Registrar($nombres, $apellidos, $dni, $email, $contrasena); // argumentos
    } else {
      $this->Index();
    }
  }

  private function Registrar($nombres, $apellidos, $dni, $email, $contrasena) {
    $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
    $registro = $this->UsuarioBBDDModelo->registrar($nombres, $apellidos, $dni, $email, $contrasena);
    if ($registro) {
        $mensajeRegistro = "Se ha registrado correctamente";
        require_once __DIR__ . '/../Vistas/RegistrarVista.php';
    } else {

    }
  }


  private function Index(){
    require_once __DIR__ . '/../Vistas/RegistrarVista.php';
  }
}
 (new RegistroControlador()); // instanciar 







