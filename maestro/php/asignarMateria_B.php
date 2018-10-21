<?php
require("../../userData/function.php");
class AsignarMaterias extends Principal{

}

$funciones = new Principal();

$comboGrupo = $funciones->LlenarSelect("pGruposAlumnos_B","CVE_ASIGNACION_ALUMNO_GRADO", "DESCRIPCION","id_grupo", "Grupo");


$comboMateria = $funciones->LlenarSelect("pMATERIAS_CARRERAS_B","CVE_MATERIA", "MATERIA","id_materia", "Materia");


$comboMaestro = $funciones->LlenarSelect("pCAT_MAESTRO_B","CVE_MAESTRO", "NOMBRECOMPLETO","id_maestro", "Maestro");


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
													<?php echo $comboMateria ?>	
												</div>
											    
												
											    <?php echo $comboMaestro ?>
											
										
					</div>

			</div>

		</div>
<button type="button" class="btn btn-success col-xs-12 col-sm-2">Registrar</button>
</form>


 </div>
 <div id='prueba'>
 </div>
</div>


<script type="text/javascript">
	$('select').on('change', function() {
  			if (this.id == "id_grupo"){
  				vData = {id:'<? echo $funciones->encriptar("comboGrupo"); ?>', valor: this.value ,}

  				Asyc('maestro/php/ajax.php',vData,'id_MateriaSelect')
  			}
	});

</script>
</body>
</html>
