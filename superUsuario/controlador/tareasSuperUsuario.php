<?php
  require "../php/BaseDatos.php";
  $accionElegida = $_POST['accion'];
  $tablaElegida = $_POST['tabla'];
  $banderaResultadoAccion = "true";

  if (strcmp($accionElegida, "reg
    istrar") == 0) {
    if (strcmp($tablaElegida, "administrador") == 0) {
      $idUsuario = $_POST['idUsuario'];
      $nombre = $_POST['nombre'];
      $apellido = $_POST['apellido'];
      $contrasena = $_POST['contrasena'];
      $sexo = $_POST['sexo'];
      $correo = $_POST['correo'];
      $estado = $_POST['estado'];
      $sentencia = "INSERT INTO administrador VALUES('$idUsuario', '$nombre', '$apellido', '$contrasena', '$sexo', '$correo', '$estado')";
      registrar($sentencia);
    } elseif (strcmp($tablaElegida, "bibliotecario") == 0) {
      
    } 
  } elseif (strcmp($accionElegida, "eliminar") == 0) {
    if (strcmp($tablaElegida, "administrador") == 0) {
      $cadenaIdAdministradores = $_POST['idUsuarios'];
      eliminarAdministrador($cadenaIdAdministradores);
    } elseif (strcmp($tablaElegida, "bibliotecario") == 0) {
      
    } 
  } elseif (strcmp($accionElegida, "modificar") == 0) {
    if (strcmp($tablaElegida, "administrador") == 0) {
      $idUsuario = $_POST['idUsuario'];
      $nombre = $_POST['nombre'];
      $apellido = $_POST['apellido'];
      $contrasena = $_POST['contrasena'];
      $sexo = $_POST['sexo'];
      $correo = $_POST['correo'];
      $estado = $_POST['estado'];
      
      $sentencia = "UPDATE administrador SET nombre = '$nombre', apellido = '$apellido', contrasena = '$contrasena', sexo = '$sexo', correo = '$correo', estado = '$estado' WHERE idUsuario = '$idUsuario'";
      modificar($sentencia);
    } elseif (strcmp($tablaElegida, "bibliotecario") == 0) {

    } 
  } elseif (strcmp($accionElegida, "mostrarInformacionTablaEliminar") == 0) {
    if (strcmp($tablaElegida, "administrador") == 0) {
      mostrarTodaInformacionTablaAdministradorParaEliminar();
    } elseif (strcmp($tablaElegida, "bibliotecario") == 0) {
      //mostrarTodoSemestre();
    }
  } elseif (strcmp($accionElegida, "mostrarInformacionTablaModificar") == 0) {
    if (strcmp($tablaElegida, "administrador") == 0) {
      mostrarTodaInformacionTablaAdministradorParaModificar();
    } elseif (strcmp($tablaElegida, "bibliotecario") == 0) {
      //mostrarTodoSemestre();
    }
  } elseif (strcmp($accionElegida, "mostrarTodaInformacionTablaxVer") == 0) {
    if (strcmp($tablaElegida, "administrador") == 0) {
      mostrarTodaInformacionTablaAdministradorParaVer();
    } elseif (strcmp($tablaElegida, "bibliotecario") == 0) {
      //mostrarTodoSemestre();
    }
  }


  function registrar($sentencia) {    
    $bd = new BaseDatos();
    $bd->realizarConexion();
    if ($bd->realizarAccion($sentencia)) {
      echo "true";
    } else {
      echo "false";
    }
    $bd->cerrarConexion();
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

  function mostrarTodaInformacionTablaAdministradorParaModificar() {
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

  
  function mostrarTodoCarrera() {
    $filaTabla = '
    <thead>
      <tr class="info">
        <th>Numero carrera</th>
        <th>Nombre carrera</th>
      </tr>
    </thead>
    <tbody>
    ';
    $query = "select * FROM carrera";
    $bd = new BaseDatos();
    $bd->realizarConexion();
    $resultado = $bd->realizarConsulta($query);
    if ($resultado->num_rows > 0) {
      while($fila = $resultado->fetch_array(MYSQLI_BOTH)) {
        $filaTabla .= "
            <tr>
              <td>$fila[0]</td>
              <td>$fila[1]</td>
            </tr>
          ";
      }
    }
    $filaTabla .= "</tbody>";
    echo utf8_encode($filaTabla);
    $bd->cerrarConexion();
  }
 ?>
