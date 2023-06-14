<?php
    require_once("filter.php");
    class Aptitud {
        protected string $nombreAptitud, $icono;
        private object $mySQLObject;
        use databaseConexion;

        protected function __construct(){
            $mySQLObject = databaseConexion::conexion();
            $this -> mySQLObject = $mySQLObject;
        }

        protected function createAptitudes(string $nombreAptitud, string $icono)
        {
            $this -> nombreAptitud = $nombreAptitud;
            $this -> icono = $icono;
            $pdo = $this -> mySQLObject;
            $sql = "INSERT INTO aptitudes (nombreAptitud,icono) VALUES ('$nombreAptitud','$icono');";
            $execute = $pdo -> query($sql);
            if($execute){return true;}else{return false;} 
        }
    }





    class filtroAptitud extends Aptitud {
        static function createFiltroAptitudes(string $nombreAptitud,string $iconoAptitud){
            $Aptitud = new Aptitud;
            $Aptitud -> createAptitudes($nombreAptitud,$iconoAptitud);
            $mysql = databaseConexion::conexion();

            $sql = "INSERT INTO filtroaptitudes (aptitud, curriculum) VALUES ((SELECT idAptitud FROM aptitudes WHERE idAptitud = (SELECT LAST_INSERT_ID())), (SELECT codCurriculum FROM curriculum WHERE codCurriculum = (SELECT LAST_INSERT_ID())));";

            $mysql -> query($sql);

        }
    }