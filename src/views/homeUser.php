<?php
    require_once("../views/layouts/header.php");
    require_once("../views/layouts/container.php");
?>
    <title>CME - pagina de inicio</title>
    <section id="homeUser">
        <article id="title-homeUser">
            <div class="box-titles-homeUsers">
                <h1>C O N T R A T A M E</h1>
                <p>CIFP Nº1 Ceuta</p>
            </div>
        </article>
        <article id="modelo3D-homeUser">
            <script type="module" src="https://unpkg.com/@splinetool/viewer@0.9.362/build/spline-viewer.js"></script>
            <spline-viewer url="https://prod.spline.design/aCc5ZZNdN-KKXcqI/scene.splinecode"></spline-viewer>
        </article> 
    </section>
<?php
    require_once("../views/services.php");
?>