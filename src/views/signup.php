<?php
    include_once("../views/layouts/header.php");
    include_once("../views/layouts/container.php");
    error_reporting(E_PARSE | E_ERROR);
?>
<title>CME - signup</title>
<form action="" method="post">
<section id="GRP-formSignUp">    
    <aside></aside>
    <article class="target-SignUp visible" id="signup-part1">
        <div class="box-content-targetSignUp1" >
            <div class="signup">
                <span class="nombre">Nombre:</span>
                <input type="text" name="nombreUsuario" id="nombreUsuario">
                <span class="apellido1">Primer Apellido:</span>
                <input type="text" name="primerApellido" id="primerApellido">
                <span class="apellido2">Segundo Apellido:</span>
                <input type="text" name="segundoApellido" id="segundoApellido">
                <span class="fechaNac">Fecha de Nacimiento:</span>
                <input type="date" name="fechaNacimiento" id="fechaNacimiento">
            </div>
            <span class="siguiente" onclick="mostrarSecondPartForm('signup-part1','signup-part2')">Siguiente</span>
        </div>
        <div class="box-buttons4">
            <a href="login.php">Ya tengo una cuenta</a>
        </div>
    </article>
    <article class="target-SignUp invisible" id="signup-part2">
    <div class="box-content-targetSignUp1" >
            <div class="signup" id="signup">
                <span class="email">Email:</span>
                <input type="email" name="email" id="email" placeholder="ejemplo@ejemplo.com">
                <span class="contrasenia">Constraseña:</span>
                <input type="password" name="P4$$" id="P4$$" placeholder="Escriba una contraseña">
                <span class="contrasenia">Confirmación:</span>
                <input type="password" name="P4$$check" id="P4$$check" placeholder="confirma la Constraseña">
                <span class="contrasenia">A que te dedicas:</span>
                <select name="tipoUsuario" id="tipoUsuario" onchange="mostrarAlgo();" class="tipoUsuario">
                    <option value="">Ninguno</option>
                    <option value="Aspirante">Estudiante</option>
                    <option value="Empresario">Empresario</option>
                    <option value="Docente">Docencia</option>
                </select>
            </div>
            <span class="siguiente" onclick="mostrarSecondPartForm('signup-part2','signup-part3')">Siguiente</span>
        </div>
        <div class="box-buttons4">
            <a href="login.php">Ya tengo una cuenta</a>
        </div>
    </article>
    <article class="target-SignUp invisible" id="signup-part3">
    <div class="box-content-targetSignUp1" >
            <div class="signup" id="signup">
                <span class="tlfmovil">Teléfono móvil:</span>
                <input type="text" name="telefonoMovil" id="telefonoMovil" placeholder="+34662112334">
                <span class="tlfTrabajo">*Teléfono trabajo:</span>
                <input type="text" name="telefonoTrabajo" id="telefonoTrabajo" placeholder="opcional">
                <span class="direccion">Dirección:</span>
                <input type="text" name="calle" id="calle" placeholder="C/Ejemplo 1">
                <span class="codigoPostal">Código Postal:</span>
                <input type="text" name="codigoPostal" id="codigoPostal" maxlength="5" placeholder="28800">
                <span class="puerta">Puerta:</span>
                <input type="text" name="edificio" id="edificio" placeholder="1ªE">
            </div>
            <input type="submit" name="guardar" value="guardar" class="guardar"></input>
        </div>
        <div class="box-buttons4">
            <a href="login.php">Ya tengo una cuenta</a>
        </div>
    </article>
</section>
</form>
<?php
// include_once("layouts/footer.php");
