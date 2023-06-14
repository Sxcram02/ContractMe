<?php

if(!isset($_GET['accion'])){
    include_once("../views/homeUser.php");

}else {
    match ($_GET['accion']) {
        "mostrarFormLogin" => header("Location: ./usuarioC.php"),
        "mostrarVistaAspirante" => header("Location: ./aspiranteC.php"),
    };

}