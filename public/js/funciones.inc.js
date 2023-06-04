/** 
* Esta función cambia el tipo de input de pass a text 
*/
function mostrarContrasenya() {
    var x = document.getElementById("contrasenya");
    (x.type === "password")?x.type = "text":x.type = "password";
}

/** 
* Función que da la oportunidad de rellenar mas campos en un formulario
* @param {getElementById} $id - contenedor del formulario.
* @param {querySelector} $class - clase cuyo valor sera cambiado.
* @return {void} Un nuevo campo a rellenar datos.
*/

function createOption($id,$class){
    const contenedorFormacion = document.getElementById($id);
    const nuevoContenedor = contenedorFormacion.firstElementChild.cloneNode(true);
    nuevoContenedor.querySelector($class).value = "";
    contenedorFormacion.appendChild(nuevoContenedor);
}

/** 
* Otorga la oportunidad de eliminar un campo añadido
* @param {querySelectorAll} $id - El selector del contenedor cuyo contenido es el nuevo campo.
* @return {void}
*/

function deleteOption($id){
    const contenedoresFormacion = document.querySelectorAll($id + " .contenedorInputs");
    if(contenedoresFormacion.length > 1){
        contenedoresFormacion[contenedoresFormacion.length-1].remove();
    }
}

/** 
* Función que muestra una sección y quita otra que ya se mostraba
* @param {getElementById} $formLogIn - Id del formulario de inicio de sesión.
* @param {getElementById} $formSigIn - Id del formulario de registro.
* @return {void} Una sección.
*/

function mostrarFormulario($formLogIn,$formSigIn){
    const antiguoDiv= document.getElementById($formLogIn);
    const nuevoDiv= document.getElementById($formSigIn);

    antiguoDiv.style.display = "none";
    nuevoDiv.style.display = "block";
}

/** 
* Comprubea que los datos introduccidos en el formulario sean adecuados
* @return {alert} En caso de ser erronea la regularidad de las cadenas de caracteres.
*/

function comprobarRegularidad(){
    const usermail = document.getElementById("userSignInEmail").value;
    const username = document.getElementById("userSignInName").value;
    const pass = document.getElementById("userSignInPass").value;

    $username = /^[A-Za-z]{1,20}$/;
    $email = /^[a-zA-Z]{1,80}([0-9])*@[a-z]+\.[a-z]{2}[a-z]$/;


    if(!$username.test(username) || username.length > 20){
        alert("Ingrese un nombre válido");
        return false;
    }

    if(!$email.test(usermail) || usermail.length > 80){
        alert("Ingrese un correo electrónico válido");
        return false;
    }else {
        return true;
    }

}

/** 
* Función que muestra la primera parte de un formulario a rellenar
* @return {void} a la aparición de una sección dentro del content.
*/

function mostrarFormCurriculum(){
    const content = document.getElementById('box-content-servicios');

    let formCurriculum = `<section class="container-creacion-curriculum">
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
</section>`;
    content.innerHTML = formCurriculum;
}

/** 
* Función que muestra la segunda parte del formulario
* @return {void} a la aparición de una sección dentro del content.
*/
function mostrarFormAficciones(){
    const content = document.getElementById('box-content-servicios');
    let formAficiones = `<section class="container-creacion-curriculum">
    <form action="index.php?option=mostrarVistaCurriculum" method="post">
        <article class="box-inputs">
            <label>Aficciones:</label>
            <input type="text" name="nombreAficcion">
            <label>Cuentanos sobre ti:</label>
            <textarea name="descripcionAficcion" cols="20" rows="10"></textarea>
            <input type="submit" value="guardar" name="guardarCurriculum">
        </article>
    </form>
</section>`;
content.innerHTML = formAficiones;
}

function mostrarButonOption($botonPulsado,$opcionVista){
    const opcionElegida = document.getElementById($botonPulsado);
    const opcionVistaElegida = document.getElementById($opcionVista);

    while (opcionElegida){
        opcionElegida.style.backgroundColor = "black";
        opcionVistaElegida.style.display = "flex";
    }
}