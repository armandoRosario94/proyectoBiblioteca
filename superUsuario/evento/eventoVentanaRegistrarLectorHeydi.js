$(document).ready(
    function() {
        //evento submit sobre el formulario Registrar Administrador

        //Validar campoNombre
        $("#idCampoNombre").keydown(function (e) {
             validarNombre(e);
        });
        //Validar campoApellido
        $("#idCampoApellido").keydown(function (e) {
             validarApellido(e);
        });
        //Validar campoTelefono
        $("#idCampoTelefono").keydown(function (e) {
             validarTelefono(e);
        });
        //Validar campoTelefonoReferencia
        $("#idCampoTelefonoReferencia").keydown(function (e) {
              validarTelefonoReferencia(e);
        });
        //Validar campoCodigoPostal
        $("#idCampoCodigoPostal").keydown(function (e) {
              validarTelefonoReferencia(e);
        });
        //Validar campoTelefonoEmpresaInstitucion
           $("#idCampoTelefonoEmpresaInstitucion").keydown(function (e) {
              validarTelefonoEmpresaInstitucion(e);
        });
    }//fin de la función donde se ponen todos los eventos de los elementos html
); //final del document

//Métodos para hacer n cosas
function validarNombre(e) {     
    var evento = e  || window.event;
    key = e.keyCode || e.which;       
    teclado = String.fromCharCode(key).toUpperCase();           
    letras = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
    especiales ="16-17-37-38-39-40-46-164";
    //8 = retroceso eliminar, 16 = escape, 17 = ctrl, 37 = <-- , 38 = ^, 39 = -->, 40 = v, 46 = supr, 164 =
    tecladoEspecial = false;        
    if (letras.indexOf(teclado) == -1){
        //No es letra
        //alert("No es letra"); 
        //return false;
        e.preventDefault();
    } else {
        //es letra
        var array = document.getElementsByName("campoNombre");                          
        if ((array[0].value.length+1) <= 30){   
            //alert("Si es letra");                     
            //return true;
             return;
        } else{
           // alert("No es letra"); 
//            return false;
            e.preventDefault();
        }               
    }       
}

function validarApellido(e) {     
    var evento = e  || window.event;
    key = e.keyCode || e.which;       
    teclado = String.fromCharCode(key).toUpperCase();           
    letras = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
    especiales ="16-17-37-38-39-40-46-164";
    //8 = retroceso eliminar, 16 = escape, 17 = ctrl, 37 = <-- , 38 = ^, 39 = -->, 40 = v, 46 = supr, 164 =
    tecladoEspecial = false;        
    if (letras.indexOf(teclado) == -1){
        //No es letra
        //alert("No es letra"); 
        //return false;
        e.preventDefault();
    } else {
        //es letra
        var array = document.getElementsByName("campoApellido");                          
        if ((array[0].value.length+1) <= 30){   
            //alert("Si es letra");                     
            //return true;
             return;
        } else{
           // alert("No es letra"); 
//            return false;
            e.preventDefault();
        }               
    }       
}

function validarTelefono(e) {     
    var evento = e  || window.event;
    key = e.keyCode || e.which;       
    teclado = String.fromCharCode(key).toUpperCase();           
    letras = " 0123456789";
    especiales ="16-17-32-37-38-39-40-46-164";
    //8 = retroceso eliminar, 16 = escape, 17 = ctrl, 37 = <-- , 38 = ^, 39 = -->, 40 = v, 46 = supr, 164 =
    tecladoEspecial = false;        
    if (letras.indexOf(teclado) == -1){
        //No es letra
        //alert("No es letra"); 
        //return false;
        e.preventDefault();
    } else {
        //es letra
        var array = document.getElementsByName("campoTelefono");                          
        if ((array[0].value.length+1) <= 12){   
            //alert("Si es letra");                     
            //return true;
             return;
        } else{
           // alert("No es letra"); 
//            return false;
            e.preventDefault();
        }               
    }       
}
function validarTelefonoReferencia(e) {     
    var evento = e  || window.event;
    key = e.keyCode || e.which;       
    teclado = String.fromCharCode(key).toUpperCase();           
    letras = " 0123456789";
    especiales ="16-17-32-37-38-39-40-46-164";
    //8 = retroceso eliminar, 16 = escape, 17 = ctrl, 37 = <-- , 38 = ^, 39 = -->, 40 = v, 46 = supr, 164 =
    tecladoEspecial = false;        
    if (letras.indexOf(teclado) == -1){
        //No es letra
        //alert("No es letra"); 
        //return false;
        e.preventDefault();
    } else {
        //es letra
        var array = document.getElementsByName("campoTelefonoReferencia");                          
        if ((array[0].value.length+1) <= 12){   
            //alert("Si es letra");                     
            //return true;
             return;
        } else{
           // alert("No es letra"); 
//            return false;
            e.preventDefault();
        }               
    }       
}

function validarCodigoPostal(e) {     
    var evento = e  || window.event;
    key = e.keyCode || e.which;       
    teclado = String.fromCharCode(key).toUpperCase();           
    letras = " 0123456789";
    especiales ="16-17-32-37-38-39-40-46-164";
    //8 = retroceso eliminar, 16 = escape, 17 = ctrl, 37 = <-- , 38 = ^, 39 = -->, 40 = v, 46 = supr, 164 =
    tecladoEspecial = false;        
    if (letras.indexOf(teclado) == -1){
        //No es letra
        //alert("No es letra"); 
        //return false;
        e.preventDefault();
    } else {
        //es letra
        var array = document.getElementsByName("campoCodigoPostal");                          
        if ((array[0].value.length+1) <= 5){   
            //alert("Si es letra");                     
            //return true;
             return;
        } else{
           // alert("No es letra"); 
//            return false;
            e.preventDefault();
        }               
    }       
}

function validarTelefonoEmpresaInstitucion(e){   
    var evento = e  || window.event;
    key = e.keyCode || e.which;       
    teclado = String.fromCharCode(key).toUpperCase();           
    letras = " 0123456789";
    especiales ="16-17-32-37-38-39-40-46-164";
    //8 = retroceso eliminar, 16 = escape, 17 = ctrl, 37 = <-- , 38 = ^, 39 = -->, 40 = v, 46 = supr, 164 =
    tecladoEspecial = false;        
    if (letras.indexOf(teclado) == -1){
        //No es letra
        //alert("No es letra"); 
        //return false;
        e.preventDefault();
    } else {
        //es letra
        var array = document.getElementsByName("campoTelefono");                          
        if ((array[0].value.length+1) <= 12){   
            //alert("Si es letra");                     
            //return true;
             return;
        } else{
           // alert("No es letra"); 
//            return false;
            e.preventDefault();
        }               
    }       
}