<?php
#require('fpdf.php');
require('html2pdf.php');
$text.="<br><br><br><br><br><br>";
$text.= "Villa Ocuiltzapotlán, Centro, Tabasco 16/Enero/2016 <br>";
$text.= "<strong>                                                                     MEMORADUM No.  <u>ITZO/ D.I./001/2016</u></strong>";
$text.= "<br><br><br>";
$text.= "<strong>M. C.  GASPAR MANUEL PINZÓN ALMEIDA<br>DOCENTE INSTITUTO TECNOLÓGICO DE LA ZONA OLMECA<br>PRESENTE.<br></strong><br>";
$text.= "<dl><dt>  Por este medio le hago el recordatorio de los pendientes que al momento tiene sobre la Gestión del curso del semestre Agosto – Diciembre del 2015. <dt>";
$text.= "<br><br>";
$text.= "<dd><ul>";
$text.= "<li type='disc'>	•	Seguimientos de las calificaciones parciales 1º, 2º, y 3er (electrónico e impreso)</li><br>";
$text.= "<li type='disc'>	• 	Reporte de proyectos individuales (electrónico e impreso)</li><br>";
$text.= "<li type='disc'>	• 	Plan de trabajo de oficina agrícola</li><br>";
$text.= "<li type='disc'>	• 	Planeación de materias</li><br>";
$text.= "<li type='disc'>	• 	Instrumentaciones didácticas</li><br>";
$text.= "</ul><dd><dl><br>";
$text.= "        Por lo cual lo exhorto para que cumpla inmediatamente, con sus obligaciones docentes a más tardar el día 11 de enero de 2016 <br>";
$text.= "        Seguro de que tomará en cuenta este recordatorio, sin más por el momento me despido enviándole un cordial saludo, quedo de usted. <br><br><br><br>";
$text.= "A T E N T A M E N T E <br> “Plataforma para el Desarrollo Tecnológico”<br><br><br><br>";
$text.= "<strong>ING. ISMAEL VALENCIA HERNÁNDEZ <br>JEFE DEL DEPARTAMENTO DE INGENIERÍAS <br></strong><br><br>";
$text.= "C.p. Expediente<br><br><br><br>";
$text.= 'Villa Ocuiltzapotlán, Centro, Tabasco <strong>'.date("d/F/Y").' <strong>';
$text.= "";
$text.= "";
$text=iconv('UTF-8', 'windows-1252', $text);
$pdf=new PDF_HTML();
$pdf->AddPage();
$pdf->SetFont('Arial','',13);
$pdf->Image('encabezado.jpg', 1, 0,200,30);
$pdf->WriteHTML($text);
$pdf->Image('piezdepagina.jpg', 6, 280,200,10);
$pdf->Output();

?>
