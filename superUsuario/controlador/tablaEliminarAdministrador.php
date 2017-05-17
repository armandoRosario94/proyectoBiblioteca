<?php
  require "../php/BaseDatos.php";  

  class tablaEliminarAdministrador {

    public function verAdministradoresRegistrados() {
      $query = "SELECT usuario,contrasena,nombre,apellido,sexo,correo,estado FROM administrador";
      $bd = new BaseDatos();
      $bd->realizarConexion();
      $resultado = $bd->realizarConsulta($query);
      //$numResultados = $resultado->num_rows;

      echo '
        <div class="table-responsive">
          <table class="table table-hover">
           <thead>
              <tr>
                <th>Borrar</th>
                <th>usuario</th>
                <th>Contraseña</th>                
                <th>Nombre</th>
                <th>Apellido</th>                            
                <th>Sexo</th>
                <th>Correo</th>
                <th>Estado</th>              
              </tr>
           </thead>
           <tbody>';              
              //$bd->realizarConexion();
              //$resultado = $bd->realizarConsulta($query);
              while ($fila = $resultado->fetch_array(MYSQLI_BOTH)) {
                echo '<tr>
                        <td><button type="button" name="botonBorrarAdministrador" usuario = "' . $fila[0] . '" value="Borrar" class="btn btn-default" aria-label="Left Align"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        </td>';
                  echo '<td>' .
                          $fila[0]//usuario
                      . '</td>';
                  echo '<td>' .
                          $query = "SELECT AES_DECRYPT(contrasena,'$fila[0]') FROM administrador WHERE usuario = '$fila[0]'";
                          $resultado2 = $bd->realizarConsulta($query);
                          $fila2 = $resultado2->fetch_array(MYSQLI_BOTH);
                          echo $fila2[0];//contrasena
                      . '</td>';
                  echo '<td>' .
                          $fila[1]//nombre
                     . '</td>';
                  echo '<td>';                  
                          $fila[2]//apellido
                  echo '</td>';
                  echo '<td>' .
                         $fila[3]//sexo
                    . '</td>';
                  echo '<td>' .
                         $fila[4]//correo
                     . '</td>';                              
                  echo '<td>';
                          if ($fila[5] == "activo") {
                            echo "Activo";
                          } else {
                            echo "Bloqueado";
                          }
                  echo '</td>';
                echo '</tr>';
              }
              $bd->cerrarConexion();
    echo '</tbody>
         </table>
        </div>
      ';
    }
  }
?>
