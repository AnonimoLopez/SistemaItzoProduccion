<?php
#require('fpdf.php');
require('lib/html2pdf.php');
require_once 'lib\dompdf/autoload.inc.php';

$text.='<img src="img/encabezado.jpg" width="1000" height="80"/>';
$text.="<br><br><br><br><br><br>";
$text.= "<br><br><br>
<span style='font-weight: bold; font-size: 70pt; color: #FF0000; font-family: Times'>Hello there! I am red!<br></span>
<br>


";
$text.= "<strong>INSTITUTO TECNOLÓGICO DE LA ZONA OLMECA</strong><footer>
<img src='img/encabezado.jpg' width='1000' height='80'/>'
</footer>";




use Dompdf\Dompdf;

$dompdf = new Dompdf();

$dompdf->loadHtml($text);
#$dompdf->Image('img/encabezado.jpg', 1, 0,200,30);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("codex",array("Attachment"=>0));
?>

?>
