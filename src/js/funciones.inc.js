function mostrarContrasenya() {
    var x = document.getElementById("contrasenya");
    (x.type === "password")?x.type = "text":x.type = "password";
}

function createOption($id,$class){
    const contenedorFormacion = document.getElementById($id);
    const nuevoContenedor = contenedorFormacion.firstElementChild.cloneNode(true);
    nuevoContenedor.querySelector($class).value = "";
    contenedorFormacion.appendChild(nuevoContenedor);
};

function deleteOption($id){
    const contenedoresFormacion = document.querySelectorAll($id + " .contenedorInputs");
    if(contenedoresFormacion.length > 1){
        contenedoresFormacion[contenedoresFormacion.length-1].remove();
    }
};