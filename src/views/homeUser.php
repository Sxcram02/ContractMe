<?php
    require_once("src/views/layouts/header.php");
    require_once("src/views/layouts/container.php");
    error_reporting(E_PARSE | E_ERROR);
?>
    <title>inicio</title>
    <section id="GRP-homeUser">
        <article id="GRP-IntroObjective" class="homeArticle">
            <h1>Nuestro objetivo...</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere atque vero magni voluptatum itaque pariatur. Distinctio fugiat numquam saepe id dolorem recusandae ipsum voluptates atque, officiis iusto exercitationem totam velit quod illum maxime dolores dolor suscipit quos? Odit eaque explicabo dolorem tenetur magnam nisi, alias provident reiciendis, autem accusamus aliquid temporibus sunt qui facere ut fuga aliquam corporis mollitia id?</p>
            <h3>Contratar nunca ha sido tan facil como ahora...</h3>
        </article>
        <article id="GRP-logo3DModel" class="homeArticle">
            <img src="/public/img/version_3.gif" alt="logoCIFP">
        </article>
    </section>
    <section id="GRP-services">
        <h1>SOMOS DE CONFIANZA</h1>
        <p>Empieza ahora a buscar tus aspirantes o encuentra al empresario perfecto</p>
        
            <button><a href="/index.php?accion=mostrarFormLogIn">VAMOS A ELLO<i class='bx bx-right-arrow-alt' style='color:#fffefe; font-size: 26px;'></i></a></button>
    </section>
<?php
require_once("src/views/services.php");
?>