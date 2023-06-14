<?php
    session_start();
    if(isset($_SESSION['userId'])){
        include_once("../views/homeAspirante.php");
        if($_POST['guardarCurriculum']){
        }
    }else {
        header("Location: ./usuarioC.php");
    }