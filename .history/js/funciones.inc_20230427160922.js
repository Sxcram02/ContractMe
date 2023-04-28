function mostrarContrasenya() {
    var x = document.getElementById("contrasenya");
    (x.type === "password") ?
      x.type = "text";
    :
      x.type = "password";
    }
}