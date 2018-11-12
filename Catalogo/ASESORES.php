<?php

require "../userData/function.php";


$funciones = new Principal();

$comboEmpresa = $funciones->LlenarSelect("pCAT_EMPRESA_B", "CVE_EMPRESA", "NOMBRE", "id_empresa", "Empresa");

$comboCargos = $funciones->LlenarSelect("pCAT_CARGOS_B", "CVE_CARGO", "Descripcion", "id_cargo", "CARGO");




?>
<form>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title" align='center'>EMPRESA</h3>
  </div>
  <div class="panel-body" >

<div class="main-content">
<div class="main-content-inner">
<div class="col-xs-12 col-sm-8 col--4 " >


<? echo $comboEmpresa; ?>


 <label for="form-field-mask-2">Responsable</label>
<div class="input-group col-sm-8">
 
  	<span class="input-group-addon" id="sizing-addon2"><a class="glyphicon glyphicon-user"></a></span>
  <input type="text" class="form-control" placeholder="Nombre" aria-describedby="basic-addon1">
</div>



<?php echo $comboCargos ?>




												
              <div class="">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Guardar</button>
                            </div>

</div>
</div>
</div>

</div>

</form>

