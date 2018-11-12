<?php
require "../userData/function.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $funciones = new Principal();
    $id        = $_POST['proceso'];
    $proceso   = $funciones->desencriptar($id);

    switch ($proceso) {
        case "save":
            $FK_CARRERA               = $funciones->desencriptar($_POST['fk_carrera']);
            $CVE_CARRERA_ESPECIALIDAD = addslashes($_POST['id']);
            $DESCRIPCION_ESPECIALIDAD = addslashes($_POST['especialidad']);
            $arrayName                = array('@CVE_CARRERA_ESPECIALIDAD' => $CVE_CARRERA_ESPECIALIDAD, "@DESCRIPCION_ESPECIALIDAD" => $DESCRIPCION_ESPECIALIDAD . "", '@FK_CARRERA' => $FK_CARRERA, '@PARAMETRO' => '1000');
            $result                   = $funciones->guardar_devuelve_id("pXCARRERA_ESPECIALIDAD_G", $arrayName, "@PARAMETRO");
            echo $result;
            break;
        case "mostrar":
            $id_carrera = $funciones->desencriptar($_POST['id_carrera']);
            if (is_numeric($id_carrera)) {
                $parametros = array("@CVE_CARRERA" => $id_carrera);
                $tabla      = $funciones->tabla("CARRERA_ESPECIALIDAD", "pCARRERA_ESPECIALIDAD", "CVE_CARRERA_ESPECIALIDAD,DESCRIPCION_ESPECIALIDAD", $parametros);
                echo $tabla;
            } else {
                echo "";
            }

            break;
        case "extra":
            $id_carrera = $funciones->desencriptar($_POST['extra']);
            if (is_numeric($id_carrera)) {
                $parametros = array("@CVE_CARRERA" => $id_carrera);
                $tabla      = $funciones->tabla("CARRERA_ESPECIALIDAD", "pCARRERA_ESPECIALIDAD", "CVE_CARRERA_ESPECIALIDAD,DESCRIPCION_ESPECIALIDAD", $parametros);
                echo $tabla;
            } else {
                echo "";
            }
    }
}
