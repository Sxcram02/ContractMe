<?php
require_once("src/model/usuario.php");
require_once("src/model/curriculum.php");

/**
 * @static Controller
 * Controlador del MVC
 */
class Controller
{
    /**
     * @method @static __construct()
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * @method @static mostrarHomeUser()
     *
     * @return void
     */
    public static function mostrarHomeUser()
    {
        require_once("src/views/homeUser.php");
    }
    
    /**
     * @method @static mostrarFormLogin()
     *
     * @return void
     */
    public static function mostrarFormLogIn()
    {
        require_once("src/views/formularioLogIn.php");
    }
    
    /**
     * @method @static mostrarVistaAspirantes()
     *
     * @return void
     */
    public static function mostrarVistaAspirantes()
    {
        require_once("src/views/vistas_aspirante.php");
    }

    /**
     * @method @static sigInUser()
     * @return void
     */
    public static function sigInUser()
    {
        $isIssetValue = false;
        $insertRows = [$_POST['email'], $_POST['nameUser'], $_POST['pass'], $_POST['apellido1'], $_POST['tipoUsuario']];

        if (!empty($insertRows)) {
            $isIssetValue = true;
        } else {
            $isIssetValue = false;
        }

        if ($isIssetValue) {
            $usuario = new Usuario();
            $insert = $usuario->setInsertUser($insertRows);
            if ($insert) {
                header("Location:" . main);
            }
        }
    }

    /**
     * @method @static mostrarHome()
     * @return void views
     */
    public static function mostrarHome()
    {
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
