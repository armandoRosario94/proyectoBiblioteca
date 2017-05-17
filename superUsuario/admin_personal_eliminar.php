<?php
  require "../php/BaseDatos.php";
  require 'menu.php';
  /*session_start();
  if (!empty($_SESSION['ADMINISTRADOR']) || !empty($_SESSION['JEFE_CARRERA']) || !empty($_SESSION['SERVICIOS_ESCOLARES']) || !empty($_SESSION['PROFESOR'])) {
    echo "Entro";
    header('location: sistema.php');
  }*/
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Eliminar Carrera</title>
    <?php
      session_start();
      if (isset($_POST['borrar'])) {
        unset($_SESSION['ADMINISTRADOR']);
        session_destroy();
        header("location: ../index.php");
      }
      if (empty($_SESSION['ADMINISTRADOR'])) {
        header('location: ../index.php');
      }
    ?>
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilosFooter.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="">
    <div class="container">
      <div class="row img-responsive">
        <div class="col-xs-4">
          <img src="../img/logo_umar.jpg" class="img-responsive">
        </div>
        <div class="col-xs-8">
          <img src="../img/logo_umar_2.jpg" class="img-responsive">
        </div>
      </div>
      <?php
        $query = "SELECT * FROM preregistro";
        $bd = new BaseDatos();
        $bd->realizarConexion();
        $resultado = $bd->realizarConsulta($query);
        $numResultados = $resultado->num_rows;
        $query = "SELECT * FROM usuario";
        $resultado = $bd->realizarConsulta($query);
        $numRegistros = $resultado->num_rows;
        $bd->cerrarConexion();
        verMenu(" ", $numResultados, $numRegistros);
      ?>
      <div class="row">
        <div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <center>Eliminar Carrera</center>
            </div>
            <div class="panel-body">
              <form action="php/guardarDatos.php" method="post" name="frm" class="form-horizontal">
                <div class="form-group">
                  <label for="" style="text-align:left" class="col-sm-4 control-label">Campus:</label>
                  <div class="col-sm-8">
                    <select class="form-control" name="selectCampus" id="selectCampus">

                    </select>
                  </div>
                </div>

                <label>Selecciona la carrera que desea eliminar:</label><p>
                <div class="form-group">
                  <div class="table-responsive col-sm-12">
                    <table class="table table-hover" id="tablaInformacionCarrera">

                    </table>
                  </div>
                </div>

                <div class="form-group">
                  <center>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalCarrera" data-whatever="@mdo" id="btnEliminar">
                      <span class="glyphicon glyphicon-erase"></span>
                      Eliminar
                    </button>
                  </center>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modalCarrera" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Eliminar Carrera</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                ¿Estas seguro que quieres eliminar " ... " ?
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary" id="btnModalEliminarCarrera">Eliminar</button>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/tareasAdmin.js"></script>
    <script src="../js/footer.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
