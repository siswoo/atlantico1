<?php
include("script/conexion.php");
$sql1 = "SELECT * FROM encuesta1";
$proceso1 = mysqli_query($conexion,$sql1);
while($row1 = mysqli_fetch_array($proceso1)) {
	$identificacion = $row1["identificacion"];
	$sql2 = "SELECT * FROM encuesta1 WHERE identificacion = '".$identificacion."'";
	$proceso2 = mysqli_query($conexion,$sql2);
	$contador2 = mysqli_num_rows($proceso2);
	if($contador2>=2){
		while($row2 = mysqli_fetch_array($proceso2)) {
			$id = $row2["id"];
			echo 'Eliminando identificacion = '.$identificacion;
			echo '</br>';
		}
	}
}

?>