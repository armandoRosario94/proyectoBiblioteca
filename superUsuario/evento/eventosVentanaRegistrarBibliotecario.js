$(document).ready(
    function() {
        //evento submit sobre el formulario Registrar Administrador

        //Validar campoNombre
        $("#idCampoNombre").keydown(function (e) {
             validarNombre(e);
        });
        //Validas campoApellido
        $("#idCampoApellido").keydown(function (e) {
             validarApellido(e);
        });
        //Validas campoCorreo
        $("#idCampoCorreo").keydown(function (e) {
             validarCorreo(e);
        });
        //Validas campoUsuario
        $("#idCampoUsuario").keydown(function (e) {
              validarUsuario(e);
        });
        //Validas campoContraseña
        $("#idCampoContrasena1").keydown(function (e) {
              validarContrasena1(e);
        });
        //Validas campoContraseña2
        $("#idCampoContrasena2").keydown(function (e) {
              validarContrasena2(e);
        });
        $("#formularioRegistrarBibliotecario").submit(
            function(e) {
                e.preventDefault();

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
                    radioGeneroSeleccionado = "Femenino";                
                }
                var campoCorreo = document.getElementsByName('campoCorreo');

                if (validarCamposFormularioRegistrarBibliotecario(campoIdUsuario[0].value, campoNombre[0].value, campoApellido[0].value, campoContrasena1[0].value,campoContrasena2[0].value, campoCorreo[0].value) == false) {
                    return;
                } 
                if (validarAmbasContrasenas(campoContrasena1[0].value,campoContrasena2[0].value) == false) {
                    return;
                }        
                var datosJson = {
                    idUsuario: campoIdUsuario[0].value,
                    nombre: campoNombre[0].value,
                    apellido: campoApellido[0].value,
                    contrasena: campoContrasena1[0].value,
                    genero: radioGeneroSeleccionado,
                    correo: campoCorreo[0].value,
                    estado: 'activo'
                };
                guardarInformacion(datosJson);    
            }
        ); //fin del evento del formularioRegistrarAdministrador            
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
            url: "controlador/controladorVentanaRegistrarBibliotecario.php",
            data: datosJson
        }
    ).done(
        function( msg ) {
            console.log("resultado: "+msg);
            if (msg == "true") {
                alert("La información se guardó correctamente.");                
                $("#botonReset").click();
            } else {
                alert("La información no se pudo guardar.");
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