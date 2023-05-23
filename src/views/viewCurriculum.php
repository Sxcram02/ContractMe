<?php

    if($_SESSION['typeUser'] != "aspirante" || !isset($_SESSION['idUser'])){
        header("Location:".main);
        exit();
    }
?>
<section class="container-creacion-curriculum">
    <form action="index.php?accion=mostrarVistaCurriculum" method="post">
        <article class="box-inputs">
            <label>Nombre del autor:</label>
            <input type="text" name="nombreCurriculum" value="<?php echo $_SESSION['nombreUser']
            ?>" placeholder="<?php echo $_SESSION['nombreUser']
            ?>">
            <label>Apellido del autor:</label>
            <input type="text" name="apellidoCurriculum">
            <label>Cuentanos sobre ti:</label>
            <textarea name="introCurriculum" cols="30" rows="10"></textarea>
            <label>Fecha de nacimiento:</label>
            <input type="date" name="fechaNac" >
            <label>Telefono movil</label>
            <input type="text" name="tlfMovil" >
            <input type="submit" value="guardar" name="guardarCurriculum">
        </article>
    </form>
</section>