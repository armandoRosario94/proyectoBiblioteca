$(document).ready(
    function() {
        //evento submit sobre el formulario Registrar Administrador        
        $("#idFormularioEnviarContrasenaCorreo").submit(
            function(e) {
                e.preventDefault();                      
                var campoUsuario = document.getElementById('idCampoUsuarioFormularioEnviarContrasenaCorreo');
                var campoCorreo = document.getElementById('idCampoCorreoFormularioEnviarContrasenaCorreo');

                if (validarCampoCorreoFormularioEnviarContrasenaCorreo(campoUsuario.value,campoCorreo.value) == false) {
                    return;
                } 

                var datosJson = { 
                    accion: "modificarContrasena",                  
                    usuario: campoUsuario.value,
                    correo: campoCorreo.value                    
                };
                modificarContrasena(datosJson);    
            }
        ); //fin del evento del formularioRegistrarAdministrador            
    }//fin de la función donde se ponen todos los eventos de los elementos html
); //final del document


function validarCampoCorreoFormularioEnviarContrasenaCorreo(campoUsuario,campoCorreo) {
    if (campoUsuario == "") {
      alert("El campo usuario está vacío.\nPara iniciar el sistema requiere de ésta información.");
      return false;
    }
    if (campoCorreo == "") {
      alert("El campo Correo está vacío.\nPara iniciar el sistema requiere de ésta información.");
      return false;
    }
    return true;
}

function modificarContrasena(datosJson) {
    $.ajax(
        {
            method: "POST",
            url: "controlador/controladorVentanaEnviarContrasenaCorreo.php",
            data: datosJson
        }
    ).done(
        function( msg ) {
            console.log("resultado: "+msg);
            if (msg == "true") {
                alert("La información se modificó correctamente.");                
                $("#botonReset").click();
            } else {
                alert("La información no se pudo modificar.");
            }
        }
    );
}

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


function validarCorreo(e){
    var evento = e  || window.event;
    key = e.keyCode || e.which;       
    teclado = String.fromCharCode(key).toUpperCase();           
    letras = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ_-.0123456789@";
    especiales ="16-17-32-37-38-39-40-46-164";
    simbolos ="@._"
    //8 = retroceso eliminar, 16 = escape, 17 = ctrl, 37 = <-- , 38 = ^, 39 = -->, 40 = v, 46 = supr, 164 =
    tecladoEspecial = false;        
    if (letras.indexOf(teclado) == -1){
        //No es letra
        //return false;
         e.preventDefault();
    } else {
        //es letra
        var array = document.getElementsByName("campoCorreo");                           
        if ((array[0].value.length+1) <= 30){                       
          // return true;
          return;
        } else{
            //return false;
             e.preventDefault();
        }               
    }       
}
function validarUsuario(e) {     
    var evento = e  || window.event;
    key = e.keyCode || e.which;       
    teclado = String.fromCharCode(key).toUpperCase();           
    letras = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890";
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
        var array = document.getElementsByName("campoIdUsuario");                          
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

function validarContrasena1(e){
    var array = document.getElementsByName("campoContrasena1");                         
    if ((array[0].value.length+1) <= 15){                       
        return ;
    } else{
        //return false;
         e.preventDefault();
    }                   
}

function validarContrasena2(e){
    var array = document.getElementsByName("campoContrasena2");                         
    if ((array[0].value.length+1) <= 15){                       
        //return true;
        return;
    } else{
        //return false;
         e.preventDefault();
    }                   
}