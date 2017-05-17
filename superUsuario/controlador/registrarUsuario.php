<?php
  require "BaseDatos.php";
  $id = $_POST["id"];
  $accion = $_POST["accion"];

  if (strcmp($accion,"registrar") == 0) {
    registrar($id);
  } else {
    $tabla = $_POST["tabla"];
    eliminar($id, $tabla);
  }

  function registrar($id) {
    $id = intval($id);
    $query = "SELECT usuario,rolEmpleado,nombreEmpleado,apellidosEmpleado,AES_DECRYPT(password,'$id'),sexoEmpleado,telefonoEmpleado,correoEmpleado FROM preregistro WHERE usuario = $id";
    $bd = new BaseDatos();
    $bd->realizarConexion();
    $resultado = $bd->realizarConsulta($query);
    $numResultados = $resultado->num_rows;
    $fila = $resultado->fetch_array(MYSQLI_BOTH);
    if ($numResultados >= 1) {
      $sentencia = "INSERT INTO usuario(usuario,nombreUsuario,apellidosUsuario,password,rolUsuario,sexoUsuario,correoUsuario,telefonoUsuario,estado) VALUES(" . $fila[0] . ",'" . $fila[2] . "','" . $fila[3] . "',AES_ENCRYPT('$fila[4]','$fila[0]'),'" . $fila[1] . "','" . $fila[5] . "','" . $fila[7] . "','" . $fila[6] . "', 0)";
      if($bd->realizarAccion($sentencia)) {
        $query = "DELETE FROM preregistro WHERE usuario = " . $id;
        $bd->realizarAccion($query);
        echo "0";
      } else {
        echo "1";
      }
    } else {
      echo "2";
    }
    $bd->cerrarConexion();
  }

  function eliminar($id, $tabla) {
    $bd = new BaseDatos();
    $bd->realizarConexion();
    $query = "DELETE FROM $tabla WHERE usuario = " . $id;
    if ($bd->realizarAccion($query)) {
      echo "0";
    } else {
      echo "1";
    }
    $bd->cerrarConexion();
  }
?>
