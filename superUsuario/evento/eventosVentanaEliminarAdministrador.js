$(document).ready(
    function() {
        
        mostrarInformacionTablaAdministradorEliminar();

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
                    accion: "eliminarAdministrador",
                    idUsuarios:administradoresSeleccionados
                };
                eliminarInformacion(datosJson);                
            }
        )//fin del evento del idBotonModalEliminarAdministrador
    }//fin de la función donde se ponen todos los eventos de los elementos html
); //final del document



function eliminarInformacion(datosJson) {
    $.ajax(
        {
            method: "POST",
            url: "controlador/controladorVentanaEliminarAdministrador.php",
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

function mostrarInformacionTablaAdministradorEliminar() {
    $("#idTablaInformacionAdministradorEliminar").load(
        "controlador/controladorVentanaEliminarAdministrador.php", {
            accion: "mostrarInformacionTablaAdministrador"            
        }
    );            
}

