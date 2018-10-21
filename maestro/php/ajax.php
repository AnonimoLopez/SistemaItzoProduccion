<?php
	
require("../../userData/function.php");
$function = new Principal();
	
  	if ($_SERVER['REQUEST_METHOD']=="POST") {
  		$id = $_POST['id'];
      print $id;
       ;
  		$proceso=$function->desencriptar($id);
      $id=$function->desencriptar($_POST['valor']);
  		switch ($proceso){
  			case "comboGrupo":
  				$arrayName = array('@CVE_ASIGNACION_GRADO_CARRERA' => $id, );
  				print $function->LlenarSelect2("pMATERIAS_CARRERAS_B","CVE_MATERIA", "MATERIA","id_materia", "Materia", $arrayName);
  				
  			break;
  		}	
  	}


	
?>