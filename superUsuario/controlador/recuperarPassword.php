<?php
  require "Login.php";

  $usuario = $_GET["usuario"];

  $obj1 = new Login();
  $obj1->setUsuario($usuario);
  $obj1->recuperarContrasena();
  echo $obj1->getResultado();

?>