<?php
class Usuario {
    protected string $email;
    protected object $objNewMysql;

    use databaseConexion;
    public function __construct(){
        $objNewMysql = databaseConexion::conexion();
        $this -> objNewMysql = $objNewMysql;
    }

    public function getSelectUser(array &$userRowsData){
        $pdo = $this -> objNewMysql;

        $query = "SELECT * FROM usuario usr;";
        $prepareSelectQuery = $pdo -> query($query);
        $userRowsData=array();

        foreach ($prepareSelectQuery as $value){
            $userRowsData[]=$value;
        }
        return $userRowsData;
    }

    public function setInsertUser($email,$contrasenia) :bool{

        $pdo = $this -> objNewMysql;
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



class Aspirante extends Usuario {
    private string $emailAspirante, $dni;
    private int $codExpediente;

    public string $fechaNac, $familia, $grado;
    private object $objectDB;

    public function __construct($emailAspirante){
        $pdo = databaseConexion::conexion();
        $this -> objectDB = $pdo;
        $this -> email = $emailAspirante;
    }

    public function getSelectAspirante($email,$pass){
        $pdo= $this -> objectDB;
        $preparePDO= $pdo -> prepare("SELECT asp.email as email, asp.contrasenia as pass FROM aspirante asp WHERE email = :email AND pass = :email");
        $preparePDO -> bindValue(":email",$email);
        $preparePDO -> bindValue(":pass",$pass);
        
        return $preparePDO -> execute();
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