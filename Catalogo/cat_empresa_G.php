<?php

require "../userData/function.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $funciones = new Principal();
    $id        = $_POST['proceso'];
    $proceso   = $funciones->desencriptar($id);

    switch ($proceso) {
        case "save":

            $Clave     = $_POST['Clave'];
            $nombre    = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $colonia   = $_POST['colonia'];
            $ciudad    = $_POST['ciudad'];
            $sector    = $_POST['sector'];
            $rfc       = $_POST['rfc'];
            $fax       = $_POST['fax'];
            $cp        = $_POST['cp'];
            $mision  = $_POST['mision'];
            $telefono = $_POST['telefono'];
            $telefono = $_POST['telefono'];
            $domicilio = $_POST['domicilio'];
            $arrayName = array('@CVE_EMPRESA' => $Clave, '@nombre' => $nombre, '@direccion' => $direccion, '@colonia' => $colonia, '@ciudad' => $ciudad, '@sector' => $sector, "@rfc" => $rfc, '@domicilio' => $domicilio, '@fax' => $fax, '@C_P' => $cp, '@mision' => $mision, '@TELEFONO' => $telefono ,'@PARAMETRO' => '1000');
            $result = $funciones->guardar_devuelve_id("pXCAT_EMPRESA_G", $arrayName, "@PARAMETRO");
            echo $result;
            
            break;
        case "mostrar":
            $tabla = $funciones->tabla("CAT_EMPRESA", "pCAT_EMPRESA_B", "CVE_EMPRESA,NOMBRE,DIRECCION,TELEFONO,Domicilio,Colonia,Ciudad,SECTOR,RFC,FAX,C_P,MISION");
            echo $tabla;
            break;

    }
}
