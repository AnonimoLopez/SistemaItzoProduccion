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
<center>SOLICITUD DE RESIDENCIAS PROFESIONALES</center>
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
$opcion_elejida = '';
$periodo = '';
$noIntengrantes = '';

$arrayName="";
if ($id != ""){
	$arrayName = array('@CVE_NO_CONTROL' => $id,);
}

$result = $funciones->querySelect("pPROYECTO_EMPRESA_B", $arrayName);
if ($result) {
    while ($fila = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        $nombre_empresa  = utf8_encode($fila['NOMBRE']);
        $giro            =  utf8_encode($fila['SECTOR']);
        $domicilio       =  utf8_encode($fila['Domicilio']);
        $rfc             =  utf8_encode($fila['RFC']);
        $colonia         =  utf8_encode($fila['Colonia']);
        $cp              =  utf8_encode($fila['C_P']);
        $fax             =  utf8_encode($fila['FAX']);
        $ciudad          =  utf8_encode($fila['Ciudad']);
        $telefono        =  utf8_encode($fila['TELEFONO']);
        $mision          =  utf8_encode($fila['MISION']);
        $titular_empresa =  utf8_encode($fila['RESPONSABLE']);
        $Asesor          =  utf8_encode($fila['Asesor_Externo']);
        $firma_acuerdo   =  utf8_encode($fila['RESPONSABLE']);
        $nombre_proyecto =  utf8_encode($fila['PROYECTO']);
        $opcion_elejida =  utf8_encode($fila['OPCION_ELEJIDA']);
        $periodo =  utf8_encode($fila['PERIODO']);
        $noIntengrantes =  utf8_encode($fila['No_Integrantes']);
    }
}

$text.='

Lugar: Villa Ocuiltzapotlan, Centro Tabasco<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C. Juan De La Cruz may &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ATN: C. Ing. Jose Luís Rovira Balan <br>
Jefe de la Div. de Estudios profesionales &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Coord. de la Carrera de Ing. en Sistemas 
<br>
<br>
<table class="csstabla" >


<tr>
	<td class="csstabla" style="background-color:#B3B6B7;">
		NOMBRE DEL PROYECTO:
	</td>
	<td class="csstabla" colspan="4">
		' . $nombre_proyecto . '
	</td>


</tr>
<tr>
	<td class="csstabla">
		OPCIÓN ELEGIDA:
	</td>
	<td class="csstabla" colspan="4">
		' . $opcion_elejida . '
	</td>


</tr>
<tr>
	<td class="csstabla">
		PERIODO PROYECTADO:
	</td>
	<td class="csstabla" colspan="1">
		' . $periodo . '
	</td>

    <td class="csstabla">
		NUMERO DE RESIDENTES:
	</td>
	<td class="csstabla" colspan="2">
		' . $noIntengrantes . '
	</td>

</tr>
</table>
<br>
<br>
';



$text .= '<table class="csstabla" >


<tr>
	<td class="csstabla">
		NOMBRE:
	</td>
	<td class="csstabla" colspan="5">
		' . $nombre_empresa . '
	</td>


</tr>

<tr>
	<td class="csstabla">
		Giro. Ramo : <br> o Sector::
	</td>
	<td class="csstabla" colspan="3">
		' . $giro . '
	</td>

	<td class="csstabla" width="10">
		RFC:
	</td>
	<td class="csstabla">
		' . $rfc . '
	</td>

</tr>

<tr>
	<td class="csstabla" width="40" >
		Domicilio:
	</td>
	<td class="csstabla" colspan="5" with>
		' . $domicilio . '
	</td>

</tr>

<tr>
	<td class="csstabla">
		Colonia:
	</td>
	<td class="csstabla">
		' . $colonia . '
	</td>
	<td class="csstabla f">
		C.P
	</td>
	<td class="csstabla">
		' . $cp . '
	</td>
	<td class="csstabla">
		Fax
	</td>
	<td class="csstabla">
		' . $fax . '
	</td>

</tr>

<tr>
	<td class="csstabla">
		Ciudad
	</td>
	<td class="csstabla" colspan="2">
	 ' . $ciudad . '
	</td>
	<td class="csstabla" colspan="2">
		Telefono
	</td>
	<td class="csstabla">
		' . $telefono . '
	</td>

</tr>


<tr>
	<td class="csstabla">
		Misión de la Empresa:
	</td>
	<td class="csstabla" colspan="5" >
		' . $mision . '
	</td>

</tr>


<tr>
	<td class="csstabla">
		Nombre del Titular de la empresa:
	</td>
	<td class="csstabla" colspan="3">
	' . $titular_empresa . '
	</td>
		<td class="csstabla" colspan="1">
		Puesto
	</td>
	<td class="csstabla">
		DIRECTOR
	</td>

</tr>

<tr>
	<td class="csstabla">
		Nombre del Asesor Externo:
	</td>
	<td class="csstabla" colspan="3">
		' . $Asesor . '
	</td>
	<td class="csstabla" colspan="1">
		Puesto
	</td>
	<td class="csstabla">
		DOCENTE
	</td>
</tr>

<tr>
	<td class="csstabla f" width="25"  HEIGHT="15">
		Nombre de la persona que firmará el acuerdo de trabajo Estudiante-Escuela-Empresa:
	</td>
	<td class="csstabla" colspan="3">
		' . $firma_acuerdo . '
	</td>
		<td class="csstabla" colspan="1">
		Puesto
	</td>
	<td class="csstabla">
		DIRECTOR
	</td>

</tr>



';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$dompdf->loadHtml($text);
#$dompdf->Image('img/encabezado.jpg', 1, 0,200,30);
$dompdf->setPaper('letter', 'portrait	');
$dompdf->render();
$dompdf->stream("codex", array("Attachment" => 0));
