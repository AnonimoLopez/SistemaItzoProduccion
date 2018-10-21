<?php


require("../userData/function.php");

$Clave  	=	$_POST['Clave'];
$nombre 	=	$_POST['nombre'];
$paterno	=	$_POST['paterno'];
$materno	=	$_POST['materno'];
$email 		=	$_POST['email'];
$Celular     =	$_POST['celular'];	






$funciones = new Principal();
$arrayName = array('@Celular' => $Celular, '@Correo' => $email,  '@CVE_PERSONA' => $clave, '@MATERNO' => $materno, '@NOMBRE' => $nombre, '@PATERNO' => $paterno, '@PARAMETRO' => 'actual');
$result = $funciones->guardar("pCAT_ALUMNO_G",$arrayName);

if ($result == true){
	$tabla = $funciones->tabla("alumnos","pCAT_ALUMNOS_B","CVE_PERSONA,NOMBRE,PATERNO,MATERNO,Celular,Correo,MATRICULA");

	echo $tabla;
} 







?>