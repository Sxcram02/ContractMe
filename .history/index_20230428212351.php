<?php
?>
<!DOCTYPE html>
<html lang="es">

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

            <script src="js/funciones.inc.js"></script>

            <img src="./img/logo.png" width="100px" height="100px" alt="LogoCentro" id="logoCIFP">

            <h2 class="GRP1-titles">Registro</h2>

            <form method="post" action="#" id="GRP1-formulario-login">

                <span>Introducir Gmail:</span><input class="GRP1-input GRP1-texto" type="text" />

                <span>Introducir contraseña: </span>

                <input type="password" name="contrasenya" class="GRP1-input GRP1-input-texto GRP1-texto"
                    id="contrasenya">

                <div class="GRP1-box-passwordd">
                    <input type="checkbox" onclick="mostrarContrasenya()" class="GRP1-checkbox">

                    <span>Mostrar constraseña</span>
                </div>

                <input class="GRP1-input GRP1-input-botones" type="button" value="Iniciar sesión" />

                <hr />

                <input class="GRP1-input GRP1-input-botones" type="button" value="Crear cuenta" />

                <input class="GRP1-input GRP1-input-botones" type="button" value="Ver aspirantes" />
            </form>
        </div>
    </main>
    <footer id="GRP1-footer">
        <p>Copyright &copy; 2023 by CIFP</p>
    </footer>
</body>

</html>