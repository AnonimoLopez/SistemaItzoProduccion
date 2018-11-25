<?php

require "../userData/function.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $funciones = new Principal();
    $id        = $_POST['proceso'];
    $proceso   = $funciones->desencriptar($id);

    switch ($proceso) {
        case "save":
            $clave            = $_POST['Clave'];
            $nombre           = $_POST['nombre'];
            $paterno          = $_POST['paterno'];
            $materno          = $_POST['materno'];
            $email            = $_POST['email'];
            $Celular          = $_POST['celular'];
    

            $arrayName = array('@Celular' => $Celular, '@Correo' => $email, '@CVE_PERSONA' => $clave, '@MATERNO' => $materno, '@NOMBRE' => $nombre, '@PATERNO' => $paterno, '@PARAMETRO' => '1000');

            $result = $funciones->guardar_devuelve_id("pXCAT_PERSONA_G", $arrayName, "@PARAMETRO");

            $arrayName = array('@CVE_MAESTRO' => $result,'@PARAMETRO' => '1000');   

            $result2 = $funciones->guardar_devuelve_id("pXcat_maestro_G", $arrayName, "@PARAMETRO");

            echo $result;
            break;
        case "mostrar":

            $tabla = $funciones->tabla("alumnos", "pCAT_MAESTRO_B2", "CVE_PERSONA,NOMBRE,PATERNO,MATERNO,Celular,Correo");
            echo $tabla;

            break;

    }
}
