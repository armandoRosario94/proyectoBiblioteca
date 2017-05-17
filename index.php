<?php
  session_start();
  if (!empty($_SESSION['sessionUsuarioSuperUsuario'])) {
    header('location: superUsuario');
  }
?>
<!DOCTYPE html>
<html lang="es">
  <head class="container-fluid"><!--oooooooooooooooooooooooooooooooooooooooooooooooooooooooooocomienza la cabezaoooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->
    <title>Biblioclic</title>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">   
    <link rel="stylesheet" type="text/css" href="fontAwesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <style>
      /*.carousel-inner > .item > img,
      .carousel-inner > .item > a > img {
          width: 70%;
          margin: auto;*/
      }
    </style>
  </head><!--oooooooooooooooooooooooooooooooooooooooooooooooooooooooooocTermina la cabezaoooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->
  
  <body class="no-skin" style="overflow-x:hidden"><!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxcomienza el bodyxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->  
  <header>
    <nav class="navbar navbar-light bg-faded">
      <a class="navbar-brand" href="#">
       <img src="imagenes/logoBiblio.png" width="260" height="65" alt="">
      </a>
    </nav>
      <nav class="navbar navbar-default" id="idColordeBarra">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
            <span class="sr-only" id="idColorLetra">Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
        </div>
        <div class="collapse navbar-collapse" id="navbar-1">
          <ul class="nav navbar-nav">
            <li><a href="#" ><i class="fa fa-home" style="font-size:24px" id="idColorIconoBarra"></i><span id="idColorLetraBarra"> Biblioteca</span><i class="soap-icon-plane-right takeoff-effect"></i></a></li>
            <li><a href="#" ><i class="fa fa-line-chart" style="font-size:24px" id="idColorIconoBarra" ></i><span id="idColorLetraBarra"> Misión</span></a></li>
            <li><a href="#" ><i class="fa fa-eye" style="font-size:24px" id="idColorIconoBarra"></i><span id="idColorLetraBarra"> Visión</span></a></li>
            <li><a href="#" ><i class="fa fa-history" style="font-size:24px" id="idColorIconoBarra"></i><span id="idColorLetraBarra"> Historia</span></a></li>
            <li><a href="#"><i class="fa  fa-address-card-o" style="font-size:24px" id="idColorIconoBarra"></i><span id="idColorLetraBarra"> Directorio</span></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#ventana1" class="dropdown-toggle" data-toggle="modal" role="button" data-target=".bs-example-modal-sm">
                <i class="fa fa-user" style="font-size:24px" id="idColorIconoBarra"></i>
                <span id="idColorLetraBarra"> Iniciar Sesión </span>
                <i class="fa fa-caret-down" style="font-size:24px" id="idColorIconoBarra"></i><!-- iconeos-->
              </a>              
              <div class="modal fade bs-example-modal-sm" id="ventana1"  tabindex="-1" role="dialog"><!--Comienza modal fade-->
                <div class="modal-dialog modal-sm"  role="document"><!--Comienza dialogo modal contenido completo-->
                  <div class="modal-content"><!--Ventana modal contenido completo-->  
                    <div  id="colorFondo">
                      <div  class="panel-heading">
                        <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <div class="panel-title" id="idcolorLetraModal">Inicio Sesión</div> 
                      </div>
                    </div>     
                    <div class="modal-body" style="padding-top:30px" ><!--Contenido de la ventana modal-->
                      <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                        <form id="loginform" class="form-horizontal" role="form">   
                          <div  style="margin-bottom: 10px"  class="input-group">
                             <select  id="idComboRolUsuario" style=" width: 266px; height: 40px" name ="comboRolUsuario" class="form-control selectpicker"  >
                                <option value="superUsuario">Superusuario</option>
                                <option value="administrador">Administrador</option>
                                <option value="bibliotecario">Bibliotecario</option>                                
                              </select>     
                          </div>
                          <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" name="campoUsuario" id="idCampoUsuario"placeholder="username or email" required="required">                                     
                          </div>
                          <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" class="form-control" name="campoContrasena" id="idCampoContrasena" placeholder="password" required="required">                       
                          </div>
                          <div class="input-group">
                            <div class="checkbox">
                              <label id="idcolorLetraModal">
                                <input id="login-remember" type="checkbox" name="remember" value="1"> Recúerdame
                              </label>
                            </div>
                          </div>
                          <div style="margin-top:10px" class="form-group">
                            <!-- Button -->
                            <div class="col-sm-12 controls">
                              <button type="reset" class="btn btn-primary" name="botonLimpiar">Limpiar</button>
                              <button type="submit" class="btn btn-success" name="botonEntrar">Entrar</button>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-md-12 control">
                              <div style="border-top: 1px solid#888; padding-top:15px; font-size:1.2em" id="idcolorLetraModal">
                                <div style="float:right; font-size: 80%; position: relative; top:-10px">
                                  <a href="#" id = "idVinculoRecuperarContrasena">¿Olvidaste tu contraseña?</a></div>
                              </div>
                            </div>
                          </div>    
                        </form>     
                   </div>
                  </div><!--Termina ventana modal contenido-->              
                </div><!--Termina dialogo modal contenido completo-->            
              </div><!--Termina modal fade-->          
            </li>
          </ul>
        </div>
      </nav>
      <div>
  </header>
<section class="main row">
  <div clas="row">
    <div class="col-xs-12 col-sm-12 col-md-12 ">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">          
          <ol class="carousel-indicators"><!-- Indicators -->
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
          </ol>          
          <div class="carousel-inner" role="listbox"  style="background: url(https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSg3O0NE7UMpDZghidkYpLmmE0Z8bleQbiI4ZkrxMa0rDzpYUHE) no-repeat left center; background-size: cover;"><!-- Wrapper for slides -->
            <div class="item active">
              <img src="imagenes/biblioteca2.jpg" alt="Chania"  class="img-responsive">
              <div class="carousel-caption">
                  <h3>@Biblioclic</h3>
                  <p>La lectura es un mundo, donde no existe la soledad</p>
                </div>
            </div>
            <div class="item">
              <img src="imagenes/biblioteca2.jpg" alt="Chania" class="img-responsive">
              <div class="carousel-caption">
                  <h3>@Biblioclic</h3>
                  <p>La lectura es un mundo, donde no existe la soledad</p>
                </div>
            </div>
            <div class="item">
              <img src="imagenes/biblioteca2.jpg" alt="Flower" class="img-responsive">
              <div class="carousel-caption">
                  <h3>@Biblioclic</h3>
                  <p>La lectura es un mundo, donde no existe la soledad</p>
                </div>
            </div>
            <div class="item">
              <img src="imagenes/biblioteca2.jpg" alt="Flower" class="img-responsive">
              <div class="carousel-caption">
                  <h3>@Biblioclic</h3>
                  <p>La lectura es un mundo, donde no existe la soledad</p>
                </div>
            </div>
          </div>          
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><!-- Left and right controls -->
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
    </div>    
</section>
  <footer  id="idFooter"><!--LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLInicia el PieLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL-->
    <p> Privacidad Términos y Condiciones @2017 BIBLIOCLIC </p>
    <p> Desarrolladores: Lic. Heydi Ramirez & Lic. Jose Armando Rosario </p> 
    <p> Biblioclic al alcance de tus manos, consulta de libros, cd´s, revistas, etc... </p>   
    </p> Contáctanos: <a href="mailto:someone@example.com"> biblioclic@biblioclic.com</a> </p>
  </footer> <!--LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLTermina el PieLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL-->    

    <!--<-><-><-><-><-><-><-><-><-><-><-><-><-><-><-><->Inicio de los Scripts<-><-><-><-><-><-><-><-><-><-><-><-><-><-><-><->-->  
    <script src="evento/jquery-3.1.1.min.js"></script><!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="evento/login.js"></script>        
    <script src="bootstrap/js/bootstrap.min.js"></script><!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--<-><-><-><-><-><-><-><-><-><-><-><-><-><-><-><->Fin de los Scripts<-><-><-><-><-><-><-><-><-><-><-><-><-><-><-><->-->  
  </body><!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxTermina el bodyxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
</html>
