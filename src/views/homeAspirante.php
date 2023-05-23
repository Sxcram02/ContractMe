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
                <li><a href=""><i class='bx bx-user' ></i>Perfil</a></li>
                <li><a href=""><i class='bx bx-book-bookmark'></i>Cursos</a></li>
                <li><a href="src/views/index.php?servicio=mostrarCurriculum&tipoUsuario=<?php echo $_SESSION['typeUser'] ?>&idUser=<?php echo $_SESSION['idUser'] ?>&nombreUser=<?php echo  $_SESSION['nombreUser'] ?>"><i class='bx bx-file' ></i>Curriculum</a></li>
                <li><a href=""><i class='bx bx-file' ></i>Expediente</a></li>
                <li><a href=""><i class='bx bx-envelope' ></i>Mensajes</a></li>
                <li><a href=""><i class='bx bxs-contact' ></i>Contactos</a></li>
            </ul>
        </nav>
    </aside>
    </article>
    <acticle class="container-servicios-aspirante">
        
        <div class="box-content-servicios">
            <?php
                    if (isset($_GET['servicio'])){
                        if(method_exists("ControllerAspirante",$_GET['servicio'])){
                            ControllerAspirante::{$_GET['servicio']}();
                        }
                    }
            ?>
        </div>
    </acticle>
</section>
<?php
require_once("src/views/layouts/footer.php");
