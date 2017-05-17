window.onload = function() {
  var numeroDeIntentos = 0;
  var botonEntrar = document.getElementsByName("botonEntrar");
  var botonLimpiar = document.getElementsByName("botonLimpiar");
  var comboRolUsuario = document.getElementsByName("comboRolUsuario");
  var campoUsuario = document.getElementsByName("campoUsuario");
  var campoContrasena = document.getElementsByName("campoContrasena");
  var idVinculoRecuperarContrasena = document.getElementById("idVinculoRecuperarContrasena");
    
  idVinculoRecuperarContrasena.onclick = function(e) {
    e.preventDefault();
    alert("Se presionó la idVinculoRecuperarContrasena heydi y armando");
    window.location = "ventanaEnviarContrasenaCorreo.php";
  }

  botonEntrar[0].onclick = function(e) {      
    e.preventDefault();      
    alert("se presionó el boton aceptar");
    if (validarCampos(campoUsuario[0].value, campoContrasena[0].value) == false) {
      return;
    }  
    numeroDeIntentos = numeroDeIntentos + 1 ;    
    if (numeroDeIntentos >= 4) {
      inhabilitarElementosLogin();      
      ejecutarAjax(numeroDeIntentos); //inactivo
    } else {
      //alert(comboRolUsuario[0].value);
      ejecutarAjax(numeroDeIntentos); //activo
    }

  }

  
  function ejecutarAjax(numeroDeIntentos) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {      
      if (this.readyState == 4 && this.status == 200) {
        var resultado = parseInt(this.responseText);        
        //alert("valor de resultado(ajax): "+resultado);
        if (resultado == 2) {
          inhabilitarElementosLogin();
          alert("El usuario está bloqueado temporalmente, consulte con el administrador");
        } else if (resultado == 1) {                              
          //alert("combo = "+comboRolUsuario[0].value);
          //alert("USUARIO: "+ comboRolUsuario[0].value);
          if (comboRolUsuario[0].value== "superUsuario") {            
            window.location = "superUsuario";
          } else if (comboRolUsuario[0].value== "administrador") {
            window.location = "administrador";
          } else if (comboRolUsuario[0].value== "bibliotecario") {

            //alert("es bibliotecario");
            window.location = "bibliotecario";
          }
        } else if (resultado == 0){
          if (numeroDeIntentos <= 3) {
             alert("La información proporcionada no es correcta");
          }                  
        } else if(resultado == -1){
          alert("El usuario se ha bloqueado, debido que alcanzó los 3 intentos fallidos");
          inhabilitarElementosLogin();
        } 
      }
    }
    //xmlhttp.open("GET", "php/entrarSistema.php?usuario="+campoUsuario[0].value+"&password="+campoContrasena[0].value+"&estado="+estado, true);
    xmlhttp.open("GET", "controlador/entrarSistema.php?rolUsuario="+comboRolUsuario[0].value+"&usuario="+campoUsuario[0].value+"&contrasena="+campoContrasena[0].value+"&numeroDeIntentos="+numeroDeIntentos, true);
    xmlhttp.send();
  }


  function inhabilitarElementosLogin() {
    campoUsuario[0].disabled = true;
    campoContrasena[0].disabled = true;
    botonEntrar[0].disabled = true;
    botonLimpiar[0].disabled = true;    
  }
  
  function validarCampos(campoUsuario, campoPassword) {
    if (campoUsuario == "") {
      alert("El campo Usuario está vacío.\nPara iniciar el sistema requiere de ésta información.");
      return false;
    }
    if (campoPassword == "") {
      alert("El campo Contraseña está vacío.\nPara iniciar el sistema requiere de ésta información.");
      return false;
    }
    return true;
  }
  
  function validarUsuario(campoUsuario) {
    if (campoUsuario.value == "") {
      alert("El campo Usuario está vacío.\nPara recuperar su contraseña el sistema requiere de ésta información.");
      return false;
    }
    return true;
  }
}