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

    public function __construct(){
        $pdo = databaseConexion::conexion();
        $this -> objectDB = $pdo;
    }

    public function getSelectAspirante($emailAsp,$passAsp){
        $pdo= $this -> objectDB;
        $preparePDO= $pdo -> prepare("SELECT asp.email as email FROM aspirante asp JOIN usuario usr ON usr.email = asp.email WHERE usr.email = :email AND usr.contrasenia = :pass");
        $preparePDO -> bindValue(":email",$emailAsp);
        $preparePDO -> bindValue(":pass",$passAsp);
        return $preparePDO -> execute();
    }

    public function setInsertAspirante($email,$pass){
        $pdo = $this -> objectDB;
        $preparePDO = $pdo -> prepare("INSERT INTO aspirante (SELECT usr.email as email, usr.contrasenia as pass FROM usuario usr WHERE email = :email AND pass = :pass");

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