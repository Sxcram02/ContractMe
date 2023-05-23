<?php

/**
 * Curriculum Model
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
     *
     * @param  int $id
     * @return bool
     */
    public function createCurriculum(int $id):bool {
        $mysql = $this -> mySQLObject;
        $countCurr = rand(1,1000);

        $prepare = $mysql -> prepare("INSERT INTO curriculum (idUsuario) VALUES (:id)");
        $prepare -> bindValue(":id",$id);
        $executePDO = $prepare -> execute();

        if($executePDO){
            return true;
        }else{
            return false;
        }
    }

    public function createAficciones($idUser){
        $pdo = $this -> mySQLObject;
        $idAficcion=1;

        $pdo -> prepare("INSERT INTO aficciones (idAficcion,nombreAficcion,descripcion) VALUES (:idAficcion, :nombreAficcion, :descripcion)");

        $pdo -> prepare("INSERT INTO filtroaficciones (aficciones, curriculum) VALUES (:idAficcion, (SELECT codCurriculum FROM curriculum WHERE idUsuario = :idUser))");

        $pdo -> bindValue(":idUser",$idUser);
        $pdo -> bindValue(":idAficcion",$idAficcion);

        $executePdo= $pdo -> execute();
        $idAficcion++;

        if($executePdo){
            return true;
        }else {
            return false;
        }
    }

    public function getSelectCurriculums(){
        $pdo = $this -> mySQLObject;
        $preparePDO = $pdo -> prepare("SELECT * FROM curriculum cur JOIN usuario usr ON usr.idUsuario = cur.idUsuario;");
        $preparePDO -> execute();
        return $preparePDO -> fetchAll(PDO::FETCH_ASSOC);
    }
}
?>