function mostrarContrasenya() {
    var x = document.getElementById("contrasenya");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
}