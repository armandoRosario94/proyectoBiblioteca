<?php
  require "../modelo/BaseDatos.php";
  $accionElegida = $_POST['accion'];  
  

  if (strcmp($accionElegida, "mostrarInformacionPerfilSuperUsuario") == 0) {
    $campoOcultoUsuario = $_POST['campoOcultoUsuario'];
    mostrarInformacionPerfilSuperUsuario($campoOcultoUsuario);    
  } elseif (strcmp($accionElegida, "modificarPerfilSuperUsuario") == 0) {  
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $contrasena = $_POST['contrasena'];
    $genero = $_POST['genero'];
    $correo = $_POST['correo'];
    
    $sentencia = "UPDATE superUsuario SET nombre = '$nombre', apellido = '$apellido', contrasena = AES_ENCRYPT('$contrasena','$usuario'), genero = '$genero', correo = '$correo' WHERE idUsuario = '$usuario'";
    modificar($sentencia);
  }

  
  function mostrarInformacionPerfilSuperUsuario($campoOcultoUsuario) {
    $query = "select * FROM superUsuario WHERE idUsuario = '$campoOcultoUsuario'";
    $bd = new BaseDatos();
    $bd->realizarConexion();
    $resultado = $bd->realizarConsulta($query);

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_array(MYSQLI_BOTH);
        $resultadoUsuario = $fila[0];
        $resultadoNombre = $fila[1];
        $resultadoApellido = $fila[2];
                            //fila[3] => Contrasena
        $resultadoGenero = $fila[4];
        $resultadoCorreo = $fila[5];
                            //fila[6] => Estado          
    } else {
      //HAY UN ERRR
    }
    
    $filaTabla = "    
    <div id='idDivImagenPerfil'>              
    </div>
    <div> 
    Controlador VistaSistema
    <div>             
    <div class='form-group'>
      <label for='' style='text-align:left' class='col-sm-4 control-label'>
        Usuario :
      </label>
      <div class='col-sm-8'>
        <div class='input-group'>          
          <input type='text' class='form-control' name='campoUsuario'  maxlength='50' readonly='true' value = '$resultadoUsuario'>
          <span class='input-group-addon'>
            <i class='fa fa-user-o' aria-hidden='true'>
            </i> 
          </span>
        </div>                                        
      </div>
    </div>                               

    <div class='form-group'>
      <label for='' style='text-align:left' class='col-sm-4 control-label'>
        Nombre:
      </label>
      <div class='col-sm-8'>
        <div class='input-group'>
          <input type='text' class='form-control' name='campoNombre' required readonly='true' value = '$resultadoNombre'>
          <span class='input-group-addon'>
            <i class='fa fa-user-plus' aria-hidden='true'>
            </i>
          </span>
        </div>
      </div>                  
    </div>
    <div class='form-group'>
      <label for='' style='text-align:left' class='col-sm-4 control-label'>
        Apellido:
      </label>
      <div class='col-sm-8'>
        <div class='input-group'>
          <input type='text' class='form-control' name='campoApellido' required readonly='true' value = '$resultadoApellido'>
          <span class='input-group-addon'>
            <i class='fa fa-user-plus' aria-hidden='true'>
            </i> 
          </span>
        </div>                    
      </div>
    </div>
    <div class='form-group'>
      <label for='' style='text-align:left' class='col-sm-4 control-label'>
        Genero:
      </label>
      <div class='col-sm-8'>
        <input disabled type='radio' name='radioGenero' id = 'idRadioGeneroMasculino' value = 'Masculino' checked>                    
        Masculino
        <input disabled type='radio' name='radioGenero'  id = 'idRadioGeneroFemenino' value = 'Femenino'>
        Femenino                  
      </div>                  
    </div>         

    <div class='form-group'>
      <label for='' style='text-align:left' class='col-sm-4 control-label'>
        Correo:
      </label>
      <div class='col-sm-8'>
        <div class='input-group'>
          <input type='text' class='form-control' name='campoCorreo'  maxlength='50' readonly='true' value = '$resultadoCorreo'>
          <span class='input-group-addon'>
            <i class='fa fa-envelope-o' aria-hidden='true'>
            </i> 
          </span>
        </div>                                        
      </div>
    </div>                      
                            
    <div class='form-group'>
      <div class='col-sm-offset-4 col-xs-12 col-sm-8'>
        <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#idModalModificarPerfilSuperUsuario' data-whatever='@mdo' id='idbotonModificar'>        
          <span class='glyphicon glyphicon-erase'></span>
          Modificar Perfil Super Usuario
        </button>
      </div>
    </div>
  ";

    echo utf8_encode($filaTabla);
    //$bd->cerrarConexion();
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
