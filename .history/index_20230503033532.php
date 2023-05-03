<?php
    session_start();
    
    include("./public/obj/clases.inc.php");
    include("./public/function/funciones.inc.php");
    

    error_reporting(E_ERROR | E_PARSE);
    $mySqlObject = new Database("localhost","root","mdv21.389863","contractMe");
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $userEmailLogin = $_POST['email'];
        $userPassLogin = $_POST['contrasenya'];
        $valueOption = $_POST['option'];

        if($valueOption == "Iniciar Sesion") {    
            if(empty($userEmailLogin) or empty($userPassLogin)){
                false;
            }
            getAccount($valueOption, $userEmailLogin,$userPassLogin);
            $_SESSION['user']= $userEmailLogin;
            echo "<h1>HOLAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA</h1>";
            exit();
        }

        if($valueOption == "Crear cuenta"){
            $_SESSION['user2'] ="invitado";
            setAccount($valueOption);
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="es_es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" href="/img/logo.png" type="image/x-icon">
    <title>Página inicio</title>
</head>

<body id="GRP1-root">
    <header id="GRP1-header">

        <nav id="GRP1-nav-bar">
            <img src="img/logo.png" height="60px" alt="logo_CIFP">

            <h2>ContrataMe</h2>
        </nav>

    </header>
    <main id="GRP1-main">
        <div class="GRP1-contenedor-foto"></div>

        <div class="GRP1-contenedor-formulario">

            <script src="./public/js/funciones.inc.js"></script>

            <img src="./img/logo.png" alt="LogoCentro" id="GRP1-logoCIFP">

            <h2 class="GRP1-titles">Registro</h2>

            <form method="post" action="#" id="GRP1-formulario-login">

                <span>Introducir Gmail o nombre de usuario:</span>
                <input class="GRP1-input GRP1-texto" type="text" name="email" id="email" />

                <span>Introducir contraseña: </span>

                <input type="password" name="contrasenya" class="GRP1-input GRP1-input-texto GRP1-texto"
                    id="contrasenya" />

                <div class="GRP1-box-passwordd">
                    <input type="checkbox" onclick="mostrarContrasenya()" class="GRP1-checkbox">

                    <span>Mostrar constraseña</span>
                </div>

                <input class="GRP1-input GRP1-input-botones" type="submit" value="Iniciar Sesión" name="option" />

                <hr />

                <input class="GRP1-input GRP1-input-botones" type="submit" value="Crear cuenta" name="option2" />

                <input class="GRP1-input GRP1-input-botones" type="submit" value="Ver aspirantes" name="option3"
                    disabled />
            </form>
        </div>
    </main>
    <footer id="GRP1-footer">
        <p>Copyright &copy; 2023 by CIFP</p>
    </footer>
</body>

</html>