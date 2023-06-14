<?php
    include_once("layouts/header.php");
    include_once("layouts/container.php");
    error_reporting(E_PARSE | E_ERROR);
?>
<title>CME - login</title>
<section id="GRP-formLogIn">    
    <aside></aside>
    <article class="target-logIn" id="box-content-target1">
        <div class="box-content-target" >
            <form action="../controller/usuarioC.php?opcion=login" method="post" name="logIn" class="login">
                <input type="email" name="userEmail" placeholder="Introduce tu email">
                <input type="password" name="passwd" placeholder="Introduce la contraseña">
                <input type="submit" name="iniciar" value="Iniciar" class="sentPostForm"></input>
            </form>
        </div>
        <div class="box-buttons">
            <a href="" class="init init-google"><i class='bx bxl-google-plus-circle' style='color:#bc0000; font-size:36px;'></i>Inicia con Google </a>
            <a href="" class="init init-facebook"><i class='bx bxl-facebook-square' style='color:#0032bc; font-size:36px;'></i>Inicia con Facebook </a>
        </div>
        <div class="box-buttons2">
            <a href=""">¿Olvidé mi contraseña?</a>
            <a href="?opcion=signup">No tengo una cuenta</a>
        </div>
    </article>
</section>
<?php
// include_once("layouts/footer.php");
