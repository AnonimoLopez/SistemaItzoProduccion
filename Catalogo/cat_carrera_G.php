<?php
require "../userData/function.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $funciones = new Principal();
    $id        = $_POST['proceso'];
    $proceso   = $funciones->desencriptar($id);

    switch ($proceso) {
        case "save":
            $id_carrera = addslashes($_POST['id']);
            $carrera    = addslashes($_POST['carrera']);
            $arrayName  = array('@CARRERA' => $carrera, "@CVE_CARRERA" => $id_carrera."", '@ACTIVO' => '1', '@PARAMETRO' => '10000');
            $result     = $funciones->guardar_devuelve_id("pXCAT_CARRERA_G", $arrayName, "@PARAMETRO");
            echo $result;
            break;
        case "mostrar":
            $tabla = $funciones->tabla("CAT_CARRERA", "pCAT_CARRERA_B", "CVE_CARRERA,CARRERA,ACTIVO");
            echo $tabla;
            break;
    }
}
