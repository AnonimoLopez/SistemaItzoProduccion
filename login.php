<?php 
require("database/class.config.php"); 
require("database/class.db.php");


$user = $_POST['user'];
$pass = $_POST['pass'];



$stmt1="execute pLogin @user='".$user."', @password='".$pass."'";

$stmt1Prepared=sprintf($stmt1, "CURRENT_DATE");
$bd=DataBase::getInstance();
$result=$bd->ejecutar($stmt1);
if ($result) {
	while($fila = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC)){
		session_start();
		$_SESSION["id"] = $fila["CVE_USUARIO"];
		$_SESSION["user"] = $fila["USUARIO"];
		header("Location: menu_2.php");
		die();
	}

}
header("Location: index.html");
die();

?>