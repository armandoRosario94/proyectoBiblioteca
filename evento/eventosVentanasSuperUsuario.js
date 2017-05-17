$(document).ready(
    function() {
        //evento submit sobre el formulario Registrar Administrador
        $("#formularioRegistrarAdministrador").submit(
            function(e) {
                e.preventDefault();
                var campoIdUsuario = document.getElementsByName('campoIdUsuario');    
                var campoNombre = document.getElementsByName('campoNombre');        
                var campoApellido = document.getElementsByName('campoApellido');        
                var campoContrasena1 = document.getElementsByName('campoContrasena1');    
                var campoContrasena2 = document.getElementsByName('campoContrasena2');    
                var radioSexo = document.getElementsByName('radioSexo');
                var radioSexoSeleccionado = "";
                if (radioSexo[0].checked == true) {
                    radioSexoSeleccionado = "Masculino";        
                } else {
                    radioSexoSeleccionado = "Femenino";                
                }
                var campoCorreo = document.getElementsByName('campoCorreo');

                if (validarCamposFormularioRegistrarAdministrador(campoIdUsuario[0].value, campoNombre[0].value, campoApellido[0].value, campoContrasena1[0].value,campoContrasena2[0].value, campoCorreo[0].value) == false) {
                    return;
                } 
                if (validarAmbasContrasenas(campoContrasena1[0].value,campoContrasena2[0].value) == false) {
                    return;
                }        
                var datosJson = {
                    accion: "registrar",
                    tabla: "administrador",
                    idUsuario: campoIdUsuario[0].value,
                    nombre: campoNombre[0].value,
                    apellido: campoApellido[0].value,
                    contrasena: campoContrasena1[0].value,
                    sexo: radioSexoSeleccionado,
                    correo: campoCorreo[0].value,
                    estado: 'activo'
                };
                guardarInformacion(datosJson);    
            }
        ); //fin del evento del formularioRegistrarAdministrador
    

        mostrarInformacionTablaAdministradorEliminar();
        mostrarInformacionTablaAdministradorModificar();
        mostrarInformacionTablaVentanaListaAdministradores();

        //evento cuando se ejecuta el modal eliminar administrador
        $('#idModalEliminarAdministrador').on(
            'shown.bs.modal', function (e) {
                var checkBoxMarcados = $("input:checkbox:checked");
                if (checkBoxMarcados.length <= 0) {
                    $('#idModalEliminarAdministrador').modal('hide');
                }
                var idsUsuariosSeleccionados = "";
                checkBoxMarcados.each(
                    function() {
                        idsUsuariosSeleccionados = idsUsuariosSeleccionados + $(this).attr("id") + ",";
                    }
                )
                //$(".modal-body>div").text("(javi)¿Esta seguro que quiere eliminar los administradores " + idsUsuariosSeleccionados.substring(0,idsUsuariosSeleccionados.length - 1) + "?");
                $(".modal-body>div").text("(armando)¿Esta seguro que quiere eliminar los administradores " + idsUsuariosSeleccionados + "?");
            }
        )//fin del evento idModalEliminarAdministrador


        //evento cuando se da un click sobre el botón Eliminar Administrador que está en el modal
        $("#idBotonModalEliminarAdministrador").click(
            function() {
                var administradoresSeleccionados = "";
                var checkBoxMarcados = $("input:checkbox:checked");
                //$('#idModalEliminarAdministrador').modal('hide');
                //$('#idModalEliminarAdministrador').modal('show');//prueba
            
                //$("input:checkbox:checked").each(
                checkBoxMarcados.each(
                    function() {
                        administradoresSeleccionados = administradoresSeleccionados + $(this).attr("id") + ","; 
                    }
                )
                //administradoresSeleccionados = administradoresSeleccionados.substring(0,administradoresSeleccionados.length - 1);
                //administradoresSeleccionados = administradoresSeleccionados.substring(0,administradoresSeleccionados.length - 1);
                
                var datosJson = {
                    accion: "eliminar",
                    tabla: "administrador",
                    idUsuarios:administradoresSeleccionados
                };
                eliminarInformacion(datosJson);                
            }
        )//fin del evento del idBotonModalEliminarAdministrador

        $('#idModalModificarAdministrador').on(
            'shown.bs.modal', function (e) {
                var valorValueRadioButton = $("input:radio[name=radioButton]:checked").val();
                var cadena = valorValueRadioButton;                
                var valorNombre = "";
                var valorApellido = "";
                var valorContrasena = "";
                var valorSexo = "";
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
                        valorSexo = arregloDeSubCadenas[i];
                    } else if(i == 4) {
                        valorCorreo = arregloDeSubCadenas[i];
                    } 
                }

                var valorIdRadioButton = $("input:radio[name=radioButton]:checked").attr("id");
                
                if (typeof valorValueRadioButton === 'undefined') {
                    $('#idModalModificarAdministrador').modal('hide');
                }

                $("#idCampoIdUsuario").val(valorIdRadioButton);
                $("#idCampoNombre").val(valorNombre);
                $("#idCampoApellido").val(valorApellido);
                $("#idCampoContrasena1").val(valorContrasena);
                //$("#idCampoSexo").val(valorSexo);                
                if (valorSexo == "Masculino") {                    
                    $("#idRadioSexoMasculino").prop("checked", true);
                    //$("#idRadioSexoFemenino").checked = false;                     
                } else {
                    //$("#idRadioSexoMasculino").checked = false;                    
                    $("#idRadioSexoFemenino").prop("checked", true);
                }
                $("#idCampoCorreo").val(valorCorreo);

            }
        )//fin del evento idModalModificarAdministrador

        $("#formularioModalModificarAdministrador").submit(
            function(e) {
                e.preventDefault();
                $('#idModalModificarAdministrador').modal('hide');
                var campoIdUsuario = document.getElementsByName('campoIdUsuario');    
                var campoNombre = document.getElementsByName('campoNombre');        
                var campoApellido = document.getElementsByName('campoApellido');        
                var campoContrasena1 = document.getElementsByName('campoContrasena1');    
                var campoContrasena2 = document.getElementsByName('campoContrasena2');    
                var radioSexo = document.getElementsByName('radioSexo');
                var radioSexoSeleccionado = "";
                if (radioSexo[0].checked == true) {
                    radioSexoSeleccionado = "Masculino";        
                } else {
                    radioSexoSeleccionado = "Femenino";                
                }
                var campoCorreo = document.getElementsByName('campoCorreo');

                if (validarCamposFormularioRegistrarAdministrador(campoIdUsuario[0].value, campoNombre[0].value, campoApellido[0].value, campoContrasena1[0].value,campoContrasena2[0].value, campoCorreo[0].value) == false) {
                    return;
                } 
                if (validarAmbasContrasenas(campoContrasena1[0].value,campoContrasena2[0].value) == false) {
                    return;
                }        
                var datosJson = {
                    accion: "modificar",
                    tabla: "administrador",
                    idUsuario: campoIdUsuario[0].value,
                    nombre: campoNombre[0].value,
                    apellido: campoApellido[0].value,
                    contrasena: campoContrasena1[0].value,
                    sexo: radioSexoSeleccionado,
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

function validarCamposFormularioRegistrarAdministrador(campoIdUsuario, campoNombre, campoApellido, campoContrasena1,campoContrasena2, campoCorreo) {        
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
            url: "../php/tareasSuperUsuario.php",
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

function mostrarInformacionTablaAdministradorEliminar() {    

    $("#idTablaInformacionAdministradorEliminar").load(
        "../php/tareasSuperUsuario.php", {
            accion: "mostrarInformacionTablaEliminar",            
            tabla: "administrador"
        }
    );            
}

function mostrarInformacionTablaAdministradorModificar() {
    $("#idTablaInformacionAdministradorModificar").load(
        "../php/tareasSuperUsuario.php", {
            accion: "mostrarInformacionTablaModificar",            
            tabla: "administrador"
        }
    );            
}

function mostrarInformacionTablaVentanaListaAdministradores() {
    $("#idTablaVentanaListaAdministradores").load(
        "../php/tareasSuperUsuario.php", {
            accion: "mostrarTodaInformacionTablaxVer",
            tabla: "administrador"
        }
    );
}



function eliminarInformacion(datosJson) {
    $.ajax(
        {
            method: "POST",
            url: "../php/tareasSuperUsuario.php",
            data: datosJson
        }
    ).done(
        function( msg ) {
            console.log("resultado:"+ msg);  
            if (msg == "true") {
                alert("La información se eliminó correctamente.");
                //mostrarElementosSelectCampus();
                mostrarInformacionTablaAdministradorEliminar();
                location.reload();
            } else {
                alert("La información no se pudo eliminar.");
            }
        }
    )
}

function modificarInformacion(datosJson) {
    $.ajax(
        {
            method: "POST",
            url: "../php/tareasSuperUsuario.php",
            data: datosJson
        }
    ).done(
        function( msg ) {
            if (msg == "true") {
              alert("La información se modificó correctamente.");              
              //mostrarElementosSelect();
              //mostrarElementosSelectSemestre();
              //mostrarElementosSelectCampusModificar();
              mostrarInformacionTablaAdministradorModificar();
            } else {
              alert("La información no se pudo modificar.");
            }
        }
    );
}