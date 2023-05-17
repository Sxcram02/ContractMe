<?php
class Usuario {
    protected string $email;
    private object $objeNewMysql;

    public function __construct(){
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_PERSISTENT => false];

        try {

            $objNewMysql = new PDO(DB_HOST,DB_USER,DB_PASS,$options);
            $this -> objeNewMysql = $objNewMysql;

        } catch (PDOException $error) {
            echo "Error de conexión: ".$error -> getMessage();
        }
    }

    function conexion(){

    }

    public function getSelectUser(array &$userRowsData){
        
        $pdo = $this -> objeNewMysql;
        $query = "SELECT * FROM usuario usr;";
        $prepareSelectQuery = $pdo -> query($query);
        $userRowsData=array();
        foreach ($prepareSelectQuery as $value){
            $userRowsData[]=$value;
        }
        return $userRowsData;
    }

    public function setInsertUser($email,$contrasenia) :bool{

        $pdo = $this -> objeNewMysql;
        $prepareQuery = $pdo -> prepare("INSERT INTO usuario VALUES (:usuario,:nameUser,:surname,null,:contrasenia)");
    
        $prepareQuery -> bindValue(":contrasenia",$contrasenia);
        $prepareQuery -> bindValue(":usuario",$email);
        $prepareQuery -> bindValue(":nameUser","marcos");
        $prepareQuery -> bindValue(":surname","dominguez");
        $prepareQuery -> execute();

        if($prepareQuery){
            return true;
        }else{
            return false;
        }
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