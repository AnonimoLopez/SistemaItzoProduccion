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
            $matricula        = $_POST['matricula'];
            $Celular          = $_POST['celular'];
            $CVE_GRUPO_ALUMNO = $_POST['GrupoAlumno'];
            $CVE_GRUPO_ALUMNO = $funciones->desencriptar($CVE_GRUPO_ALUMNO);

            $arrayName = array('@Celular' => $Celular, '@Correo' => $email, '@CVE_PERSONA' => $clave, '@MATERNO' => $materno, '@NOMBRE' => $nombre, '@PATERNO' => $paterno, '@PARAMETRO' => '1000');

            $result = $funciones->guardar_devuelve_id("pCAT_ALUMNO_G", $arrayName, "@PARAMETRO");


              $arrayName = array( '@CVE_PERSONA' => $result,'@matricula' => $matricula, '@CVE_GRUPO_ALUMNO' => $CVE_GRUPO_ALUMNO,'@PARAMETRO' => '1000');

            $result2 = $funciones->guardar_devuelve_id("pCAT_ALUMNO_2_G", $arrayName, "@PARAMETRO");


            echo $result;
            break;
        case "mostrar":
            $Clave = $_POST['extra'];
            $Clave = $funciones->desencriptar($Clave);
            if (is_numeric($Clave)) {
            	   $arrayName = array('@FK_ASIGNACION_ALUMNO_GRADO' => $Clave);
                $tabla = $funciones->tabla("alumnos", "pALUMNO_CARRERA_B", "CVE_PERSONA,NOMBRE,PATERNO,MATERNO,Celular,Correo,MATRICULA", $arrayName);
                echo $tabla;
            } else {
                echo "";
            }


            break;
        case "ESPECIALIDAD":
            $Clave = $funciones->desencriptar($_POST['id']);
            if (is_numeric($Clave)) {
                $parametros        = array("@CVE_CARRERA" => $Clave);
                $comboespecialidad = $funciones->LlenarSelect2("pASIGNACION_ALUMNO_GRUPO_ESPECIALIDAD_B", "CVE_CARRERA_ESPECIALIDAD", "DESCRIPCION_ESPECIALIDAD", "ID_ESPECIALIDAD", "ESPECIALIDAD", $parametros);
                echo $comboespecialidad;
            } else {
                echo "";
            }

            break;

        case "GRADO_GRUPO_G":
            $Clave = $funciones->desencriptar($_POST['id']);
            if (is_numeric($Clave)) {
            	$parametros        = array("@CVE_ESPECIALIDAD" => $Clave);
                $comoboGrado_Grupo = $funciones->LlenarSelect2("pASIGNACION_ALUMNO_GRUPO2_B", "CVE_ASIGNACION_ALUMNO_GRADO", "GRADO_GRUPO_G", "ID_GRADO_GRUPO", "GRADO GRUPO Y GENERACION", $parametros);
                echo $comoboGrado_Grupo;
            } else {
                echo "";
            }

            break;

    }
}
