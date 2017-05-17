$(document).ready(
    function() {
        mostrarInformacionTablaVentanaListaAdministradores();        
        
    }//fin de la función donde se ponen todos los eventos de los elementos html    
); //final del document


function mostrarInformacionTablaVentanaListaAdministradores() {
    $("#idTablaVentanaListaAdministradores").load(
        "controlador/controladorVentanaListaAdministrador.php", {
            accion: "mostrarTodaInformacionTablaxVer"
        }
    );
}
