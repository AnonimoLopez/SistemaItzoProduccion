<?php 
require("../userData/function.php");

$funciones = new Principal();
$arrayName = array('@CARRERA' => 'actual', '@ACTIVO' => '1',  '@PARAMETRO' => 'actual');
$result = $funciones->guardar("pXCAT_CARRERA_G",$arrayName);

if ($result == true){
	$tabla = $funciones->tabla("CAT_CARRERA","pCAT_CARRERA_B","CVE_CARRERA,CARRERA,ACTIVO");

	echo $tabla;
} 
?>