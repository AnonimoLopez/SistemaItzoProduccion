<?php
require("../userData/function.php");
$funciones = new Principal();

$tabla = $funciones->tabla("alumnos","pCAT_PROYECTOS_B","CVE_PROYECTO,PROYECTO");
?>
<form>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title" align='center'>PROYECTO</h3>
  </div>
  <div class="panel-body" >

<div class="main-content">
<div class="main-content-inner">
<div class="col-xs-12 col-sm-8 col--4 " >



 <label for="form-field-mask-2">Clave del Alumno</label>
<div class="input-group col-sm-8">
  <span class="input-group-addon" id="sizing-addon2"><a class="glyphicon glyphicon-user"></a></span>
  <input type="text" class="form-control" placeholder="Auto Generado" id='clave' disabled="disabled" aria-describedby="basic-addon1">
</div>
 <label for="form-field-mask-2">Proyecto</label>

<div class="input-group col-sm-8">
  	<span class="input-group-addon" id="sizing-addon2"><a class="glyphicon glyphicon-user"></a></span>
  <input type="text" class="form-control" placeholder="Proyecto" id='proyecto' aria-describedby="basic-addon1">
</div>


 


  
												
              <div class="">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Guardar</button>
                            </div>


<div id='id_result'>
  <?php echo $tabla ?>
</div>

</div>
</div>
</div>

</div>
<script type="text/javascript">

      $("i").click(function() {
        
        if (this.id == 'editar'){


          document.getElementById('clave').value = $(this).parents("tr").find("td")[0].innerHTML;
          document.getElementById('proyecto').value = $(this).parents("tr").find("td")[1].innerHTML;
        }
        });



       $("button").click(function() {
        var proyecto =  document.getElementById('proyecto').value
        var clave =   document.getElementById('clave').value
            vData = {'proyecto':proyecto,'clave':clave}
            Asyc('catalogo/cat_proyecto_G.php',vData,'id_result')
             $('#usertable').dataTable();
             toastr['info']('Se registro Correctamente el Registro')
            return false;
        });

</script>
</form>