<?php
require_once __DIR__."/../Modelos/UsuarioBBDDModelo.php";
class LoginControlador {
  public function __construct(){
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = $_POST["email"];  // lo que recoge del name del index
        $contrasena = $_POST["contrasena"];
        $this->LoginValidar($email, $contrasena); // argumentos
    } else {
      if(isset($_GET['logout']) && $_GET['logout'] == 1){
        $this->Salir();
      } else if (isset($_GET['registro']) && $_GET['registro'] == 1) {
        $this->Registrar();
      } else { 
        $this->Index();
      }
    }
  }

  private function Salir(){
    session_start();
    session_destroy();
    header('Location: ../Controladores/LoginControlador.php');
    exit;

  }

  private function Index(){
    require_once __DIR__ . '/../Vistas/LoginVista.php';
  }

  private function Registrar(){
    require_once __DIR__ . '/../Vistas/RegistrarVista.php';
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







