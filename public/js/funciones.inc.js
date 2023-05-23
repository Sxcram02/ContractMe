function mostrarContrasenya() {
    var x = document.getElementById("contrasenya");
    (x.type === "password")?x.type = "text":x.type = "password";
}

function createOption($id,$class){
    const contenedorFormacion = document.getElementById($id);
    const nuevoContenedor = contenedorFormacion.firstElementChild.cloneNode(true);
    nuevoContenedor.querySelector($class).value = "";
    contenedorFormacion.appendChild(nuevoContenedor);
}

function deleteOption($id){
    const contenedoresFormacion = document.querySelectorAll($id + " .contenedorInputs");
    if(contenedoresFormacion.length > 1){
        contenedoresFormacion[contenedoresFormacion.length-1].remove();
    }
}

function mostrarFormulario($formLogIn,$formSigIn){
    const antiguoDiv= document.getElementById($formLogIn);
    const nuevoDiv= document.getElementById($formSigIn);

    antiguoDiv.style.display = "none";
    nuevoDiv.style.display = "block";
}

function comprobarRegularidad(){
    const usermail = document.getElementById("userSignInEmail").value;
    const username = document.getElementById("userSignInName").value;
    const surname = document.getElementById("userSignInApellido").value;
    const pass = document.getElementById("userSignInPass").value;
    const typeuser = document.getElementById("userSignInType").value;

    $username= /^a{1,20}[A-Za-z]/;


    if(!$username.test(username) || username.length < 20){
        alert("Ingrese un correo electrónico valido")
        return false
    }else {
        return true
    }
}
