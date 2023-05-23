<?php
trait databaseConexion {        
    /**
     * conexion
     *
     * @return object|void
     */
    public static function conexion(){
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_PERSISTENT => false];

        try {

            $objNewMysql = new PDO(DB_HOST,DB_USER,DB_PASS,$options);
            return $objNewMysql;

        } catch (PDOException $error) {
            echo "Error de conexión: ".$error -> getMessage();
        }
    }
}
    ?>