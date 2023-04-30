function mostrarContrasenya() {
    var x = document.getElementById("contrasenya");
    (x.type === "password")?x.type = "text":x.type = "password";
}

const botonAgregarFormacion = document.getElementById("agregarFormacion");
const contenedorFormacion = document.getElementById("contenedorFormacion");

botonAgregarFormacion.addEventListener("click", () => {
    const nuevoContenedor = contenedorFormacion.firstElementChild.cloneNode(true);
    nuevoContenedor.querySelector("input[name='anioInicioFormacion']").value = "";
    nuevoContenedor.querySelector("input[name='anioFinalFormacion']").value = "";
    nuevoContenedor.querySelector("input[name='cursoAutoformacion']").value = "";
    contenedorFormacion.appendChild(nuevoContenedor);
});

const botonQuitarFormacion = document.getElementById("quitarFormacion");

botonQuitarFormacion.addEventListener("click", () => {
    const contenedoresFormacion = document.querySelectorAll("#contenedorFormacion .contenedorInputs");
    if(contenedoresFormacion.length > 1){
        contenedoresFormacion[contenedoresFormacion.length-1].remove();
    }
});
const botonAgregarExperiencia = document.getElementById("agregarExperiencia");
const contenedorExperiencia = document.getElementById("contenedorExperiencia");

botonAgregarExperiencia.addEventListener("click", () => {
    const nuevoContenedor = contenedorExperiencia.firstElementChild.cloneNode(true);
    nuevoContenedor.querySelector("input[name='fechaInicioExperiencia']").value = "";
    nuevoContenedor.querySelector("input[name='fechaFinalExperiencia']").value = "";
    nuevoContenedor.querySelector("input[name='descripcionExperiencia']").value = "";
    contenedorExperiencia.appendChild(nuevoContenedor);
});
const botonQuitarExperiencia = document.getElementById("quitarExperiencia");

botonQuitarExperiencia.addEventListener("click", () => {
const contenedoresExperiencia = document.querySelectorAll("#contenedorExperiencia .contenedorInputs");
if(contenedoresExperiencia.length > 1){
    contenedoresExperiencia[contenedoresExperiencia.length-1].remove();
}
});

const botonAgregarIdioma = document.getElementById("agregarIdioma");
const contenedorIdiomas = document.getElementById("contenedorIdiomas");

botonAgregarIdioma.addEventListener("click", () => {
    const nuevoContenedor = contenedorIdiomas.firstElementChild.cloneNode(true);
    nuevoContenedor.querySelector("input[name='idioma']").value = "";
    nuevoContenedor.querySelector("select[name='nivelIdioma']").selectedIndex = 0;
    contenedorIdiomas.appendChild(nuevoContenedor);
});

const botonQuitarIdioma = document.getElementById("quitarIdioma");

botonQuitarIdioma.addEventListener("click", () => {
    const contenedoresIdiomas = document.querySelectorAll("#contenedorIdiomas .contenedorInputs");
    if(contenedoresIdiomas.length > 1){
        contenedoresIdiomas[contenedoresIdiomas.length-1].remove();
    }
});