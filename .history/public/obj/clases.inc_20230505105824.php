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
    public  object $objNewMysql;
        
    /**
     * __construct
     *
     * @param  string $host
     * @param  string $username
     * @param  string $passwordd
     * @param  string $database
     * @return void
     */
    
    public function __construct($host,$username,$passwordd,$database){
        $this -> host = $host;
        $this -> username = $username;
        $this -> database = $database;
        $this -> passwordd = $passwordd;
        $this -> objNewMysql = new mysqli($host,$username,$passwordd,$database);
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
            $controlPass = "SELECT asp.contrasena as contrasena FROM aspirante asp JOIN users usr ON asp.idAspirante = usr.aspirante WHERE usr.email = '$userEmail' OR usr.userName = '$userEmail'";
            
            $databaseConnection = $this -> objNewMysql;
            $getDatabasePass = $databaseConnection -> query($controlPass);

            $databasePass = mysqli_fetch_array($getDatabasePass);
            $databasePass = $databasePass['contrasena'];

            if($databasePass == $pasword){
                return true;
            } else {
                return false;
            } 
        }
        return false;
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
        
        // if(func_num_args() > 2){
        //     $databaseConnection = $this -> objNewMysql;
        //     while (mysqli_affected_rows($databaseConnection) == 0) {
        //         $userId = rand(3,1000);
        //         $queryINSERT = "INSERT INTO users (userId,userName,email) VALUES ('$userId','$clientName', '$clientEmail');";
        //         $doQueryInsert2 = $databaseConnection -> query($queryINSERT);
        //     }
        //     echo "<h1 style='width:300px; background-color:snow; box-shadow: 0px 0px 6px black; color:lightgreen;'>Registro Correcto</h1>";
        // }else{
        //     echo "<h1 style='width:300px; background-color:snow; box-shadow: 0px 0px 6px black; color:darkred;'>Introduce los campos obligatorios</h1>";
        // }
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