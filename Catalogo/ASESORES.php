<?php

require "../userData/function.php";


$funciones = new Principal();

$comboEmpresa = $funciones->LlenarSelect("pCAT_EMPRESA_B", "CVE_EMPRESA", "NOMBRE", "id_empresa", "Empresa");

$comboCargos = $funciones->LlenarSelect("pCAT_CARGOS_B", "CVE_CARGO", "DESCRIPCION", "id_cargo", "CARGO");




?>
<form>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title" align='center'>ASESORES</h3>
  </div>
  <div class="panel-body" >

<div class="main-content">
<div class="main-content-inner">
<div class="col-xs-12 col-sm-8 col--4 " >


<? echo $comboEmpresa; ?>
  <label for="form-field-mask-2">
     Clave Responsable
                        </label>
                        <div class="input-group col-sm-8">
                            <span class="input-group-addon" id="sizing-addon2">
                                <a class="glyphicon glyphicon-user">
                                </a>
                            </span>
                            <input aria-describedby="basic-addon1" class="form-control" disabled="disabled" id="clave" placeholder="Auto Generado" type="text">
                            </input>
                        </div>
 <label for="form-field-mask-2">Responsable</label>
<div class="input-group col-sm-8">
 
  	<span class="input-group-addon" id="sizing-addon2"><a class="glyphicon glyphicon-user"></a></span>
  <input type="text" class="form-control" id="responsable" placeholder="Nombre" aria-describedby="basic-addon1">
</div>



<?php echo $comboCargos ?>



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
</div>
<div id="id_result">
   
</div>


</div>

</form>


<script type="text/javascript">

function delete2(id){
  alert(id);
}



function limpiar(){
    document.getElementById('clave').value = "";
    document.getElementById('responsable').value = "";
}


 function jclick() { 
  $("i").click(function() {
           
        if (this.id == 'editar'){

          document.getElementById('clave').value = $(this).parents("tr").find("td")[0].innerHTML;
          document.getElementById('responsable').value = $(this).parents("tr").find("td")[1].innerHTML;

        }else if (this.id == 'eliminar'){
          id = $(this).parents("tr").find("td")[0].innerHTML;
          descripción =  $(this).parents("tr").find("td")[1].innerHTML;
          toastr["success"]("¿Seguro que desea eliminar el Registro No. " + id + " con la descripción: "  + descripción  + " ?</br><button type='button' class='btn btn-primary' onclick='delete2(\""+id+"\");' style='width: 45%'>SI</button> <button type='button' class='btn btn btn-danger' style='width:45%'>NO</button>")
        }
  });
}





function onChangeV(id,value){
   
 
  if (id == "id_empresa"){
        vData  = {'proceso' : '<?echo $funciones->encriptar("mostrar"); ?>', 'extra' : value}
     Asyc('catalogo/ASESORES_G.php',vData,'id_result');
  }


}

  
$("button").click(function() {
  if (this.id == "guardar"){
    if (pasa()){
      key = '<?echo $funciones->encriptar("save"); ?>';
      id = document.getElementById('clave').value;
      responsable = document.getElementById('responsable').value;
      cargo = document.getElementById('id_cargo').value;
      empresa = document.getElementById('id_empresa').value;
      vData = {'proceso' : key, 'id':id, 'responsable': responsable, 'cargo' : cargo, 'empresa' : empresa }
      key = '<?echo $funciones->encriptar("mostrar"); ?>';
      resultado=save_r('catalogo/ASESORES_G.php',vData, 'clave', key, 'id_result', empresa);
      return false;
    }
  }else{
    limpiar();
    return false;
  }

});


function pasa(){

   return true;
}

function validar(valor){
        if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
          return false;
        }else{
          return true;
        }
}




</script>

