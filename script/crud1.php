<?php
session_start();
include("conexion.php");
$fecha_creacion = date("Y-m-d");
//$responsable = 1;
$responsable = $_SESSION["jaime3_id"];

$nombre = $_POST["nombre"];
$identificacion = $_POST["identificacion"];
$municipio = $_POST["municipio"];
$departamento = "Atlántico";
$direccion = $_POST["direccion"];

$edad = $_POST["edad"];
$genero = $_POST["genero"];
$estado_civil = $_POST["estado_civil"];
$nivel_escolaridad = $_POST["nivel_escolaridad"];
$convive = $_POST["convive"];
$trabaja_actualmente = $_POST["trabaja_actualmente"];
$ingreso_mensual = $_POST["ingreso_mensual"];

$radio1_1 = $_POST["radio1_1"];
$radio1_2 = $_POST["radio1_2"];
$radio1_3 = $_POST["radio1_3"];
$radio1_4 = $_POST["radio1_4"];

$radio2_1 = $_POST["radio2_1"];
$radio2_2 = $_POST["radio2_2"];
$radio2_3 = $_POST["radio2_3"];
$radio2_4 = $_POST["radio2_4"];
$radio2_5 = $_POST["radio2_5"];
$radio2_6 = $_POST["radio2_6"];
$radio2_7 = $_POST["radio2_7"];
$radio2_8 = $_POST["radio2_8"];
$radio2_9 = $_POST["radio2_9"];
$radio2_10 = $_POST["radio2_10"];
$radio2_11 = $_POST["radio2_11"];
$radio2_12 = $_POST["radio2_12"];
$radio2_13 = $_POST["radio2_13"];
$radio2_14 = $_POST["radio2_14"];

$radio3_1 = $_POST["radio3_1"];
$radio3_2 = $_POST["radio3_2"];
$radio3_3 = $_POST["radio3_3"];
$radio3_4 = $_POST["radio3_4"];

$radio4_1 = $_POST["radio4_1"];
$radio4_2 = $_POST["radio4_2"];
$radio4_3 = $_POST["radio4_3"];

$radio5_1 = $_POST["radio5_1"];
$radio5_2 = $_POST["radio5_2"];
$radio5_3 = $_POST["radio5_3"];
$radio5_4 = $_POST["radio5_4"];
$radio5_5 = $_POST["radio5_5"];

$radio6_1 = $_POST["radio6_1"];
$radio6_2 = $_POST["radio6_2"];
$radio6_3 = $_POST["radio6_3"];
$radio6_4 = $_POST["radio6_4"];

$imagen = $_FILES['firma']['name'];

$location = "../resources/firmas/";
$firma_macro = $location.$identificacion.'.png';
move_uploaded_file ($_FILES['firma']['tmp_name'],$firma_macro);

$path = $firma_macro;
$type = pathinfo($path, PATHINFO_EXTENSION);

$data = file_get_contents($path);

$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

$sql2 = "SELECT * FROM encuesta1 WHERE identificacion = '".$identificacion."'";
$proceso2 = mysqli_query($conexion,$sql2);
$contador2 = mysqli_num_rows($proceso2);

if($contador2>=1){
	$datos = [
		"estatus" => "duplicado",
		"contador" => $contador2,
	];
	echo json_encode($datos);
}else{
	$sql1 = "INSERT INTO encuesta1 (nombre,identificacion,municipio,direccion,departamento,edad,genero,estado_civil,nivel_escolaridad,convive,trabaja_actualmente,ingreso_mensual,radio1_1,radio1_2,radio1_3,radio1_4,radio2_1,radio2_2,radio2_3,radio2_4,radio2_5,radio2_6,radio2_7,radio2_8,radio2_9,radio2_10,radio2_11,radio2_12,radio2_13,radio2_14,radio3_1,radio3_2,radio3_3,radio3_4,radio4_1,radio4_2,radio4_3,radio5_1,radio5_2,radio5_3,radio5_4,radio5_5,radio6_1,radio6_2,radio6_3,radio6_4,responsable,fecha_creacion,base64) VALUES ('$nombre','$identificacion','$municipio','$direccion','$departamento','$edad','$genero','$estado_civil','$nivel_escolaridad','$convive','$trabaja_actualmente','$ingreso_mensual','$radio1_1','$radio1_2','$radio1_3','$radio1_4','$radio2_1','$radio2_2','$radio2_3','$radio2_4','$radio2_5','$radio2_6','$radio2_7','$radio2_8','$radio2_9','$radio2_10','$radio2_11','$radio2_12','$radio2_13','$radio2_14','$radio3_1','$radio3_2','$radio3_3','$radio3_4','$radio4_1','$radio4_2','$radio4_3','$radio5_1','$radio5_2','$radio5_3','$radio5_4','$radio5_5','$radio6_1','$radio6_2','$radio6_3','$radio6_4','$responsable','$fecha_creacion','$base64');";
	$proceso1 = mysqli_query($conexion,$sql1);

	$datos = [
		"estatus" => "ok",
		"sql" => $sql1,
	];
	echo json_encode($datos);
}

?>