<?php
session_start();
include('conexion.php');
require('../resources/fpdf/fpdf.php');
$id = $_GET["id"];

$sql1 = "SELECT * FROM encuesta1 WHERE id = ".$id." LIMIT 1";
$proceso1 = mysqli_query($conexion,$sql1);
$contador1 = mysqli_num_rows($proceso1);
if($contador1>=1){
	while($row1 = mysqli_fetch_array($proceso1)) {
		$nombre = $row1["nombre"];
		$identificacion = $row1["identificacion"];
		$municipio = $row1["municipio"];
		$direccion = $row1["direccion"];
		$departamento = $row1["departamento"];
		$edad = $row1["edad"];
		$genero = $row1["genero"];
		$estado_civil = $row1["estado_civil"];
		$nivel_escolaridad = $row1["nivel_escolaridad"];
		$convive = $row1["convive"];
		$trabaja_actualmente = $row1["trabaja_actualmente"];
		$ingreso_mensual = $row1["ingreso_mensual"];

		$radio1_1 = $row1["radio1_1"];
		$radio1_2 = $row1["radio1_2"];
		$radio1_3 = $row1["radio1_3"];
		$radio1_4 = $row1["radio1_4"];

		$radio2_1 = $row1["radio2_1"];
		$radio2_2 = $row1["radio2_2"];
		$radio2_3 = $row1["radio2_3"];
		$radio2_4 = $row1["radio2_4"];
		$radio2_5 = $row1["radio2_5"];
		$radio2_6 = $row1["radio2_6"];
		$radio2_7 = $row1["radio2_7"];
		$radio2_8 = $row1["radio2_8"];
		$radio2_9 = $row1["radio2_9"];
		$radio2_10 = $row1["radio2_10"];
		$radio2_11 = $row1["radio2_11"];
		$radio2_12 = $row1["radio2_12"];
		$radio2_13 = $row1["radio2_13"];
		$radio2_14 = $row1["radio2_14"];

		$radio3_1 = $row1["radio3_1"];
		$radio3_2 = $row1["radio3_2"];
		$radio3_3 = $row1["radio3_3"];
		$radio3_4 = $row1["radio3_4"];

		$radio4_1 = $row1["radio4_1"];
		$radio4_2 = $row1["radio4_2"];
		$radio4_3 = $row1["radio4_3"];

		$radio5_1 = $row1["radio5_1"];
		$radio5_2 = $row1["radio5_2"];
		$radio5_3 = $row1["radio5_3"];
		$radio5_4 = $row1["radio5_4"];
		$radio5_5 = $row1["radio5_5"];

		$radio6_1 = $row1["radio6_1"];
		$radio6_2 = $row1["radio6_2"];
		$radio6_3 = $row1["radio6_3"];
		$radio6_4 = $row1["radio6_4"];

		$base64 = $row1["base64"];

		$responsable = $row1["responsable"];
		$fecha_creacion = $row1["fecha_creacion"];

		class PDF extends FPDF{
			function Header(){}
			function Footer(){}
		}

		$pdf = new PDF();
		$pdf->AliasNbPages();
		$pdf->AddPage();

		$pdf->Ln(5);
		$pdf->SetFont('Times','',12);
		$pdf->Image('../img/logopdf1.png',25,5,50,40);
		$pdf->Image('../img/logopdf2.jpeg',145,15,50,20);

		$pdf->Ln(30);
		$pdf->SetFont('Times','B',14);
		$pdf->Cell(190,10,utf8_decode('Encuesta #'.$id),0,0,'C');

		$pdf->Ln(10);
		$pdf->SetFont('Times','B',14);
		$pdf->Cell(190,5,utf8_decode('Encuesta de conocimiento sobre el delito de trata de personas en el'),0,1,'C');
		$pdf->Cell(190,5,utf8_decode('Departamento del Atlántico'),0,1,'C');

		$pdf->Ln(5);
		$pdf->SetFont('Times','',12);
		$pdf->Cell(3,10,utf8_decode(''),0,0,'');
		$pdf->Cell(60,10,utf8_decode('Nombre'),0,0,'');
		$pdf->Cell(3,10,utf8_decode(''),0,0,'');
		$pdf->Cell(60,10,utf8_decode('Identificación'),0,0,'');
		$pdf->Cell(3,10,utf8_decode(''),0,0,'');
		$pdf->Cell(60,10,utf8_decode('Municipio'),0,1,'');
		$pdf->Cell(3,5,utf8_decode(''),0,0,'');
		$pdf->Cell(60,5,utf8_decode($nombre),1,0,'');
		$pdf->Cell(3,5,utf8_decode(''),0,0,'');
		$pdf->Cell(60,5,utf8_decode($identificacion),1,0,'');
		$pdf->Cell(3,5,utf8_decode(''),0,0,'');
		$pdf->Cell(60,5,utf8_decode($municipio),1,0,'');

		$pdf->Ln(10);
		$pdf->SetFont('Times','',12);
		$pdf->Cell(3,10,utf8_decode(''),0,0,'');
		$pdf->Cell(90,10,utf8_decode('Departamento'),0,0,'');
		$pdf->Cell(3,10,utf8_decode(''),0,0,'');
		$pdf->Cell(90,10,utf8_decode('Dirección'),0,1,'');
		$pdf->Cell(3,5,utf8_decode(''),0,0,'');
		$pdf->Cell(90,5,utf8_decode($departamento),1,0,'');
		$pdf->Cell(3,5,utf8_decode(''),0,0,'');
		$pdf->Cell(90,5,utf8_decode($direccion),1,0,'');
		
		$pdf->Ln(10);
		$pdf->SetFont('Times','B',14);
		$pdf->Cell(190,5,utf8_decode('Formato de Datos Sociodemográficos'),0,1,'C');
		
		$pdf->Ln(5);
		$pdf->SetFont('Times','',12);
		$pdf->Cell(3,10,utf8_decode(''),0,0,'');
		$pdf->Cell(60,10,utf8_decode('Edad'),0,0,'');
		if($edad==1){
			$edad = "De 18 a 26 años";
		}else if($edad==2){
			$edad = "De 27 a 59 años";
		}else if($edad==3){
			$edad = "De 60 o más";
		}
		$pdf->Cell(3,10,utf8_decode(''),0,0,'');
		$pdf->Cell(60,10,utf8_decode('Género'),0,0,'');
		if($genero==1){
			$genero = "Femenino";
		}else if($genero==2){
			$genero = "Masculino";
		}else if($genero==3){
			$genero = "Prefiero no decirlo";
		}
		$pdf->Cell(3,10,utf8_decode(''),0,0,'');
		$pdf->Cell(60,10,utf8_decode('Estado Civil'),0,1,'');
		if($estado_civil==1){
			$estado_civil = "Soltero";
		}else if($estado_civil==2){
			$estado_civil = "Unión Libre";
		}else if($estado_civil==3){
			$estado_civil = "Casado";
		}else if($estado_civil==4){
			$estado_civil = "Divorciado";
		}
		$pdf->Cell(3,5,utf8_decode(''),0,0,'');
		$pdf->Cell(60,5,utf8_decode($edad),1,0,'');
		$pdf->Cell(3,5,utf8_decode(''),0,0,'');
		$pdf->Cell(60,5,utf8_decode($genero),1,0,'');
		$pdf->Cell(3,5,utf8_decode(''),0,0,'');
		$pdf->Cell(60,5,utf8_decode($estado_civil),1,0,'');

		$pdf->Ln(10);
		$pdf->SetFont('Times','',12);
		$pdf->Cell(3,10,utf8_decode(''),0,0,'');
		$pdf->Cell(60,10,utf8_decode('Nivel de Escolaridad'),0,0,'');
		if($nivel_escolaridad==1){
			$nivel_escolaridad = "Primaria";
		}else if($nivel_escolaridad==2){
			$nivel_escolaridad = "Secundaria";
		}else if($nivel_escolaridad==3){
			$nivel_escolaridad = "Carrera técnica";
		}else if($nivel_escolaridad==4){
			$nivel_escolaridad = "Universitario";
		}else if($nivel_escolaridad==5){
			$nivel_escolaridad = "Postgrado";
		}else if($nivel_escolaridad==6){
			$nivel_escolaridad = "Ninguno";
		}
		$pdf->Cell(3,10,utf8_decode(''),0,0,'');
		$pdf->Cell(60,10,utf8_decode('¿Con quien Convive?'),0,0,'');
		if($convive==1){
			$convive = "Solo";
		}else if($convive==2){
			$convive = "Con mis Padres";
		}else if($convive==3){
			$convive = "Con mi Pareja";
		}else if($convive==4){
			$convive = "Con mi esposo e hijos";
		}else if($convive==5){
			$convive = "Otro";
		}
		$pdf->Cell(3,10,utf8_decode(''),0,0,'');
		$pdf->Cell(60,10,utf8_decode('¿Trabaja Actualmente?'),0,1,'');
		if($trabaja_actualmente==1){
			$trabaja_actualmente = "Si";
		}else if($trabaja_actualmente==2){
			$trabaja_actualmente = "No";
		}
		$pdf->Cell(3,5,utf8_decode(''),0,0,'');
		$pdf->Cell(60,5,utf8_decode($nivel_escolaridad),1,0,'');
		$pdf->Cell(3,5,utf8_decode(''),0,0,'');
		$pdf->Cell(60,5,utf8_decode($convive),1,0,'');
		$pdf->Cell(3,5,utf8_decode(''),0,0,'');
		$pdf->Cell(60,5,utf8_decode($trabaja_actualmente),1,0,'');

		$pdf->Ln(10);
		$pdf->SetFont('Times','',12);
		$pdf->Cell(3,10,utf8_decode(''),0,0,'');
		$pdf->Cell(60,10,utf8_decode('Ingreso Mensual'),0,1,'');
		if($ingreso_mensual==1){
			$ingreso_mensual = "Menor a un salario mínimo";
		}else if($ingreso_mensual==2){
			$ingreso_mensual = "De 1 a 2 salarios mínimos";
		}else if($ingreso_mensual==3){
			$ingreso_mensual = "De 2 a 3 salarios mínimos";
		}else if($ingreso_mensual==4){
			$ingreso_mensual = "De 4 a 5 salarios mínimos";
		}else if($ingreso_mensual==5){
			$ingreso_mensual = "Mas de 5 salarios mínimo";
		}
		$pdf->Cell(3,5,utf8_decode(''),0,0,'');
		$pdf->Cell(60,5,utf8_decode($ingreso_mensual),1,0,'');

		$pdf->Ln(10);
		$pdf->SetFont('Times','B',14);
		$pdf->Cell(190,5,utf8_decode('Modulo - Conocimiento en trata de personas'),0,1,'C');

		$pdf->Ln(5);
		$pdf->SetFont('Times','',12);
		$pdf->Cell(70,10,utf8_decode('¿Usted sabe que es la trata de personas?:'),0,1,'');
		if($radio1_1==1){
			$radio1_1 = "Si";
		}else if($radio1_1==2){
			$radio1_1 = "No";
		}
		$pdf->Cell(190,10,utf8_decode($radio1_1),1,1,'');

		$pdf->Cell(110,10,utf8_decode('¿Qué tanto ha escuchado usted hablar de la trata de personas?:'),0,1,'');
		if($radio1_2==1){
			$radio1_2 = "Mucho";
		}else if($radio1_2==2){
			$radio1_2 = "Poco";
		}else if($radio1_2==3){
			$radio1_2 = "Nada";
		}else if($radio1_2==4){
			$radio1_2 = "Ns/Nr";
		}
		$pdf->Cell(190,10,utf8_decode($radio1_2),1,1,'');

		$pdf->Cell(140,10,utf8_decode('¿En qué medios de comunicación ha escuchado hablar sobre trata de personas?:'),0,1,'');
		if($radio1_3==1){
			$radio1_3 = "Televisión";
		}else if($radio1_3==2){
			$radio1_3 = "Radio";
		}else if($radio1_3==3){
			$radio1_3 = "Internet";
		}else if($radio1_3==4){
			$radio1_3 = "Redes Sociales (Facebook,Twitter,Otras)";
		}else if($radio1_3==5){
			$radio1_3 = "Prensa Escrita (periódico físico)";
		}else if($radio1_3==6){
			$radio1_3 = "Mucho";
		}
		$pdf->Cell(190,10,utf8_decode($radio1_3),1,1,'');

		$pdf->Cell(140,10,utf8_decode('Por lo que usted sabe o ha escuchado, ¿La trata de personas es o no es un delito?:'),0,1,'');
		if($radio1_4==1){
			$radio1_4 = "Si";
		}else if($radio1_4==2){
			$radio1_4 = "No";
		}else if($radio1_4==3){
			$radio1_4 = "No sabe";
		}else if($radio1_4==4){
			$radio1_4 = "No responde";
		}
		$pdf->Cell(190,10,utf8_decode($radio1_4),1,1,'');

		$pdf->AddPage();
		$pdf->Ln(10);
		$pdf->SetFont('Times','B',14);
		$pdf->Cell(190,5,utf8_decode('A continuación, le voy a leer una serie de actividades.'),0,1,'C');
		$pdf->Cell(190,5,utf8_decode('Por favor dígame, para cada una de ellas'),0,1,'C');
		$pdf->Cell(190,5,utf8_decode('Por lo que usted sabe, es o no es trata de personas'),0,1,'C');

		$pdf->Ln(5);
		$pdf->SetFont('Times','',12);
		$pdf->Cell(40,10,utf8_decode('La explotación sexual:'),0,1,'');
		if($radio2_1==1){
			$radio2_1 = "Si es trata";
		}else if($radio2_1==2){
			$radio2_1 = "No";
		}else if($radio2_1==3){
			$radio2_1 = "No es trata";
		}else if($radio2_1==4){
			$radio2_1 = "No sabe";
		}
		$pdf->Cell(190,10,utf8_decode($radio2_1),1,1,'');
		$pdf->Cell(45,10,utf8_decode('La pornografía infantil:'),0,1,'');
		if($radio2_2==1){
			$radio2_2 = "Si es trata";
		}else if($radio2_2==2){
			$radio2_2 = "No";
		}else if($radio2_2==3){
			$radio2_2 = "No es trata";
		}else if($radio2_2==4){
			$radio2_2 = "No sabe";
		}
		$pdf->Cell(190,10,utf8_decode($radio2_2),1,1,'');
		$pdf->Cell(30,10,utf8_decode('La esclavitud:'),0,1,'');
		if($radio2_3==1){
			$radio2_3 = "Si es trata";
		}else if($radio2_3==2){
			$radio2_3 = "No";
		}else if($radio2_3==3){
			$radio2_3 = "No es trata";
		}else if($radio2_3==4){
			$radio2_3 = "No sabe";
		}
		$pdf->Cell(190,10,utf8_decode($radio2_3),1,1,'');
		$pdf->Cell(35,10,utf8_decode('El trabajo forzado:'),0,1,'');
		if($radio2_4==1){
			$radio2_4 = "Si es trata";
		}else if($radio2_4==2){
			$radio2_4 = "No";
		}else if($radio2_4==3){
			$radio2_4 = "No es trata";
		}else if($radio2_4==4){
			$radio2_4 = "No sabe";
		}
		$pdf->Cell(190,10,utf8_decode($radio2_4),1,1,'');
		$pdf->Cell(40,10,utf8_decode('La venta de órganos:'),0,1,'');
		if($radio2_5==1){
			$radio2_5 = "Si es trata";
		}else if($radio2_5==2){
			$radio2_5 = "No";
		}else if($radio2_5==3){
			$radio2_5 = "No es trata";
		}else if($radio2_5==4){
			$radio2_5 = "No sabe";
		}
		$pdf->Cell(190,10,utf8_decode($radio2_5),1,1,'');
		$pdf->Cell(120,10,utf8_decode('La utilización de menores de edad para realizar actividades delictiva:'),0,1,'');
		if($radio2_6==1){
			$radio2_6 = "Si es trata";
		}else if($radio2_6==2){
			$radio2_6 = "No";
		}else if($radio2_6==3){
			$radio2_6 = "No es trata";
		}else if($radio2_6==4){
			$radio2_6 = "No sabe";
		}
		$pdf->Cell(190,10,utf8_decode($radio2_6),1,1,'');
		$pdf->Cell(45,10,utf8_decode('El matrimonio forzado:'),0,1,'');
		if($radio2_7==1){
			$radio2_7 = "Si es trata";
		}else if($radio2_7==2){
			$radio2_7 = "No";
		}else if($radio2_7==3){
			$radio2_7 = "No es trata";
		}else if($radio2_7==4){
			$radio2_7 = "No sabe";
		}
		$pdf->Cell(190,10,utf8_decode($radio2_7),1,1,'');
		$pdf->Cell(40,10,utf8_decode('La adopción ilegal:'),0,1,'');
		if($radio2_8==1){
			$radio2_8 = "Si es trata";
		}else if($radio2_8==2){
			$radio2_8 = "No";
		}else if($radio2_8==3){
			$radio2_8 = "No es trata";
		}else if($radio2_8==4){
			$radio2_8 = "No sabe";
		}
		$pdf->Cell(190,10,utf8_decode($radio2_8),1,1,'');
		$pdf->Cell(45,10,utf8_decode('La explotación laboral:'),0,1,'');
		if($radio2_9==1){
			$radio2_9 = "Si es trata";
		}else if($radio2_9==2){
			$radio2_9 = "No";
		}else if($radio2_9==3){
			$radio2_9 = "No es trata";
		}else if($radio2_9==4){
			$radio2_9 = "No sabe";
		}
		$pdf->Cell(190,10,utf8_decode($radio2_9),1,1,'');
		$pdf->Cell(55,10,utf8_decode('La experimentación biomédica:'),0,1,'');
		if($radio2_10==1){
			$radio2_10 = "Si es trata";
		}else if($radio2_10==2){
			$radio2_10 = "No";
		}else if($radio2_10==3){
			$radio2_10 = "No es trata";
		}else if($radio2_10==4){
			$radio2_10 = "No sabe";
		}
		$pdf->Cell(190,10,utf8_decode($radio2_10),1,1,'');
		$pdf->Cell(35,10,utf8_decode('La mendicidad:'),0,1,'');
		if($radio2_11==1){
			$radio2_11 = "Si es trata";
		}else if($radio2_11==2){
			$radio2_11 = "No";
		}else if($radio2_11==3){
			$radio2_11 = "No es trata";
		}else if($radio2_11==4){
			$radio2_11 = "No sabe";
		}
		$pdf->Cell(190,10,utf8_decode($radio2_11),1,1,'');
		$pdf->Cell(70,10,utf8_decode('¿Según su opinión de estos grupos cual tienen mayor de riesgo de ser víctimas de la trata de personas?:'),0,1,'');
		if($radio2_12==1){
			$radio2_12 = "Niños y niñas";
		}else if($radio2_12==2){
			$radio2_12 = "Las mujeres";
		}else if($radio2_12==3){
			$radio2_12 = "Los(as) jóvenes";
		}else if($radio2_12==4){
			$radio2_12 = "Adultos mayores";
		}else if($radio2_12==5){
			$radio2_12 = "Los hombres";
		}else if($radio2_12==6){
			$radio2_12 = "Población migrante-lgtbi";
		}
		$pdf->Cell(190,5,utf8_decode($radio2_12),1,1,'');

		$pdf->Ln(5);
		$pdf->Cell(160,10,utf8_decode('Para usted. ¿Cuál es la causa mas significativa para que se de un caso de trata de personas?:'),0,1,'');
		if($radio2_13==1){
			$radio2_13 = "Limitaciones para estudiar (económicas, distancia geográfica, transporte)";
		}else if($radio2_13==2){
			$radio2_13 = "Empleo informal (empleo sin contrato ni garantías sociales).";
		}else if($radio2_13==3){
			$radio2_13 = "Migraciones internacionales";
		}else if($radio2_13==4){
			$radio2_13 = "Pobreza";
		}else if($radio2_13==5){
			$radio2_13 = "Crimen organizado";
		}else if($radio2_13==6){
			$radio2_13 = "Falta de información";
		}else if($radio2_13==7){
			$radio2_13 = "Migracion Forzada y Migracion Fronteriza";
		}else if($radio2_13==8){
			$radio2_13 = "Narcotrafico y Microtrafico";
		}else if($radio2_13==9){
			$radio2_13 = "Migracion Forzada y Migracion Fronteriza";
		}else if($radio2_13==10){
			$radio2_13 = "Pobreza y necesidades Basicas insatisfecha";
		}
		$pdf->Cell(190,5,utf8_decode($radio2_13),1,1,'');
		$pdf->Cell(100,10,utf8_decode('¿Usted sabe cuál es el propósito de la trata de personas?:'),0,1,'');
		if($radio2_14==1){
			$radio2_14 = "Si";
		}else if($radio2_14==2){
			$radio2_14 = "No";
		}
		$pdf->Cell(190,10,utf8_decode($radio2_14),1,1,'');

		$pdf->Ln(5);
		$pdf->SetFont('Times','B',14);
		$pdf->Cell(190,5,utf8_decode('¿Qué tanto creen que ayudarían las siguientes acciones para evitar'),0,1,'C');
		$pdf->Cell(190,5,utf8_decode('que alguien sea explotado por otra persona?'),0,1,'C');

		$pdf->Ln(5);
		$pdf->SetFont('Times','',12);
		$pdf->Cell(120,10,utf8_decode('Incrementar el castigo a quienes se benefician de esta explotación:'),0,1,'');
		if($radio3_1==1){
			$radio3_1 = "Mucho";
		}else if($radio3_1==2){
			$radio3_1 = "Poco";
		}else if($radio3_1==3){
			$radio3_1 = "Nada";
		}
		$pdf->Cell(190,10,utf8_decode($radio3_1),1,1,'');
		$pdf->Cell(35,10,utf8_decode('Crear más empleos:'),0,1,'');
		if($radio3_2==1){
			$radio3_2 = "Mucho";
		}else if($radio3_2==2){
			$radio3_2 = "Poco";
		}else if($radio3_2==3){
			$radio3_2 = "Nada";
		}
		$pdf->Cell(190,10,utf8_decode($radio3_2),1,1,'');
		$pdf->Cell(50,10,utf8_decode('Difundir más información:'),0,1,'');
		if($radio3_3==1){
			$radio3_3 = "Mucho";
		}else if($radio3_3==2){
			$radio3_3 = "Poco";
		}else if($radio3_3==3){
			$radio3_3 = "Nada";
		}
		$pdf->Cell(190,10,utf8_decode($radio3_3),1,1,'');
		$pdf->Cell(70,10,utf8_decode('Crear acciones especiales del gobierno:'),0,1,'');
		if($radio3_4==1){
			$radio3_4 = "Mucho";
		}else if($radio3_4==2){
			$radio3_4 = "Poco";
		}else if($radio3_4==3){
			$radio3_4 = "Nada";
		}
		$pdf->Cell(190,10,utf8_decode($radio3_4),1,1,'');
		$pdf->Cell(155,10,utf8_decode('¿Conoce si su municipio o barrio se han presentado casos de víctima de trata de personas?:'),0,1,'');
		if($radio4_1==1){
			$radio4_1 = "Si";
		}else if($radio4_1==2){
			$radio4_1 = "No";
		}
		$pdf->Cell(190,10,utf8_decode($radio4_1),1,1,'');
		$pdf->Cell(80,10,utf8_decode('¿Conoce si la víctima denuncio el delito?:'),0,1,'');
		if($radio4_2==1){
			$radio4_2 = "Si";
		}else if($radio4_2==2){
			$radio4_2 = "No";
		}
		$pdf->Cell(190,10,utf8_decode($radio4_2),1,1,'');
		$pdf->Cell(140,10,utf8_decode('¿A que entidades puedes dirigirte para denunciar un caso de trata de personas?:'),0,1,'');
		if($radio4_3==1){
			$radio4_3 = "Aplicación móvil LiberApp";
		}else if($radio4_3==2){
			$radio4_3 = "Alcaldia municipal";
		}else if($radio4_3==3){
			$radio4_3 = "Gobernacion";
		}else if($radio4_3==4){
			$radio4_3 = "Fiscalia";
		}else if($radio4_3==5){
			$radio4_3 = "Inspecionde de policia";
		}else if($radio4_3==6){
			$radio4_3 = "Comisaria de familia";
		}else if($radio4_3==7){
			$radio4_3 = "ICBF";
		}else if($radio4_3==8){
			$radio4_3 = "todas las anteriores";
		}else if($radio4_3==9){
			$radio4_3 = "No sabe dónde denunciar";
		}
		$pdf->Cell(190,10,utf8_decode($radio4_3),1,1,'');

		$pdf->Ln(10);
		$pdf->SetFont('Times','B',14);
		$pdf->Cell(190,5,utf8_decode('Diagnostico - Cuidado a menores de edad en su opinión'),0,1,'C');
		$pdf->Cell(190,5,utf8_decode('¿Qué tan riesgoso es que las(os) menores de edad?'),0,1,'C');

		$pdf->Ln(5);
		$pdf->SetFont('Times','',12);
		$pdf->Cell(70,10,utf8_decode('Compartan fotografías con poca ropa:'),0,1,'');
		if($radio5_1==1){
			$radio5_1 = "Muy riesgoso";
		}else if($radio5_1==2){
			$radio5_1 = "Algo riesgoso";
		}else if($radio5_1==3){
			$radio5_1 = "Nada riesgoso";
		}
		$pdf->Cell(190,10,utf8_decode($radio5_1),1,1,'');
		$pdf->Cell(75,10,utf8_decode('Hablen con personas extrañas en internet:'),0,1,'');
		if($radio5_2==1){
			$radio5_2 = "Muy riesgoso";
		}else if($radio5_2==2){
			$radio5_2 = "Algo riesgoso";
		}else if($radio5_2==3){
			$radio5_2 = "Nada riesgoso";
		}
		$pdf->Cell(190,10,utf8_decode($radio5_2),1,1,'');
		$pdf->Cell(75,10,utf8_decode('Coqueteen en línea con personas extrañas:'),0,1,'');
		if($radio5_3==1){
			$radio5_3 = "Muy riesgoso";
		}else if($radio5_3==2){
			$radio5_3 = "Algo riesgoso";
		}else if($radio5_3==3){
			$radio5_3 = "Nada riesgoso";
		}
		$pdf->Cell(190,10,utf8_decode($radio5_3),1,1,'');
		$pdf->Cell(140,10,utf8_decode('Acudan a trabajos que suenan muy atractivos fuera de la ciudad de donde viven:'),0,1,'');
		if($radio5_4==1){
			$radio5_4 = "Muy riesgoso";
		}else if($radio5_4==2){
			$radio5_4 = "Algo riesgoso";
		}else if($radio5_4==3){
			$radio5_4 = "Nada riesgoso";
		}
		$pdf->Cell(190,10,utf8_decode($radio5_4),1,1,'');
		$pdf->Cell(90,10,utf8_decode('Traten con personas que los aborden en la calle:'),0,1,'');
		if($radio5_5==1){
			$radio5_5 = "Muy riesgoso";
		}else if($radio5_5==2){
			$radio5_5 = "Algo riesgoso";
		}else if($radio5_5==3){
			$radio5_5 = "Nada riesgoso";
		}
		$pdf->Cell(190,10,utf8_decode($radio5_5),1,1,'');

		$pdf->Ln(10);
		$pdf->SetFont('Times','B',14);
		$pdf->Cell(190,5,utf8_decode('¿En su casa u hogar se vigila'),0,1,'C');
		$pdf->Cell(190,5,utf8_decode('no se vigila que los menores de edad?'),0,1,'C');

		$pdf->Ln(5);
		$pdf->SetFont('Times','',12);
		$pdf->Cell(120,10,utf8_decode('No viajen con alguien que no sea de la entera confianza de sus padres:'),0,1,'');
		if($radio6_1==1){
			$radio6_1 = "Si se vigila";
		}else if($radio6_1==2){
			$radio6_1 = "No se vigila";
		}else if($radio6_1==3){
			$radio6_1 = "No aplica";
		}
		$pdf->Cell(190,10,utf8_decode($radio6_1),1,1,'');
		$pdf->Cell(130,10,utf8_decode('Se sepan su dirección completa y los números telefónicos de importancia:'),0,1,'');
		if($radio6_2==1){
			$radio6_2 = "Si se vigila";
		}else if($radio6_2==2){
			$radio6_2 = "No se vigila";
		}else if($radio6_2==3){
			$radio6_2 = "No aplica";
		}
		$pdf->Cell(190,10,utf8_decode($radio6_2),1,1,'');
		$pdf->Cell(95,10,utf8_decode('Desconfíen de extraños y no reciban regalos de éstos:'),0,1,'');
		if($radio6_3==1){
			$radio6_3 = "Si se vigila";
		}else if($radio6_3==2){
			$radio6_3 = "No se vigila";
		}else if($radio6_3==3){
			$radio6_3 = "No aplica";
		}
		$pdf->Cell(190,10,utf8_decode($radio6_3),1,1,'');
		$pdf->Cell(85,10,utf8_decode('No entren en contacto con extraños en Internet:'),0,1,'');
		if($radio6_4==1){
			$radio6_4 = "Si se vigila";
		}else if($radio6_4==2){
			$radio6_4 = "No se vigila";
		}else if($radio6_4==3){
			$radio6_4 = "No aplica";
		}
		$pdf->Cell(190,10,utf8_decode($radio6_4),1,1,'');

		$pdf->Ln(30);
		$pdf->SetFont('Times','B',14);
		$pdf->Cell(190,5,utf8_decode('Firma Digital'),0,1,'C');
		$pdf->SetFont('Times','',12);

		if($identificacion=='1007132598' or $identificacion=='1002182804' or $identificacion=='1002212693' or $identificacion=='1126423832' or $identificacion=='10212447207' or $identificacion=='1042446836' or $identificacion=='28184551' or $identificacion=='1192768306' or $identificacion=='1002210116' or $identificacion=='1001874238' or $identificacion=='1001997293' or $identificacion=='1048293581' or $identificacion=='1001780461' or $identificacion=='10425547879' or $identificacion=='1051739528' or $identificacion=='1234093542' or $identificacion=='1007172773' or $identificacion=='1143168276' or $identificacion=='1047360410' or $identificacion=='1044627450' or $identificacion=='1002132495' or $identificacion=='1042430870'){
			$pdf->Image('../resources/firmas/'.$identificacion.'.jpg',70,220,90);
		}else{
			$pdf->Image('../resources/firmas/'.$identificacion.'.png',70,220,90);
		}

		
	}
}

$pdf->Output();
?>