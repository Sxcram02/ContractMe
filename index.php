<?php

        error_reporting(E_PARSE | E_ERROR);
        
        require_once("config.inc.php");
        require_once("src/model/filter.php");

        session_start();
        require_once("public/controller/controller.inc.php");

        if (isset($_GET['accion'])){
            if(method_exists("Controller",$_GET['accion'])){
                Controller::{$_GET['accion']}();
            }
        } else {
            Controller::mostrarhomeUser();
        }
