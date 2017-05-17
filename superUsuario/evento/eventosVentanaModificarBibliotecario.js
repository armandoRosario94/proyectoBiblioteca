$(document).ready(
    function() {
        
        mostrarInformacionTablaBibliotecarioModificar();
                

        $('#idModalModificarBibliotecario').on(
            'shown.bs.modal', function (e) {
                var valorValueRadioButton = $("input:radio[name=radioButton]:checked").val();
                var cadena = valorValueRadioButton;                
                var valorNombre = "";
                var valorApellido = "";
                var valorContrasena = "";
                var valorGenero = "";
                var valorCorreo = "";

                separador = "/", // una diagonal invertida
                arregloDeSubCadenas = cadena.split(separador);

                //console.log(arregloDeSubCadenas); // la consola devolverá: ["cadena", "de", "texto"]
                for (var i=0; i < arregloDeSubCadenas.length; i++) {//5
                    //document.write(arregloDeSubCadenas[i] + " / ");
                    if (i == 0) {
                        valorNombre = arregloDeSubCadenas[i];
                    } else if(i == 1) {
                        valorApellido = arregloDeSubCadenas[i];
                    } else if(i == 2) {
                        valorContrasena = arregloDeSubCadenas[i];
                    } else if(i == 3) {
                        valorGenero = arregloDeSubCadenas[i];
                    } else if(i == 4) {
                        valorCorreo = arregloDeSubCadenas[i];
                    } 
                }

                var valorIdRadioButton = $("input:radio[name=radioButton]:checked").attr("id");
                
                if (typeof valorValueRadioButton === 'undefined') {
                    $('#idModalModificarBibliotecario').modal('hide');
                }

                $("#idCampoIdUsuario").val(valorIdRadioButton);
                $("#idCampoNombre").val(valorNombre);
                $("#idCampoApellido").val(valorApellido);
                $("#idCampoContrasena1").val(valorContrasena);
                //$("#idCampoSexo").val(valorSexo);                
                if (valorGenero == "Masculino") {                    
                    $("#idRadioGeneroMasculino").prop("checked", true);
                    //$("#idRadioSexoFemenino").checked = false;                     
                } else {
                    //$("#idRadioSexoMasculino").checked = false;                    
                    $("#idRadioGeneroFemenino").prop("checked", true);
                }
                $("#idCampoCorreo").val(valorCorreo);

            }
        )//fin del evento idModalModificarAdministrador

        $("#formularioModalModificarBibliotecario").submit(
            function(e) {
                e.preventDefault();
                $('#idModalModificarBibliotecario').modal('hide');
                var campoIdUsuario = document.getElementsByName('campoIdUsuario');    
                var campoNombre = document.getElementsByName('campoNombre');        
                var campoApellido = document.getElementsByName('campoApellido');        
                var campoContrasena1 = document.getElementsByName('campoContrasena1');    
                var campoContrasena2 = document.getElementsByName('campoContrasena2');    
                var radioGenero = document.getElementsByName('radioGenero');
                var radioGeneroSeleccionado = "";
                if (radioGenero[0].checked == true) {
                    radioGeneroSeleccionado = "Masculino";        
                } else {
                    radioGeneroSeleccionado= "Femenino";                
                }
                var campoCorreo = document.getElementsByName('campoCorreo');

                if (validarCamposFormularioRegistrarBibliotecario(campoIdUsuario[0].value, campoNombre[0].value, campoApellido[0].value, campoContrasena1[0].value,campoContrasena2[0].value, campoCorreo[0].value) == false) {
                    return;
                } 
                if (validarAmbasContrasenas(campoContrasena1[0].value,campoContrasena2[0].value) == false) {
                    return;
                }        
                var datosJson = {
                    accion: "modificar",                    
                    idUsuario: campoIdUsuario[0].value,
                    nombre: campoNombre[0].value,
                    apellido: campoApellido[0].value,
                    contrasena: campoContrasena1[0].value,
                    genero: radioGeneroSeleccionado,
                    correo: campoCorreo[0].value,
                    estado: 'activo'
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

function validarCamposFormularioRegistrarBibliotecario(campoIdUsuario, campoNombre, campoApellido, campoContrasena1,campoContrasena2, campoCorreo) {        
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

function guardarInformacion(datosJson) {
    $.ajax(
        {
            method: "POST",
            url: "controlador/controladorVentanaModificarBibliotecario.php",
            data: datosJson
        }
    ).done(
        function( msg ) {
            if (msg == "true") {
                alert("La información se guardó correctamente.");                
                $("#botonReset").click();
            } else {
                alert("La información no se pudo guardar.");
            }
        }
    );
}

function mostrarInformacionTablaBibliotecarioModificar() {
    $("#idTablaInformacionBibliotecarioModificar").load(
        "controlador/controladorVentanaModificarBibliotecario.php", {
            accion: "mostrarInformacionTablaBibliotecario"            
        }
    );            
}


function modificarInformacion(datosJson) {
    $.ajax(
        {
            method: "POST",
            url: "controlador/controladorVentanaModificarBibliotecario.php",
            data: datosJson
        }
    ).done(
        function( msg ) {
            if (msg == "true") {
              alert("La información se modificó correctamente.");              
              //mostrarElementosSelect();
              //mostrarElementosSelectSemestre();
              //mostrarElementosSelectCampusModificar();
              mostrarInformacionTablaBibliotecarioModificar();
            } else {
              alert("La información no se pudo modificar.");
            }
        }
    );
}