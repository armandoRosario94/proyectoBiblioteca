<?php
  require "../modelo/BaseDatos.php";
  $accionElegida = $_POST['accion'];
  
  if (strcmp($accionElegida, "mostrarInformacionTablaBibliotecario") == 0) {
    mostrarTodaInformacionTablaBibliotecarioParaEliminar();    
  } elseif (strcmp($accionElegida, "eliminarBibliotecario") == 0) {    
      $cadenaIdBibliotecarios = $_POST['idUsuarios'];
      eliminarBibliotecario($cadenaIdBibliotecarios);    
  }

  
  function mostrarTodaInformacionTablaBibliotecarioParaEliminar() {
    $tabla = '
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

  

  function eliminarBibliotecario($cadenaIdBibliotecarios) {  
    $arregloIdUsuarios = explode(",",$cadenaIdBibliotecarios);
    if (count($arregloIdUsuarios) <= 0) {
      $arregloIdUsuarios[] = $cadenaIdBibliotecarios;
    }
    $bd = new BaseDatos();
    $bd->realizarConexion();
    for ($i=0; $i < count($arregloIdUsuarios); $i++) {
      $sentencia = "DELETE FROM bibliotecario WHERE idUsuario = '$arregloIdUsuarios[$i]'";
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
