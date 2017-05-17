<?php
  require "../modelo/BaseDatos.php";
  $accionElegida = $_POST['accion'];
  
  if (strcmp($accionElegida, "mostrarInformacionTablaAdministrador") == 0) {
    mostrarTodaInformacionTablaAdministradorParaEliminar();    
  } elseif (strcmp($accionElegida, "eliminarAdministrador") == 0) {    
      $cadenaIdAdministradores = $_POST['idUsuarios'];
      eliminarAdministrador($cadenaIdAdministradores);    
  }

  
  function mostrarTodaInformacionTablaAdministradorParaEliminar() {
    $tabla = '
    <thead>
      <tr class="info">
        <th>Id Usuario</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Contraseña</th>
        <th>Sexo</th>
        <th>Correo</th>
        <th>Estado</th>
        <th>Marcar</th>
      </tr>
    </thead>

    <tbody>';
      $query = "select * FROM administrador";
      $bd = new BaseDatos();
      $bd->realizarConexion();
      $resultado = $bd->realizarConsulta($query);
      if ($resultado->num_rows > 0) {
        while($fila = $resultado->fetch_array(MYSQLI_BOTH)) {
          $tabla .= "
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
    $tabla .= "</tbody>";
    echo utf8_encode($tabla);
    $bd->cerrarConexion();
  }

  

  function eliminarAdministrador($cadenaIdAdministradores) {  
    $arregloIdUsuarios = explode(",",$cadenaIdAdministradores);
    if (count($arregloIdUsuarios) <= 0) {
      $arregloIdUsuarios[] = $cadenaIdAdministradores;
    }
    $bd = new BaseDatos();
    $bd->realizarConexion();
    for ($i=0; $i < count($arregloIdUsuarios); $i++) {
      $sentencia = "DELETE FROM administrador WHERE idUsuario = '$arregloIdUsuarios[$i]'";
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
