<?php
  require "../modelo/BaseDatos.php";
  $accionElegida = $_POST['accion'];
  
if (strcmp($accionElegida, "modificarContrasena") == 0) {          
  $correo = $_POST['correo'];
  $usuario = $_POST['usuario'];
  
  //$nuevaContrasena = getRandomCode();
  $nuevaContrasena = "12345678";
  correo($correo, $nuevaContrasena);
  
  $llave = $usuario;
  $sentencia = "UPDATE administrador SET contrasena = AES_ENCRYPT('$nuevaContrasena','$llave') WHERE correo = '$correo'";
  modificar($sentencia);
}
  

//Método con rand()
/*
function generarRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ( $i = 0; $i &amp;lt; $length; $i++) { 
      $randomString .= $characters[rand(0, $charactersLength - 1)]; 
    }
    return $randomString; 
}
*/

function getRandomCode(){
    $an = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ-)(.:,;";
    $su = strlen($an) - 1;
    return substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1);
}

  function modificar($sentencia) {
    $bd = new BaseDatos();
    $bd->realizarConexion();
    if ($bd->realizarAccion($sentencia)) {
      echo "true";
    } else {
      echo "false";
    }
    $bd->cerrarConexion();
  }

  function correo($remitente, $contrasena) {
    $mensaje = "Hola Usuario!\r\nAcabas de pedir ayuda para recuperar tu contraseña, contraseña = "+ $contrasena +"\r\nUn saludo\r\n\n\n\nwww.ejemplocodigo.com";
    // Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()
    $mensaje = wordwrap($mensaje, 70, "\r\n");
    $asunto = "Cambio de contraseña";
    // Enviarlo
    mail($remitente, $asunto, $mensaje);
    echo "EMAIL ENVIADO...";
  }
    
 ?>
