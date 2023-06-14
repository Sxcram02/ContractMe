<?php
    class Direccion {
        protected string $calle, $edificio;
        protected int $codigoPostal, $usuario;
        use databaseConexion;

        public function __get($atributo){
            return $this -> $atributo;
        }

        public function __set($atributo,$propiedad){
            return $this -> $atributo = $propiedad;
        }

        public function __construct($rows){
            $this -> calle = $rows['calle'];
            $this -> codigoPostal = $rows['codPostal'];
            $this -> edificio = $rows['edificio'];
            $this -> usuario = $rows['idUsuario'];
        }

        public static function createDireccion(...$direccion){
            $sql = "INSERT INTO direccion (codPostal,calle,edificio,idUsuario) VALUES ('$direccion[0]','$direccion[1]','$direccion[2]',$direccion[3]);";

            if(databaseConexion::consulta($sql)){
                return true;
            }else {
                return false;
            }
        }

        public static function obtenerDireccion($usuario){
            $sql = "SELECT * FROM direccion dire JOIN usuario usr ON dire.idUsuario = $usuario;";
            $resultado = databaseConexion::consulta($sql);

            if($rows = $resultado -> fetch()){
                $direccion = new Direccion($rows);
                return $direccion;
            }
        }
    }