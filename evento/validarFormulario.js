function validarNumeroEmpleado(elEvento){
	var evento = elEvento  || window.event;
	key = elEvento.keyCode || elEvento.which;		
	teclado = String.fromCharCode(key).toUpperCase();			
	letras = "0123456789";

	if (letras.indexOf(teclado) == -1){
		//No es letra
		return false;
	} else {
		//es letra
		var array = document.getElementsByName("numeroId");							
		if ((array[0].value.length+1) <= 10){						
			return true;
		} else{
			return false;
		}				
	}	
}


function validarNombre(elEvento) {	
	var evento = elEvento  || window.event;
	key = elEvento.keyCode || elEvento.which;		
	teclado = String.fromCharCode(key).toUpperCase();			
	letras = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
	especiales ="8-16-17-37-38-39-40-46-164";
	//8 = retroceso eliminar, 16 = escape, 17 = ctrl, 37 = <-- , 38 = ^, 39 = -->, 40 = v, 46 = supr, 164 =
	tecladoEspecial = false;		
	if (letras.indexOf(teclado) == -1){
		//No es letra
		return false;
	} else {
		//es letra
		var array = document.getElementsByName("nombre");							
		if ((array[0].value.length+1) <= 30){						
			return true;
		} else{
			return false;
		}				
	}		
}

function convertirMayusculaNombre(elEvento){	
		var evento = elEvento  || window.event;
	key = elEvento.keyCode || elEvento.which;		
	teclado = String.fromCharCode(key).toUpperCase();			
	letras = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
	tecladoEspecial = false;		
	if (letras.indexOf(teclado) == -1){
		//No es letra
		return false;
	} else {
		//es letra		
		var array = document.getElementsByName('nombre');								
		var campoNombre = array[0];						
		campoNombre.value = campoNombre.value.toUpperCase();			
	
	}		
}


function validarApellidos(elEvento) {	
	var evento = elEvento  || window.event;
	key = elEvento.keyCode || elEvento.which;		
	teclado = String.fromCharCode(key).toUpperCase();			
	letras = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
	especiales ="8-16-17-37-38-39-40-46-164";
	//8 = retroceso eliminar, 16 = escape, 17 = ctrl, 37 = <-- , 38 = ^, 39 = -->, 40 = v, 46 = supr, 164 =
	tecladoEspecial = false;		
	if (letras.indexOf(teclado) == -1){
		//No es letra
		return false;
	} else {
		//es letra
		var array = document.getElementsByName("apellidos");							
		if ((array[0].value.length+1) <= 30){						
			return true;
		} else{
			return false;
		}				
	}		
}

function convertirMayusculaApellidos(elEvento){	
	var evento = elEvento  || window.event;
	key = elEvento.keyCode || elEvento.which;		
	teclado = String.fromCharCode(key).toUpperCase();			
	letras = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
	tecladoEspecial = false;		
	if (letras.indexOf(teclado) == -1){
		//No es letra
		return false;
	} else {
		//es letra		
		var array = document.getElementsByName('apellidos');								
		var campoApellidos = array[0];						
		campoApellidos.value = campoApellidos.value.toUpperCase();			
	
	}		
}

function validarSoloNumeros(elEvento) {		
	if(window.event){ //asignamos el valor de la tecla a keynum
		keynum = elEvento.keyCode; //IE
	} else {
		keynum = elEvento.which; //FF
	}
	//Comprobamos si se encuentra en el rango númerico y que telclas no recibirá
	if ((keynum > 47 && keynum < 58) || keynum == 8 || keynum ==13 || keynum == 6) {
		var array = document.getElementsByName("telefono");			
		//alert("longitud: "+(array[0].value.length+1));
		if ((array[0].value.length+1) > 10){
			//alert("son >= 10");
			return false;
		}else{
			//alert("No son 10");
			return true;
		}			
	} else {
		//alert("No es un numero");
		return false;
	}
}


function validarCorreo(elEvento){
	var evento = elEvento  || window.event;
	key = elEvento.keyCode || elEvento.which;		
	teclado = String.fromCharCode(key).toUpperCase();			
	letras = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ_-.0123456789@";
	especiales ="8-16-17-37-38-39-40-46-164";
	simbolos ="@._"
	//8 = retroceso eliminar, 16 = escape, 17 = ctrl, 37 = <-- , 38 = ^, 39 = -->, 40 = v, 46 = supr, 164 =
	tecladoEspecial = false;		
	if (letras.indexOf(teclado) == -1){
		//No es letra
		return false;
	} else {
		//es letra
		var array = document.getElementsByName("correo");							
		if ((array[0].value.length+1) <= 30){						
			return true;
		} else{
			return false;
		}				
	}		
}

function validarContrasena(elEvento){
	var array = document.getElementsByName("pass");							
	if ((array[0].value.length+1) <= 15){						
		return true;
	} else{
		return false;
	}					
}

function validarEmail(valor) {
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/.test(valor)){
   alert("La dirección de email " + valor + " es correcta.");
  } else {
   alert("La dirección de email es incorrecta.");
  }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////


function validarNumeroCarrera(elEvento){
	var evento = elEvento  || window.event;
	key = elEvento.keyCode || elEvento.which;		
	teclado = String.fromCharCode(key).toUpperCase();			
	letras = "0123456789";

	if (letras.indexOf(teclado) == -1){
		//No es letra
		return false;
	} else {
		//es letra
		var array = document.getElementsByName("num_carrera");							
		if ((array[0].value.length+1) <= 10){						
			return true;
		} else{
			return false;
		}				
	}	
}

function validarNombreCarrera(elEvento) {	
	var evento = elEvento  || window.event;
	key = elEvento.keyCode || elEvento.which;		
	teclado = String.fromCharCode(key).toUpperCase();			
	letras = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
	especiales ="8-16-17-37-38-39-40-46-164";
	//8 = retroceso eliminar, 16 = escape, 17 = ctrl, 37 = <-- , 38 = ^, 39 = -->, 40 = v, 46 = supr, 164 =
	tecladoEspecial = false;		
	if (letras.indexOf(teclado) == -1){
		//No es letra
		return false;
	} else {
		//es letra
		var array = document.getElementsByName("name_carrera");							
		if ((array[0].value.length+1) <= 30){						
			return true;
		} else{
			return false;
		}				
	}		
}


function validarNombrePeriodo(elEvento) {	
	var evento = elEvento  || window.event;
	key = elEvento.keyCode || elEvento.which;		
	teclado = String.fromCharCode(key).toUpperCase();			
	letras = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
	especiales ="8-16-17-37-38-39-40-46-164";
	//8 = retroceso eliminar, 16 = escape, 17 = ctrl, 37 = <-- , 38 = ^, 39 = -->, 40 = v, 46 = supr, 164 =
	tecladoEspecial = false;		
	if (letras.indexOf(teclado) == -1){
		//No es letra
		return false;
	} else {
		//es letra
		var array = document.getElementsByName("name_periodo");							
		if ((array[0].value.length+1) <= 30){						
			return true;
		} else{
			return false;
		}				
	}		
}


function validarNombreSemestre(elEvento) {	
	var evento = elEvento  || window.event;
	key = elEvento.keyCode || elEvento.which;		
	teclado = String.fromCharCode(key).toUpperCase();			
	letras = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
	especiales ="8-16-17-37-38-39-40-46-164";
	//8 = retroceso eliminar, 16 = escape, 17 = ctrl, 37 = <-- , 38 = ^, 39 = -->, 40 = v, 46 = supr, 164 =
	tecladoEspecial = false;		
	if (letras.indexOf(teclado) == -1){
		//No es letra
		return false;
	} else {
		//es letra
		var array = document.getElementsByName("name_semestre");							
		if ((array[0].value.length+1) <= 30){						
			return true;
		} else{
			return false;
		}				
	}		
}


function validarNombreGrupo(elEvento) {	
	var evento = elEvento  || window.event;
	key = elEvento.keyCode || elEvento.which;		
	teclado = String.fromCharCode(key).toUpperCase();			
	letras = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
	especiales ="8-16-17-37-38-39-40-46-164";
	//8 = retroceso eliminar, 16 = escape, 17 = ctrl, 37 = <-- , 38 = ^, 39 = -->, 40 = v, 46 = supr, 164 =
	tecladoEspecial = false;		
	if (letras.indexOf(teclado) == -1){
		//No es letra
		return false;
	} else {
		//es letra
		var array = document.getElementsByName("name_grupo");							
		if ((array[0].value.length+1) <= 30){						
			return true;
		} else{
			return false;
		}				
	}		
}


/* Esta mal
function validarNumeroAlumnos(elEvento) {		
	if(window.event){ //asignamos el valor de la tecla a keynum
		keynum = elEvento.keyCode; //IE
	} else {
		keynum = elEvento.which; //FF
	}
	//Comprobamos si se encuentra en el rango númerico y que telclas no recibirá
	if ((keynum > 47 && keynum < 58) || keynum == 8 || keynum ==13 || keynum == 6) {
		var array = document.getElementsByName("num_alumnos");			
		//alert("longitud: "+(array[0].value.length+1));
		if ((array[0].value.length+1) > 10){
			//alert("son >= 10");
			return false;
		}else{
			//alert("No son 10");
			return true;
		}			
	} else {
		//alert("No es un numero");
		return false;
	}
}
*/


function validarNumeroAlumnos(elEvento){
	var evento = elEvento  || window.event;
	key = elEvento.keyCode || elEvento.which;		
	teclado = String.fromCharCode(key).toUpperCase();			
	letras = "0123456789";

	if (letras.indexOf(teclado) == -1){
		//No es letra
		return false;
	} else {
		//es letra
		var array = document.getElementsByName("num_alumnos");							
		if ((array[0].value.length+1) <= 10){						
			return true;
		} else{
			return false;
		}				
	}	
}