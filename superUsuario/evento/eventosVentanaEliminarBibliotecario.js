$(document).ready(
    function() {
        
        mostrarInformacionTablaBibliotecarioEliminar();

        //evento cuando se ejecuta el modal eliminar administrador
        $('#idModalEliminarBibliotecario').on(
            'shown.bs.modal', function (e) {
                var checkBoxMarcados = $("input:checkbox:checked");
                if (checkBoxMarcados.length <= 0) {
                    $('#idModalEliminarBibliotecario').modal('hide');
                }
                var idsUsuariosSeleccionados = "";
                checkBoxMarcados.each(
                    function() {
                        idsUsuariosSeleccionados = idsUsuariosSeleccionados + $(this).attr("id") + ",";
                    }
                )
                //$(".modal-body>div").text("(javi)¿Esta seguro que quiere eliminar los administradores " + idsUsuariosSeleccionados.substring(0,idsUsuariosSeleccionados.length - 1) + "?");
                $(".modal-body>div").text("(armando)¿Esta seguro que quiere eliminar los bibliotecarios " + idsUsuariosSeleccionados + "?");
            }
        )//fin del evento idModalEliminarAdministrador


        //evento cuando se da un click sobre el botón Eliminar Administrador que está en el modal
        $("#idBotonModalEliminarBibliotecario").click(
            function() {
                var bibliotecariosSeleccionados = "";
                var checkBoxMarcados = $("input:checkbox:checked");
                //$('#idModalEliminarAdministrador').modal('hide');
                //$('#idModalEliminarAdministrador').modal('show');//prueba
            
                //$("input:checkbox:checked").each(
                checkBoxMarcados.each(
                    function() {
                        bibliotecariosSeleccionados = bibliotecariosSeleccionados + $(this).attr("id") + ","; 
                    }
                )
                //administradoresSeleccionados = administradoresSeleccionados.substring(0,administradoresSeleccionados.length - 1);
                //administradoresSeleccionados = administradoresSeleccionados.substring(0,administradoresSeleccionados.length - 1);
                
                var datosJson = {
                    accion: "eliminarBibliotecario",
                    idUsuarios:bibliotecariosSeleccionados
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
            url: "controlador/controladorVentanaEliminarBibliotecario.php",
            data: datosJson
        }
    ).done(
        function( msg ) {
            console.log("resultado:"+ msg);  
            if (msg == "true") {
                alert("La información se eliminó correctamente.");
                //mostrarElementosSelectCampus();
                mostrarInformacionTablaBibliotecarioEliminar();
                location.reload();
            } else {
                alert("La información no se pudo eliminar.");
            }
        }
    )
}

function mostrarInformacionTablaBibliotecarioEliminar() {
    $("#idTablaInformacionBibliotecarioEliminar").load(
        "controlador/controladorVentanaEliminarBibliotecario.php", {
            accion: "mostrarInformacionTablaBibliotecario"            
        }
    );            
}

