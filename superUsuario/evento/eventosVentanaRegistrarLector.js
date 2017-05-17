window.onload = function() {        
    var botonAgregarOcupacion = document.getElementsByName("botonAgregarOcupacion");    
    var botonAgregarEmpresaInstitucion = document.getElementsByName("botonAgregarEmpresaInstitucion");
        
    botonAgregarOcupacion[0].onclick = function(e) {
        e.preventDefault();  
        alert("SE PRESIONÓ  EL BOTON AgregarOcupacion");                
    }

    botonAgregarEmpresaInstitucion[0].onclick = function(e) {
        e.preventDefault();  
        alert("SE PRESIONÓ  EL BOTON botonAgregarEmpresaInstitucion");                
    }
}