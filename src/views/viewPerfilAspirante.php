<?php
require_once("../views/layouts/header.php");
?>
<section id="container-perfil-aspirante" class="v2container-view-aspirante">
    <article class="box-perfil-intro">
        <div class="box-image-perfil">
            <img src="../img/perfil.jpeg" alt='Nada'>
        </div>
        <h1>Espacio Personal</h1>
        <section class="target-info-perfil">
            <article>
                <p class="nombre-aspirante"><?php echo $_SESSION['nombreUsuario'] . " " . $_SESSION['apellidos'] ?></p>
                <p class="rango"><?php echo $_SESSION['tipoUsuario'] ?></p>
            </article>
        </section>
        <h1>Edita el curriculum</h1>
        <h1>Introducción</h1>
        <section class="target-form-curriculum">
            <article class="box-event-buttons">
                <a href="http://"><i class="bx bx-pencil"></i><span>Edita</span></a>
            </article>
            <hr />
            <?php
            /* Consulta de la información del curriculum */
            ?>
        </section>
        <h1>Aficciones</h1>
        <section class="target-form-aficciones">
            <article class="box-event-buttons">
                <a href="http://"><i class="bx bx-pencil"></i><span>Edita</span></a>
            </article>

            <hr />
        </section>
        <h1>Aptitudes</h1>
        <section class="target-form-aptitudes">
            <article class="box-event-buttons">
                <a href="http://"><i class="bx bx-pencil"></i><span>Edita</span></a>
            </article>

            <hr />
        </section>
        <h1>Formación</h1>
        <section class="target-form-formacion">
            <article class="box-event-buttons">
                <a href="http://"><i class="bx bx-pencil"></i><span>Edita</span></a>
            </article>

            <hr />
        </section>
        <h1>Experiencias</h1>
        <section class="target-form-experiencia">
            <article class="box-event-buttons">
                <a href="http://"><i class="bx bx-pencil"></i><span>Edita</span></a>
            </article>

            <hr />
        </section>
    </article>
</section>