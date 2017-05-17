<?php
  require "Login.php";    
  
  $rolUsuario = $_GET["rolUsuario"];
  $usuario = $_GET["usuario"];
  $contrasena = $_GET["contrasena"];    
  $numeroDeIntentos = $_GET["numeroDeIntentos"];

  $obj1 = new Login();
  $obj1->setRolUsuario($rolUsuario);
  $obj1->setUsuario($usuario);
  $obj1->setContrasena($contrasena);  
  $obj1->setNumeroDeIntentos($numeroDeIntentos);
  $obj1->iniciarPrograma();

  echo $obj1->getResultado();  
?>
