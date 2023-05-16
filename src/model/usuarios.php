<?php
class Usuario {
    private string $email,$contrasenia, $apellido2;
    public string $nombreUser,$apellido1;

    public function __construct($email,$nombreUser,$apellido1,$contrasenia){
        $this -> email = $email;
        $this -> nombreUser = $nombreUser;
        $this -> apellido1 = $apellido1;
        $this -> contrasenia = $contrasenia;
    }

    public function getUserEmail(){
        return $this -> email;
    }

    public function getUserName(){
        return $this -> nombreUser;
    }

    public function getApellidos(&$apellidos){
        return $apellidos=[$this -> apellido1,$this -> apellido2];
    }

    public function getPassword(){
        return $this -> contrasenia;
    }
}

class Aspirantes extends Usuario {
    private string $emailAspirante, $dni;
    private int $codExpediente;

    public string $fechaNac, $familia, $grado;

    public function __construct($emailAspirante,$dni,$fechaNac,$familia,$grado){
        $this -> emailAspirante = $emailAspirante;
        $this -> dni = $dni;
        $this -> fechaNac = $fechaNac;
        $this -> familia = $familia;
        $this -> grado = $grado;
    }
}

?>