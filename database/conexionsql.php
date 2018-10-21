<?php
$serverName = "sql7004.site4now.net"; //serverName\instanceName
$connectionInfo = array( "Database"=>"DB_A40281_desarrolloCalif", "UID"=>"DB_A40281_desarrolloCalif_admin", "PWD"=>"joselopez156", "CharacterSet" => "UTF-8");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Conexión establecida.<br />";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>