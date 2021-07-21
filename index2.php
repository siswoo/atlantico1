<?php
session_start();
if(@$_SESSION["jaime3_id"]==null or $_SESSION["jaime3_id"]=="" or $_SESSION["jaime3_id"]==false){ ?>
  <script type="text/javascript">
    window.location.href = "index.php";
  </script>
<?php } ?>
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

  <div class="container seccion1">
    <div class="row">
      <div class="col-12 text-center" style="font-size: 28px; font-weight: bold;">ENCUESTA DE CONOCIMIENTO SOBRE EL DELITO DE TRATA DE PERSONAS EN EL DEPARTAMENTO DEL ATLÁNTICO</div>
    </div>
  </div>

  <div class="container seccion2">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 form-group form-check">
        <label for="nombre" style="font-size: 21px;">Nombre:</label>
        <input type="text" id="nombre" name="nombre" class="form-control" autocomplete="off"  minlength="4" required>
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 form-group form-check">
        <label for="identificacion" style="font-size: 21px;">Identificación:</label>
        <input type="text" id="identificacion" name="identificacion" class="form-control" autocomplete="off"  minlength="4" maxlength="20"required>
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 form-group form-check">
        <label for="municipio" style="font-size: 21px;">Municipio:</label>
        <select class="form-control" id="municipio" name="municipio" required >
          <option value="">Seleccione</option>
          <option value="Luruaco">Luruaco</option>
          <option value="Manatí">Manatí</option>
          <option value="Tubara">Tubara</option>
          <option value="Sabana grande">Sabana grande</option>
          <option value="Galapa">Galapa</option>
          <option value="Soledad">Soledad</option>
          <option value="Campo de la cruz">Campo de la cruz</option>
          <option value="Juan de Acosta">Juan de Acosta</option>
          <option value="Sabana Larga ">Sabana Larga </option>
          <option value="Santo Tomas">Santo Tomas</option>
          <option value="Malambo">Malambo</option>
          <option value="Puerto Colombia">Puerto Colombia</option>
        </select>
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 form-group form-check">
        <label for="departamento" style="font-size: 21px;">Departamento:</label>
        <input type="text" id="departamento" name="departamento" class="form-control" value="Atlántico" readonly="off" required>
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 form-group form-check">
        <label for="direccion" style="font-size: 21px;">Dirección:</label>
        <input type="text" id="direccion" name="direccion" class="form-control" autocomplete="off" required>
      </div>
    </div>
  </div>

  <div class="container seccion3">
    <div class="row">
      <div class="col-12">
        <hr style="background-color: black;">
      </div>
      <div class="col-12 text-center" style="font-weight: bold; font-size: 25px;">
        FORMATO DE DATOS SOCIODEMOGRÁFICOS
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 form-group form-check">
        <label for="edad" style="font-size: 21px;">Edad:</label>
        <select class="form-control" id="edad" name="edad" required>
          <option value="">Seleccione</option>
          <option value="1">De 18 a 26 años</option>
          <option value="2">De 27 a 59 años</option>
          <option value="3">De 60 o más</option>
        </select>
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 form-group form-check">
        <label for="genero" style="font-size: 21px;">Género:</label>
        <select class="form-control" id="genero" name="genero" required>
          <option value="">Seleccione</option>
          <option value="1">Femenino</option>
          <option value="2">Masculino</option>
          <option value="3">Prefiero no decirlo</option>
        </select>
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 form-group form-check">
        <label for="estado_civil" style="font-size: 21px;">Estado Civil:</label>
        <select class="form-control" id="estado_civil" name="estado_civil" required>
          <option value="">Seleccione</option>
          <option value="1">Soltero</option>
          <option value="2">Unión Libre</option>
          <option value="3">Casado</option>
          <option value="4">Divorciado</option>
        </select>
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 form-group form-check">
        <label for="nivel_escolaridad" style="font-size: 21px;">Nivel de Escolaridad:</label>
        <select class="form-control" id="nivel_escolaridad" name="nivel_escolaridad" required>
          <option value="">Seleccione</option>
          <option value="1">Primaria</option>
          <option value="2">Secundaria</option>
          <option value="3">Carrera técnica</option>
          <option value="4">Universitario</option>
          <option value="5">Postgrado</option>
          <option value="6">Ninguno</option>
        </select>
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 form-group form-check">
        <label for="convive" style="font-size: 21px;">¿Con quien Convive?:</label>
        <select class="form-control" id="convive" name="convive" required>
          <option value="">Seleccione</option>
          <option value="1">Solo</option>
          <option value="2">Con mis Padres</option>
          <option value="3">Con mi Pareja</option>
          <option value="4">Con mi esposo e hijos</option>
          <option value="5">Otro</option>
        </select>
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 form-group form-check">
        <label for="trabaja_actualmente" style="font-size: 21px;">Trabaja Actualmente:</label>
        <select class="form-control" id="trabaja_actualmente" name="trabaja_actualmente" required>
          <option value="">Seleccione</option>
          <option value="1">Si</option>
          <option value="2">No</option>
        </select>
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 form-group form-check">
        <label for="ingreso_mensual" style="font-size: 21px;">Ingreso Mensual:</label>
        <select class="form-control" id="ingreso_mensual" name="ingreso_mensual" required>
          <option value="">Seleccione</option>
          <option value="1">Menor a un salario mínimo</option>
          <option value="2">De 1 a 2 salarios mínimos</option>
          <option value="3">De 2 a 3 salarios mínimos</option>
          <option value="4">De 4 a 5 salarios mínimos</option>
          <option value="5">Mas de 5 salarios mínimo</option>
        </select>
      </div>
    </div>
  </div>

  <div class="container seccion4">
    <div class="row">
      <div class="col-12">
        <hr style="background-color: black;">
      </div>
      <div class="col-12 text-center" style="font-weight: bold; font-size: 25px;">
        MODULO - CONOCIMIENTO EN TRATA DE PERSONAS
      </div>
      <div class="col-12 form-group form-check">
        <label for="radio1_1" style="font-size: 21px;">¿Usted sabe que es la trata de personas?:</label>
        <select class="form-control" id="radio1_1" name="radio1_1" required>
          <option value="">Seleccione</option>
          <option value="1">Si</option>
          <option value="2">No</option>
        </select>
      </div>
      <div class="col-12 form-group form-check">
        <label for="radio1_2" style="font-size: 21px;">¿Qué tanto ha escuchado usted hablar de la trata de personas?:</label>
        <select class="form-control" id="radio1_2" name="radio1_2" required>
          <option value="">Seleccione</option>
          <option value="1">Mucho</option>
          <option value="2">Poco</option>
          <option value="3">Nada</option>
          <option value="4">Ns/Nr</option>
        </select>
      </div>
      <div class="col-12 form-group form-check">
        <label for="radio1_3" style="font-size: 21px;">¿En qué medios de comunicación ha escuchado hablar sobre trata de personas?:</label>
        <select class="form-control" id="radio1_3" name="radio1_3" required>
          <option value="">Seleccione</option>
          <option value="1">Televisión</option>
          <option value="2">Radio</option>
          <option value="3">Internet</option>
          <option value="4">Redes Sociales (Facebook,Twitter,Otras)</option>
          <option value="5">Prensa Escrita (periódico físico)</option>
          <option value="6">Mucho</option>
        </select>
      </div>
      <div class="col-12 form-group form-check">
        <label for="radio1_4" style="font-size: 21px;">Por lo que usted sabe o ha escuchado, ¿La trata de personas es o no es un delito?:</label>
        <select class="form-control" id="radio1_4" name="radio1_4" required>
          <option value="">Seleccione</option>
          <option value="1">Si</option>
          <option value="2">No</option>
          <option value="3">No sabe</option>
          <option value="4">No responde</option>
        </select>
      </div>
    </div>
  </div>

  <div class="container seccion5">
    <div class="row">
      <div class="col-12">
        <hr style="background-color: black;">
      </div>
      <div class="col-12 text-center" style="font-weight: bold; font-size: 20px;">
        A CONTINUACIÓN, LE VOY A LEER UNA SERIE DE ACTIVIDADES. POR FAVOR DÍGAME, PARA CADA UNA DE ELLAS, POR LO QUE USTED SABE, ES O NO ES TRATA DE PERSONAS
      </div>
      <div class="col-12">
        <table class="table" border="1">
          <tr>
            <th class="text-center" style="font-size: 18px;">Pregunta</th>
            <th class="text-center" style="font-size: 18px;">Respuesta</th>
          </tr>
          <tr>
            <td class="text-center" style="font-size:18px;">La explotación sexual</td>
            <td class="text-center">
              <select class="form-control" id="radio2_1" name="radio2_1"  required>
                <option value="">Seleccione</option>
                <option value="1">Si es trata</option>
                <option value="2">No es trata</option>
                <option value="3">No sabe</option>
              </select>
            </td>
          </tr>
          <tr>
            <td class="text-center" style="font-size:18px;">La pornografía infantil</td>
            <td class="text-center">
              <select class="form-control" id="radio2_2" name="radio2_2"  required>
                <option value="">Seleccione</option>
                <option value="1">Si es trata</option>
                <option value="2">No es trata</option>
                <option value="3">No sabe</option>
              </select>
            </td>
          </tr>
          <tr>
            <td class="text-center" style="font-size:18px;">La esclavitud</td>
            <td class="text-center">
              <select class="form-control" id="radio2_3" name="radio2_3"  required>
                <option value="">Seleccione</option>
                <option value="1">Si es trata</option>
                <option value="2">No es trata</option>
                <option value="3">No sabe</option>
              </select>
            </td>
          </tr>
          <tr>
            <td class="text-center" style="font-size:18px;">El trabajo forzado</td>
            <td class="text-center">
              <select class="form-control" id="radio2_4" name="radio2_4"  required>
                <option value="">Seleccione</option>
                <option value="1">Si es trata</option>
                <option value="2">No es trata</option>
                <option value="3">No sabe</option>
              </select>
            </td>
          </tr>
          <tr>
            <td class="text-center" style="font-size:18px;">La venta de órganos</td>
            <td class="text-center">
              <select class="form-control" id="radio2_5" name="radio2_5"  required>
                <option value="">Seleccione</option>
                <option value="1">Si es trata</option>
                <option value="2">No es trata</option>
                <option value="3">No sabe</option>
              </select>
            </td>
          </tr>
          <tr>
            <td class="text-center" style="font-size:18px;">La utilización de menores de edad para realizar actividades delictiva</td>
            <td class="text-center">
              <select class="form-control" id="radio2_6" name="radio2_6"  required>
                <option value="">Seleccione</option>
                <option value="1">Si es trata</option>
                <option value="2">No es trata</option>
                <option value="3">No sabe</option>
              </select>
            </td>
          </tr>
          <tr>
            <td class="text-center" style="font-size:18px;">El matrimonio forzado</td>
            <td class="text-center">
              <select class="form-control" id="radio2_7" name="radio2_7"  required>
                <option value="">Seleccione</option>
                <option value="1">Si es trata</option>
                <option value="2">No es trata</option>
                <option value="3">No sabe</option>
              </select>
            </td>
          </tr>
          <tr>
            <td class="text-center" style="font-size:18px;">La adopción ilegal</td>
            <td class="text-center">
              <select class="form-control" id="radio2_8" name="radio2_8"  required>
                <option value="">Seleccione</option>
                <option value="1">Si es trata</option>
                <option value="2">No es trata</option>
                <option value="3">No sabe</option>
              </select>
            </td>
          </tr>
          <tr>
            <td class="text-center" style="font-size:18px;">La explotación laboral</td>
            <td class="text-center">
              <select class="form-control" id="radio2_9" name="radio2_9"  required>
                <option value="">Seleccione</option>
                <option value="1">Si es trata</option>
                <option value="2">No es trata</option>
                <option value="3">No sabe</option>
              </select>
            </td>
          </tr>
          <tr>
            <td class="text-center" style="font-size:18px;">La experimentación biomédica</td>
            <td class="text-center">
              <select class="form-control" id="radio2_10" name="radio2_10"  required>
                <option value="">Seleccione</option>
                <option value="1">Si es trata</option>
                <option value="2">No es trata</option>
                <option value="3">No sabe</option>
              </select>
            </td>
          </tr>
          <tr>
            <td class="text-center" style="font-size:18px;">La mendicidad</td>
            <td class="text-center">
              <select class="form-control" id="radio2_11" name="radio2_11"  required>
                <option value="">Seleccione</option>
                <option value="1">Si es trata</option>
                <option value="2">No es trata</option>
                <option value="3">No sabe</option>
              </select>
            </td>
          </tr>
          <tr>
            <td class="text-center" style="font-size:18px;">¿Según su opinión de estos grupos cual tienen mayor de riesgo de ser víctimas de la trata de personas?</td>
            <td class="text-center">
              <select class="form-control" id="radio2_12" name="radio2_12"  required>
                <option value="">Seleccione</option>
                <option value="1">Niños y niñas</option>
                <option value="2">Las mujeres</option>
                <option value="3">Los(as) jóvenes</option>
                <option value="4">Adultos mayores</option>
                <option value="5">Los hombres</option>
                <option value="6">Población migrante-lgtbi</option>
              </select>
            </td>
          </tr>
          <tr>
            <td class="text-center" style="font-size:18px;">Para usted. ¿Cuál es la causa mas significativa para que se de un caso de trata de personas?</td>
            <td class="text-center">
              <select class="form-control" id="radio2_13" name="radio2_13"  required>
                <option value="">Seleccione</option>
                <option value="1">Limitaciones para estudiar (económicas, distancia geográfica, transporte)</option>
                <option value="2">Empleo informal (empleo sin contrato ni garantías sociales).</option>
                <option value="3">Migraciones internacionales</option>
                <option value="4">Pobreza</option>
                <option value="5">Crimen organizado</option>
                <option value="6">Falta de información</option>
                <option value="7">Migracion Forzada y Migracion Fronteriza</option>
                <option value="8">Narcotrafico y Microtrafico</option>
                <option value="9">Migracion Forzada y Migracion Fronteriza</option>
                <option value="10">Pobreza y necesidades Basicas insatisfecha</option>
              </select>
            </td>
          </tr>
          <tr>
            <td class="text-center" style="font-size:18px;">¿Usted sabe cuál es el propósito de la trata de personas?</td>
            <td class="text-center">
              <select class="form-control" id="radio2_14" name="radio2_14"  required>
                <option value="">Seleccione</option>
                <option value="1">Si</option>
                <option value="2">No</option>
              </select>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>


  <div class="container seccion6">
    <div class="row">
      <div class="col-12">
        <hr style="background-color: black;">
      </div>
      <div class="col-12 text-center" style="font-weight: bold; font-size: 20px; text-transform: uppercase;">
        ¿Qué tanto creen que ayudarían las siguientes acciones para evitar que alguien sea explotado por otra persona?
      </div>
      <div class="col-12">
        <table class="table" border="1">
          <tr>
            <th class="text-center" style="font-size: 18px;">Pregunta</th>
            <th class="text-center" style="font-size: 18px;">Respuesta</th>
          </tr>
          <tr>
            <td class="text-center" style="font-size:18px;">Incrementar el castigo a quienes se benefician de esta explotación</td>
            <td class="text-center">
              <select class="form-control" id="radio3_1" name="radio3_1"  required>
                <option value="">Seleccione</option>
                <option value="1">Mucho</option>
                <option value="2">Poco</option>
                <option value="3">Nada</option>
              </select>
            </td>
          </tr>
          <tr>
            <td class="text-center" style="font-size:18px;">Crear más empleos</td>
            <td class="text-center">
              <select class="form-control" id="radio3_2" name="radio3_2"  required>
                <option value="">Seleccione</option>
                <option value="1">Mucho</option>
                <option value="2">Poco</option>
                <option value="3">Nada</option>
              </select>
            </td>
          </tr>
          <tr>
            <td class="text-center" style="font-size:18px;">Difundir más información</td>
            <td class="text-center">
              <select class="form-control" id="radio3_3" name="radio3_3"  required>
                <option value="">Seleccione</option>
                <option value="1">Mucho</option>
                <option value="2">Poco</option>
                <option value="3">Nada</option>
              </select>
            </td>
          </tr>
          <tr>
            <td class="text-center" style="font-size:18px;">Crear acciones especiales del gobierno</td>
            <td class="text-center">
              <select class="form-control" id="radio3_4" name="radio3_4"  required>
                <option value="">Seleccione</option>
                <option value="1">Mucho</option>
                <option value="2">Poco</option>
                <option value="3">Nada</option>
              </select>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>

  <div class="container seccion7">
    <div class="row">
      <div class="col-12" style="font-size: 20px;">
        ¿Conoce si su municipio o barrio se han presentado casos de víctima de trata de personas?
        <select class="form-control" id="radio4_1" name="radio4_1" required>
          <option value="">Seleccione</option>
          <option value="1">Si</option>
          <option value="2">No</option>
        </select>
      </div>
      <div class="col-12" style="font-size: 20px;">
        ¿Conoce si la víctima denuncio el delito?
        <select class="form-control" id="radio4_2" name="radio4_2" required>
          <option value="">Seleccione</option>
          <option value="1">Si</option>
          <option value="2">No</option>
        </select>
      </div>
      <div class="col-12" style="font-size: 20px;">
        ¿A que entidades puedes dirigirte para denunciar un caso de trata de personas?
        <select class="form-control" id="radio4_3" name="radio4_3" required>
          <option value="">Seleccione</option>
          <option value="1">Aplicación móvil LiberApp</option>
          <option value="2">Alcaldia municipal</option>
          <option value="3">Gobernacion</option>
          <option value="4">Fiscalia</option>
          <option value="5">Inspecionde de policia</option>
          <option value="6">Comisaria de familia</option>
          <option value="7">ICBF</option>
          <option value="8">todas las anteriores</option>
          <option value="9">No sabe dónde denunciar</option>
        </select>
      </div>
    </div>
  </div>

  <div class="container seccion10">
    <div class="row">
      <div class="col-12">
        <hr style="background-color: black;">
      </div>
      <div class="col-12 text-center" style="font-weight: bold; font-size: 20px; text-transform: uppercase;">
        Diagnostico - Cuidado a menores de edad
      </div>
      <div class="col-12 text-center" style="font-weight: bold; font-size: 18px;">
        EN SU OPINIÓN, ¿QUÉ TAN RIESGOSO ES QUE LAS(OS) MENORES DE EDAD?
      </div>
      <div class="col-12">
        <table class="table" border="1">
          <tr>
            <th class="text-center" style="font-size: 18px;">Pregunta</th>
            <th class="text-center" style="font-size: 18px;">Respuesta</th>
          </tr>
          <tr>
            <td class="text-center" style="font-size:18px;">Compartan fotografías con poca ropa </td>
            <td class="text-center">
              <select class="form-control" id="radio5_1" name="radio5_1"  required>
                <option value="">Seleccione</option>
                <option value="1">Muy riesgoso</option>
                <option value="2">Algo riesgoso</option>
                <option value="3">Nada riesgoso</option>
              </select>
            </td>
          </tr>
          <tr>
            <td class="text-center" style="font-size:18px;">Hablen con personas extrañas en internet   </td>
            <td class="text-center">
              <select class="form-control" id="radio5_2" name="radio5_2"  required>
                <option value="">Seleccione</option>
                <option value="1">Muy riesgoso</option>
                <option value="2">Algo riesgoso</option>
                <option value="3">Nada riesgoso</option>
              </select>
            </td>
          </tr>
          <tr>
            <td class="text-center" style="font-size:18px;">Coqueteen en línea con personas extrañas</td>
            <td class="text-center">
              <select class="form-control" id="radio5_3" name="radio5_3"  required>
                <option value="">Seleccione</option>
                <option value="1">Muy riesgoso</option>
                <option value="2">Algo riesgoso</option>
                <option value="3">Nada riesgoso</option>
              </select>
            </td>
          </tr>
          <tr>
            <td class="text-center" style="font-size:18px;">Acudan a trabajos que suenan muy atractivos fuera de la ciudad de donde viven</td>
            <td class="text-center">
              <select class="form-control" id="radio5_4" name="radio5_4"  required>
                <option value="">Seleccione</option>
                <option value="1">Muy riesgoso</option>
                <option value="2">Algo riesgoso</option>
                <option value="3">Nada riesgoso</option>
              </select>
            </td>
          </tr>
          <tr>
            <td class="text-center" style="font-size:18px;">Traten con personas que los aborden en la calle</td>
            <td class="text-center">
              <select class="form-control" id="radio5_5" name="radio5_5"  required>
                <option value="">Seleccione</option>
                <option value="1">Muy riesgoso</option>
                <option value="2">Algo riesgoso</option>
                <option value="3">Nada riesgoso</option>
              </select>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>

  <div class="container seccion11">
    <div class="row">
      <div class="col-12">
        <hr style="background-color: black;">
      </div>
      <div class="col-12 text-center" style="font-weight: bold; font-size: 20px; text-transform: uppercase;">
        ¿EN SU CASA U HOGAR SE VIGILA O NO SE VIGILA QUE LOS MENORES DE EDAD…?
      </div>
      <div class="col-12">
        <table class="table" border="1">
          <tr>
            <th class="text-center" style="font-size: 18px;">Pregunta</th>
            <th class="text-center" style="font-size: 18px;">Respuesta</th>
          </tr>
          <tr>
            <td class="text-center" style="font-size:18px;">No viajen con alguien que no sea de la entera confianza de sus padres</td>
            <td class="text-center">
              <select class="form-control" id="radio6_1" name="radio6_1"  required>
                <option value="">Seleccione</option>
                <option value="1">Si se vigila</option>
                <option value="2">No se vigila</option>
                <option value="3">No aplica</option>
              </select>
            </td>
          </tr>
          <tr>
            <td class="text-center" style="font-size:18px;">Se sepan su dirección completa y los números telefónicos de importancia</td>
            <td class="text-center">
              <select class="form-control" id="radio6_2" name="radio6_2"  required>
                <option value="">Seleccione</option>
                <option value="1">Si se vigila</option>
                <option value="2">No se vigila</option>
                <option value="3">No aplica</option>
              </select>
            </td>
          </tr>
          <tr>
            <td class="text-center" style="font-size:18px;">Desconfíen de extraños y no reciban regalos de éstos</td>
            <td class="text-center">
              <select class="form-control" id="radio6_3" name="radio6_3"  required>
                <option value="">Seleccione</option>
                <option value="1">Si se vigila</option>
                <option value="2">No se vigila</option>
                <option value="3">No aplica</option>
              </select>
            </td>
          </tr>
          <tr>
            <td class="text-center" style="font-size:18px;">No entren en contacto con extraños en Internet</td>
            <td class="text-center">
              <select class="form-control" id="radio6_4" name="radio6_4"  required>
                <option value="">Seleccione</option>
                <option value="1">Si se vigila</option>
                <option value="2">No se vigila</option>
                <option value="3">No aplica</option>
              </select>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>

  <div class="container seccion9">
    <div class="row">
      <div class="col-6 text-center">
        <button type="button" class="btn btn-primary" onclick="firma1();">Generar Firma Digital</button>
      </div>
      <div class="col-6 text-center">
        <input type="file" name="firma" id="firma" class="form-control" required>
      </div>
    </div>
  </div>

  <div class="container seccion8">
    <div class="row">
      <div class="col-12 text-center">
        <button type="submit" id="submit1" class="btn btn-success" style="font-weight: bold; font-size: 25px;">ENVIAR</button>
      </div>
    </div>
  </div>

</form>

<div class="container seccion9">
  <div class="row">
    <div class="col-12 text-center">
      <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel2">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators2" data-slide-to="3"></li>
          <li data-target="#carouselExampleIndicators2" data-slide-to="4"></li>
          <li data-target="#carouselExampleIndicators2" data-slide-to="5"></li>
          <li data-target="#carouselExampleIndicators2" data-slide-to="6"></li>
        </ol>
        
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row text-center">
              <div class="col-4">
                <img src="img/sliders/a1.jpg" alt="Primer slider" style="width: 150px;">
              </div>
              <div class="col-3">
                <img src="img/sliders/a2.jpg" alt="Segundo slider" style="width: 150px;">
              </div>
              <div class="col-4">
                <img src="img/sliders/a3.jpg" alt="Tercer slider" style="width: 150px;">
              </div>
            </div>
          </div>
          <div class="carousel-item">
              <div class="row text-center">
              <div class="col-4">
                <img src="img/sliders/a4.jpg" alt="Cuarto slider" style="width: 150px;">
              </div>
              <div class="col-3">
                <img src="img/sliders/a5.jpg" alt="Quinto slider" style="width: 150px;">
              </div>
              <div class="col-4">
                <img src="img/sliders/a6.jpg" alt="Sexto slider" style="width: 150px;">
              </div>
            </div>
          </div>
          <div class="carousel-item">
              <div class="row text-center">
              <div class="col-4">
                <img src="img/sliders/a7.jpg" alt="Cuarto slider" style="width: 150px;">
              </div>
              <div class="col-3">
                <img src="img/sliders/a8.jpg" alt="Quinto slider" style="width: 150px;">
              </div>
              <div class="col-4">
                <img src="img/sliders/a9.jpg" alt="Sexto slider" style="width: 150px;">
              </div>
            </div>
          </div>
          <div class="carousel-item">
              <div class="row text-center">
              <div class="col-4">
                <img src="img/sliders/a10.jpg" alt="Cuarto slider" style="width: 150px;">
              </div>
              <div class="col-4">
                <img src="img/sliders/a11.jpg" alt="Quinto slider" style="width: 150px;">
              </div>
              <div class="col-4">
                <img src="img/sliders/a12.jpg" alt="Quinto slider" style="width: 150px;">
              </div>
            </div>
          </div>
          <div class="carousel-item">
              <div class="row text-center">
              <div class="col-4">
                <img src="img/sliders/a13.jpg" alt="Cuarto slider" style="width: 150px;">
              </div>
              <div class="col-4">
                <img src="img/sliders/a14.jpg" alt="Quinto slider" style="width: 150px;">
              </div>
              <div class="col-4">
                <img src="img/sliders/a15.jpg" alt="Quinto slider" style="width: 150px;">
              </div>
            </div>
          </div>
          <div class="carousel-item">
              <div class="row text-center">
              <div class="col-6">
                <img src="img/sliders/a16.jpg" alt="Cuarto slider" style="width: 150px;">
              </div>
              <div class="col-6">
                <img src="img/sliders/a17.jpg" alt="Quinto slider" style="width: 150px;">
              </div>
            </div>
          </div>
        </div>
        
      <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
        
      <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
  </div>
    </div>
  </div>
</div>

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
  var fd = new FormData();
  var files = $('#firma')[0].files[0];
  fd.append('firma',files);
  
  fd.append('nombre',$('#nombre').val());
  fd.append('identificacion',$('#identificacion').val());
  fd.append('municipio',$('#municipio').val());
  fd.append('departamento',$('#departamento').val());
  fd.append('direccion',$('#direccion').val());

  fd.append('edad',$('#edad').val());
  fd.append('genero',$('#genero').val());
  fd.append('estado_civil',$('#estado_civil').val());
  fd.append('nivel_escolaridad',$('#nivel_escolaridad').val());
  fd.append('convive',$('#convive').val());
  fd.append('trabaja_actualmente',$('#trabaja_actualmente').val());
  fd.append('ingreso_mensual',$('#ingreso_mensual').val());

  fd.append('radio1_1',$('#radio1_1').val());
  fd.append('radio1_2',$('#radio1_2').val());
  fd.append('radio1_3',$('#radio1_3').val());
  fd.append('radio1_4',$('#radio1_4').val());

  fd.append('radio2_1',$('#radio2_1').val());
  fd.append('radio2_2',$('#radio2_2').val());
  fd.append('radio2_3',$('#radio2_3').val());
  fd.append('radio2_4',$('#radio2_4').val());
  fd.append('radio2_5',$('#radio2_5').val());
  fd.append('radio2_6',$('#radio2_6').val());
  fd.append('radio2_7',$('#radio2_7').val());
  fd.append('radio2_8',$('#radio2_8').val());
  fd.append('radio2_9',$('#radio2_9').val());
  fd.append('radio2_10',$('#radio2_10').val());
  fd.append('radio2_11',$('#radio2_11').val());
  fd.append('radio2_12',$('#radio2_12').val());
  fd.append('radio2_13',$('#radio2_13').val());
  fd.append('radio2_14',$('#radio2_14').val());

  fd.append('radio3_1',$('#radio3_1').val());
  fd.append('radio3_2',$('#radio3_2').val());
  fd.append('radio3_3',$('#radio3_3').val());
  fd.append('radio3_4',$('#radio3_4').val());

  fd.append('radio4_1',$('#radio4_1').val());
  fd.append('radio4_2',$('#radio4_2').val());
  fd.append('radio4_3',$('#radio4_3').val());

  fd.append('radio5_1',$('#radio5_1').val());
  fd.append('radio5_2',$('#radio5_2').val());
  fd.append('radio5_3',$('#radio5_3').val());
  fd.append('radio5_4',$('#radio5_4').val());
  fd.append('radio5_5',$('#radio5_5').val());

  fd.append('radio6_1',$('#radio6_1').val());
  fd.append('radio6_2',$('#radio6_2').val());
  fd.append('radio6_3',$('#radio6_3').val());
  fd.append('radio6_4',$('#radio6_4').val());

  $.ajax({
    url: 'script/crud1.php',
    type: 'POST',
    data: fd,
    dataType: "JSON",
    contentType: false,
    processData: false,

   beforeSend: function (){
      $('#submit1').attr('disabled','true');
    },

    success: function(respuesta) {
      console.log(respuesta);
      if(respuesta["estatus"]=="ok"){
        Swal.fire({
          title: 'Correcto!',
          text: "Se ha guardado la información Correctamente",
          icon: 'success',
          position: 'center',
          showConfirmButton: false,
          timer: 2000
        });
        window.location.href = "index2.php";
      }else{
        Swal.fire({
          title: 'Error!',
          text: "Documento Anteriormente registrado",
          icon: 'error',
          position: 'center',
          showConfirmButton: false,
          timer: 2000
        });
      }
    },

    error: function(respuesta) {
      console.log(respuesta['responseText']);
      $('#submit1').removeAttr('disabled');
      Swal.fire({
        title: 'Error!',
        text: "No se ha logrado guardar la información",
        icon: 'error',
        position: 'center',
        showConfirmButton: false,
        timer: 2000
      });
    }
  });
});


  function firma1(){
    window.open("script/generar_firma1.php", "Diseño Web", "width=800, height=800")
  }

</script>