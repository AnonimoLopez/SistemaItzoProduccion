<?php


require("../userData/function.php");

$Clave  	=	$_POST['Clave'];
$nombre 	=	$_POST['nombre'];
$paterno	=	$_POST['paterno'];
$materno	=	$_POST['materno'];
$email 		=	$_POST['email'];
$Celular     =	$_POST['celular'];	
$CVE_GRUPO_ALUMNO = $_POST['GrupoAlumno'];




$funciones = new Principal();

$CVE_GRUPO_ALUMNO = $funciones->desencriptar($CVE_GRUPO_ALUMNO);
$arrayName = array('@Celular' => $Celular, '@Correo' => $email,  '@CVE_PERSONA' => $clave, '@MATERNO' => $materno, '@NOMBRE' => $nombre, '@PATERNO' => $paterno, '@PARAMETRO' => 'actual', '@CVE_GRUPO_ALUMNO' => $CVE_GRUPO_ALUMNO);
$result = $funciones->guardar("pCAT_ALUMNO_G",$arrayName);


#echo $result;
if ($result == true){

	$tabla = $funciones->tabla("alumnos","pCAT_ALUMNOS_B","CVE_PERSONA,NOMBRE,PATERNO,MATERNO,Celular,Correo,MATRICULA");
	echo $tabla;
} 



?>