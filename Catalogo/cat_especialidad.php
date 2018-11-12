<?php
require "../userData/function.php";
$funciones = new Principal();
$comboCarrera = $funciones->LlenarSelect("pCAT_CARRERA_B", "CVE_CARRERA", "CARRERA", "id_carrera", "CARRERA");


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
                <div class="main-content-inner">
                    <div class="col-xs-12 col-sm-8 col--4 ">
                        
                          <?echo $comboCarrera ?>
                    <label for="form-field-mask-2">
                            Clave Especialidad
                        </label>
                        <div class="input-group col-sm-12">
                            <span class="input-group-addon" id="sizing-addon2">
                                <a class="glyphicon glyphicon-user">
                                </a>
                            </span>
                            <input aria-describedby="basic-addon1" class="form-control" disabled="disabled" id="clave" placeholder="Auto Generado" type="text">
                            </input>
                      </div>



                      <label for="form-field-mask-2">
                            Especialidad
                        </label>
                        <div class="input-group col-sm-12">
                            <span class="input-group-addon" id="sizing-addon2">
                                <a class="glyphicon glyphicon-user">
                                </a>
                            </span>
                            <input aria-describedby="basic-addon1" class="form-control" id="Especialidad" placeholder="Especialidad" type="text">
                            </input>
                        </div>



                        <div>
                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0">
                                        Estatus
                                    </legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input checked="" class="form-check-input" id="si" name="gridRadios" type="radio" value="1">
                                                <label class="form-check-label" for="gridRadios1">
                                                    Activo
                                                </label>
                                            </input>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" id="no" name="gridRadios" type="radio" value="0">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Desactivado
                                                </label>
                                            </input>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
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
<div id="id_result">
    
</div>
<script type="text/javascript">

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
  	if (pasa()){
    	key = '<?echo $funciones->encriptar("save"); ?>';
    	id = document.getElementById('clave').value;
    	especialidad = document.getElementById('Especialidad').value;
      fk_carrera = document.getElementById('id_carrera').value;
    	vData = {'proceso' : key, 'id':id, 'especialidad': especialidad, 'fk_carrera' : fk_carrera }
    	key = '<?echo $funciones->encriptar("extra"); ?>';
    	resultado=save_r('catalogo/cat_especialidad_G.php',vData, 'clave', key, 'id_result', fk_carrera);
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


function pasa(){
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


 $('select').on('change', function() {
  if (this.id == "id_carrera"){
     vData  = {'proceso' : '<?echo $funciones->encriptar("mostrar"); ?>', 'id_carrera' : this.value}
     Asyc('catalogo/cat_especialidad_G.php',vData,'id_result');
     limpiar();
  }
});


</script>
