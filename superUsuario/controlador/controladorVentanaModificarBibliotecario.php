<?php
  require "../modelo/BaseDatos.php";
  $accionElegida = $_POST['accion'];
  
  if (strcmp($accionElegida, "mostrarInformacionTablaBibliotecario") == 0) {
      mostrarTodaInformacionTablaBibliotecarioParaModificar();
  } elseif (strcmp($accionElegida, "modificar") == 0) {
      $idUsuario = $_POST['idUsuario'];
      $nombre = $_POST['nombre'];
      $apellido = $_POST['apellido'];
      $contrasena = $_POST['contrasena'];
      $genero = $_POST['genero'];
      $correo = $_POST['correo'];
      $estado = $_POST['estado'];
      
      $sentencia = "UPDATE bibliotecario SET nombre = '$nombre', apellido = '$apellido', contrasena = AES_ENCRYPT('$contrasena','$idUsuario'), genero = '$genero', correo = '$correo', estado = '$estado' WHERE idUsuario = '$idUsuario'";
      modificar($sentencia);
  }

  
  function mostrarTodaInformacionTablaBibliotecarioParaModificar() {
    $filaTabla = '
    <thead>
      <tr class="info">
        <th>Id Usuario</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Contraseña</th>
        <th>Genero</th>
        <th>Correo</th>
        <th>Estado</th>
        <th>Marcar</th>
      </tr>
    </thead>

    <tbody>';
    $query = "select * FROM bibliotecario";
    $bd = new BaseDatos();
    $bd->realizarConexion();
    $resultado = $bd->realizarConsulta($query);
    if ($resultado->num_rows > 0) {
      while($fila = $resultado->fetch_array(MYSQLI_BOTH)) {
        $filaTabla .= "
            <tr>
              <td>$fila[0]</td>
              <td>$fila[1]</td>
              <td>$fila[2]</td>
              <td>$fila[3]</td>
              <td>$fila[4]</td>
              <td>$fila[5]</td>
              <td>$fila[6]</td>
              <td><input type='radio' name = 'radioButton' id = '$fila[0]' value = '$fila[1]/$fila[2]/$fila[3]/$fila[4]/$fila[5]'></td>
            </tr>
          ";
      }
    }
    $filaTabla .= "</tbody>";
    echo utf8_encode($filaTabla);
    $bd->cerrarConexion();
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
    
 ?>
