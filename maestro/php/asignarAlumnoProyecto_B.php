<?php
require "../../userData/function.php";


$funciones = new Principal();
$combocarrera   = $funciones->LlenarSelect("pASIGNACION_ALUMNO_GRUPO_CARRERA_B", "CVE_CARRERA", "CARRERA", "ID_CARRERA", "CARRERA");

$comboAlumno = $funciones->LlenarSelect("pASIGNACION_ALUMNO", "CVE_ASIGNACION_ALUMNO", "ALUMNO", "id_alumno", "Alumno");

$comboEmpresa = $funciones->LlenarSelect("pCAT_EMPRESA_B", "CVE_EMPRESA", "NOMBRE", "ID_EMPRESA", "Empresa");

$comboMaestro = $funciones->LlenarSelect("pCAT_MAESTRO_B", "CVE_MAESTRO", "NOMBRECOMPLETO", "id_maestro", "Maestro");

//$tabla         = $funciones->tabla("alumnos", "pCAT_PROYECTOS_B", "CVE_PROYECTO,PROYECTO");
$comboproyecto = $funciones->LlenarSelect("pCAT_PROYECTOS_B", "CVE_PROYECTO", "PROYECTO", "id_proyecto", "Proyecto");

 //$tabla = $funciones->tabla("Calificaciones_", "pCALIFICACIONES_ALTA_B", "MAESTRO,ALUMNO,CARRERA,GRUPO,PROYECTO,RESPONSABLE");
         
?>


 
  
  <div class="panel panel-primary">
 <div class="panel-heading">



    <h3 class="panel-title" align='center'>SOLICITUD DE RESIDENCIA</h3>
  </div>
  <div class="panel-body" >


<form>

  <div class="panel-body" >


			<div class="main-content">
				<div class="main-content-inner">
				  <div class="col-xs-12 col-sm-12 col--4 " >

            <ul  class="nav nav-pills">
      <li class="active">
        <a  href="#1b" data-toggle="tab">SOLICITUD DE ESTADIA PROFESIONAL</a>
      </li>
      <li><a href="#2b" data-toggle="tab">REPORTES ENTREGADO</a>
      
      
      </li>
</ul>


 <div class="tab-content clearfix">
  <div class="tab-pane active" id="1b">
                <label for="form-field-mask-2">
                       NO CONTROL
                        </label>
                        <div class="input-group col-sm-12">
                            <span class="input-group-addon" id="sizing-addon2">
                                <a class="glyphicon glyphicon-user">
                                </a>
                            </span>
                            <input aria-describedby="basic-addon1" class="form-control col-xs-12" disabled="disabled" id="clave" placeholder="Auto Generado" type="text">
                            </input>
                        </div>


         <?php echo $combocarrera ?>

 <div id='div_especialidad'>
          
        </div>

          <div id='div_grado_grupo'>
          </div>
           

           <div id='div_id_alumno'>
           
           </div>

                      <div id='id_MateriaSelect'>
                          <?php echo $comboEmpresa ?>
                        </div>

                        <div id='divAsesor'>
                        </div>



                          <?php echo $comboMaestro ?>
                          <?php echo $comboproyecto ?>


</div>
 <div class="tab-pane" id="2b">
<input type="checkbox" name="vehicle1" value="Bike">REPORTE 1<br>
      <input type="checkbox" name="vehicle2" value="Car">REPORTE 2<br>
      <input type="checkbox" name="vehicle2" value="Car">REPORTE 3<br>
      <input type="checkbox" name="vehicle2" value="Car">REPORTE 4<br>
    </div>

</div>    

<input type="checkbox" name="vehicle2" value="Car">Termino COrrectamente la estadía profesional<br>
   
</div>
    
</div>


<button class="btn btn-lg btn-info" id="nuevo" type="submit">
    <i class="glyphicon glyphicon-ok-sign">
    </i>
    Nuevo
</button>
                        
 <button class="btn btn-lg btn-success" id="guardar" type="submit">
    <i class="glyphicon glyphicon-ok-sign">
    </i>
    Guardar
</button>

</div>
  
</div>

<div id='id_result' style="overflow: scroll;">
 
</div>


 </div>
 <div id='prueba'>
 </div>


</div>





<script type="text/javascript">


$(document).ready(function() {





});

function actualizar(){
    vData  = {'proceso' : '<?echo $funciones->encriptar("mostrar"); ?>'}
   Asyc('maestro/php/asignarAlumnoProyecto_G.php',vData,'id_result');
}
actualizar();



function onChangeV(id,value){ 

  //alert('queso');
  if (id == "ID_CARRERA"){

     vData  = {'proceso' : '<?echo $funciones->encriptar("ESPECIALIDAD"); ?>', 'id' : value}
     Asyc('maestro/php/asignarAlumnoProyecto_G.php',vData,'div_especialidad');

  }

   if (id=='ID_ESPECIALIDAD'){
    vData  = {'proceso' : '<?echo $funciones->encriptar("GRADO_GRUPO_G"); ?>', 'id' : value}
     Asyc('maestro/php/asignarAlumnoProyecto_G.php',vData,'div_grado_grupo');
   }

   if (id=='ID_GRADO_GRUPO'){
    vData  = {'proceso' : '<?echo $funciones->encriptar("Alumno"); ?>', 'id' : value}
     Asyc('maestro/php/asignarAlumnoProyecto_G.php',vData,'div_id_alumno');
   }


  if (id=='ID_EMPRESA'){
    vData  = {'proceso' : '<?echo $funciones->encriptar("comboAsesor"); ?>', 'id' : value}
     Asyc('maestro/php/asignarAlumnoProyecto_G.php',vData,'divAsesor');
   }
}


 function jclick() { 
  $("i").click(function() {
           alert('reta');
     if (this.id == 'imprimir'){
        alert('popop');
            id=$(this).parents("tr").find("td")[0].innerHTML
            window.open('reportes/Solicitud_Residencia_Profeccionales.php?id=' + id,'Reporte','location=no,menubar=no,status=no,toolbar=no');
            e.preventDefault();   
      return false;
        }
  });
}

$("i").click(function() {
           alert  
     if (this.id == 'imprimir'){
        alert('popop');
            id=$(this).parents("tr").find("td")[0].innerHTML
            window.open('reportes/Solicitud_Residencia_Profeccionales.php?id=' + id,'Reporte','location=no,menubar=no,status=no,toolbar=no');
            e.preventDefault();   
      return false;
        }
  });

$("button").click(function() {

  if (this.id == "guardar"){

        var id_alumno =  document.getElementById('ID_ALUMNO').value
        var id_empresa =  document.getElementById('ID_ASESOR').value
        var id_maestro =  document.getElementById('id_maestro').value
        var id_proyecto =  document.getElementById('id_proyecto').value
         id = document.getElementById('clave').value;
        vData = {'proceso' : '<?echo $funciones->encriptar("save"); ?>','alumno':id_alumno,'empresa':id_empresa,'proyecto':id_proyecto,'maestro':id_maestro,'id':id}
        key = '<?echo $funciones->encriptar("mostrar"); ?>';
         resultado=save_r('maestro/php/asignarAlumnoProyecto_G.php',vData,'clave',key,'id_result')
      }
  
 return false; 
});



</script>
</form>
</div>
</div>