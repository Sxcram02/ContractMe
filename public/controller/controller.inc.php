<?php
require_once("src/model/usuario.php");
class Controller
{
    public function __construct()
    {
    }
    public static function mostrarhomeUser()
    {
        require_once("src/views/homeUser.php");
    }

    public static function mostrarFormLogIn()
    {
        require_once("src/views/formularioLogIn.php");
    }

    public static function mostrarCurriculum(){
        $_SESSION['typeUser'] = $_GET['tipoUsuario'];
        $_SESSION['idUser'] = $_GET['idUser'];
        require_once("src/views/viewCurriculum.php");
    }

    public static function sigInUser()
    {
        $insertRows = [$_POST['email'], $_POST['nameUser'], $_POST['pass'], $_POST['apellido1'], $_POST['tipoUsuario']];

        $usuario = new Usuario();
        $insert = $usuario->setInsertUser($insertRows);
        if ($insert) {
            header("Location:" . main);
        }
    }

    public static function mostrarHome()
    {
        $email = $_POST['email'];
        $pass = $_POST['passwd'];

        $usuario = new Usuario();

        if ($dbFilas = $usuario->getUserSelect($email, $pass)) {
            $emailTest = $dbFilas[0]['email'];

            if ($email == $emailTest) {

                session_start();

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
