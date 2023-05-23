<?php
    class ControllerAspirante {
        public function __construct(){}

    public static function mostrarVistaCurriculum(){
        $curriculum = new Curriculum();
        $idUsuario = $_SESSION['idUser'];

        $createCurriculum = $curriculum -> createCurriculum($idUsuario);

        if($createCurriculum){
            require_once("src/views/layouts/homeCurriculum.php");
        }else {
            require_once("src/views/viewCurriculum.php");
        }
    }

    /**
     * mostrarCurriculum
     *
     * @return void
     */
    public static function mostrarCurriculum(){
        $_SESSION['typeUser'] = $_GET['typeUser'];
        $_SESSION['idUser'] = $_GET['idUser'];
        $_SESSION['nombreUser'] = $_GET['nombreUser'];
        
        require_once("src/views/viewCurriculum.php");
    }
    
    }
