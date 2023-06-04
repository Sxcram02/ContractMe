<section name="container-creacion-curriculum" id="container-creacion-curriculum">
        <form action="index.php" method="post">
            <article class="box-inputs">
                <label>Nombre del autor:</label>
                <input type="text" name="nombreCurriculum">
                <label>Apellido del autor:</label>
                <input type="text" name="apellidoCurriculum">
                <label>Cuentanos sobre ti:</label>
                <textarea name="introCurriculum" cols="30" rows="10"></textarea>
                <label>Fecha de nacimiento:</label>
                <input type="date" name="fechaNac" >
                <label>Telefono movil</label>
                <input type="text" name="tlfMovil" >
                <input type="submit" value="siguiente" onclick="mostrarFormAficciones();">
            </article>
        </form>
    </section>