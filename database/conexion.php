<?php 
/**
 *
 * Prueba de conexion a la BD
 *
 **/


require("class.config.php");
require("class.db.php");

$stmt1="execute pMENU_ACEESO_B";

$stmt1Prepared=sprintf($stmt1, "CURRENT_DATE");
$bd=DataBase::getInstance();
$result=$bd->ejecutar($stmt1);
if ($result) {
	while($fila = sqlsrv_fetch_array( $result, SQLSRV_FETCH_NUMERIC)){
		echo "Data: ".$fila[0];
	}

}
#$bd->cerrarConexion();
?> 
