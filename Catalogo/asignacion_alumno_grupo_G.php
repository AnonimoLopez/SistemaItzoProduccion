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
        case "mostrarCarrera":
            $id_carrera = $funciones->desencriptar($_POST['id_grado']);
            if (is_numeric($id_carrera)) {
                $parametros = array("@CVE_ASIGNACION_GRADO_CARRERA" => $id_carrera);
                $tabla      = $funciones->tabla_view("CARRERA_ESPECIALIDAD", "pASIGNACION_MATERIAS_CARRERA_B", "MATERIA", 'csstabla', true, false, $parametros);
                echo $tabla;
            } else {
                echo "";
            }

            break;
        case "mostrarAlumnoGrupo":
            //  $id_carrera = $funciones->desencriptar($_POST['id_grado']);
            //  $parametros = array("@CVE_ASIGNACION_GRADO_CARRERA" => $id_carrera);
            $tabla = $funciones->tabla_view("CARRERA_ESPECIALIDAD", "pASIGNACION_ALUMNO_GRUPO_B", "CARRERA,ESPECIALIDAD,GRADO,GRUPO,GENERACION");
            echo $tabla;
            break;

        case "comboEspecialidad":
            $id_carrera = $funciones->desencriptar($_POST['id_carrera']);
            $parametros = array("@CVE_CARRERA" => $id_carrera);
            if (is_numeric($id_carrera)) {
                $comboEspecialidad = $funciones->LlenarSelect2("pCAT_ASIGNACION_GC_ESPECIALIDAD_B", "CVE_CARRERA_ESPECIALIDAD", "DESCRIPCION_ESPECIALIDAD", "ID_ESPECIALIDAD", "Especialidad", $parametros);
                echo $comboEspecialidad;
            } else {
                echo "";
            }

            break;
        case "comboGrado":
            $id_carrera = $funciones->desencriptar($_POST['id_carrera']);
            $parametros = array("@CVE_ASIGNACION_GRADO" => $id_carrera);
            if (is_numeric($id_carrera)) {
                $comboEspecialidad = $funciones->LlenarSelect2("pCAT_ASIGNACION_GC_GRADO_B", "CVE_ASIGNACION_GRADO_CARRERA", "GRADO", "id_grado", "GRADO", $parametros);
                echo $comboEspecialidad;
            } else {
                echo "";
            }

            break;

    }
}
