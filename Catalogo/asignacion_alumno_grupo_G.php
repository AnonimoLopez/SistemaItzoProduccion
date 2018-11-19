<?php
require "../userData/function.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $funciones = new Principal();
    $id        = $_POST['proceso'];
    $proceso   = $funciones->desencriptar($id);

    switch ($proceso) {
        case "save":
            $FK_GRUPO            = $funciones->desencriptar($_POST['grupo']);
            $FK_GENERACION       = $funciones->desencriptar($_POST['generacion']);
            $FECHA               = $_POST['fecha'];
            $FK_ASIGNACION_GRUPO = $funciones->desencriptar($_POST['asg']);
            $id                  = $_POST['id'];

            list($FECHA1, $FECHA2) = split('\-', $FECHA);
            $arrayName = array('@CVE_ASIGNACION_ALUMNO_GRADO' => $id, "@FK_ASIGNACION_GRADO_CARRERA" => $FK_ASIGNACION_GRUPO . "", '@FK_GENERACION' => $FK_GENERACION, '@FK_GRUPO' => $FK_GRUPO, '@FECHA_INICIO' => trim($FECHA1), '@FECHA_FINAL' => trim($FECHA2), '@PARAMETRO' => '1000');
            $result    = $funciones->guardar_devuelve_id("pXASIGNACION_ALUMNO_GRUPO_G", $arrayName, "@PARAMETRO");
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
            $tabla = $funciones->tabla_view("CARRERA_ESPECIALIDAD", "pASIGNACION_ALUMNO_GRUPO_B", "ID,CARRERA,DESCRIPCION_ESPECIALIDAD,GRADO,GRUPO,GENERACION,FECHA INICIO,FECHA FINAL");
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
