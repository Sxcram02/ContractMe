/** 
* Esta función cambia el tipo de input de pass a text 
*/
function mostrarContrasenya() {
    var x = document.getElementById("contrasenya");
    (x.type === "password") ? x.type = "text" : x.type = "password";
}

/** 
* Comprubea que los datos introduccidos en el formulario sean adecuados
* @return {alert} En caso de ser erronea la regularidad de las cadenas de caracteres.
*/

function comprobarRegularidad() {
    const usermail = document.getElementById("userSignInEmail").value;
    const username = document.getElementById("userSignInName").value;
    const pass = document.getElementById("userSignInPass").value;

    $username = /^[A-Za-z]{1,20}$/;
    $email = /^[a-zA-Z]{1,80}([0-9])*@[a-z]+\.[a-z]{2}[a-z]$/;


    if (!$username.test(username) || username.length > 20) {
        alert("Ingrese un nombre válido");
        return false;
    }

    if (!$email.test(usermail) || usermail.length > 80) {
        alert("Ingrese un correo electrónico válido");
        return false;
    } else {
        return true;
    }

}

/** 
* Función que muestra la segunda parte del formulario
* @return {void} a la aparición de una sección dentro del content.
*/
function mostrarSecondPartForm($formularioHechoYa,$formularioNoHecho) {
    const formularioHecho = document.getElementById($formularioHechoYa);
    const formularioNoHecho = document.getElementById($formularioNoHecho);

    formularioHecho.classList.remove("visible");
    formularioHecho.classList.add("invisible");

    formularioNoHecho.classList.remove("invisible");
    formularioNoHecho.classList.add("visble");
}


function mostrarAlgo() {
    const seleccion = document.getElementsByName("tipoUsuario")[0].value;
    const campoNuevo = document.querySelectorAll(".new-input");
    switch (seleccion) {
        case "Aspirante":
            if (campoNuevo) {
                campoNuevo.forEach((campo) => { campo.remove(); });
                siguientePregunta = document.getElementById("signup");
                input = document.createElement("input");
                input.type = "text";
                input.name = "expediente";
                input.placeholder = "(opcional) Nº expediente";
                input.classList.add("new-input");
                siguientePregunta.appendChild(input);
            }
            break;
        case "Empresario":
            if (campoNuevo) {
                campoNuevo.forEach((campo) => { campo.remove(); });
                siguientePregunta = document.getElementById("signup");
                input = document.createElement("input");
                input.type = "text";
                input.name = "nombreEmpresa";
                input.placeholder = "nombre de la empresa";
                input.classList.add("new-input");
                siguientePregunta.appendChild(input);
            }
            break;
        case "Docente":
            if (campoNuevo) {
                campoNuevo.forEach((campo) => { campo.remove(); });
                siguientePregunta = document.getElementById("signup");
                input = document.createElement("input");
                input.type = "text";
                input.name = "materia";
                input.placeholder = "Ejemplo: Matemáticas";
                input.classList.add("new-input");
                siguientePregunta.appendChild(input);
            }
            break;
        default:
            if (campoNuevo) {
                campoNuevo.forEach((campo) => {
                    campo.remove();
                });
            }
            break;
    }
}
/** 
* Cambio entre visualización de vistas
* @param {Element} $botonPulsado Elemento html el cual es pulsado
* @param {Element} $opcionVistaMostrar Elemento html el cual será visto u ocultado
* @return {Document} visualización de una estructura html;
*/

function mostrarButonOption($botonPulsado,$opcionVistaMostrar) {
    const botones = document.querySelectorAll("#option");
    let vistaMostrada = document.querySelector(".v2container-view-aspirante");
    vistaMostrada.setAttribute("class","container-view-aspirante");
    let vistaElegida = document.getElementById($opcionVistaMostrar);

    botones.forEach((boton) => {
        if (boton === $botonPulsado) {
            boton.style.backgroundColor = "var(--Amarillo)";
            boton.style.color = "black";
            switch (boton.value) {
                case "curriculum":
                    vistaElegida.setAttribute("class","v2container-view-aspirante");
                    break;
                case "perfil":
                    vistaElegida.setAttribute("class","v2container-view-aspirante");
                    break;
            }
        } else {
            boton.style.backgroundColor = "white";
        }
    });
}