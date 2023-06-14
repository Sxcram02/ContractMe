<?php
trait databaseConexion {        
    /**
     * conexion
     * @exception $error
     * @return object|void
     */
    public static function consulta($sql){
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_PERSISTENT => false];

        try {
            $objNewMysql = new PDO(DB_HOST,DB_USER,DB_PASS,$options);
            
            if(substr($sql,0,6) == "SELECT"){
                $resultado = $objNewMysql -> query($sql);
            }else {
                $resultado = $objNewMysql -> exec($sql);
            }

            return $resultado;

        } catch (PDOException $error) {
            echo "Error de conexión: ".$error -> getMessage();
        }
    }
}
    ?>