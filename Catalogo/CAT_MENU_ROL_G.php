<?php
#echo $_POST['ids'];
require "../userData/function.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $funciones = new Principal();
    $ids       = split('@', $_POST['ids']);
    $rol = $funciones->desencriptar($_POST['srol']);
    $arrayName = array('@CVE_ROL' => $rol);
    $result = $funciones->guardar("pMENU_ROL_E", $arrayName);
    foreach ($ids as $key => $value) {
        if ($value != "") {
            $id        = $funciones->desencriptar($value);
            $arrayName = array('@CVE_MENU' => $id,'@CVE_ROL' => $rol);
            $result    = $funciones->guardar("pMenuRol_G", $arrayName);
        }

    }
}
