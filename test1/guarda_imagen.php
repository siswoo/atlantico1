<?php
if(isset($_POST['dataFirma']))
{

$base64_string = $_POST['dataFirma'];
$file_name ="archivo.jpg";
$output_file = $_SERVER['DOCUMENT_ROOT']."/jaime3/".$file_name;
$ruta_file = base64_to_jpeg($base64_string, $output_file);

}


function base64_to_jpeg($base64_string, $output_file) {
    // abrimos archive para escrivir, si no existe creamos
    $ifp = fopen( $output_file, 'w+' ); 
    $data = $base64_string;
    //podriamos agregar validación asegurando que $data>1
    fwrite( $ifp, base64_decode( $data ) );
    // cerramos archive resultado
    fclose( $ifp ); 
    //mostramos nombre_archivo
    echo "la imagen se encuentra en : ".$output_file;
}

?>