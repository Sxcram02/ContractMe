<?php
require_once("./../../config.inc.php");
require_once("../model/filter.php");
require_once("../model/usuario.php");

session_start();
error_reporting(E_PARSE | E_ERROR);

switch ($_GET['opcion']) {
    case $_GET['opcion'] == "login":
        if (isset($_POST['iniciar'])) {
            $usuario = Usuario::obtenerUsuario($_POST['passwd'], $_POST['userEmail']);

            if ($usuario && $_POST['userEmail'] == $usuario->__get("email")) {
                $_SESSION['userId'] = $usuario->__get("idUsuario");
                $_SESSION['nombreUsuario'] = $usuario->__get("nombreUsuario");
                $_SESSION['tipoUsuario'] = $usuario->__get("tipoUsuario");
                $_SESSION['emailUsuario'] = $usuario->__get("email");

                match ($usuario->__get("tipoUsuario")) {
                    "Aspirante" => header("Location: ./aspiranteC.php")
                };
            }
        } else {
            include_once("../views/login.php");
        }
        break;

    case $_GET['opcion'] == "signup":
        if(isset($_POST['guardar'])){
            $userArrayData = [$_POST['nombreUsuario'],$_POST['primerApellido'],$_POST['segundoApellido'],$_POST['P4$$'],$_POST['email'],$_POST['fechaNacimiento'],$_POST['tipoUsuario']];
        
            $resultado = Usuario::setInsertUser($userArrayData);

            if($resultado){
                $usuario = Usuario::obtenerUsuario($_POST['P4$$'], $_POST['email']);

                $_SESSION['userId'] = $usuario->__get("idUsuario");
                $_SESSION['nombreUsuario'] = $usuario->__get("nombreUsuario");
                $_SESSION['tipoUsuario'] = $usuario->__get("tipoUsuario");
                $_SESSION['emailUsuario'] = $usuario->__get("email");

                match ($usuario->__get("tipoUsuario")) {
                    "Aspirante" => header("Location: ./aspiranteC.php")
                };
            }
        }else {
            include_once("../views/signup.php");
        }
        
        break;
    default:
        include_once("../views/login.php");
        break;
}
