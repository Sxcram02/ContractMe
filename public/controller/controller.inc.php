<?php
require_once("src/model/usuario.php");
class Controller {
    public function __construct(){}

    public static function mostrarhomeUser(){
        require_once("src/views/homeUser.php");
    }


    public static function mostrarFormLogIn(){
        $usuario = new Usuario();
        $dataUser = array();
        $usuario -> getSelectUser($dataUser);
        require_once("src/views/formularioLogIn.php");
    }

    public static function newuser(){
        require_once("src/views/formularioSignIn.php");
    }

    public static function guardar(){
        $email=$_REQUEST['email'];
        $pass=$_REQUEST['pass'];

        $usuario = new Usuario();
        $insert = $usuario -> setInsertUser($email,$pass);
        header("Location:".main);
    }

    public static function mostrarhomeAspirante(){
        $email = $_REQUEST['email'];
        $pass = $_REQUEST['pass'];

        $usuario = new Aspirante();
        $dbFilas= $usuario -> getSelectAspirante("admin@admin.com","123456");

        if($email = $dbFilas){
            require_once("src/views/homeAspirante.php");
            echo var_dump($dbFilas);
        }else{
            header("Loaction:".main);
        }
    }

    public static function mostrarRegistroUser(){
        require_once("src/views/formularioSignIn.php");
    }
}
?>