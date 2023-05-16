<?php
    require_once("./../../config.inc.php");

/**
 * PHPScript by Marcos Dominguez
* Database
* Allows query into database.
*/

class Database {
    public  object $objNewMysql;
        
    /**
     * __construct
     * @return void
     */
    
    public function __construct(){
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_PERSISTENT => false];

        try {

            $objNewMysql = new PDO(DB_HOST,DB_USER,DB_PASS,$options);
            $this -> objNewMysql = $objNewMysql;

        } catch (PDOException $error) {
            echo "Error de conexión: ".$error -> getMessage();
        }
    }
    
    /**
     * hasUser
     *
     * @param  string $userEmail
     * @param  string $pasword
     * @return bool
     */
    
    public function hasUser (string $userEmail,string $userName,string $pasword){
        if (!func_get_args()){

            $menssagge = "No se introdujo ningún parámetro";
            return false;

        }else {
            $controller = $this -> objNewMysql;

            $preparePDO = $controller -> prepare("SELECT usr.nombreUsuario as nombre, usr.email as email , usr.contrasenia as passw FROM usuarios usr WHERE  email = :clientName OR nombre = :nameUser AND passw = :contra");

            $controller -> bindValue(":clientName",$userEmail);
            $controller -> bindValue(":nameUser",$userName);
            $controller -> bindValue(":contra",$pasword);

            $resultado = $preparePDO -> execute();
            $assocArrayUsuario = $resultado -> fetchAll();

            return $assocArrayUsuario;

        }
    }
    
    /**
     * setUser
     *
     * @param  string $clientName
     * @param  string $clientPass
     * @param  string $clientEmail
     * @param  string $clientPhone
     * @return void
     */
    
    public function setUser (string $userListData) :bool {
        $tester = false;
        if(func_num_args()==1){
            $userId = rand(1,10000);
            $databaseConnection = $this -> objNewMysql;
            $queryInsert = "INSERT INTO users (userId,userName,userAp1,email) VALUES ($userId,$userListData);";
            $resultaQuery = $databaseConnection  -> query($queryInsert);
            (mysqli_affected_rows($databaseConnection))?$tester=true:$tester=false;
            return $tester;
        }else {
            echo "Introduzca al menos dos valores";
            return $tester;
        }
    }
        
    /**
     * getQuery
     *
     * @return array $resultQuery
     */
    
    public function getQuery (){
        $simpleQuery2 = "SELECT asp.nameAspirante as nameClient FROM aspirante asp";

        $databaseConnection = $this -> objNewMysql;
        
        $getAspirants = $databaseConnection -> query($simpleQuery2);
        $resultQuery = mysqli_fetch_array($getAspirants);
        foreach ($resultQuery as $aspirante){
            return "{$aspirante['nameClient']}";
        }
    }
}
?>