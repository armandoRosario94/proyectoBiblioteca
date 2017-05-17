$(document).ready(
    function() {
        mostrarInformacionTablaVentanaListaBibliotecarios();        
        
    }//fin de la función donde se ponen todos los eventos de los elementos html    
); //final del document


function mostrarInformacionTablaVentanaListaBibliotecarios() {
    $("#idTablaVentanaListaBibliotecarios").load(
        "controlador/controladorVentanaListaBibliotecario.php", {
            accion: "mostrarTodaInformacionTablaxVer"
        }
    );
}
