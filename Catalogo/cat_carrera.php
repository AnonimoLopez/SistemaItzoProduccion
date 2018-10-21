<?php
require("../userData/function.php");
$funciones = new Principal();

$tabla = $funciones->tabla("CAT_CARRERA","pCAT_CARRERA_B","CVE_CARRERA,CARRERA,ACTIVO");



?>
<form action="" method="POST" action="onsubmit">


<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title" align='center'>CARRERA</h3>
  </div>
  <div class="panel-body" >

   
<div class="main-content">
<div class="main-content-inner">
<div class="col-xs-12 col-sm-8 col--4 " >




 <label for="form-field-mask-2">Clave Carrera</label>
<div class="input-group col-sm-8">
  <span class="input-group-addon" id="sizing-addon2"><a class="glyphicon glyphicon-user"></a></span>
  <input type="text" class="form-control" placeholder="Auto Generado" id='clave' disabled="disabled" aria-describedby="basic-addon1">
</div>
 <label for="form-field-mask-2">Carrera</label>
<div class="input-group col-sm-8">
 
    <span class="input-group-addon" id="sizing-addon2"><a class="glyphicon glyphicon-user"></a></span>
  <input type="text" class="form-control" id='carrera' placeholder="Carrera" aria-describedby="basic-addon1">
</div>


<div>
<fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Estatus</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="si" value="1" checked>
          <label class="form-check-label" for="gridRadios1">
            Activo
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="no" value="0">
          <label class="form-check-label" for="gridRadios2">
            Desactivado
          </label>
        </div>
        </div>
      </div>
    </div>
  </fieldset>
</div>

                        
              <div class="">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Guardar</button>
                            </div>

</div>
</div>
<div id='id_result'>
  <?php echo $tabla ?>
</div>

</form>

<script type="text/javascript">
     $('#usertable').dataTable();
      $("i").click(function() {
        
        if (this.id == 'editar'){
          document.getElementById('clave').value = $(this).parents("tr").find("td")[0].innerHTML;
          document.getElementById('carrera').value = $(this).parents("tr").find("td")[1].innerHTML;
          if ($(this).parents("tr").find("td")[2].innerHTML == 1){
               document.getElementById('si').checked = true;
          }else{
             document.getElementById('no').checked = true;
          }
        }
        });

       $("button").click(function() {
            vData = {'folio':'10',}
            Asyc('catalogo/cat_carrera_G.php',vData,'id_result')
             $('#usertable').dataTable();
            return false;
        });
</script>


