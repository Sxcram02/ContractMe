<?php
    
    /**
     * ControllerAspirante
     * @param string $viewAspirante
     */
    class ControllerAspirante {

        public string $viewAspirante;        
        /**
         * @method @static __construct()
         *
         * @return void
         */
        public function __construct(){}
    
    /**
     * @method @static mostrarVistaCurriculum()
     *
     * @return void
     */
    public static function mostrarVistaCurriculum(){
        $idUsuario = $_SESSION['idUser'];
        $curriculum = new Curriculum();
        $createCurriculum = $curriculum -> createCurriculum($idUsuario);

        if($createCurriculum){
            require_once("src/views/layouts/homeCurriculum.php");
            if(isset($_POST['guardarCurriculum'])){
                $nombre = $_POST['nombreAficcion'];
                $descripcion = $_POST['descripcionAficcion'];
                $curriculum -> createAficciones($nombre,$descripcion);
            }
        }else{
            require_once("src/views/homeAspirante.php");
        }
    }

    /**
     * @method mostrarCurriculum()
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
