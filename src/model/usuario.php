
<?php
/**
 * Usuario
 * @param string $email, $nombreUsuario, $tipoUsuario, $apellidos
 */
class Usuario {
    protected string $email, $nombreUsuario, $tipoUsuario, $apellidos, $fechaNacimiento;
    protected int $idUsuario;

    use databaseConexion;

    public  function __get($atributo){
        return $this -> $atributo;
    }

    public function __construct($queryRow){
        $this -> idUsuario = $queryRow['idUsuario'];
        $this -> email = $queryRow['email'];
        $this -> nombreUsuario = $queryRow['nombre'];
        $this -> tipoUsuario = $queryRow['tipoUsuario'];
        $this -> apellidos = $queryRow['apellido1']." ".$queryRow['apellido2'];
        $this -> fechaNacimiento = $queryRow['fechaNacimiento'];
    }

    public static function obtenerUsuario(string $pass, string $emailUsuario){
        $sql = "SELECT * FROM usuario usr WHERE usr.email = '$emailUsuario' AND usr.contrasenia = '$pass';";
        
        $resultado = databaseConexion::consulta($sql);

        if($row = $resultado -> fetch(PDO::FETCH_ASSOC)){
            $usuario = new Usuario($row);
            return $usuario;
        }else {
            return false;
        }
    }

    public static function setInsertUser($userInfoArray){
        $converOneString="'".implode("','",$userInfoArray)."'";

        $sql= "INSERT INTO usuario (nombre, apellido1, apellido2, contrasenia,email, fechaNacimiento, tipoUsuario) VALUES ($converOneString);";

        if(databaseConexion::consulta($sql)){
            return true;
        }else{
            return false;
        }
    }
}
