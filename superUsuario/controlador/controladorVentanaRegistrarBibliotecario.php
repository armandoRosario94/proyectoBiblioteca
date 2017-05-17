<?php
  require "../modelo/BaseDatos.php";  
  $idUsuario = $_POST['idUsuario'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $contrasena = $_POST['contrasena'];
  $genero = $_POST['genero'];
  $correo = $_POST['correo'];
  $estado = $_POST['estado'];
  $sentencia = "INSERT INTO bibliotecario VALUES('$idUsuario', '$nombre', '$apellido', AES_ENCRYPT('$contrasena','$idUsuario'), '$genero', '$correo', '$estado')";
  $bd = new BaseDatos();
  $bd->realizarConexion();
  if ($bd->realizarAccion($sentencia)) {
    echo "true";
  } else {
    echo "false";
  }
  $bd->cerrarConexion();    
?>
