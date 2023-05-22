<?php
require_once("src/views/layouts/header.php");
require_once("src/views/layouts/container.php");
?>
<title>logging</title>
<section id="GRP-formLogIn">
    <script src="/public/js/funciones.inc.js"></script>
    <article class="target-LogIn" id="box-content-target1">
        <div class="box-content-target" >
            <div class="box-buttons">
                <button  type="submit" onclick="mostrarFormulario('box-content-target2','box-content-target1')">INICIAR SESIÓN</button>
                <button  type="submit" onclick="mostrarFormulario('box-content-target1','box-content-target2')">REGISTRARSE</button>
            </div>
            <form action="index.php?accion=mostrarHome" method="post" name="logIn">
                <input type="email" name="email" placeholder="Introduce tu email">
                <input type="password" name="passwd" placeholder="Introduce la contraseña">
                <input type="submit" name="iniciar" value="Iniciar" class="sentPostForm"></input>
            </form>
        </div>
    </article>

    <article class="target-LogIn" id="box-content-target2">
        <div class="box-content-target" >
        <div class="box-buttons">
            <button  type="submit" onclick="mostrarFormulario('box-content-target2','box-content-target1')">INICIAR SESIÓN</button>
            <button  type="submit" onclick="mostrarFormulario('box-content-target1','box-content-target2')">REGISTRARSE</button>
        </div>
        <form action="index.php?accion=sigInUser" method="post">
            <input type="email" name="email" placeholder="INGRESE EMAIL"></br>
            <input type="password" name="pass" placeholder="CONTRASEÑA"></br>
            <input type="text" name="nameUser" placeholder="INGRESE EL NOMBRE DE USUARIO"></br>
            <input type="text" name="apellido1" placeholder="PRIMER APELLIDO"></br>
            <select name="tipoUsuario">
                <option value="aspirante">Aspirante</option>
                <option value="docente">Docente</option>
                <option value="empresario">Empresario</option>
            </select>
            <input type="submit" value="guardar" class="sentPostForm" name="user">
        </form>
        </div>
    </article>
    <article class="box-model3D">
        <img src="/public/img/version_3.gif" alt="logoCIFP">
    </article>
</section>
<?php
require_once("src/views/layouts/footer.php");
