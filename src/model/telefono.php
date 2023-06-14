<?php
    class Telefono {
        protected string $telefonoMovil, $usuario, $telefonoTrabajo;
        use databaseConexion;
        public function __get($atributo){
            return $this -> $atributo;
        }

        public function __set($propiedad,$atributo){
            return $this -> $atributo = $propiedad;
        }

        public function __construct(array $rows){
            $this -> telefonoMovil = $rows['tlfMovil'];
            $this -> usuario = $rows['idUsuario'];
        }

        public static function crearTelefono($tlfMovil,$tlfTrabajo,$usuario){
            $sql = "INSERT INTO telefono (tlfMovil, tlfTrabajo, idUsuario) VALUES ('$tlfMovil','$tlfTrabajo',$usuario);";

            if(databaseConexion::consulta($sql)){
                return true;
            }else {
                return false;
            }
        }

        public static function obtenerTelefono($usuario){
            $sql = "SELECT * FROM telefono tlf JOIN usuario usr ON tlf.idUsuario = $usuario;";
            $resultado = databaseConexion::consulta($sql);
            if($rows = $resultado -> fetch(PDO::FETCH_ASSOC)){
                $telefono = new Telefono($rows);
                return $telefono;
            }
        }
    }