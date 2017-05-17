<?php
	include('BaseDatos.php');
	header("Content-Type: text/html;charset=utf-8");
	$guardar=new guardarDatos();
	$varNumeroId = $_POST['numeroId'];
	$varNombre = $_POST['nombre'];
	$varApellidos = $_POST['apellidos'];

	//no se menciona en la tabla BD
	$varCampus = $_POST['campus'];
	$varCarrera = $_POST['carrera'];
	//////////////////////////////////

	$varRolEmpleadoString = $_POST['rolEmpleado'];

	if (strcasecmp($varRolEmpleadoString,"servicios escolares") == 0) {
		$varCarrera = "NULL";
	}
	$varSexo = $_POST['sexo'];
	$varTelefono = $_POST['telefono'];
	$varCorreo = $_POST['correo'];
	$varPassword = $_POST['pass'];
	if ($guardar->llenarTablaPreregistro($varNumeroId,$varNombre,$varApellidos,$varPassword,$varRolEmpleadoString,$varSexo,$varTelefono,$varCorreo, $varCampus, $varCarrera)) {
      echo "<script>
              alert('Información almacenada correctamente');
              window.location.href = '../pre_registro.php';
            </script>";
    } else {
      echo "<script>
            alert('La informacón no se pudo guardar.Puede que su Id de empleado ya esté preregistrado.');
            window.location.href = 'javascript:history.go(-1)';
            </script>";
    }

	class guardarDatos {
		public function llenarTablaPreregistro($varLocalNumeroEmpleado,$varLocalNombre,$varLocalApellido,$varLocalPassword,$varLocalRolEmpleado,$varLocalSexo,$varLocalTelefono,$varLocalCorreo, $varCampus, $varCarrera){
			$objetoBaseDatos=new BaseDatos(); //no lleva paréntesis
			$objetoBaseDatos->realizarConexion();
			$objetoBaseDatos->realizarAccion("SET NAMES 'utf8'");
			$resultado = $objetoBaseDatos->realizarConsulta("SELECT idCampus FROM campus WHERE nombreCampus = '$varCampus'");
			$fila = $resultado->fetch_array(MYSQLI_BOTH);
			$varCampus = $fila[0];
			$_GRABAR_SQL = "";
			if (!(strcasecmp($varCarrera,"NULL") == 0)) {
				$resultado = $objetoBaseDatos->realizarConsulta("SELECT numeroCarrera FROM carrera WHERE nombreCarrera like '$varCarrera'");
				$fila = $resultado->fetch_array(MYSQLI_BOTH);
				$varCarrera = $fila[0];
				$_GRABAR_SQL = "INSERT INTO preregistro VALUES ($varLocalNumeroEmpleado,$varCampus,$varCarrera, '$varLocalRolEmpleado', '$varLocalNombre', '$varLocalApellido', AES_ENCRYPT('$varLocalPassword','$varLocalNumeroEmpleado'),'$varLocalSexo', '$varLocalTelefono', '$varLocalCorreo')";
			} else {
				$_GRABAR_SQL = "INSERT INTO preregistro(usuario, idCampus, rolEmpleado, nombreEmpleado, apellidosEmpleado,password,sexoEmpleado,telefonoEmpleado,correoEmpleado) VALUES ($varLocalNumeroEmpleado,$varCampus,'$varLocalRolEmpleado','$varLocalNombre','$varLocalApellido',AES_ENCRYPT('$varLocalPassword','$varLocalNumeroEmpleado'),'$varLocalSexo','$varLocalTelefono', '$varLocalCorreo')";
			}
			if ($objetoBaseDatos->realizarAccion($_GRABAR_SQL)) {
        // Cerramos la conexion a la base de datos
		   	$objetoBaseDatos->cerrarConexion();
        return true;
      } else {
		  	$objetoBaseDatos->cerrarConexion();
        return false;
			}
		}
	}
?>
