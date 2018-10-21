<?php 
require("../userData/function.php");



$funciones = new Principal();
$arrayName = array('@PROYECTO' => $_POST['proyecto'], '@CVE_PROYECTO' =>   $_POST['clave'], '@PARAMETRO' => 'actual');
$result = $funciones->guardar("pXCAT_PROYECTO_G",$arrayName);

if ($result == true){
	$tabla = $funciones->tabla("alumnos","pCAT_PROYECTOS_B","CVE_PROYECTO,PROYECTO");

	echo $tabla;
} 
?>