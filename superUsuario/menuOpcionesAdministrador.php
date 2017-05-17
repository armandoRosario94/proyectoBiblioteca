<?php
  function verMenuOpcionesAdministrador($modulo) {
    echo '
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->          
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-user"></span> 1)Pagina de Inicio Admin</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">2) Administrador<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="ventanaRegistrarAdministrador.php">Registrar</a></li>
                  <li><a href="ventanaEliminarAdministrador.php">Eliminar</a></li>
                  <li><a href="ventanaModificarAdministrador.php">Modificar</a></li>

                  <li role="separator" class="divider"></li>
                  <li><a href="ventanaListaAdministradores.php">Ver Lista de administradores</a></li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">3) Bibliotecario<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="ventanaRegistrarBibliotecario.php">Registrar</a></li>
                  <li><a href="ventanaEliminarBibliotecario.php">Eliminar</a></li>
                  <li><a href="ventanaModificarBibliotecario.php">Modificar</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="ventanaListaBibliotecarios.php">Ver Lista de Bibliotecarios</a></li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">4) Usuarios<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="ventanaRegistrarLector.php">Registrar</a></li>
                  <li><a href="ventanaEliminarLector.php">Eliminar</a></li>                  
                  <li><a href="ventanaModificarLector.php">Modificar</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="ventanaListaLectores.php">Ver Lista de Lectores</a></li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">5) libros<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="ventanaRegistrarLibro.php">Registrar</a></li>
                  <li><a href="ventanaEliminarLibro.php">Eliminar</a></li>
                  <li><a href="ventanaModificarLibro.php">Modificar</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="ventanaListaLibros.php">Ver Lista de libros</a></li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">6) CD´S<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="ventanaRegistrarCd.php">Registrar</a></li>
                  <li><a href="ventanaEliminarCd.php">Eliminar</a></li>
                  <li><a href="ventanaModificarCd.php">Modificar</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="ventanaListaCDS.php">Ver Lista de CD´S</a></li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">7) Revistas<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="ventanaRegistrarRevista.php">Registrar</a></li>
                  <li><a href="ventanaEliminarRevista.php">Eliminar</a></li>
                  <li><a href="ventanaModificarRevista.php">Modificar</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="ventanaListaRevistas.php">Ver Lista de Revistas</a></li>
                </ul>
              </li>              
            </ul><!--Fin de <ul class="nav navbar-nav"> -->

            <ul class="nav navbar-nav navbar-right">
              <li>
                <a>
                  <form action="" method="post">
                    <input type="submit" value="10) Salir" name="eliminarSessionAdministrador" class="btn btn-link">
                  </form>
                </a>
              </li>
            </ul>

          </div><!--Fin de <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> --> 
        </div><!--Fin de <div class="container-fluid">-->
      </nav>'
    ;
  }
?>
