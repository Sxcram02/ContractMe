<?php
    require_once("filter.php");
    class Aficcion {
        protected string $nombreAficcion, $descripcionAficcion;
        private object $mySQLObject;
        
        use databaseConexion;
        
        protected function __construct(){
            $mySQLObject = databaseConexion::conexion();
            $this -> mySQLObject = $mySQLObject;
        }

        protected function crearAficcion($nombreAficcion,$descripcionAficcion):bool
        {
            $this -> nombreAficcion = $nombreAficcion;
            $this -> descripcionAficcion = $descripcionAficcion;
            $pdo = $this -> mySQLObject;

            $sql = "INSERT INTO aficciones (nombreAficcion, descripcion) VALUES ('$nombreAficcion','$descripcionAficcion');";
            $execute = $pdo -> query($sql);

            if($execute){return true;}else{return false;}   

        }

    }






    
    class filtroAficcion extends Aficcion {
        static function createFiltroAficcion(string $nombreAficcion,string $descripcion){
            $Aficcion = new Aficcion;
            $Aficcion -> crearAficcion($nombreAficcion,$descripcion);

            $mysql = databaseConexion::conexion();
            $sql = "INSERT INTO filtroaficcion (aficciones, curriculum) VALUES ((SELECT idAficcion FROM aficciones WHERE idAficcion = (SELECT LAST_INSERT_ID())), (SELECT codCurriculum FROM curriculum WHERE codCurriculum = (SELECT LAST_INSERT_ID())));";

            $mysql -> query($sql);
        }
    }