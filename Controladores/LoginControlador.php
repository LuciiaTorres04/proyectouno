<?php
$email = $_POST["email"];  // lo que recoge del name del index
echo $email;

$contrasena = $_POST["contrasena"];
echo $contrasena;

class Humano {
    private $edad;
    private $nombre;

    public function __construct(string $nombre)
    {

        $this->respirar();
        $this->nombre=$nombre;
    }

    public function correr()
    {
        return $this->nombre . 'esta corriendo';   
    }

    private function respirar()
    {
        echo 'respirando';
    }

    // al ser privado hay que hacer encapsulamiento
    public function nombre()
    {
        return $this->nombre;
    }
}

$humano = new Humano("lUcia");


echo $humano->nombre();

