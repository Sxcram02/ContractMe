<?php

/**
 * Curriculum Model
 * @param object $mySQLObject
 * @uses databaseConexion::conexion databaseConexion
 */
class Curriculum {
    public object $mySQLObject;
    use databaseConexion;    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(){
        $mySQLObject = databaseConexion::conexion();
        $this -> mySQLObject = $mySQLObject;
    }
    
    /**
     * setCurriculum
     * @param int $id
     * @return bool
     */
    
    public function createCurriculum(int $id):bool {
        $mysql = $this -> mySQLObject;
        $prepare = $mysql ->query("INSERT INTO curriculum (idUsuario) VALUES ($id);");
        if($prepare){
            return true;
        }else{
            return false;
        }
    }
    
    /**
     * createAficciones
     *
     * @param  int $idUser
     * @param  array $nombreAficcion
     * @param  array $descripcion
     * @return bool
     */
    public function createAficciones(array $aficciones,array $descripcion):bool{
        $pdo = $this -> mySQLObject;
        $idAficcion=1;
        foreach ($aficciones as $clave => $value){    
            $pdo -> query("INSERT INTO aficciones (nombreAficcion,descripcion) VALUES ('$value', '$descripcion[$clave]')");
        }
        $executePdo = $pdo -> query("INSERT INTO filtroaficcion (aficciones, curriculum) VALUES ($idAficcion, (SELECT codCurriculum FROM curriculum WHERE codCurriculum = (SELECT LAST_INSERT_ID())))");
        if($executePdo){
            $idAficcion++;
            return true;
        }else {
            return false;
        }
    }
    
    /**
     * createAptitudes
     *
     * @param  string $aptitudes
     * @return bool
     */
    public function createAptitudes(string $aptitudes):bool{
        $pdo = $this -> mySQLObject;
        $idAptitud=1;
        $pdo -> query("INSERT INTO aptitudes (nombreAptitud) VALUES ('$aptitudes')");
        $executePdo = $pdo -> query("INSERT INTO filtroaptitudes (aptitud, curriculum) VALUES ($idAptitud, (SELECT codCurriculum FROM curriculum WHERE codCurriculum = (SELECT LAST_INSERT_ID())))");
        if($executePdo){
            $idAptitud++;
            return true;
        }else {
            return false;
        }
    }
    
    /**
     * getSelectCurriculums
     * @return array
     */
    public function getSelectCurriculums(){
        $pdo = $this -> mySQLObject;
        $preparePDO = $pdo -> prepare("SELECT * FROM curriculum cur JOIN usuario usr ON usr.idUsuario = cur.idUsuario;");
        $preparePDO -> execute();
        return $preparePDO -> fetchAll(PDO::FETCH_ASSOC);
    }
}
?>