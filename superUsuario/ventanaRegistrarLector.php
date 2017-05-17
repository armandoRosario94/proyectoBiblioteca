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
    <title>Biblioclic</title>
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
        <div class="col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">
          <div class="panel panel-info">
            <div class="panel-heading" id="idCambioColorPanel" >
              <center id="idLetraRegistrar">
                Registrar Lector
              </center>
            </div>
            <div class="panel-body">
              <form action="#" method="post" name="frm" class="form-horizontal" id="formularioRegistrarLector">
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group">
                      <label for="" style="text-align:left" class="col-sm-4 control-label">
                        Nombre:
                      </label>
                      <div class="col-sm-8">
                        <div class="input-group">
                          <input type="text" class="form-control" name="campoNombre" id="idCampoNombre" required>
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
                          <input type="text" class="form-control" name="campoApellido" id="idCampoApellido" required>
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
                    Telefono:
                  </label>
                  <div class="col-sm-8">
                    <div class="input-group">                       
                      <input type="text" class="form-control" name="campoTelefono" maxlength="50" id="idCampoTelefono">
                      <span class="input-group-addon">
                        <i class="fa fa-volume-control-phone" aria-hidden="true">
                        </i> 
                      </span>
                    </div>                                        
                  </div>
                </div>

                <div class="form-group">
                  <label for="" style="text-align:left" class="col-sm-4 control-label">
                    Telefono de Referencia:
                  </label>
                  <div class="col-sm-8">
                    <div class="input-group">                       
                      <input type="text" class="form-control" name="campoTelefonoReferencia" maxlength="12" id="idCampoTelefonoReferencia">
                      <span class="input-group-addon">
                        <i class="fa fa-phone" aria-hidden="true">
                        </i> 
                      </span>
                    </div>                                        
                  </div>
                </div>

                <div class="form-group">
                  <label for="" style="text-align:left" class="col-sm-4 control-label">
                    Edad:
                  </label>
                  <div class="col-sm-8">
                    <div class="input-group">                       
                      <input type="number" class="form-control" name="campoEdad" min="18" max="100" maxlength="2" id="idCampoEdad">
                      <span class="input-group-addon">
                        <i class="fa fa-calendar" aria-hidden="true">
                        </i> 
                      </span>
                    </div>                                        
                  </div>
                </div>                                

                <div class="form-group">
                  <label for="" style="text-align:left" class="col-sm-4 control-label">
                    Codigo Postal:
                  </label>
                  <div class="col-sm-8">
                    <div class="input-group">                       
                      <input type="text" class="form-control" name="campoCodigoPostal" maxlength="5" id="idCampoCodigoPostal">
                      <span class="input-group-addon">
                        <i class="fa fa-codiepie" aria-hidden="true">
                        </i> 
                      </span>
                    </div>                                        
                  </div>
                </div>

                <div class="form-group">
                  <label for="idAreaDireccionLector" style="text-align:left" class="col-sm-4 control-label">
                    Dirección:
                  </label>
                  <div class="col-sm-8">
                    <div class="col-xs-12 col-sm-12 col-md-12 input-group">                                             
                      <textarea id="idAreaDireccionLector" name="areaDireccionLector" rows="4" class=" col-xs-12 col-sm-12 col-md-12"  minlength = "10" maxlength= "300" style="resize:none" id="idAreaDireccionLector" required></textarea>
                    </div>                                        
                  </div>
                </div>

                <div class="form-group">
                  <label for="" style="text-align:left" class="col-sm-4 control-label">
                    Ocupación:
                  </label>
                  <div class="col-sm-8">
                    <div class="input-group">
                      <select  name = "comboOcupacion" class="form-control">
                        <option value="No existe">No existe</option>
                        <option value="Estudiante">Estudiante</option>
                        <option value="Docente">Docente</option>
                        <option value="Docente">Médico</option>
                        <option value="Docente">Licenciado</option>
                      </select>
                      <span class="input-group-btn">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#idModalRegistrarOcupacion" data-whatever="@mdo" id="idBotonAgregarOcupacion">+</button>
                      </span>   
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="" style="text-align:left" class="col-sm-4 control-label">
                    Empresa o Institución:
                  </label>
                  <div class="col-sm-8">
                    <div class="input-group">
                      <select  name = "comboOcupacion" class="form-control">
                        <option value="No existe">No existe</option>
                        <option value="UMAR campus Puerto Escondido">UMAR campus Puerto Escondido</option>
                        <option value="UMAR campus Huatulco">UMAR campus Huatulco</option>
                        <option value="UMAR campus Puerto Ángel">UMAR campus Puerto Ángel</option>
                        <option value="REU Puerto Escondio">REU Puerto Escondio</option>
                        <option value="Escuela Secundaria Tecnica Num. 174">Escuela Secundaria Tecnica Num. 174</option>
                        <option value="Escuela Secundaria Tecnica Num. 86">Escuela Secundaria Tecnica Num. 86</option>                                              

                      </select>
                      <span class="input-group-btn">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#idModalRegistrarEmpresaInstitucion" data-whatever="@mdo" id="idBotonAgregarEmpresaInstitucion">+</button>
                      </span>                       

                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="" style="text-align:left" class="col-sm-4 control-label">
                    Teléfono:
                  </label>
                  <div class="col-sm-8">
                    <div class="input-group">                       
                      <input type="text" class="form-control" name="campoTelefonoEmpresaInstitucion"  maxlength="12" id="idCampoTelefonoEmpresaInstitucion" readonly='true'>
                      <span class="input-group-addon">
                        <i class="fa fa-volume-control-phone" aria-hidden="true">
                        </i> 
                      </span>
                    </div>                                        
                  </div>
                </div>

                <div class="form-group">
                  <label for="idAreaDireccionEmpresaInstitucion" style="text-align:left" class="col-sm-4 control-label">
                    Dirección:
                  </label>
                  <div class="col-sm-8">
                    <div class="col-xs-12 col-sm-12 col-md-12  input-group">                                             
                      <textarea id="idAreaDireccionEmpresaInstitucion" name="areaDireccionEmpresaInstitucion" id="idAreaDireccionEmpresaInstitucion" rows="4" class="col-xs-12 col-sm-12 col-md-12" minlength = "10" maxlength= "300" style="resize:none" required readonly='true'></textarea>                      
                    </div>                                        
                  </div>
                </div>  
                  </div>
                  <div class="col-md-3">
                    <div class="row" style=" text-align: center; align: center"> 
                      <div class="col-md-12">
                          <div class="form-group">
                            <label for="" style="text-align:center" class="col-md-12 control-label">
                              Elegir Foto Usuario
                            </label>
                         </div>
                        <div class="form-group">
                          <img src="../imagenes/user.png"   class="img-responsive">
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-12 "> 
                        <div class="form-group">
                           <div class="col-sm-12 col-md-10 col-md-offset-1 input-group">  
                            <label class="btn btn-primary btn-file btn-block " style="background-color:#68B2E5  ;border:0px;">
                                Seleccionar foto<input type="file" style="display: none; ">
                            </label>             
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-4 col-xs-12 col-sm-8">
                    <button type="submit" class="btn btn-success" style=" background-color:#EE9A4F; border: #EE9A4F; height:40px;width:150px"> 
                      <span class="glyphicon glyphicon-ok">
                      </span>
                      Guardar
                    </button>
                    <button type="reset" class="btn btn-primary" id="botonReset" style="background-color:#1ABC9C;border:#1ABC9C; height:40px;width:150px">
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

            <div class="modal fade" id="idModalRegistrarOcupacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="exampleModalLabel">Registrar Ocupación</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <form id = "idFormularioModalRegistrarOcupacion">
                  <div class="form-group">
                    <label for="" style="text-align:left" class="col-sm-4 control-label">Nombre:</label>
                    <div class="col-sm-8">                                          
                      <input type="text" class="form-control" name="campoNombreOcupacion"  placeholder="Nombre" required id="idCampoNombreOcupacion">
                    </div>
                  </div>                  
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary" id="idBotonModalRegistrarOcupacion" form="idFormularioModalRegistrarOcupacion">Guardar</button>
            </div>
          </div>
        </div>
      </div>   

       <div class="modal fade" id="idModalRegistrarEmpresaInstitucion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="exampleModalLabel">Registrar Empresa o Institución</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <form id = "idFormularioModalRegistrarEmpresaInstitucion">
                  <div class="form-group">
                    <label for="" style="text-align:left" class="col-sm-4 control-label">Nombre:</label>
                    <div class="col-sm-8">                                          
                      <input type="text" class="form-control" name="campoNombreEmpresaInstitucion"  placeholder="Nombre" required id="idCampoNombreEmpresaInstitucion">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="" style="text-align:left" class="col-sm-4 control-label">Teléfono:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="campoTelefonoEmpresaInstitucion"  placeholder="Teléfono" required id="idCampoTelefonoEmpresaInstitucion">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="" style="text-align:left" class="col-sm-4 control-label">Dirección:</label>
                    <div class="col-sm-8">
                      <textarea name="areaDireccionEmpresaInstitucion" rows="4" class="col-xs-12 col-sm-12 col-md-12" minlength = "10" maxlength= "300" style="resize:none" required></textarea>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary" id="idBotonModalRegistrarEmpresaInstitucion" form="idFormularioModalRegistrarEmpresaInstitucion">Guardar</button>
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
    <!--<-><-><-><-><-><-><-><-><-><-><-><-><-><-><-><->Inicio de los Scripts<-><-><-><-><-><-><-><-><-><-><-><-><-><-><-><->-->  
    <script src="evento/jquery-3.1.1.min.js"></script><!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->  
    <!---<script src="evento/eventosVentanaRegistrarLector.js"></script>-->   
     <script src="evento/eventoVentanaRegistrarLectorHeydi.js"></script>    
    <script src="bootstrap/js/bootstrap.min.js"></script><!-- Include all compiled plugins (below), or include individual files as needed -->  
  </body><!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxTermina el bodyxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
</html>