<?php

$id = $_GET['id'];

require 'lib/html2pdf.php';
require_once 'lib\dompdf/autoload.inc.php';
require "../userData/function.php";
$funciones = new Principal();
$text .= '<img src="img/encabezado_reporte.jpg" width="700" height="80"/>';
$text .= "<br><br><br>";

$text .= "
<style>
.csstabla, .td {
    border: 1px solid black;
    border-collapse: collapse;
 font-size: 13px;
 text-align : center;

  width:100%;


}



.f{
	width:45%;

}




</style>


<strong>
<center>INSTITUTO TECNOLÓGICO DE LA ZONA OLMECA </center>
<center>DIVISIÓN DE ESTUDIOS PROFESIONALES </center>
<center>RESIDENCIAS PROFESIONALES</center>
<center>ASESOR INTERNO DE RESIDENCIAS PROFESIONALES</center>


P R E S E N T  E.
<br>
Por este conducto informo a usted que ha sido asignado para fungir como Asesor Interno del Proyecto de Residencias Profesionales que a continuación se describe:

</strong>";

$nombre_empresa  = '';
$giro            = '';
$domicilio       = '';
$rfc             = '';
$colonia         = '';
$cp              = '';
$fax             = '';
$ciudad          = '';
$telefono        = '';
$mision          = '';
$titular_empresa = '';
$Asesor          = '';
$firma_acuerdo   = '';
$nombre_proyecto = '';
$opcion_elejida  = '';
$periodo         = '';
$noIntengrantes  = '';

$arrayName = "";
if ($id != "") {
    $arrayName = array('@CVE_NO_CONTROL' => '1035');
}

$arrayName = array('@CVE_NO_CONTROL' => '1035');

$result = $funciones->querySelect("pSOLICITUD_ESTADI_B", $arrayName);
if ($result) {
    while ($fila = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {

        $alumno        = utf8_encode($fila['ALUMNO']);
        $Carrera       = utf8_encode($fila['CARRERA']);
        $Proyecto      = utf8_encode($fila['PROYECTO']);
        $PeriodoInicio = $fila['FECHA_INICIO'];

        $PeriodoFinal = $fila['FECHA_FINAL'];
        $Empresa      = $fila['NOMBRE'];

        
    }
}

$text .= '

<table class="csstabla" >

<tr>
	<td class="csstabla" style="background-color:#B3B6B7;">
		Nombre del Residente
	</td>
	<td class="csstabla" colspan="4">
		' . $alumno . '
	</td>


</tr>
<tr>
	<td class="csstabla">
	 	Carrera:
	</td>
	<td class="csstabla" colspan="4">
		' . $Carrera . '
	</td>
</tr>

<tr>
	<td class="csstabla">
		Nombre del proyecto
	</td>
	<td class="csstabla" colspan="4">
		' . $Proyecto . '
	</td>
</tr>

<tr>
	<td class="csstabla">
		Periodo de Realización
	</td>
	<td class="csstabla" colspan="4">
		' . $PeriodoInicio  . ' - ' . $PeriodoFinal . '
	</td>


</tr>

<tr>
	<td class="csstabla">
		Empresa
	</td>
	<td class="csstabla" colspan="4">
		' . $Empresa . '
	</td>


</tr>



</table>

<br>
Así mismo, le solicito dar el seguimiento pertinente a la realización del proyecto aplicando los lineamientos establecidos para ello, en el procedimiento del SGC para Residencias Profesionales.
<br>
Agradezco de antemano su valioso apoyo en esta importante actividad para la formación profesional de nuestro estudiantado.

';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$dompdf->loadHtml($text);
#$dompdf->Image('img/encabezado.jpg', 1, 0,200,30);
$dompdf->setPaper('letter', 'portrait');
$dompdf->render();
$dompdf->stream("codex", array("Attachment" => 0));
