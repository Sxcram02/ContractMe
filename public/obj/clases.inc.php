<?php
class Database {
    public string $host, $username, $database;    
    private string $paasswordd;

    private function __construct($host,$username,$passwordd,$database){
        $this -> host = strtolower($host);
        $this -> username = strtolower($username);
        $this -> database = strtolower($database);
        $this -> paasswordd = $passwordd;
        $objNewMysql = new mysqli($host,$username,$passwordd,$database);
    }

    public function getUser(int $userEmail) :bool {
        if (func_get_args()){
            $simpleQuery = "SELECT usr.nameUser as name FROM users usr WHERE usr.email = $userEmail;";
            $getUserName = $objNewMysql -> query($userEmail);
            (mysql_num_rows($getUserName) = 1) ? {return true;} : { return false;};
        } else {
            echo "Introduce un mail correcto";
        }; 
        
    }

    public function setUser(string $clientName, string $clientPass, string $clientEmail, string $clientPhone) {
        while (func_get_args() > 2) {
            $queryINSERT = "INSERT INTO user (nameUser, contraseña, email, telefono)VALUES ($clientName, $clientPass, $clientEmail, $clientPhone);";
            $doQueryInsert = $objNewmysql -> query($queryINSERT);
        }
    }
    
    public function setQuery(){
        $simpleQuery = "SELECT * FROM aspirantes";
        $getAspirants = $objNewMysql -> query($simpleQuery);
    }
}

?>