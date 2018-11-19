<?php
require "../userData/function.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $funciones = new Principal();
    $id        = $_POST['proceso'];
    $proceso   = $funciones->desencriptar($id);

    switch ($proceso) {
        case "save":
            $id = addslashes($_POST['id']);
            $cargo    = $funciones->desencriptar($_POST['cargo']);
            $empresa    = $funciones->desencriptar($_POST['empresa']);
            $responsable   = addslashes($_POST['responsable']);
            $arrayName  = array('@responsable' => $responsable, "@CVE_EMPRESA_RESPONSABLE" => $id, '@FK_CARGOS' => $cargo,'@FK_EMPRESA' => $empresa, '@PARAMETRO' => '10000');

            $result     = $funciones->guardar_devuelve_id("pXCAT_RESPONSABLES_G", $arrayName, "@PARAMETRO");
            echo $result;
            break;
        case "mostrar":
            $empresa    = $funciones->desencriptar($_POST['extra']);
            $arrayName = array('@CVE_EMPRESA' =>  $empresa);
            $tabla = $funciones->tabla("CAT_RESPONSABLE", "pCAT_RESPONSABLES_EMPRESA_B", "ID,RESPONSABLE,DESCRIPCION", $arrayName);
            echo $tabla;
            break;
    }
}
