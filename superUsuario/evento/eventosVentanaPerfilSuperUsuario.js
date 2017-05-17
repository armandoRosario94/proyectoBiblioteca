$(document).ready(
    function() {
        var campoOcultoUsuario = document.getElementsByName('campoOcultoUsuario');
        mostrarInformacionPerfilSuperUsuarioModificar(campoOcultoUsuario[0].value);

        $('#idModalModificarPerfilSuperUsuario').on(
            'shown.bs.modal', function (e) {                        
                //var campoUsuario = document.getElementsByName('campoUsuario');
                var campoNombre = document.getElementsByName('campoNombre');
                var campoApellido = document.getElementsByName('campoApellido');
                var valorGenero = document.getElementsByName('radioGenero');
                var campoCorreo = document.getElementsByName('campoCorreo');

                $("#idCampoUsuarioFormularioModal").val(campoOcultoUsuario[0].value);
                $("#idCampoNombreFormularioModal").val(campoNombre[0].value);
                $("#idCampoApellidoFormularioModal").val(campoApellido[0].value);
                if (valorGenero[0].checked == true) {
                    //Masculino
                    $("#idRadioGeneroMasculinoFormularioModal").prop("checked", true);
                } else {
                    //femenino
                    $("#idRadioGeneroFemeninoFormularioModal").prop("checked", true);
                }
                $("#idCampoCorreoFormularioModal").val(campoCorreo[0].value);

            }
        )//fin del evento idModalModificarAdministrador
        
        $("#idFormularioModalModificarPerfilSuperUsuario").submit(
            function(e) {
                e.preventDefault();
                $('#idModalModificarAdministrador').modal('hide');
                var idCampoUsuarioFormularioModal = document.getElementById('idCampoUsuarioFormularioModal');
                var idCampoNombreFormularioModal = document.getElementById('idCampoNombreFormularioModal');
                var idCampoApellidoFormularioModal = document.getElementById('idCampoApellidoFormularioModal');
                var idCampoContrasena1FormularioModal = document.getElementById('idCampoContrasena1FormularioModal');
                var idCampoContrasena2FormularioModal = document.getElementById('idCampoContrasena2FormularioModal');
                var idRadioGeneroMasculinoFormularioModal = document.getElementById('idRadioGeneroMasculinoFormularioModal');                
                var radioGeneroSeleccionado = "";

                if (idRadioGeneroMasculinoFormularioModal.checked == true) {
                    radioGeneroSeleccionado = "Masculino";
                } else {
                    radioGeneroSeleccionado = "Femenino";                
                }
                var idCampoCorreoFormularioModal = document.getElementById('idCampoCorreoFormularioModal');

                //alert("valores modificados: "+idCampoUsuarioFormularioModal.value+", "+idCampoNombreFormularioModal.value+", "+idCampoApellidoFormularioModal.value+", "+idCampoContrasena1FormularioModal.value+", "+idCampoContrasena2FormularioModal.value+ ", "+radioGeneroSeleccionado + ", "+idCampoCorreoFormularioModal.value);

                
                if (validarCamposFormularioModificarPerfilSuperUsuario(idCampoUsuarioFormularioModal.value, idCampoNombreFormularioModal.value,idCampoApellidoFormularioModal.value, idCampoContrasena1FormularioModal.value, idCampoContrasena2FormularioModal.value, idCampoCorreoFormularioModal.value) == false) {
                    return;
                }
                if (validarAmbasContrasenas(idCampoContrasena1FormularioModal.value,idCampoContrasena2FormularioModal.value) == false) {
                    return;
                }        
                var datosJson = {
                    accion: "modificarPerfilSuperUsuario",
                    usuario: idCampoUsuarioFormularioModal.value,
                    nombre: idCampoNombreFormularioModal.value,
                    apellido: idCampoApellidoFormularioModal.value,
                    contrasena: idCampoContrasena1FormularioModal.value,
                    genero: radioGeneroSeleccionado,
                    correo: idCampoCorreoFormularioModal.value,                    
                };
                modificarInformacion(datosJson);                
            }
        );

    }//fin de la función donde se ponen todos los eventos de los elementos html
); //final del document


//Métodos para hacer n cosas
function validarAmbasContrasenas(campoContrasena1,campoContrasena2) {
    if (campoContrasena1 == campoContrasena2) {
        return true;
    } else {
        alert("Las contraseñas no son iguales.\nPor favor verifique.");
        return false;
    }     
}

function validarCamposFormularioModificarPerfilSuperUsuario(campoIdUsuario, campoNombre, campoApellido, campoContrasena1,campoContrasena2, campoCorreo) {            
    if (campoIdUsuario == "") {
      alert("El campo IdUsuario está vacío.\nPara iniciar el sistema requiere de ésta información.");
      return false;
    }
    if (campoNombre== "") {
      alert("El campo Nombre está vacío.\nPara iniciar el sistema requiere de ésta información.");
      return false;
    } 
    if (campoApellido == "") {
      alert("El campo Apellido está vacío.\nPara iniciar el sistema requiere de ésta información.");
      return false;
    }
    if (campoContrasena1 == "") {
      alert("El campo Contrasena1 está vacío.\nPara iniciar el sistema requiere de ésta información.");
      return false;
    }
    if (campoContrasena2 == "") {
      alert("El campo Contrasena2 está vacío.\nPara iniciar el sistema requiere de ésta información.");
      return false;
    }
    if (campoCorreo == "") {
      alert("El campo Correo está vacío.\nPara iniciar el sistema requiere de ésta información.");
      return false;
    }
    return true;
}


function modificarInformacion(datosJson) {
    $.ajax(
        {
            method: "POST",
            url: "controlador/controladorVentanaPerfilSuperUsuario.php",
            data: datosJson
        }
    ).done(
        function( msg ) {
            if (msg == "true") {
              alert("La información se modificó correctamente.");                            
              //mostrarInformacionTablaAdministradorModificar();
              mostrarInformacionPerfilSuperUsuarioModificar();
            } else {
              alert("La información no se pudo modificar.");
            }
        }
    );
}

function mostrarInformacionPerfilSuperUsuarioModificar(campoOcultoUsuario) {
    $("#idFormularioPerfilSuperUsuario").load(
        "controlador/controladorVentanaPerfilSuperUsuario.php", {
            accion: "mostrarInformacionPerfilSuperUsuario",
            campoOcultoUsuario: campoOcultoUsuario 
        }
    );                    
}