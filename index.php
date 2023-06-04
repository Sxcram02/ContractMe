<?php

error_reporting(E_PARSE | E_ERROR);
require_once("config.inc.php");
require_once("src/model/filter.php");

session_start();
require_once("public/controller/controller.inc.php");
require_once("public/controller/controllerAspirante.inc.php");

if (isset($_GET['accion'])) {
    if (method_exists("Controller", $_GET['accion'])) {
        Controller::{$_GET['accion']}();
    }
} elseif (isset($_GET['option'])) {
    ControllerAspirante::{$_GET['option']}();
} else {
    Controller::mostrarHomeUser();
}
