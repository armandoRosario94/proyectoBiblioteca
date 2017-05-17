<?php
  require "../modelo/BaseDatos.php";
  $accionElegida = $_POST['accion'];
  
  if (strcmp($accionElegida, "mostrarTodaInformacionTablaxVer") == 0) {
    mostrarTodaInformacionTablaAdministradorParaVer();
  } 

  
  function mostrarTodaInformacionTablaAdministradorParaVer() {
    $filaTabla = '
      <thead>
        <tr class="info">
          <th>Id Usuario</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Contraseña</th>
          <th>Sexo</th>
          <th>Correo</th>
          <th>Estado</th>          
        </tr>
      </thead>

      <tbody>';
      $query = "select * FROM administrador";
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
              </tr>
            ";
        }
      }
    $filaTabla .= "</tbody>";
    echo utf8_encode($filaTabla);
    $bd->cerrarConexion();
  }
    
 ?>
