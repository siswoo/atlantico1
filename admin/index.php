<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
	<title>Camaleon Sistem</title>
</head>
<body>
	<div class="seccion1">
	    <div class="row mt-3 ml-3 mr-3">
	    	<div class="col-12">
	    		<form action="index.php" method="GET" id="formulario1">
	    	</div>
		    <div class="col-4">
		    	<input type="date" class="form-control" id="fecha_desde" name="fecha_desde">
		    </div>
		   	<div class="col-4">
		    	<input type="date" class="form-control ml-3" id="fecha_hasta" name="fecha_hasta">
		    </div>
		    <div class="col-4">
		    	<button type="submit" class="btn btn-info">Filtrar</button>
		    </div>
		    <div class="col-12">
	    		</form>
	    	</div>

		    <div class="col-12 mt-3">
		    	<table id="example" class="table row-border hover table-bordered" style="font-size: 12px; color:rgba(50,55,66,1); border-radius: 5px;">
			        <thead>
			            <tr>
			                <th class="text-center">ID</th>
			                <th class="text-center">Entrevistado</th>
			                <th class="text-center">Documento Número</th>
			                <th class="text-center">Fecha Ingreso</th>
			                <th class="text-center">Responsable</th>
			                <th class="text-center">Municipio</th>
			                <th class="text-center">PDF</th>
			            </tr>
			        </thead>
			        <tbody id="resultados">
			        	<?php
			        	@$fecha_desde = $_GET["fecha_desde"];
			        	@$fecha_hasta = $_GET["fecha_hasta"];
			        	include('../script/conexion.php');
			        	ini_set('memory_limit', '1024M');
			        	if(@$fecha_desde!="" and $fecha_hasta!=""){
			        		$consulta1 = "SELECT * FROM encuesta1 WHERE fecha_creacion BETWEEN '".$fecha_desde."' AND '".$fecha_hasta."'";
			        	}else{
			        		$consulta1 = "SELECT * FROM encuesta1";	
			        	}
						$proceso1 = mysqli_query($conexion,$consulta1);
						while($row1 = mysqli_fetch_array($proceso1)) {
							$id = $row1['id'];
							$nombre = $row1['nombre'];
							$identificacion = $row1['identificacion'];
							$responsable = $row1['responsable'];
							$fecha_creacion = $row1['fecha_creacion'];
							$municipio = $row1['municipio'];

							$sql2 = "SELECT * FROM usuarios WHERE id = ".$responsable;
							$proceso2 = mysqli_query($conexion,$sql2);
							while($row2 = mysqli_fetch_array($proceso2)){
								$responsable_nombre = $row2["nombre"];
							}

			        	echo '
			        		<tr id="tr_'.$id.'">
			        			<td class="text-center" id="id_'.$id.'">'.$id.'</td>
			        			<td class="text-center" id="nombre_'.$id.'">'.$nombre.'</td>
			        			<td class="text-center" id="identificacion_'.$id.'">'.$identificacion.'</td>
			        			<td class="text-center" id="fecha_creacion_'.$id.'">'.$fecha_creacion.'</td>
			        			<td class="text-center" id="responsable_'.$id.'">'.$responsable_nombre.'</td>
			        			<td class="text-center" id="municipio_'.$id.'">'.$municipio.'</td>
			        			<td class="text-center">
			        				<a href="../script/pdf1.php?id='.$id.'" target="_blank">
			        					<button type="button" class="btn btn-primary">VER PDF</button>
			        				</a>
			        			</td>
			        		</tr>
			        	';
						}
			        	?>
			        </tbody>
			    </table>
		    </div>
		</div>
	</div>
</body>
</html>

<script src="../js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="../js/popper.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
    	var table = $('#example').DataTable( {
        	"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],

        	"language": {
	            "lengthMenu": "Mostrar _MENU_ Registros por página",
	            "zeroRecords": "No se ha encontrado resultados",
	            "info": "Ubicado en la página <strong>_PAGE_</strong> de <strong>_PAGES_</strong>",
	            "infoEmpty": "Sin registros actualmente",
	            "infoFiltered": "(Filtrado de <strong>_MAX_</strong> total registros)",
	            "paginate": {
			        "first":      "Primero",
			        "last":       "Última",
			        "next":       "Siguiente",
			        "previous":   "Anterior"
			    },
			    "search": "Buscar",
        	},

        	"paging": true,
        	"order": [[ 3, "desc" ]],

    	} );


    	/***************POPOVERS*******************/
		$(function () {
			$('[data-toggle="popover"]').popover()
		})

		// popovers initialization - on hover
		$('[data-toggle="popover-hover"]').popover({
		  html: true,
		  trigger: 'hover',
		  placement: 'bottom',
		  /*content: function () { return '<img src="' + $(this).data('img') + '" />'; }*/
		});

		// popovers initialization - on click
		$('[data-toggle="popover-click"]').popover({
		  html: true,
		  trigger: 'click',
		  placement: 'bottom',
		  content: function () { return '<img src="' + $(this).data('img') + '" />'; }
		});
    	/******************************************/
	} );

</script>







