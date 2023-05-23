
<?php
/**
 * Usuario
 */
class Usuario {
    protected string $email;
    protected object $objNewMysql;

    use databaseConexion;    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(){
        $objNewMysql = databaseConexion::conexion();
        $this -> objNewMysql = $objNewMysql;
    }
    
    /**
     * getUserSelect
     *
     * @param  string $emailAsp
     * @param  string $passAsp
     * @return array|bool
     */
    public function getUserSelect($emailAsp,$passAsp){
        $pdo= $this -> objNewMysql;
        $preparePDO= $pdo -> prepare("SELECT * FROM usuario usr WHERE usr.email = :email AND usr.contrasenia = :pass");

        $preparePDO -> bindValue(":email",$emailAsp);
        $preparePDO -> bindValue(":pass",$passAsp);

        
        $preparePDO -> execute();

        if ($preparePDO -> rowCount() > 0) {
            $queryResult = $preparePDO->fetchAll(PDO::FETCH_ASSOC);
            $valueQuery = array();

            foreach ($queryResult as $value) {
                $valueQuery[] = $value;
            }
            return $valueQuery;
        }else {
            return false;
        }
        
        
    }
    
    /**
     * setInsertUser
     *
     * @param  array $userInfoArray
     * @return bool
     */
    public function setInsertUser($userInfoArray) :bool{

        $pdo = $this -> objNewMysql;
        $converOneString="'".implode("','",$userInfoArray)."'";
        $prepareQuery= "INSERT INTO usuario (email,nombreUser,contrasenia,apellido1,tipoUsuario) VALUES ($converOneString);";
        $prepareQuery = $pdo -> query($prepareQuery);

        if($prepareQuery){
            return true;
        }else{
            return false;
        }
    }
}
