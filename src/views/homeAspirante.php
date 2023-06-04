<?php
require_once("src/views/layouts/header.php");
require_once("src/views/layouts/container.php");
error_reporting(E_ERROR | E_PARSE | E_WARNING);

if(!isset($_SESSION['typeUser']) || $_SESSION['typeUser'] != 'aspirante'){
    header("Location:".main);
    exit();    
}
?>
<title>mi perfil</title>
<section class="box-home-aspirante">
<script src="public/js/funciones.inc.js"></script>
    <article class="container-presentacion-aspiarnte">
    <aside class="box-presentacion">
        <div class="box-imagen-perfil">
            <i class='bx bx-user-circle' style="font-size: 150px; font-weight:400;" ></i>
            <h4>Email: <?php echo  $_SESSION['email'] ?></h4>
            <h4>Nombre: <?php echo  $_SESSION['nombreUser'] ?></h4>
            <p>Rango:  <?php echo  $_SESSION['typeUser'] ?></p>
        </div>
        <nav class="box-aspirante-nav-bar">
            <ul class="aspirante-nav-bar">
                <li id="perfil_option"><button type="submit" onclick="mostrarButonOption('perfil_option','container-creacion-curriculum');"><i class='bx bx-user' ></i>Perfil</button></li>

                <li id="cursos_option"><button type="submit" onclick="mostrarButonOption('cursos_option','container-creacion-curriculum');"><i class='bx bx-book-bookmark'></i>Cursos</button></li>

                <li id="curriculum_option"><button onclick="mostrarButonOption('curriculum_option','container-creacion-curriculum');"><i class='bx bx-file'></i>Curriculum</button></li>

                <li id="expediente_option"><button type="submit" onclick="mostrarButonOption('expediente_option','container-creacion-curriculum');"><i class='bx bx-file' ></i>Expediente</button></li>

                <li id="mensajes_option"><button type="submit" onclick="mostrarButonOption('mensajes_option','container-creacion-curriculum');"><i class='bx bx-envelope'></i>Mensajes</button></li>

                <li id="contactos_option"><button type="submit" onclick="mostrarButonOption('contactos_option','container-creacion-curriculum');"><i class='bx bxs-contact' ></i>Contactos</button></li>
            </ul>
        </nav>
    </aside>
    </article>
    <acticle class="container-servicios-aspirante">
        <div class="box-content-servicios" id="box-content-servicios">
            <?php
                require_once("viewFormCurriculum.php");
            ?>
        </div>
    </acticle>
</section>
<?php
require_once("src/views/layouts/footer.php");
