<?php
require_once("src/model/usuario.php");
require_once("src/model/curriculum.php");

/**
 * Controller
 * Controlador del MVC
 */
class Controller
{
    public function __construct(){}

    public static function mostrarhomeUser(){
        require_once("src/views/homeUser.php");
    }

    public static function mostrarFormLogIn(){
        require_once("src/views/formularioLogIn.php");
    }
    
    public static function mostrarVistaAspirantes(){
        require_once("src/views/vistas_aspirante.php");
    }

    /**
     * sigInUser
     *
     * @return void
     */
    public static function sigInUser(){
        $isIssetValue = false;
        $insertRows = [$_POST['email'], $_POST['nameUser'], $_POST['pass'], $_POST['apellido1'], $_POST['tipoUsuario']];

        for($count=0;$count<count($insertRows);$count++){
            if(!empty($insertRows[$count])){
                $isIssetValue = true;
            }else {
                $isIssetValue = false;
            }
        }

        if($isIssetValue){
            $usuario = new Usuario();
            $insert = $usuario->setInsertUser($insertRows);
            if ($insert) {
                header("Location:" . main);
            }
        }
    }
    
    /**
     * mostrarHome
     *
     * @return void view
     */
    public static function mostrarHome(){
        $email = $_POST['email'];
        $pass = $_POST['passwd'];

        $usuario = new Usuario();

        if ($dbFilas = $usuario->getUserSelect($email, $pass)) {
            $emailTest = $dbFilas[0]['email'];

            if ($email == $emailTest) {

                $_SESSION['idUser'] = $dbFilas[0]['idUsuario'];
                $_SESSION['typeUser'] = $dbFilas[0]['tipoUsuario'];
                $_SESSION['nombreUser'] = $dbFilas[0]['nombreUser'];
                $_SESSION['email'] = $dbFilas[0]['email'];

                match ($_SESSION['typeUser']) {
                    'aspirante' => require_once("src/views/homeAspirante.php"),
                    'empresario' => require_once("src/views/homeEmpresario.php"),
                    'docente' => require_once("src/views/homeDocente.php")
                };
                exit();
            }
        } else {
            header("Location:" . main);
        }
    }
}
