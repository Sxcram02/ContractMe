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
            <h4>Email: <?php echo $_SESSION['email'] ?></h4>
            <h4>Nombre: <?php echo $_SESSION['nombreUser'] ?></h4>
            <p>Rango:  <?php echo $_SESSION['typeUser'] ?></p>
        </div>
        <nav class="box-aspirante-nav-bar">
            <ul class="aspirante-nav-bar">
                <li><i class='bx bx-user' ></i>Perfil</li>
                <li><i class='bx bx-book-bookmark'></i>Cursos</li>
                <li><a href="index.php?accion=mostrarCurriculum&tipoUsuario=<?php echo $_SESSION['typeUser'] ?>&idUser=<?php echo $_SESSION['idUser'] ?>"><i class='bx bx-file' ></i>Curriculum</a></li>
                <li><i class='bx bx-file' ></i>Expediente</li>
                <li><i class='bx bx-envelope' ></i>Mensajes</li>
                <li><i class='bx bxs-contact' ></i>Contactos</li>
            </ul>
        </nav>
    </aside>
    </article>
    <acticle class="container-servicios-aspirante">
        
        <div class="box-content-servicios">

        </div>
    </acticle>
</section>
<?php
require_once("src/views/layouts/footer.php");
