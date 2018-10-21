<?php
require('lib/html2pdf.php');
require_once 'lib\dompdf/autoload.inc.php';
require("../userData/function.php");
$funciones = new Principal();





$text.='<img src="img/encabezado_reporte.jpg" width="1000" height="80"/>';
$text.="<br><br><br>";









$text.="
<style>
.csstabla, .th2, .td3 {
    border: 0.01px solid black;
font-size: 10px;
 text-align : center;

}


.cssfirma{
	text-align: center;
	text-transform: uppercase;

}


.cssleft{
	text-align:center;
}

a {
	text-align:center;
}
</style>


<strong>
<center>INSTITUTO TECNOLÓGICO DE LA ZONA OLMECA </center>
<center>DEPARTAMENTO DE ESTADIAS PROFESINALES </center>
<center>DICTAMEN DE ANTEPROYECTOS DE RESIDENCIAS PROFESIONALES</center>
</strong>";
$text.= "<br><br><br>
Por este conducto informo a usted que ha sido asignado para fungir como Asesor Interno del Proyecto de Residencias Profesionales que a continuación se describe:
";


$text.=$funciones->tabla_view("Calificaciones_","pCALIFICACIONES_ALTA_B","NO. CONTROL,ALUMNO,PROYECTO,EMPRESA,MAESTRO,CARRERA,GRUPO,RESPONSABLE");

$text.='
<a class="cssleft" >
En caso que uno o mas Anteproyectos sean rechazados se elaborara otro registro unicamente con los anteproyectos redictaminados
</a><br><br>'
;

$text.=$funciones->tabla_view("Calificaciones_","pFIRMAS_B","PRESIDENTE_ACADEMIA,JEFATURA_ACEDEMIA,SUB_DIRECCION",'cssfirma',false);



use Dompdf\Dompdf;

$dompdf = new Dompdf();

$dompdf->loadHtml($text);
#$dompdf->Image('img/encabezado.jpg', 1, 0,200,30);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("codex",array("Attachment"=>0));
?>
