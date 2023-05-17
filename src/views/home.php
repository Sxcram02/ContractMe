<?
require_once("src/views/layouts/header.php");
require_once("src/views/layouts/container.php");
?>
<section>
    <h1>INICIAR SESION</h1>
    <form action="" method="post">
        <input type="text" name="email" id="">
        <input type="password" name="pass" id="">
    </form>
    <a href="/index.php?accion=mostrarhomeAspirante"><button>iniciar</button></a>
</section>
<?
require_once("src/views/layouts/footer.php");