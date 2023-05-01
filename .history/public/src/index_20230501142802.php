<?php
    include("/public/function/funciones.inc.php");
    session_start();
    if(!isset($_SESSION['user'])){
        header("/index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="es_es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/estilos.css">
    <title>Accceso a web</title>
</head>

<body id="GRP4-root">
    <header id="GRP4-header">
        <img src="./img/logo.png" alt="Logo cifpCeuta">
        <h1 class="GRP4-titles">Contratame</h1>
        <input type="submit" name="logOut" onclick="<?php doLogOut(); ?>" style="width:100px; backgorund-color:red;" />
    </header>
    <main id="GRP4-main">
        <script src="../js/funciones.inc.js"></script>
        <h1 class="GRP4-titles">Crea tu cuenta</h1>
        <h2 class="GRP4-subtitle">Datos Personales</h2>
        <div id="GRP4-box-content">
            <form id="GRP4-formulario-signIn">
                <section class="GRP4-section" id="GRP4-section1">

                    <article class="GRP4-articles" id="GRP4-articleName">
                        <input type=" text" name="NombreUsuario" placeholder="Nombre" class="GRP4-inputs">

                        <input type="text" name="PrimerApellidoUsuario" placeholder="Primer Apellido"
                            class="GRP4-inputs">

                        <input type="text" name="SegundoApellidoUsuario" placeholder="Segundo Apellido"
                            class="GRP4-inputs">
                    </article>

                    <article class="GRP4-articles" id="GRP4-articleDate">
                        <label for="Fecha" id="GRP4-label">Fecha de nacimiento:</label>

                        <input id="Fecha" type="date" name="Fechadenacimiento" placeholder="Fecha" class="GRP4-inputs">

                        <select name="GradosSuperiores" class="GRP4-inputs">
                            <option value="">Selecciona una opción</option>
                            <option value="informatica">Informática</option>
                            <option value="marketing">Marketing</option>
                            <option value="finanzas">Finanzas</option>
                            <option value="administracion">Administración</option>

                        </select>
                    </article>

                    <article class="GRP4-articles" id="GRP4-articleUser">
                        <input type="text" id="correo" name="correoElectronico" placeholder="Correo"
                            class="GRP4-inputs">

                        <input type="text" id="contraseña" name="contraseñaCorreo" placeholder="Contraseña"
                            class="GRP4-inputs">

                        <input type="text" id="repetir" name="repetirContraseña" placeholder="Repetir Contraseña"
                            class="GRP4-inputs">
                    </article>

                    <article class="GRP4-articles" id="GRP4-articleHome">
                        <input type="number" id="codigo" class="GRP4-inputNumber GRP4-inputs" name="codigoPostal"
                            placeholder="CP">

                        <input type="number" class="GRP4-inputNumber GRP4-inputs" name="Telefono"
                            placeholder="Teléfono">

                        <input type="text" id="direccion" name="direccionUsuario" placeholder="Dirección"
                            class="GRP4-inputs">

                        <div class="enviar">
                            <input type="submit" value="Enviar" id="GRP4-sent" class="GRP4-inputs">
                        </div>
                    </article>

                </section>
            </form>
            <section class="GRP4-section" id="GRP4-section2">

                <article class="GRP4-articles" id="GRP4-experiencie">
                    <h2 class="GRP4-subtitle">Experiencia profesional</h2>
                    <div id="contenedorExperiencia">

                        <div class="contenedorInputs">
                            <input type="date" id="fecha" name="fechaInicioExperiencia" placeholder="2019"
                                class="GRP4-inputs">
                            <input type="date" id="fecha" name="fechaFinalExperiencia" placeholder="2019"
                                class="GRP4-inputs">
                            <input type="text" id="descripcion" name="descripcionExperiencia" placeholder="Descripción"
                                class="GRP4-inputs">
                        </div>

                    </div>

                    <div class="GRP4-botones">
                        <input type="submit" class="GRP4-agregarOpcion GRP4-button"
                            onclick="createOption('contenedorExperiencia','#fecha')" value="+" />
                        <input type="submit" class="GRP4-quitarOpcion GRP4-button"
                            onclick="deleteOption('#contenedorExperiencia')" value="-" />
                    </div>

                </article>


                <article class="GRP4-articles" id="GRP4-education">
                    <h2 class="GRP4-subtitle">Formación académica</h2>
                    <div id="contenedorFormacion">

                        <div class="contenedorInputs">
                            <input type="number" class="fechaFormacion GRP4-inputs" placeholder="Año inicio" min="1900">
                            <input type="number" class="fechaFormacion GRP4-inputs" placeholder="Año fin" min="1900">
                            <input type="text" class="fechaFormacion GRP4-inputs" placeholder="Curso autoformación">
                        </div>

                    </div>


                    <div class="GRP4-botones">
                        <input type="submit" class="GRP4-agregarOpcion GRP4-button"
                            onclick="createOption('contenedorFormacion','.fechaFormacion')" value="+" />
                        <input type="submit" class="GRP4-quitarOpcion GRP4-button"
                            onclick="deleteOption('#contenedorFormacion')" value="-" />
                    </div>
                </article>


                <article class="GRP4-articles" id="GRP4-idioms">
                    <h2 class="GRP4-subtitle">Idiomas</h2>
                    <div id="contenedorIdiomas">

                        <div class="contenedorInputs">

                            <input type="text" class="optionIdiom GRP4-inputs" name="idioma" placeholder="Idioma">

                            <select id="nivelIdioma" class="optionIdiom GRP4-inputs">
                                <option value="A1">A1</option>
                                <option value="A2">A2</option>
                                <option value="B1">B1</option>
                                <option value="B2">B2</option>
                                <option value="C1">C1</option>
                                <option value="C2">C2</option>
                            </select>

                        </div>

                    </div>

                    <div class="GRP4-botones">

                        <input type="submit" class="GRP4-agregarOpcion GRP4-button"
                            onclick="createOption('contenedorIdiomas','.optionIdiom')" value="+" />
                        <input type="submit" class="GRP4-quitarOpcion GRP4-button"
                            onclick="deleteOption('#contenedorIdiomas')" value="-" />

                    </div>
                </article>

                <article class="GRP4-articles" id="GRP4-aboutMe">
                    <div class="sobreMi">
                        <h2 class="GRP4-subtitle">Sobre mí</h2>
                        <textarea name="sobreMi" cols="25" rows="5"></textarea>
                    </div>
                </article>
            </section>
        </div>
    </main>
</body>

</html>