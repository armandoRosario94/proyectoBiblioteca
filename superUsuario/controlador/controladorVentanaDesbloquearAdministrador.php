<?php
  require "../modelo/BaseDatos.php";
  $accionElegida = $_POST['accion'];
  
  if (strcmp($accionElegida, "mostrarTodaInformacionTablaAdministrador") == 0) {
    mostrarTodaInformacionTablaAdministrador();
  } elseif (strcmp($accionElegida, "desbloquearAdministrador") == 0) {    
      $cadenaIdAdministradores = $_POST['idUsuarios'];
      desbloquearAdministrador($cadenaIdAdministradores);
  }

  
  function mostrarTodaInformacionTablaAdministrador() {
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
      $query = "select * FROM administrador where estado = 'inactivo'";
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
                <td><input type='checkbox' id = '$fila[0]'></td>
              </tr>
            ";
        }
      }
    $filaTabla .= "</tbody>";
    echo utf8_encode($filaTabla);
    $bd->cerrarConexion();
  }

    function desbloquearAdministrador($cadenaIdAdministradores) {  
    $arregloIdUsuarios = explode(",",$cadenaIdAdministradores);
    if (count($arregloIdUsuarios) <= 0) {
      $arregloIdUsuarios[] = $cadenaIdAdministradores;
    }
    $bd = new BaseDatos();
    $bd->realizarConexion();
    for ($i=0; $i < count($arregloIdUsuarios); $i++) {      
      $sentencia = "UPDATE administrador SET estado = 'activo' WHERE idusuario = '$arregloIdUsuarios[$i]'";
      if ($bd->realizarAccion($sentencia) == false) {
        echo "false";
        $bd->cerrarConexion();
        return;
      }
    }
    echo "true";
    $bd->cerrarConexion();
  }

 ?>
