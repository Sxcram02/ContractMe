<?php
/**
 * PHPScript by Marcos Dominguez
* Database
* Allows query into database.
*/
class Database {
    public string $host;
    public string $username; 
    public string $database;    
    public string $passwordd;
    private $objNewMysql = new mysqli($host,$username,$passwordd,$database);
        
    /**
     * __construct
     *
     * @param  string $host
     * @param  string $username
     * @param  string $passwordd
     * @param  string $database
     * @return object $objNewMysql
     */
    
    public function __construct($host,$username,$passwordd,$database,&$objNewMysql){
        $this -> host = $host;
        $this -> username = $username;
        $this -> database = $database;
        $this -> passwordd = $passwordd;
        $this -> objNewMysql = $objNewMysql;
    }
    
    /**
     * hasUser
     *
     * @param  string $userEmail
     * @param  string $pasword
     * @return bool
     */
    
    public function hasUser (string $userEmail,string $pasword) :bool {
        if (func_get_args()){
            $controlPass = "SELECT usr.contrasena as contrasena FROM users usr WHERE usr.email = $userEmail";
            $userLoginPass = "SELECT usr.contrasena as contrasena FROM users usr WHERE usr.contrasena = $pasword;";
            
            $databaseConnection = $this -> objNewMysql;
            $getDatabasePass = $databaseConnection -> query($controlPass);
            $getUserPass = $databaseConnection -> query($userLoginPass);

            $databasePass = mysqli_fetch_array($getDatabasePass,MYSQLI_ASYNC);
            $userPass = mysqli_fetch_array($getUserPass,MYSQLI_ASYNC);

            if($databasePass == $userPass){
                return true;
            } else {
                return false;
            } 
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
    
    public function setUser (string $clientName, string $clientPass, string $clientEmail, string $clientPhone) {
        if(func_get_args() > 2){
            $databaseConnection = $this -> objNewMysql;
            while (mysqli_affected_rows($databaseConnection) == 0) {
                $queryINSERT = "INSERT INTO user (userName, contrasena, email, telefono) VALUES ('$clientName', '$clientPass', '$clientEmail', '$clientPhone');";
                $doQueryInsert = $databaseConnection -> query($queryINSERT);
            }
        }
    }
        
    /**
     * getQuery
     *
     * @return array $resultQuery
     */
    
    public function getQuery (){
        $simpleQuery2 = "SELECT asp.nameAsiparnt as nameClient FROM aspirantes asp";

        $databaseConnection = $this -> objNewMysql;
        
        $getAspirants = $databaseConnection -> query($simpleQuery2);
        $resultQuery = mysqli_fetch_array($getAspirants);
        foreach ($resultQuery as $aspirante){
            $aspirante = $aspirante['aspirante'];
            return "{$aspirante['nameClient']}";
        }
    }
}

?>