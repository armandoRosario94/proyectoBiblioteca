<?php
  session_start();
  if(isset($_POST['botonEliminarSessionSuperUsuario'])) {
    unset($_SESSION['sessionUsuarioSuperUsuario']);
    session_destroy();            
    header("location: ../index.php");
  }
  if (empty($_SESSION['sessionUsuarioSuperUsuario'])) {
    header('location: ../index.php');
  } else {
    $usuario = $_SESSION['sessionUsuarioSuperUsuario'];         
    //echo "usuarioSession: ".$usuario;
    //echo "contrasenaSession: ".$contrasena;        
  }          
  if (isset($_POST['botonPerfilSuperUsuario'])) {        
    header("location: ventanPerfilSuperUsuario.php");
  }
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <title>
      Biblioclic
    </title>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">     
    <link rel="stylesheet" type="text/css" href="../fontAwesome/css/font-awesome.css">         
  </head>

  <body class="no-skin" style="overflow-x:hidden">    
    <header>
      <div id="navbar" class="navbar navbar-light bg-faded">
        <div class="navbar-container ace-save-state">          
          <div class="navbar-header pull-left">
            <a href="index.php" class="navbar-brand">
              <img src="imagenes/logoBiblio2.png" width="260" height="65" alt="">
              <small style=" font-size:1.2em; color:black;  margin-left: 30px">
                Panel de Superusuario
              </small>
            </a>
          </div>
          <div class="navbar-header pull-right">
            <ul class="nav ace-nav">
              <li class="light-blue dropdown-modal">
                <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                  <img class="nav-user-photo" src="imagenes/superUsuario.png" alt="logotipo" style="width: 80px; height:80px" />
                  <span class="user-info">
                    <?php                   
                      echo "<small style='font-size:1em'>Bienvenido,</small> ".$usuario." ";                      
                    ?>
                  </span>               
                  <i class="ace-icon fa fa-caret-down">
                  </i><!-- icono v-->
                </a>
                <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                  <li>
                    <a>                   
                      <form action="" method="post">                                            
                          <input type="submit" value="Perfil" name="botonPerfilSuperUsuario" class="btn btn-link">
                      </form>
                    </a>
                  </li>                              
                  <li>
                    <a>                   
                      <form action="" method="post">                                            
                        <input type="submit" value="Cerrar Sesión" name="botonEliminarSessionSuperUsuario" class="btn btn-link">
                      </form>
                    </a>
                  </li>               
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </header>
    <nav class="navbar navbar-inverse" id="idColordeBarra"><!--Inicio del panel de opciones-->    
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">
            Toggle navigation
          </span>
          <span class="icon-bar">
          </span>
          <span class="icon-bar">
          </span>
          <span class="icon-bar">
          </span>
        </button>          
      </div>        
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user-md" style="font-size:24px" id="idColorIconoBarra">
              </i>
              <span id="idColorLetraBarra">
                Administrador
              </span>
              <span class="caret" id="idColorLetraBarra">
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="ventanaRegistrarAdministrador.php">
                  Registrar
                </a>
              </li>
              <li>
                <a href="ventanaEliminarAdministrador.php">
                  Eliminar
                </a>
              </li>
              <li>
                <a href="ventanaModificarAdministrador.php">
                  Modificar
                </a>
              </li>
              <li role="separator" class="divider">
              </li>
              <li>
                <a href="ventanaListaAdministradores.php">
                  Ver Lista de administradores
                </a>
              </li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-university" style="font-size:24px" id="idColorIconoBarra">
              </i>
              <span id="idColorLetraBarra">
                Bibliotecario
              </span>
              <span class="caret" id="idColorLetraBarra">
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="ventanaRegistrarBibliotecario.php">
                  Registrar
                </a>
              </li>
              <li>
                <a href="ventanaEliminarBibliotecario.php">
                  Eliminar
                </a>
              </li>
              <li>
                <a href="ventanaModificarBibliotecario.php">
                  Modificar
                </a>
              </li>
              <li role="separator" class="divider">
              </li>
              <li>
                <a href="ventanaListaBibliotecarios.php">
                  Ver Lista de Bibliotecarios
                </a>
              </li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-users" style="font-size:24px" id="idColorIconoBarra">
              </i>
              <span id="idColorLetraBarra">
                Usuarios
              </span>
              <span class="caret" id="idColorIconoBarra">
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="ventanaRegistrarLector.php">
                  Registrar
                </a>
              </li>
              <li>
                <a href="ventanaEliminarLector.php">
                  Eliminar
                </a>
              </li>                  
              <li>
                <a href="ventanaModificarLector.php">
                  Modificar
                </a>
              </li>
              <li role="separator" class="divider">
              </li>
              <li>
                <a href="ventanaListaLectores.php">
                  Ver Lista de Lectores
                </a>
              </li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-book " style="font-size:24px" id="idColorIconoBarra">
              </i>
              <span id="idColorLetraBarra">
                Libros
              </span>
              <span class="caret" id="idColorIconoBarra">
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="ventanaRegistrarLibro.php">
                  Registrar
                </a>
              </li>
              <li>
                <a href="ventanaEliminarLibro.php">
                  Eliminar
                </a>
              </li>
              <li>
                <a href="ventanaModificarLibro.php">
                  Modificar
                </a>
              </li>
              <li role="separator" class="divider">
              </li>
              <li>
                <a href="ventanaListaLibros.php">
                  Ver Lista de libros
                </a>
              </li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-film" style="font-size:24px" id="idColorIconoBarra">
              </i>
              <span id="idColorLetraBarra"> Cd´s
              </span>
              <span class="caret" id="idColorIconoBarra">
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="ventanaRegistrarCd.php">
                  Registrar
                </a>
              </li>
              <li>
                <a href="ventanaEliminarCd.php">
                  Eliminar
                </a>
              </li>
              <li>
                <a href="ventanaModificarCd.php">
                  Modificar
                </a>
              </li>
              <li role="separator" class="divider">
              </li>
              <li>
                <a href="ventanaListaCDS.php">
                  Ver Lista de CD´S
                </a>
              </li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-file-text-o" style="font-size:24px" id="idColorIconoBarra">
              </i>
              <span id="idColorLetraBarra">
                Revistas
              </span>
              <span class="caret" id="idColorIconoBarra">
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="ventanaRegistrarRevista.php">
                  Registrar
                </a>
              </li>
              <li>
                <a href="ventanaEliminarRevista.php">
                  Eliminar
                </a>
              </li>
              <li>
                <a href="ventanaModificarRevista.php">
                  Modificar
                </a>
              </li>
              <li role="separator" class="divider">
              </li>
              <li>
                <a href="ventanaListaRevistas.php">
                  Ver Lista de Revistas
                </a>
              </li>
            </ul>
          </li>              
        </ul><!--Fin de <ul class="nav navbar-nav"> -->             
      </div><!--Fin de <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> --> 
    </nav><!--Cierre del panel de opciones-->    
   
    <section id="idEspacioSection">
      <div class="row">
        <div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
          <div class="panel panel-info">
            <div class="panel-heading" id="idCambioColorPanel" >
              <center id="idLetraRegistrar">
                Registrar Bibliotecario
              </center>
            </div>
            <div class="panel-body">
              <form action="#" method="post" name="frm" class="form-horizontal" id="formularioRegistrarBibliotecario">    
                <div class="form-group">
                  <label for="" style="text-align:left" class="col-sm-4 control-label">
                    Nombre:
                  </label>
                  <div class="col-sm-8">
                    <div class="input-group">
                      <input type="text" class="form-control" name="campoNombre" id ="idCampoNombre" required>
                      <span class="input-group-addon">
                        <i class="fa fa-user-plus" aria-hidden="true">
                        </i>
                      </span>
                    </div>
                  </div>                  
                </div>
                <div class="form-group">
                  <label for="" style="text-align:left" class="col-sm-4 control-label">
                    Apellido:
                  </label>
                  <div class="col-sm-8">
                    <div class="input-group">
                      <input type="text" class="form-control" name="campoApellido" id ="idCampoApellido" required>
                      <span class="input-group-addon">
                        <i class="fa fa-user-plus" aria-hidden="true">
                        </i> 
                      </span>
                    </div>                    
                  </div>
                </div>
                <div class="form-group">
                  <label for="" style="text-align:left" class="col-sm-4 control-label">
                    Genero:
                  </label>
                  <div class="col-sm-8">                     
                    <input type='radio' name="radioGenero" id = "idRadioGeneroMasculino" value = "Masculino" checked>
                    Masculino
                    <input type='radio' name="radioGenero"  id = "idRadioGeneroFemenino" value = "Femenino">
                    Femenino                  
                  </div>                  
                </div>                            
                <div class="form-group">
                  <label for="" style="text-align:left" class="col-sm-4 control-label">
                    Correo:
                  </label>
                  <div class="col-sm-8">
                    <div class="input-group">                       
                      <input type="text" class="form-control" name="campoCorreo" id ="idCampoCorreo" maxlength="50">
                      <span class="input-group-addon">
                        <i class="fa fa-envelope-o" aria-hidden="true">
                        </i> 
                      </span>
                    </div>                                        
                  </div>
                </div>                
                <div class="form-group">
                  <label for="" style="text-align:left" class="col-sm-4 control-label">
                    Usuario:
                  </label>
                  <div class="col-sm-8">
                    <div class="input-group">                       
                      <input type="text" class="form-control" name="campoIdUsuario" id ="idCampoUsuario" maxlength="50">
                      <span class="input-group-addon">
                        <i class="fa fa-user-o" aria-hidden="true">
                        </i> 
                      </span>
                    </div>                                        
                  </div>
                </div>
                <div class="form-group">
                  <label for="" style="text-align:left" class="col-sm-4 control-label">
                    Contraseña:
                  </label>
                  <div class="col-sm-8">
                    <div class="input-group">                       
                      <input type="password" class="form-control" name="campoContrasena1" id ="idCampoContrasena1" maxlength="50">
                      <span class="input-group-addon">
                        <i class="fa fa-key" aria-hidden="true">
                        </i> 
                      </span>
                    </div>                                                            
                  </div>
                </div>
                <div class="form-group">
                  <label for="" style="text-align:left" class="col-sm-4 control-label">
                    Repetir Contraseña:
                  </label>
                  <div class="col-sm-8">
                    <div class="input-group">                       
                      <input type="password" class="form-control" name="campoContrasena2" id ="idCampoContrasena2" maxlength="50">
                      <span class="input-group-addon">
                        <i class="fa fa-key" aria-hidden="true">
                        </i> 
                      </span>
                    </div>                                                                                
                  </div>
                </div>              
                <div class="form-group">
                  <div class="col-sm-offset-4 col-xs-12 col-sm-8">
                    <button type="submit" class="btn btn-success" style=" background-color:#EE9A4F; border: #EE9A4F"> 
                      <span class="glyphicon glyphicon-ok">
                      </span>
                      Guardar
                    </button>
                    <button type="reset" class="btn btn-primary" id="botonReset" style="background-color:#1ABC9C;border:#1ABC9C">
                      <span class="glyphicon glyphicon-remove">
                      </span>
                      Limpiar
                    </button>                    
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>      
      <article>
      </article>
      <article>
      </article>      
    </section>      

    <aside>
    </aside>

    <div class="footer-fix">
    </div>    

    <footer id="idFooter">
      <p>
        Privacidad Términos y Condiciones @2017 BIBLIOCLIC
      </p>
      <p>
        Desarrolladores: Lic. Heydi Ramirez & Lic. Jose Armando Rosario
      </p> 
      <p>
        Biblioclic al alcance de tus manos, consulta de libros, cd´s, revistas, etc...
      </p>   
      </p>
        Contáctanos:
        <a href="mailto:someone@example.com">
          biblioclic@biblioclic.com
        </a>
      </p>
    </footer>
    <!--Inicio de los Scripts-->  
    <script src="evento/jquery-3.1.1.min.js">
    </script><!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->  
    <script src="evento/eventosVentanaRegistrarBibliotecario.js">
    </script>    
    <script src="bootstrap/js/bootstrap.min.js">
    </script><!-- Include all compiled plugins (below), or include individual files as needed -->  
  </body><!--Termina el body-->
</html>