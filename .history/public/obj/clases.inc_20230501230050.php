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
    
    public function setUser (array $userListData) {
        $databaseConnection = $this -> objNewMysql;
        for($intineration=0;$intineration<func_get_args();$intineration++){
            if(isset($userListData[$intineration])){
                $querySetUserData = "INSERT INTO users (userId,userName,userAp1,email) VALUES ('$userListData[$intineration]');";
                $query = $databaseConnection -> query($querySetUserData);
                (mysqli_affected_rows($databaseConnection) == 1)?true:false;
            }else {
                $error
                return mysqli_error($databaseConnection);
            }
        }
        // $inputPrameter=func_get_args();
        // if(isset($inputPrameter) > 2){
        //     $databaseConnection = $this -> objNewMysql;
        //     while (mysqli_affected_rows($databaseConnection) == 0) {
        //         $userId = rand(3,1000);
        //         $queryINSERT = "INSERT INTO users (userId,userName,email) VALUES ('$userId','$clientName', '$clientEmail');";
        //         $doQueryInsert2 = $databaseConnection -> query($queryINSERT);
        //     }
        //     echo "<h1>Registro Correcto</h1>";
        // }else{
        //     echo "Introduce los campos obligatorios";
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