<?php
require_once("src/views/layouts/header.php");
require_once("src/views/layouts/container.php");
?>
<section id="GRP-formLogIn">
    <article class="target-LogIn">
        <div class="box-content-target">
            <h1>INICIAR SESION</h1>
            <form action="" method="post">
                <span>EMAIL:</span>
                <input type="text" name="email" placeholder="Introduce tu email" id="">
                <span>CONSTRASEÑA:</span>
                <input type="password" name="pass" id="" placeholder="Introduce la contraseña">
            </form>
            <a href="/index.php?accion=mostrarhomeAspirante"><button>iniciar</button></a>
        </div>
    </article>
</section>
<?php
require_once("src/views/layouts/footer.php");
