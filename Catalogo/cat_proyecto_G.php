<?php 
require("../userData/function.php");



$funciones = new Principal();


if ($result == true){
	$tabla = $funciones->tabla("alumnos","pCAT_PROYECTOS_B","CVE_PROYECTO,PROYECTO");

	echo $tabla;
} 



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $funciones = new Principal();
    $id        = $_POST['proceso'];
    $proceso   = $funciones->desencriptar($id);

    switch ($proceso) {
        case "save":
      		$arrayName = array('@PROYECTO' => $_POST['proyecto'], '@CVE_PROYECTO' =>   $_POST['clave'], '@PARAMETRO' => 'actual');
            $result     = $funciones->guardar_devuelve_id("pXCAT_PROYECTO_G", $arrayName, "@PARAMETRO");
            echo $result;
            break;
        case "mostrar":
            $tabla = $funciones->tabla("alumnos","pCAT_PROYECTOS_B","CVE_PROYECTO,PROYECTO");;
            echo $tabla;
            break;
    }
}

?>




