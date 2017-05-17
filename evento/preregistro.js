$(document).ready(function(){
  $("[name=btn]").click(function() {
    var id = $(this).attr("id");
    if (isNaN(id)) {
      id = id.substring(7,id.length);
      if(confirm("¿Seguro que quiere eliminar al usuario " + id + "?\nSi = Aceptar\nNo = Cancelar")) {
        borrar(id, "preregistro");
      }
    } else {
      if(confirm("¿Seguro que quiere registrar al usuario " + id + "?\nSi = Aceptar\nNo = Cancelar")) {
        registrar(id);
      }
    }
  })
  $("[name=btnBorrarRegistro]").click(function() {
    var id = $(this).attr("id");
    if(confirm("¿Seguro que quiere eliminar al usuario " + id + "?\nSi = Aceptar\nNo = Cancelar")) {
      borrar(id, "usuario");
    }
  })
})

function registrar(id) {
  $.ajax({
    method: "POST",
    url: "../php/registrarUsuario.php",
    data: {id : id, accion: "registrar"}
  })
  .done(function( msg ) {
    if (msg == "0") {
      alert("El usuario con id: " + id + " se registró correctamente.");
      location.reload();
    } else if(msg == "1") {
      alert("El usuario con id: " + id + " no se pudo registrar.");
    } else {
      alert("El usuario con el id: " + id + " no existe en la tabla preregistro.");
    }
  });
}

function borrar(id,tabla) {
  $.ajax({
    method: "POST",
    url: "../php/registrarUsuario.php",
    data: {id : id, accion : "borrar", tabla : tabla}
  })
  .done(function( msg ) {
    if (msg == "0") {
      alert("El usuario con id: " + id + " se eliminó correctamente.");
      location.reload();
    } else if(msg == "1") {
      alert("El usuario con id: " + id + " no se pudo eliminar.");
    }
  });
}
