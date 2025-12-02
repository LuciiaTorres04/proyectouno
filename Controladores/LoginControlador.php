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
    var_dump($usuario["contrasena"]);
  }
}
 (new LoginControlador()); // instanciar 







