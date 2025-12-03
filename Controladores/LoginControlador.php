<?php
require_once __DIR__."/../Modelos/UsuarioBBDDModelo.php";
class LoginControlador {
  public function __construct(){
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = $_POST["email"];  // lo que recoge del name del index
        $contrasena = $_POST["contrasena"];
        $this->LoginValidar($email, $contrasena); // argumentos
    } else {
       $this->Index();
    }
  }

  private function Index(){
    require_once __DIR__ . '/../Vistas/LoginVista.php';
  }

  private function LoginValidar(string $email, string $contrasena){ // han pasado a ser parametros
    $usuarioBBDD = new UsuarioBBDD();
    $usuario = $usuarioBBDD->login($email);
    if ($usuario && password_verify($contrasena, $usuario["contrasena"])) {
      session_start();
      $_SESSION["usuarioId"] = $usuario["id"];
      $_SESSION["usuarioNombres"] = $usuario["nombres"];
      header("Location: ProductosControlador.php");

    } else {
      $errorDeLogin = "Ha ocurrido un error";
      require_once __DIR__ . '/../Vistas/LoginVista.php';
    }
  }
}
 (new LoginControlador()); // instanciar 







