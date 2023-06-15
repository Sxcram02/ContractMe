<?php
require_once("layouts/header.php");
?>
<section id="container-perfil-aspirante" class="v2container-view-aspirante">
    <article class="box-perfil-intro">
        <div class="box-image-perfil">
            <img src="../img/perfil.jpeg" alt='Nada'>
        </div>
        <section class="target-info-perfil">
            <article>
                <p>Espacio Personal</p>
                <p class="nombre-aspirante"><?php echo $_SESSION['nombreUsuario'] . " " . $_SESSION['apellidos'] ?></p>
                <p class="rango"><?php echo $_SESSION['tipoUsuario'] ?></p>
            </article>
        </section>
        <section class="target-form-curriculum">
            <article class="box-event-buttons">
                <a href="http://"><i class="bx bx-pencil"></i><span>Edita</span></a>
            </article>
            <hr />
            <h2>Edita el curriculum</h2>
            <?php
            /* Consulta de la información del curriculum */
            ?>
        </section>
        <section class="target-form-aficciones">
            <article class="box-event-buttons">
                <a href="http://"><i class="bx bx-pencil"></i><span>Edita</span></a>
            </article>

            <hr />
        </section>
        <section class="target-form-aptitudes">
            <article class="box-event-buttons">
                <a href="http://"><i class="bx bx-pencil"></i><span>Edita</span></a>
            </article>

            <hr />
        </section>
        <section class="target-form-formacion">
            <article class="box-event-buttons">
                <a href="http://"><i class="bx bx-pencil"></i><span>Edita</span></a>
            </article>

            <hr />
        </section>
        <section class="target-form-experiencia">
            <article class="box-event-buttons">
                <a href="http://"><i class="bx bx-pencil"></i><span>Edita</span></a>
            </article>

            <hr />
        </section>
    </article>
</section>