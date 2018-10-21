<?php 


require("../../userData/function.php");

$id_alumno = $_POST['alumno'];
$id_empresa = $_POST['empresa'];
$id_maestro = $_POST['maestro'];
$id_proyecto = $_POST['proyecto'];




$funciones = new Principal();


$id_alumno =$funciones->desencriptar($id_alumno);
$id_empresa = $funciones->desencriptar($id_empresa);
$id_maestro = $funciones->desencriptar($id_maestro);
$id_proyecto = $funciones->desencriptar($id_proyecto);








$arrayName = array('@FK_ASIGNACION_ALUMNO' => $id_alumno, '@FK_EMPRESA' =>   $id_empresa,'@FK_MAESTRO' =>   $id_maestro,'@FK_PROYECTO' =>   $id_proyecto, '@PARAMETRO' => 'actual');
$result = $funciones->guardar("pXCALIFICACIONES_ESTADIA_G",$arrayName);




if ($result == true){
$tabla = $funciones->tabla("Calificaciones_","pCALIFICACIONES_ALTA_B","MAESTRO,ALUMNO,CARRERA,GRUPO,PROYECTO,RESPONSABLE");

	echo $tabla;
} 
?>