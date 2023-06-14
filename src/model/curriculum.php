<?php
require_once("filter.php");
require_once("aficciones.php");
require_once("aptitudes.php");

class Curriculum {
    protected object $aficciones, $aptitudes, $formación, $experiencia;
    use databaseConexion;

    function __construct(){
        
    }
    
    function createCurriculum(int $id){
        $sql = "INSERT INTO curriculum (idUsuario) VALUES ($id);";
        $mysql = databaseConexion::consulta($sql);
    }
    
    static function createAficciones(string $aficciones,string $descripcion){
        filtroAficcion::createFiltroAficcion($aficciones,$descripcion);
    }
    
    static function createAptitudes(string $aptitudes,string $iconoAptitud){
        filtroAptitud::createFiltroAptitudes($aptitudes,$iconoAptitud);
    }
    
    static function getSelectCurriculums(){
        $sql = "SELECT * FROM curriculum cur JOIN usuario usr ON usr.idUsuario = cur.idUsuario;";
        $pdo = databaseConexion::consulta($sql);
        return $pdo -> fetchAll(PDO::FETCH_ASSOC);
    }
}
?>