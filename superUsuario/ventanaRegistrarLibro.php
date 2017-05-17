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

   
    <section class="main row" id="idEspacioSection">
      <div clas="row">
        <div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
          <div class="panel panel-info">
            <div class="panel-heading" id="idCambioColorPanel" >
              <center id="idLetraRegistrar">
                Registrar Libro
              </center>
            </div>
            <div class="panel-body">
              <form action="#" method="post" name="frm" class="form-horizontal" id="formularioRegistrarAdministrador">  
                <div class="form-group">
                  <label for="" style="text-align:left" class="col-sm-4 control-label">
                    020 - ISBN:
                  </label>
                  <div class="col-sm-8">
                    <div class="input-group">                      
                      <input type="text" class="form-control" name="campoISBN" id ="idCampoISBN" required>
                      <span class="input-group-addon">
                        <i class="fa fa-id-card" aria-hidden="true">
                        </i>
                      </span>
                    </div>
                  </div>                  
                </div>

                <div class="form-group">
                  <label for="" style="text-align:left" class="col-sm-4 control-label">
                    041 - Idioma:
                  </label>
                  <div class="col-sm-8">
                    <div class="input-group">
                      <select  name = "comboIdioma" class="form-control">
                        <option value="No existe">No existe</option>                        
                      </select>
                      <span class="input-group-addon">
                        <i class="fa fa-language" aria-hidden="true"></i>
                      </span>                       

                    </div>
                  </div>                  
                </div>

                <div class="form-group">
                  <label for="" style="text-align:left" class="col-sm-4 control-label">
                    082 - Clasificación decimal de Dewey:
                  </label>
                  <div class="col-sm-8">
                    <div class="input-group">                      
                      <input type="text" class="form-control" name="campoClasificacionDecimal" id ="idCampoClasificacionDecimal" required>
                      <span class="input-group-addon">
                        <i class="fa fa-sort-numeric-asc " aria-hidden="true">
                        </i>
                      </span>
                    </div>
                  </div>                  
                </div>

                <div class="form-group">
                  <label for="" style="text-align:left" class="col-sm-4 control-label">
                    100 - Autor personal:
                  </label>
                  <div class="col-sm-8">
                    <div class="input-group">                      
                      <input type="text" class="form-control" name="campoAutorPersonal" id ="idCampoAutorPersonal" required>
                      <span class="input-group-addon">
                        <i class="fa fa-user" aria-hidden="true">
                        </i>
                      </span>
                    </div>
                  </div>                  
                </div>

                 <div class="form-group">
                  <label for="" style="text-align:left" class="col-sm-4 control-label">
                    110 - Autor corporativo:
                  </label>
                  <div class="col-sm-8">
                    <div class="input-group">                      
                      <input type="text" class="form-control" name="campoAutorPCorporativo" id ="idCampoAutorCorporativo" required>
                      <span class="input-group-addon">
                        <i class="fa fa-users" aria-hidden="true">
                        </i>
                      </span>
                    </div>
                  </div>                  
                </div>

                <div class="row">
                  <div class="col-sm-12 col-md-12">
                    <label>___ 245 - Mención de título ___</label>
                  </div>
                  <br>
                  <div  class="col-sm-12 col-md-12 ">
                    <div class="form-group">
                      <div class="col-sm-4 ">
                        <label for="" class="control-label">Título propiamente dicho:
                        </label>
                      </div>
                      <div class="col-sm-8">
                        <div class="input-group">                      
                          <input type="text" class="form-control" name="campoTituloPropiamenteDicho" id ="idCampoTituloPropiamenteDicho" required>
                          <span class="input-group-addon">
                            <i class="fa fa-pencil-square-o" aria-hidden="true">
                            </i>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4 ">
                        <label>Mención de responsabilidad:
                        </label>
                      </div>
                      <div class="col-md-8">         
                        <textarea id="idAreaDireccionEmpresaInstitucion" name="areaMencionResponsabilidad" id="idAreaMencionResponsabilidad" rows="4" class="col-xs-12 col-sm-12 col-md-12" minlength = "10" maxlength= "300" style="resize:none" required></textarea>  
                      </div>
                    </div>      
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="" style="text-align:left" class="col-sm-4 control-label">
                    250 - Edición:
                  </label>
                  <div class="col-sm-8">
                    <div class="input-group">                      
                      <input type="text" class="form-control" name="campoEdicion" id ="idCampoEdicion" required>
                      <span class="input-group-addon">
                        <i class="fa fa-book" aria-hidden="true">
                        </i>
                      </span>
                    </div>
                  </div>                  
                </div>

                <div class="row">
                  <div class="col-sm-12 col-md-12">
                    <label>____ 260 - Pie de Imprenta ____</label>
                  </div>
                  <br>
                  <div  class="col-sm-12 col-md-12 ">
                    <div class="form-group">
                      <div class="col-sm-4 ">
                        <label for="" class="control-label">Lugar de publicación:
                        </label>
                      </div>
                      <div class="col-sm-8">
                        <div class="input-group">                      
                          <input type="text" class="form-control" name="campoLugarPublicacion" id ="idCampoLugarPublicacion" required>
                          <span class="input-group-addon">
                            <i class="fa fa-map-marker" aria-hidden="true">
                            </i>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4 ">
                        <label>Editorial:
                        </label>
                      </div>
                      <div class="col-sm-8">
                        <div class="input-group">                      
                          <input type="text" class="form-control" name="campoEditorial" id ="idCampoEditorial" required>
                          <span class="input-group-addon">
                             <i class="fa fa-pencil-square-o" aria-hidden="true">
                            </i>
                          </span>
                        </div>
                      </div> 
                    </div>
                    <div class="form-group">
                      <div class="col-md-4 ">
                        <label>Fecha de publicación (Año):
                        </label>
                      </div>
                      <div class="col-sm-8">
                        <div class="input-group">                      
                          <input type="text" class="form-control" name="campoFechaPublicacion" id ="idCampoFechaPublicacion" required>
                          <span class="input-group-addon">
                             <i class="fa fa-pencil-square-o" aria-hidden="true">
                            </i>
                          </span>
                        </div>
                      </div> 
                    </div>    
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12 col-md-12">
                    <label>___ 300 - Descripción Física ___</label>
                  </div>
                  <br>
                  <div  class="col-sm-12 col-md-12 ">
                    <div class="form-group">
                      <div class="col-sm-4 ">
                        <label for="" class="control-label">Número de páginas:
                        </label>
                      </div>
                      <div class="col-sm-8">
                        <div class="input-group">                      
                          <input type="text" class="form-control" name="campoNumeroPaginas" id ="idCampoNumeroPaginas" required>
                          <span class="input-group-addon">
                            <i class="fa fa-pencil-square-o" aria-hidden="true">
                            </i>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4 ">
                        <label>Dimensiones (cm):
                        </label>
                      </div>
                      <div class="col-sm-8">
                        <div class="input-group">                      
                          <input type="text" class="form-control" name="campoDimensiones" id ="idCampoDimensiones" required>
                          <span class="input-group-addon">
                             <i class="fa fa-pencil-square-o" aria-hidden="true">
                            </i>
                          </span>
                        </div>
                      </div> 
                    </div> 
                    <div class="form-group">
                      <div class="col-md-4 ">
                        <label>Otros detalles físicos:
                        </label>
                      </div>
                      <div class="col-md-8">         
                        <textarea id="idAreaOtrosDetallesFisicos" name="areaOtrosDetallesFisicos" id="idAreaMencionResponsabilidad" rows="4" class="col-xs-12 col-sm-12 col-md-12" minlength = "10" maxlength= "300" style="resize:none" required></textarea>  
                      </div>
                    </div>   
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12 col-md-12">
                    <label>___ 440 - Mención de serie ___</label>
                  </div>
                  <br>
                  <div  class="col-sm-12 col-md-12 ">
                    <div class="form-group">
                      <div class="col-sm-4 ">
                        <label for="" class="control-label">Título de la serie:
                        </label>
                      </div>
                      <div class="col-sm-8">
                        <div class="input-group">                      
                          <input type="text" class="form-control" name="campoTituloSerie" id ="idCampoTituloSerie" required>
                          <span class="input-group-addon">
                            <i class="fa fa-pencil-square-o" aria-hidden="true">
                            </i>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-4 ">
                        <label>Número del volumen:
                        </label>
                      </div>
                      <div class="col-sm-8">
                        <div class="input-group">                      
                          <input type="text" class="form-control" name="campoNumeroVolumen" id ="idCampoNumeroVolumen" required>
                          <span class="input-group-addon">
                             <i class="fa fa-pencil-square-o" aria-hidden="true">
                            </i>
                          </span>
                        </div>
                      </div> 
                    </div>   
                  </div>
                </div>
                <div class="form-group">
                  <label for="" style="text-align:left" class="col-sm-4 control-label">
                    500 - Nota general:
                  </label>
                  <div class="col-sm-8">
                    <div class="col-xs-12 col-sm-12 col-md-12  input-group">                                             
                      <textarea id="idAreaNotaGeneral" name="areaNotaGeneral" rows="4" class="col-xs-12 col-sm-12 col-md-12" minlength = "10" maxlength= "300" style="resize:none" required></textarea>                      
                    </div>                                        
                  </div>
                </div>
                <div class="form-group">
                  <label for="" style="text-align:left" class="col-sm-4 control-label">
                    501 - Nota "CON":
                  </label>
                  <div class="col-sm-8">
                    <div class="col-xs-12 col-sm-12 col-md-12  input-group">                                             
                      <textarea id="idAreaNotaCON" name="areaNotaCON" rows="4" class="col-xs-12 col-sm-12 col-md-12" minlength = "10" maxlength= "300" style="resize:none" required></textarea>                      
                    </div>                                        
                  </div>
                </div>  
                <div class="form-group">
                  <label for="" style="text-align:left" class="col-sm-4 control-label">
                    505 - Nota de contenido:
                  </label>
                  <div class="col-sm-8">
                    <div class="col-xs-12 col-sm-12 col-md-12  input-group">                                             
                      <textarea id="idAreaNotaContenido" name="areaNotaContenido" rows="4" class="col-xs-12 col-sm-12 col-md-12" minlength = "10" maxlength= "300" style="resize:none" required></textarea>                      
                    </div>                                        
                  </div>
                </div>
                <div class="form-group">
                  <label for="" style="text-align:left" class="col-sm-4 control-label">
                    520 - Nota de resumen:
                  </label>
                  <div class="col-sm-8">
                    <div class="col-xs-12 col-sm-12 col-md-12  input-group">                                             
                      <textarea id="idAreaNotaResumen" name="areaNotaResumen" rows="4" class="col-xs-12 col-sm-12 col-md-12" minlength = "10" maxlength= "300" style="resize:none" required></textarea>                      
                    </div>                                        
                  </div>
                </div>
                <div class="form-group">
                  <label for="" style="text-align:left" class="col-sm-4 control-label">
                    650 - Encabezamiento de tema:
                  </label>
                  <div class="col-sm-8">
                    <div class="col-xs-12 col-sm-12 col-md-12  input-group">                                             
                      <textarea id="idAreaEncabezamientoTema" name="areaEncabezamientoTema" rows="4" class="col-xs-12 col-sm-12 col-md-12" minlength = "10" maxlength= "300" style="resize:none" required></textarea>                      
                    </div>                                        
                  </div>
                </div>
                <div class="form-group">
                  <label for="" style="text-align:left" class="col-sm-4 control-label">
                    700 - Asiento secundario bajo autor personal:
                  </label>
                  <div class="col-sm-8">
                    <div class="col-xs-12 col-sm-12 col-md-12  input-group">                                             
                      <textarea id="idAreaAsientoSecundarioBajoAutorPersonal" name="areaAsientoSecundarioBajoAutorPersonal" rows="4" class="col-xs-12 col-sm-12 col-md-12" minlength = "10" maxlength= "300" style="resize:none" required></textarea>                      
                    </div>                                        
                  </div>
                </div>
                <div class="form-group">
                  <label for="" style="text-align:left" class="col-sm-4 control-label">
                    710 - Asiento secundario bajo autor corporativo:
                  </label>
                  <div class="col-sm-8">
                    <div class="col-xs-12 col-sm-12 col-md-12  input-group">                                             
                      <textarea id="idAreaAsientoSecundarioBajoAutorCorporativo" name="areaAsientoSecundarioBajoAutorCorporativo" rows="4" class="col-xs-12 col-sm-12 col-md-12" minlength = "10" maxlength= "300" style="resize:none" required></textarea>                      
                    </div>                                        
                  </div>
                </div>
                <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary" id="idBotonModalRegistrarLibro" form="idFormularioModalRegistrarLibro">Registrar</button>
            </div>
              </form>
            </div>
          </div>
        </div>  
     </div>

    </section>      

    <aside>

    </aside>

   <div class="footer-fix"></div>    

   <footer id="idFooter"><!--LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLInicia el PieLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL-->
    <p> Privacidad Términos y Condiciones @2017 BIBLIOCLIC </p>
    <p> Desarrolladores: Lic. Heydi Ramirez & Lic. Jose Armando Rosario </p> 
    <p> Biblioclic al alcance de tus manos, consulta de libros, cd´s, revistas, etc... </p>   
    </p> Contáctanos: <a href="mailto:someone@example.com"> biblioclic@biblioclic.com</a> </p>
  </footer> <!--LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLTermina el PieLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL-->    

      <!--<-><-><-><-><-><-><-><-><-><-><-><-><-><-><-><->Inicio de los Scripts<-><-><-><-><-><-><-><-><-><-><-><-><-><-><-><->-->  
  <script src="../js/jquery-3.1.1.min.js"></script><!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->  
  <script src="../bootstrap/js/bootstrap.min.js"></script><!-- Include all compiled plugins (below), or include individual files as needed -->  
  </body><!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxTermina el bodyxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
</html>