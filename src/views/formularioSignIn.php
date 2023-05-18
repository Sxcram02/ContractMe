<?php
    require_once("src/views/layouts/header.php");
    require_once("src/views/layouts/container.php");
?>
    <h1>Estas en el formulario de creacion</h1>
    <form action="" method="get">
        <input type="email" name="email" id="" placeholder="INGRESE EMAIL"></br>
        <input type="password" name="pass" id="" placeholder="INGRESE CONTRASEÑA"></br>
        <input type="submit" value="edit" name="user">
        <input type="hidden" name="accion" value="mostrarhomeAspirante">
    </form>
<?
    require_once("./layouts/footer.php");
?>