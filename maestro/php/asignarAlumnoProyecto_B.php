<?php
require "../../userData/function.php";
class AsignarMaterias extends Principal
{

}

$funciones = new Principal();

$comboGrupo = $funciones->LlenarSelect("pASIGNACION_ALUMNO", "CVE_ASIGNACION_ALUMNO", "ALUMNO", "id_alumno", "Alumno");

$comboEmpresa = $funciones->LlenarSelect("pCAT_EMPRESA_B", "CVE_EMPRESA", "NOMBRE", "id_empresa", "Empresa");

$comboMaestro = $funciones->LlenarSelect("pCAT_MAESTRO_B", "CVE_MAESTRO", "NOMBRECOMPLETO", "id_maestro", "Maestro");

$tabla         = $funciones->tabla("alumnos", "pCAT_PROYECTOS_B", "CVE_PROYECTO,PROYECTO");
$comboproyecto = $funciones->LlenarSelect("pCAT_PROYECTOS_B", "CVE_PROYECTO", "PROYECTO", "id_proyecto", "Proyecto");

$tabla = $funciones->tabla_view("Calificaciones_", "pCALIFICACIONES_ALTA_B", "NO. CONTROL,MAESTRO,ALUMNO,CARRERA,GRUPO,PROYECTO,RESPONSABLE", "", true, true)
?>


<!DOCTYPE html>
<html lang="en">

	<body class="no-skin">


		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title" align='center'>ASIGNAR MAESTRO A MATERIA</h3>
  </div>
  <div class="panel-body" >
		<form>

			<div class="main-content">
				<div class="main-content-inner">
				  <div class="col-xs-12 col-sm-6 col--4 " >


												<?php echo $comboGrupo ?>

												<div id='id_MateriaSelect'>
													<?php echo $comboEmpresa ?>
												</div>


											    <?php echo $comboMaestro ?>
											    <?php echo $comboproyecto ?>


					</div>

			</div>

		</div>

<button type="button" class="btn btn-success col-xs-12 col-sm-2"  type="submit"> Registrar</button>

</form>
</div>

<div id='id_result'>
  <?php echo $tabla ?>
</div>


 </div>
 <div id='prueba'>
 </div>
</div>


<script type="text/javascript">

	 $("button").click(function() {
        var id_alumno =  document.getElementById('id_alumno').value
          var id_empresa =  document.getElementById('id_empresa').value
            var id_maestro =  document.getElementById('id_maestro').value
              var id_proyecto =  document.getElementById('id_proyecto').value
            vData = {'alumno':id_alumno,'empresa':id_empresa,'proyecto':id_proyecto,'maestro':id_maestro,}


            Asyc('maestro/php/asignarAlumnoProyecto_G.php',vData,'id_result')
             //$('#usertable').dataTable();
             //toastr['info']('Se registro Correctamente el Registro')
            return false;
        });

	    
	    $("i").click(function() {

        if (this.id == 'imprimir'){
            id=$(this).parents("tr").find("td")[0].innerHTML
            window.open('reportes/Solicitud_Residencia_Profeccionales.php?id=' + id,'Reporte','location=no,menubar=no,status=no,toolbar=no');
          	e.preventDefault(); 	
			return false;
        }
        });

</script>
</body>
</html>
