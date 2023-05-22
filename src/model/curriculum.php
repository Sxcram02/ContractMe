<?php

class Curriculum {
    private object $mySQLObject;
    use databaseConexion;
    protected function __construct(){
        $mySQLObject = databaseConexion::conexion();
        $this -> mySQLObject = $mySQLObject;
    }

    private function setCurriculum(){
    }
}
?>