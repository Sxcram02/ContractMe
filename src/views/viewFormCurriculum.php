<form action="" method="post">
<div id="container-creacion-curriculum" class="container-view-aspirante">
    <script src="../../public/js/funciones.inc.js"></script>
    <article class="box-creacion-curriculum box1-form-curriculum">
        <h3>INTRODUCCIÓN:</h3>
            <article class="box-inputs">
                <label>Nombre del autor:</label>
                <input type="text" name="nombreCurriculum">
                <label>Apellido del autor:</label>
                <input type="text" name="apellidoCurriculum">
                <label>Cuentanos sobre ti:</label>
                <textarea name="introCurriculum" cols="10" rows="4"></textarea>
                <label>Fecha de nacimiento:</label>
                <input type="date" name="fechaNac">
                <label>Telefono movil</label>
                <input type="text" name="tlfMovil">
            </article>
    </article>
    <article class="box-creacion-curriculum box2-form-curriculum">
        <h3>AFICCIONES:</h3>
            <article class="box-inputs">
                <label>Nombre aficcion:</label>
                <input type="text" name="nombreAficcion">
                <label>Cuentanos sobre ti:</label>
                <textarea name="descripcionAficcion" cols="10" rows="4"></textarea>
            </article>
    </article>
    <article class="box-creacion-curriculum box3-form-curriculum">
        <h3>APTITUDES:</h3>
            <article class="box-inputs">
                <label for="">Nombre Aptitud</label>
                <input type="text" name="nombreAptitud">
                <label for="">icono</label>
                <input type="file" name="iconoAptitud">
            </article>
    </article>
    <article class="box-creacion-curriculum box4-form-curriculum">
        <h3>LOCALIDAD:</h3>
            <article>
                <label for="">Localidad</label>
                <select name="localidadAspirante" id="">
                    <?php
                        $localidades = ["Madrid","Ceuta","Andalucía","Extremadura","Castilla-Leon","Castilla-LaMancha","Valencia"];
                        for($provincias=0;$provincias<5;$provincias++){
                            echo "<option value=".$localidades[$provincias]."'>".$localidades[$provincias]."</option>";
                        }
                    ?>
                </select>
                <input type="text" name="calleDomicilio" id="" placeholder="Calle">
                <input type="text" name="edifioPlanta" id="" placeholder="Ejemplo 1ºA">
            </article>
            <article>
                <div>
                    <label for="">Código postal:</label>
                    <input type="number" name="codigoPostalAspirante" id="" maxlength="5">
                </div>
                <span onclick="mostrarSecondPartForm('container-creacion-curriculum','container2-creacion-curriculum');">Siguiente</span>
            </article>
    </article>
</div>
<div id="container2-creacion-curriculum" class="container-view-aspirante">
    <section class="box2-creacion-curriculum">
        <article class="box2-1-creacion-curriculum">
            <h3>EXPERIENCIA:</h3>
            <input type="text" name="nombreEmpresaExperiencia" id="">
            <input type="date" name="fechaInicioExperiencia" id="">
            <input type="date" name="fechaFinExperiencia" id="">
            <select name="sectorEmpresa" id="">
                <option value="informatica">Informática</option>
                <option value="marketing y comercio">Marketing y >Comercio</option>
                <option value="administracion">Administración</option>
            </select>
        </article>
        <article class="box2-2-creacion-curriculum">
            <h3>FORMACIÓN:</h3>
        </article>
        <article class="box2-3-creacion-curriculum">
        <span onclick="mostrarSecondPartForm('container2-creacion-curriculum','container-creacion-curriculum');">Atrás</span>
            <input type="submit" value="guardar" name="guardarCurriculum">
        </article>
    </section>
</div>
</form>