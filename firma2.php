<?php
if(isset($_POST['dataFirma']))
{
	$base64_string = $_POST['dataFirma'];
	$file_name ="archivo.jpg";
	$output_file = $_SERVER['DOCUMENT_ROOT'].$file_name;
	$ruta_file = base64_to_jpeg($base64_string, $output_file);
}
 
function base64_to_jpeg($base64_string, $output_file) {
    	// abrimos el archivo para escribir, si no existe creamos
    	$ifp = fopen( $output_file, 'w+' ); 
   	$data = $base64_string;
    	//podríamos agregar validación asegurando que $data>1
    	fwrite( $ifp, base64_decode( $data ) );
   	 //cerramos el archivo resultado
    	fclose( $ifp ); 
   	 //mostramos la ruta con el nombre_archivo
    	echo $output_file;
}

/*
$file_name ="archivo.jpg";
$output_file = $_SERVER['DOCUMENT_ROOT'].$file_name;
$ruta_file = base64_to_jpeg($base64_string, $output_file);

function base64_to_jpeg($base64_string, $output_file) {
    // abrimos archivo para escribir, si no existe lo creamos
    $ifp = fopen( $output_file, 'w+' ); 
    $data = $base64_string ;
    //podríamos agregar validación asegurando que $data&gt;1
    fwrite( $ifp, base64_decode( $data ) );
    // cerramos el archivo resultado
    fclose( $ifp ); 
    //retornamos el nombre del archivo
    return $output_file; 
}
*/

?>