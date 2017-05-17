
<?php
  require "BaseDatos.php";

  class Login {
    private $rolUsuario;
    private $usuario;
    private $contrasena;
    private $numeroDeIntentos;
    private $obj;
    private $resultado;

    function __construct() {
      $this->obj = new BaseDatos();
    }

    public function setRolUsuario($rolUsuario) {
      $this->rolUsuario = $rolUsuario;
    }

    public function getRolUsuario() {
      return $this->rolUsuario;
    }

    public function setUsuario($usuario) {
      $this->usuario = $usuario;
    }

    public function getUsuario() {
      return $this->usuario;
    }

    public function setContrasena($contrasena) {
      $this->contrasena = $contrasena;
    }

    public function setNumeroDeIntentos($numeroDeIntentos) {
      $this->numeroDeIntentos = $numeroDeIntentos;
    }    

    public function setResultado($resultado) {
      $this->resultado = $resultado;
    }
    public function getResultado() {
      return $this->resultado;
    }

    public function iniciarPrograma() {
      if ($this->getRolUsuario() == "superUsuario") {
          if ($this->numeroDeIntentos == 4) {
          //Antes de bloquear un usuario primero Tenemos que comprobar que el usuario que se va a bloquear se encuentre en la bd
          $query = "SELECT AES_DECRYPT(contrasena,'root') FROM superusuario WHERE idUsuario = '$this->usuario'";
          $this->obj->realizarConexion(); //Abre conexión con la BD
          $resultado = $this->obj->realizarConsulta($query);
          $numeroFilas = $resultado->num_rows;
          $arregloResultado = $resultado->fetch_array(MYSQLI_BOTH);
          $this->obj->cerrarConexion(); //Cierra la conexión con la Bd      

          if ($numeroFilas >= 1) {
            //ESTE USUARIO Si existe en la bd, por lo tanto si se puede bloquear
            $sentencia = "UPDATE superusuario SET estado = 'inactivo' WHERE idUsuario = '$this->usuario'";
            $this->obj->realizarConexion();
            $this->obj->realizarAccion($sentencia);
            $this->obj->cerrarConexion();
            $this->setResultado(-1);
          } else {
            $this->setResultado(0);
          }
        } else if ($this->numeroDeIntentos > 4) {
          $this->setResultado(2);
        } else if ($this->numeroDeIntentos <= 3) {
          $this->validarExistenciaDeUsuario($this->getRolUsuario());
        }        
      } elseif ($this->getRolUsuario() == "administrador") {
        if ($this->numeroDeIntentos == 4) {
          $query = "SELECT AES_DECRYPT(contrasena,'$this->usuario') FROM administrador WHERE idUsuario = '$this->usuario'";
          $this->obj->realizarConexion(); //Abre conexión con la BD
          $resultado = $this->obj->realizarConsulta($query);
          $numeroFilas = $resultado->num_rows;
          $arregloResultado = $resultado->fetch_array(MYSQLI_BOTH);
          $this->obj->cerrarConexion(); //Cierra la conexión con la Bd                
          if ($numeroFilas >= 1) {
            //ESTE USUARIO Si existe en la bd, por lo tanto si se puede bloquear
            $sentencia = "UPDATE administrador SET estado = 'inactivo' WHERE idUsuario = '$this->usuario'";
            $this->obj->realizarConexion();
            $this->obj->realizarAccion($sentencia);
            $this->obj->cerrarConexion();
            $this->setResultado(-1);
          } else {
            $this->setResultado(0);
          }          
        } else if ($this->numeroDeIntentos > 4) {
          $this->setResultado(2);
        } else if ($this->numeroDeIntentos <= 3) {
          $this->validarExistenciaDeUsuario($this->getRolUsuario());
        }              
      } elseif ($this->getRolUsuario() == "bibliotecario") {
        if ($this->numeroDeIntentos == 4) {
          $query = "SELECT AES_DECRYPT(contrasena,'$this->usuario') FROM bibliotecario WHERE idUsuario = '$this->usuario'";
          $this->obj->realizarConexion(); //Abre conexión con la BD
          $resultado = $this->obj->realizarConsulta($query);
          $numeroFilas = $resultado->num_rows;
          $arregloResultado = $resultado->fetch_array(MYSQLI_BOTH);
          $this->obj->cerrarConexion(); //Cierra la conexión con la Bd                
          if ($numeroFilas >= 1) {
            //ESTE USUARIO Si existe en la bd, por lo tanto si se puede bloquear
            $sentencia = "UPDATE bibliotecario SET estado = 'inactivo' WHERE idUsuario = '$this->usuario'";
            $this->obj->realizarConexion();
            $this->obj->realizarAccion($sentencia);
            $this->obj->cerrarConexion();
            $this->setResultado(-1);
          } else {
            $this->setResultado(0);
          }          
        } else if ($this->numeroDeIntentos > 4) {
          $this->setResultado(2);
        } else if ($this->numeroDeIntentos <= 3) {
          $this->validarExistenciaDeUsuario($this->getRolUsuario());
        }              
      }
    }

    /*
     * Retorna 0 si no se ecuentra el usuario.
     * Retorna 1 si el usuario y contraseña son correcto y puede entrar al sistema.
     * Retorna 2 si el usuario y contraseña son correctos pero el usuario está bloqueado.
     */
    public function validarExistenciaDeUsuario($varLocalRolUsuario) {
      $banderaUsuarioContrasena = 0;
      $query = "";

      if ($varLocalRolUsuario == "superUsuario") {
        $query = "SELECT AES_DECRYPT(contrasena,'root') FROM superusuario WHERE idUsuario = '$this->usuario'";              
      } elseif ($varLocalRolUsuario == "administrador") {
        $query = "SELECT AES_DECRYPT(contrasena,'$this->usuario') FROM administrador WHERE idUsuario = '$this->usuario'";
      } elseif ($varLocalRolUsuario == "bibliotecario") {
        $query = "SELECT AES_DECRYPT(contrasena,'$this->usuario') FROM bibliotecario WHERE idUsuario = '$this->usuario'";
      }
      
      $this->obj->realizarConexion(); //Abre conexión con la BD
      $resultado = $this->obj->realizarConsulta($query);
      $numeroFilas = $resultado->num_rows;
      $arregloResultado = $resultado->fetch_array(MYSQLI_BOTH);
      $this->obj->cerrarConexion(); //Cierra la conexión con la Bd      

      if ($numeroFilas >= 1) {                
        if (strcmp($arregloResultado[0],$this->contrasena) == 0) {
          $this->setResultado($this->verificarEstadoUsuario($varLocalRolUsuario));
          //$this->setResultado(1);//temp
        } else {
          $banderaUsuarioContrasena = 0;
          $this->setResultado($banderaUsuarioContrasena);
        }
      } else {
        //$banderaUsuarioContrasena = 0;
        $banderaUsuarioContrasena = 0;//prueba
        $this->setResultado($banderaUsuarioContrasena);
      }
    }

    /*
     * Retorna 1 si el usuario y contraseña son correcto.
     * Retorna 2 si el usuario y contraseña son correctos pero el usuario está bloqueado.
     */
    public function verificarEstadoUsuario($varLocalRolUsuario) {
      $banderaEstadoUsuario= 0; //inicializado
      $query = "";
      $nombreSesionUsuario = "";

      if ($varLocalRolUsuario == "superUsuario") {
        $query = "SELECT estado FROM superusuario WHERE idUsuario = '$this->usuario' AND estado = 'activo'";
        $nombreSesionUsuario = "sessionUsuarioSuperUsuario";
      } elseif ($varLocalRolUsuario == "administrador") {
        $query = "SELECT estado FROM administrador WHERE idUsuario = '$this->usuario' AND estado = 'activo'";
        $nombreSesionUsuario = "sessionUsuarioAdministrador";
      } elseif ($varLocalRolUsuario == "bibliotecario") {
        $query = "SELECT estado FROM bibliotecario WHERE idUsuario = '$this->usuario' AND estado = 'activo'";
        $nombreSesionUsuario = "sessionUsuarioBibliotecario";
      }

      $this->obj->realizarConexion();
      $resultado = $this->obj->realizarConsulta($query);
      $numeroFilas = $resultado->num_rows;
      $this->obj->cerrarConexion(); //Cierra la conexión con la Bd
      if ($numeroFilas >= 1) {              
        session_start();
        $_SESSION[$nombreSesionUsuario] = $this->usuario;
        $banderaEstadoUsuario = 1;      
      } else {      
        $banderaEstadoUsuario = 2;
      }    

      return $banderaEstadoUsuario;
    }

    /*
     * Establece en resultado un:
     *   - 0 cuando el usuario no existe
     *   - 1 cuando el usaurio existe pero está bloqueado
     *   - 2 cuando el usuario existe y no está bloqueado
     */

    public function recuperarContrasena() {
      $query = "SELECT usuario FROM usuario WHERE usuario = '" . $this->usuario . "'";
      echo $this->usuario;
      $this->obj->realizarConexion(); //Abre conexión con la BD
      $resultado = $this->obj->realizarConsulta($query);
      $numeroFilas = $resultado->num_rows;
      echo $numeroFilas;
      $this->obj->cerrarConexion(); //Cierra la conexión con la Bd
      if ($numeroFilas >= 1) {
        echo "entro 1";
        $query = "SELECT usuario FROM usuario WHERE usuario = '" . $this->usuario . "' AND estado = 0";
        $this->obj->realizarConexion(); //Abre conexión con la BD
        $resultado = $this->obj->realizarConsulta($query);
        $numeroFilas = $resultado->num_rows;
        echo $numeroFilas;
        $this->obj->cerrarConexion(); //Cierra la conexión con la Bd
        if ($numeroFilas >= 1) {
          echo "entro 2";
          $query = "SELECT correoUsuario FROM usuario WHERE usuario = '" . $this->usuario . "'";
          $this->obj->realizarConexion(); //Abre conexión con la BD
          $resultado = $this->obj->realizarConsulta($query);
          $correo = $resultado->fetch_array(MYSQLI_BOTH);
          $this->obj->cerrarConexion(); //Cierra la conexión con la Bd
          $mensaje = "Su nueva contraseña es:\n";
          $nuevocontrasena = "pas.";
          for($i = 0; $i < 4; $i++) {
            $nuevocontrasena .= rand(0, 9);
          }
          echo $correo[0];
          $mail = new PHPMailer;
          $mail->Host = "localhost";
          $mail->From = "informatica.umar.912@gmail.com";
          $mail->FromName = "Administrador";
          $mail->Subject = "Recuperar contraseña";
          $mail->addAddress($correo[0], $this->usuario);
          $mail->MsgHTML($mensaje . $nuevocontrasena);
          if ($mail->Send()) {
            echo "Se envioooo";
          } else {
            echo "no se envio";
          }

          $sentencia = "UPDATE usuario SET contrasena = '" . $nuevocontrasena . "' WHERE usuario='".$this->usuario."'";
          $this->obj->realizarConexion();
          $this->obj->realizarAccion($sentencia);
          $this->obj->cerrarConexion();
          $this->setResultado(2);
          return;
        }
        $this->setResultado(1);
        echo $this->getResultado();
        return;
      }
     $this->setResultado(0);
    }
  }
?>
