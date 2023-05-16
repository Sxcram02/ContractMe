<?php


class Usuario {
    protected string $email,$contrasenia, $apellido2;
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

    public function __construct($dni,$fechaNac,$familia,$grado){
        $emailAspirante = $this -> email;
        $this -> emailAspirante = $emailAspirante;
        $this -> dni = $dni;
        $this -> fechaNac = $fechaNac;
        $this -> familia = $familia;
        $this -> grado = $grado;
    }

    public function getEmailAspirante(){
        return $this -> emailAspirante;
    }

    public function getDniAspirante(){
        return $this -> dni;
    }

    public function getFechaNacAspirante(){
        return $this -> fechaNac;
    }

    public function getFamiliaAspirante(){
        return $this -> familia;
    }

    public function getGradoAspirante(){
        return $this -> grado;
    }
}




class Empresario extends Usuario {
    private int $codEmpresa;
    private string $emailEmpresario;
    public function __construct($codEmpresa){
        $emailEmpresario = $this -> email;
        $this -> codEmpresa = $codEmpresa;
        $this -> emailEmpresario = $emailEmpresario;
    }

    public function getCodEmpresa(){
        return $this -> codEmpresa;
    }

    public function getEmailEmpresario(){
        return $this -> emailEmpresario;
    }
}

?>