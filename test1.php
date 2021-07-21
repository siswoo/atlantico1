<?php
/*
echo rand(0,9999)."
<br>";
echo rand(0,9999)."
<br>";
echo rand(0,9999)."
<br>";
echo rand(0,9999)."
<br>";
echo rand(0,9999)."
<br>";
echo rand(0,9999)."
<br>";
echo rand(0,9999)."
<br>";
echo rand(0,9999)."
<br>";
echo rand(0,9999)."
<br>";
echo rand(0,9999)."
<br>";
echo rand(0,9999)."
<br>";
echo rand(0,9999)."
<br>";
*/

include("script/conexion.php");
$sql1 = "SELECT * FROM usuarios WHERE id != 1";
$proceso1 = mysqli_query($conexion,$sql1);
while($row1 = mysqli_fetch_array($proceso1)) {
	$correo = md5($row1["correo"]);
	$id = $row1["id"];
	$sql2 = "UPDATE usuarios SET clave = '".$correo."' WHERE id = ".$id;
	$proceso2 = mysqli_query($conexion,$sql2);
}

echo "ok";
?>