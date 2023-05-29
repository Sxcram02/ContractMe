<?php
    class ControllerAspirante {

        public string $viewAspirante;
        public function __construct(){}

    public static function mostrarVistaCurriculum($idUsuario){
        $curriculum = new Curriculum();
        $createCurriculum = $curriculum -> createCurriculum($idUsuario);

        if($createCurriculum){
            require_once("src/views/layouts/homeCurriculum.php");
        }
    }

    /**
     * mostrarCurriculum
     *
     * @return void
     */
    public function mostrarCurriculum(string $typeUser,int $idUser,string $nombreUser){

        $_SESSION['typeUser'] = $typeUser;
        $_SESSION['idUser'] = $idUser;
        $_SESSION['nombreUser'] = $nombreUser;
        
        $this -> viewAspirante = "viewCurriculum";
    }
    
    }
