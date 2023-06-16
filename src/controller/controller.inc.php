<?php
session_start();

if(!isset($_SESSION['userId'])){
    $content = "<a href='usuarioC.php' >
    <i class='bx bxs-user-account' style=' font-size:36px;'></i>
    <p>Iniciar Sesión</p></a>";
    include_once("../views/homeUser.php");

}else {
    $content = "<a href='aspiranteC.php' >
    <i class='bx bxs-user-account' style=' font-size:36px;'></i>
    <p>Mi perfil</p></a>";
    include_once("../views/homeUser.php");
}