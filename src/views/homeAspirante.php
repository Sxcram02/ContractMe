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
                <li><button type="submit"><i class='bx bx-user' ></i>Perfil</button></li>
                <li><button type="submit"><i class='bx bx-book-bookmark'></i>Cursos</button></li>
                <li><button type="submit"><i class='bx bx-file' ></i>Curriculum</button></li>
                <li><button type="submit"><i class='bx bx-file' ></i>Expediente</button></li>
                <li><button type="submit"><i class='bx bx-envelope' ></i>Mensajes</button></li>
                <li><button type="submit"><i class='bx bxs-contact' ></i>Contactos</button></li>
            </ul>
        </nav>
    </aside>
    </article>
    <acticle class="container-servicios-aspirante">
        
        <div class="box-content-servicios">
            <?php
                require_once("public/controller/controllerAspirante.inc.php");
                $viewAspirant = new ControllerAspirante();

                $viewAspirant -> mostrarCurriculum("aspirante","21","demonHate");
                
                require_once("src/views/".$viewAspirant -> viewAspirante.".php");
            ?>
        </div>
    </acticle>
</section>
<?php
require_once("src/views/layouts/footer.php");
