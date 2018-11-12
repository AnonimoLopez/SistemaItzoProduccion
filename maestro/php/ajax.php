<?php

require "../../userData/function.php";
$function = new Principal();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
   # print $id;

    $proceso = $function->desencriptar($id);
    $id      = $function->desencriptar($_POST['valor']);
    switch ($proceso) {
        case "comboGrupo":
            $arrayName = array('@CVE_ASIGNACION_GRADO_CARRERA' => $id);
            print $function->LlenarSelect2("pMATERIAS_CARRERAS_B", "CVE_MATERIA", "MATERIA", "id_materia", "Materia", $arrayName);
            break;
        case "comboAsignarGrado":
            $arrayName = array('@CVE_ASIGNACION_GRADO' => $id);
            print $function->LlenarSelect2("pAsignacion_Alumno_Grupo", "CVE_ASIGNACION_ALUMNO_GRADO", "GRADO_GENERACION", "id_AsignacionAlumno", "GRUPO Y GENERACION",$arrayName);
            break;
    }
}
