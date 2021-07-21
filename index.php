<?php
session_start();
session_destroy();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="img/favicon1.webp">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="resources/signature/docs/css/signature-pad.css">
    <title>WebCamaleonAbc</title>
  </head>
<body>

<?php
$ubicacion='Inicio';
include("script/conexion.php");
include("header.php");
?>

<form id="formulario1" method="POST" action="#">
    <div class="seccion1" style="margin-top: 3rem;">
      <div class="row">
        <div class="container">
          <div class="col-12" class="text-center">
            <p class="text-center" style="font-weight: bold; font-size: 35px; text-transform: uppercase;">Datos de Ingreso</p>
          </div>
          <div class="form-group form-check">
            <label for="usuario">Usuario</label>
            <input type="text" class="form-control" name="usuario" id="usuario" placeholder="" value="" autocomplete="off">
            <div class="ml-1 mt-1 error_texto1 d-none" id="error_texto1">Este campo no debe estar vacio.</div>
            </div>
          <div class="form-group form-check">
            <label for="clave">Clave</label>
            <input type="password" class="form-control" name="clave" id="clave" placeholder="" value="" autocomplete="off">
            <div class="ml-1 mt-1 error_texto2 d-none" id="error_texto2"></div>
            <small id="emailHelp" class="form-text text-muted">Los datos de ingreso son totalmente confidenciales.</small>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
              <button type="submit" id="submit" class="btn btn-success">INGRESAR</button>
            </div>
          </div>
        </div>
      </div>
    </div>
</form>

<?php
include("footer.php");
?>

</body>
</html>

<script src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script src="js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="resources/signature/docs/js/signature_pad.umd.js"></script>

<script>
	$('#carouselExampleIndicators2').carousel({
  		interval: 2000
	});

  $("#formulario1").on("submit", function(e){
  e.preventDefault();
  var f = $(this);
  var usuario = $('#usuario').val();
  var clave = $('#clave').val();

  /*******VALIDACIONES********/
  if(usuario==''){
    $('#usuario').addClass('error1');
    $('#error_texto1').removeClass('d-none');
    $('#error_texto1').html('Este campo no debe estar vacio.');
    return false;
  }

  if(clave==''){
    $('#clave').addClass('error1');
    $('#error_texto2').removeClass('d-none');
    $('#error_texto2').html('Este campo no debe estar vacio.');
    return false;
  }
  /***************************/

    $.ajax({
    type: 'POST',
    url: 'script/login.php',
    data: $('#formulario1').serialize(),
    dataType: "JSON",
    success: function(respuesta) {
      console.log(respuesta);
      if(respuesta["estatus"]=="error"){
        Swal.fire({
          position: 'center',
          icon: 'error',
          title: 'Usuario incorrecto...!',
          showConfirmButton: true,
          timer: 3000
        })
        return false;
      }

      if(respuesta["estatus"]=="ok"){
        window.location.href = "index2.php";
      }

    },

    error: function(respuesta) {
      console.log(respuesta['responseText']);
    }
  });

});
</script>