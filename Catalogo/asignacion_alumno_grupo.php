<?php
require "../userData/function.php";
$funciones = new Principal();
$comboCarrera = $funciones->LlenarSelect("pCAT_ASIGNACION_GC_CARRERA_B", "CVE_CARRERA", "CARRERA", "id_carrera", "CARRERA");


$comboGrupo = $funciones->LlenarSelect("pCAT_GRUPO_B", "CVE_GRUPO", "GRUPO", "ID_GRUPO", "GRUPO");
$comboGeneracion = $funciones->LlenarSelect("pCAT_GENERACION_B", "CVE_GENERACION", "NO_ROMANO", "ID_GENERACION", "GENERACION");

//$comboEspecialidad = $funciones->LlenarSelect("pCAT_ASIGNACION_GC_ESPECIALIDAD_B", "CVE_CARRERA_ESPECIALIDAD", "DESCRIPCION_ESPECIALIDAD", "id_especialidad", "Especialidad");

//$comboGrado = $funciones->LlenarSelect("pCAT_ASIGNACION_GC_GRADO_B", "CVE_ASIGNACION_GRADO_CARRERA", "GRADO", "id_grado", "GRADO");


?>
<form action="onsubmit" method="POST">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 align="center" class="panel-title">
                CARRERA
            </h3>
        </div>
        <div class="panel-body">
            <div class="main-content">

                <div class="main-content-inner" class="col-sm-6" style="width: 55%">
                    <div class="col-xs-12 col-sm-12 col--4 ">

                    <label for="form-field-mask-2">
                            Clave
                        </label>
                        <div class="input-group col-sm-12">
                            <span class="input-group-addon" id="sizing-addon2">
                                <a class="glyphicon glyphicon-user">
                                </a>
                            </span>
                            <input aria-describedby="basic-addon1" class="form-control" disabled="disabled" id="clave" placeholder="Auto Generado" type="text">
                            </input>
                      </div>
                          <?echo $comboGeneracion ?>
                          <?echo $comboGrupo ?>
                          <?echo $comboCarrera ?>
                        <div id='divEspecialidad'>
                          <?echo $comboEspecialidad ?>
                        </div>
                        <div id='divGrado'>
                          <?echo $comboGrado ?>
                        </div>


                            <label for="id-date-range-picker-1">Periodo del Grupo</label>

                            <div class="row">
                              <div class="col-xs-8 col-sm-11">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                  </span>

                                  <input class="form-control" type="text" name="date-range-picker" id="id-date-range-picker-1" />
                                </div>
                              </div>
                            </div>



                    </div>
                </div>
                  <div  id='divMateria' class="col-sm-6" style="width: 45%">
   
                  </div>

            </div>
        </div>
    </div>

</form>
<div>
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



<div class="container">
  <div class="row">

    <div id="id_result" class="col-sm-6" style="width: 56%">
     
    </div>
 
  </div>
</div>


<script type="text/javascript">



  $('.input-daterange').datepicker({autoclose:true,closeText: 'Cerrar'});
  $('input[name=date-range-picker]').daterangepicker({
          'applyClass' : 'btn-sm btn-success',
          'cancelClass' : 'btn-sm btn-default',
          locale: {
            applyLabel: 'Aplicar',
            cancelLabel: 'Canelar',
          }
        })
function jclick(){

      $("i").click(function() {
        if (this.id == 'editar'){
          document.getElementById('clave').value = $(this).parents("tr").find("td")[0].innerHTML;
          document.getElementById('Especialidad').value = $(this).parents("tr").find("td")[1].innerHTML;
          if ($(this).parents("tr").find("td")[2].innerHTML == 1){
               document.getElementById('si').checked = true;
          }else{
             document.getElementById('no').checked = true;
          }
        }else if (this.id == 'eliminar'){
        	id = $(this).parents("tr").find("td")[0].innerHTML;
        	descripción =  $(this).parents("tr").find("td")[1].innerHTML;
        	toastr["success"]("¿Seguro que desea eliminar el Registro No. " + id + " con la descripción: "  + descripción  + " ?</br><button type='button' class='btn btn-primary' onclick='delete2(\""+id+"\");' style='width: 45%'>SI</button> <button type='button' class='btn btn btn-danger' style='width:45%'>NO</button>")
        }
      });

          //$('#usertable').dataTable();
}


function delete2(id){
	alert(id);
}


$("button").click(function() {
  if (this.id == "guardar"){
    alert('ad');
  	if (pasa()){
      alert('da');
    	key = '<?echo $funciones->encriptar("save"); ?>';
    	id = document.getElementById('clave').value;
      grupo = document.getElementById('ID_GRUPO').value;
      generacion = document.getElementById('ID_GENERACION').value;
    	fecha = document.getElementById('id-date-range-picker-1').value;
      asg = document.getElementById('id_grado').value;
      alert(fecha);

    	vData = {'proceso' : key, 'id':id, 'grupo': grupo, 'generacion' : generacion, 'fecha' : fecha, 'asg' : asg }

    	key = '<?echo $funciones->encriptar("mostrarAlumnoGrupo"); ?>';
    	resultado=save_r('catalogo/asignacion_alumno_grupo_G.php',vData, 'clave', key, 'id_result','');
    	return false;
  	}
  }else{
    limpiar();
    return false;
  }

});


function validar(valor){
        if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
          return false;
        }else{
          return true;
        }
}

function actualizar(){
    vData  = {'proceso' : '<?echo $funciones->encriptar("mostrarAlumnoGrupo"); ?>'}
   Asyc('catalogo/asignacion_alumno_grupo_G.php',vData,'id_result');
}

actualizar();


function pasa(){
  return true;
	 id = document.getElementById('clave').value;
   Especialidad = document.getElementById('Especialidad').value;

   if (!validar(Especialidad)){
   	toastr['warning']('Por favor, Escriba una Carrera');
   	return false;
   }

   return true;
}

function limpiar(){
    document.getElementById('clave').value = "";
    document.getElementById('Especialidad').value = "";
}



function onChangeV(id,value){
   
 
  if (id == "ID_ESPECIALIDAD"){
    alert(value);
     vData  = {'proceso' : '<?echo $funciones->encriptar("comboGrado"); ?>', 'id_carrera' : value}
     Asyc('catalogo/asignacion_alumno_grupo_G.php',vData,'divGrado');

  }
   if (id=='id_grado'){
    vData  = {'proceso' : '<?echo $funciones->encriptar("mostrarCarrera"); ?>', 'id_grado' : value}
     Asyc('catalogo/asignacion_alumno_grupo_G.php',vData,'divMateria');
   }

}

 $('select').on('change', function() {
  if (this.id == "id_carrera"){
     vData  = {'proceso' : '<?echo $funciones->encriptar("comboEspecialidad"); ?>', 'id_carrera' : this.value}
     Asyc('catalogo/asignacion_alumno_grupo_G.php',vData,'divEspecialidad');
  }

  if (this.id == "ID_ESPECIALIDAD"){
     vData  = {'proceso' : '<?echo $funciones->encriptar("comboGrado"); ?>', 'id_carrera' : this.value}
     Asyc('catalogo/asignacion_alumno_grupo_G.php',vData,'divGrado');

  }

  


});


</script>
