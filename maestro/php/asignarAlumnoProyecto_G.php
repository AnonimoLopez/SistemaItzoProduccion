<?php

require "../../userData/function.php";

$funciones = new Principal();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $funciones = new Principal();
    $id        = $_POST['proceso'];
    $proceso   = $funciones->desencriptar($id);

    switch ($proceso) {
        case "save":
            $id_alumno   = $_POST['alumno'];
            $id_empresa  = $_POST['empresa'];
            $id_maestro  = $_POST['maestro'];
            $id_proyecto = $_POST['proyecto'];
            $id = $_POST['id'];
            $id_alumno   = $funciones->desencriptar($id_alumno);
            $id_empresa  = $funciones->desencriptar($id_empresa);
            $id_maestro  = $funciones->desencriptar($id_maestro);
            $id_proyecto = $funciones->desencriptar($id_proyecto);

            $arrayName = array('@CVE_CALIFICACION_ESTADIA' => $id, '@FK_ASIGNACION_ALUMNO' => $id_alumno, '@FK_EMPRESA' => $id_empresa, '@FK_MAESTRO' => $id_maestro, '@FK_PROYECTO' => $id_proyecto, '@PARAMETRO' => '1000');
            $result    = $funciones->guardar_devuelve_id("pXCALIFICACIONES_ESTADIA_G", $arrayName,"@PARAMETRO");
            echo $result;
            break;
        case "mostrar":
              $tabla     = $funciones->tabla_view("alumnos", "pCALIFICACIONES_ESTADIA_B", "CVE_CALIFICACION_ESTADIA,CVE_PROYECTO,PROYECTO,CVE_MAESTRO,MAESTRO,CVE_GRADO,GRADO,CVE_GRUPO,GRUPO,CVE_CARRERA,CARRERA,CVE_CARRERA_ESPECIALIDAD,ESPECIALIDAD,CVE_ALUMNO,ALUMNO,CVE_EMPRESA,NOMBRE,DIRECCION,TELEFONO,Domicilio,Colonia,Ciudad,SECTOR,RFC,FAX,C_P,MISION,RESPONSABLE,FECHA_INICIO,FECHA_FINAL", 'csstabla', true,true);
              
              echo $tabla;
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
        case "Alumno":
            $Clave = $funciones->desencriptar($_POST['id']);
            if (is_numeric($Clave)) {
                $parametros        = array("@FK_ASIGNACION_ALUMNO_GRADO" => $Clave);
                $comoboGrado_Grupo = $funciones->LlenarSelect2("pALUMNO_GRADO_CARRERA_B", "CVE_ASIGNACION_ALUMNO", "ALUMNO", "ID_ALUMNO", "ALUMNO", $parametros);
                echo $comoboGrado_Grupo;
            } else {
                echo "";
            }

            break;
        case "comboAsesor":
            $Clave = $funciones->desencriptar($_POST['id']);
            if (is_numeric($Clave)) {
                $parametros        = array("@CVE_EMPRESA" => $Clave);
                $comoboGrado_Grupo = $funciones->LlenarSelect2("pCAT_RESPONSABLES_EMPRESA_B", "CVE_EMPRESA_RESPONSABLE", "RES_CARG", "ID_ASESOR", "ASESOR EXTERNO", $parametros);
                echo $comoboGrado_Grupo;
            } else {
                echo "";
            }
            break;
        case "registros":
            echo "Hola";
        break;

    }
}
