<?php
require_once("layouts/header.php");
error_reporting(E_ERROR | E_PARSE );
session_start();
?>
<title>mi perfil</title>
<main id="GRP-homeAspirante">
<section class="box-home-aspirante">
    <article class="container-presentacion-aspiarnte">
        <aside class="box-presentacion">
            <div class="box-imagen-perfil">
                <i class='bx bx-user-circle' style="font-size: 46px; font-weight:400;"></i>
                <h4>Nombre: <?php echo  $_SESSION['nombreUsuario'] ?></h4>
                <p>Rango: <?php echo  $_SESSION['tipoUsuario'] ?></p>
            </div>
            <nav class="box-aspirante-nav-bar">
                <ul class="aspirante-nav-bar">
                    <li><button id="option" type="submit" onclick="mostrarButonOption(this,'container-perfil-aspirante');" value="perfil"><i class='bx bx-user'></i>Perfil</button></li>

                    <li id="option"><button type="submit" onclick="mostrarButonOption(this,'container-cursos-aspirante');"><i class='bx bx-book-bookmark'></i>Cursos</button></li>

                    <li><button id="option" onclick="mostrarButonOption(this,'container-creacion-curriculum');" value="curriculum"><i class='bx bx-file'></i>Curriculum</button></li>

                    <li><button type="submit"><i class='bx bx-file'></i>Expediente</button></li>

                    <li><button type="submit"><i class='bx bx-envelope'></i>Mensajes</button></li>

                    <li><button type="submit"><i class='bx bxs-contact'></i>Contactos</button></li>
                </ul>
            </nav>
        </aside>
    </article>
    <acticle class="container-servicios-aspirante">
        <div class="box-content-servicios" id="box-content-servicios">
            <?php
                require_once("viewPerfilAspirante.php");
                require_once("viewFormCurriculum.php");
            ?>
        </div>
    </acticle>
</section>
</main>
<?php
// require_once("layouts/footer.php");
