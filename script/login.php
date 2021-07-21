<?php
include("conexion.php");
$usuario = $_POST["usuario"];
$clave = md5($_POST["clave"]);
$sql1 = "SELECT * FROM usuarios WHERE usuario = '".$usuario."' and clave = '".$clave."' LIMIT 1";
$proceso1 = mysqli_query($conexion,$sql1);
$contador1 = mysqli_num_rows($proceso1);
if($contador1>=1){
	$datos = [
		"estatus" => "ok",
		"sql" => $sql1,
	];
	while($row1 = mysqli_fetch_array($proceso1)) {
		$usuario_id = $row1["id"];
	}
	session_start();
	$_SESSION["jaime3_usuario"] = $usuario;
	$_SESSION["jaime3_id"] = $usuario_id;

}else{
	$datos = [
		"estatus" => "error",
		"sql" => $sql1,
	];
}
echo json_encode($datos);

?>