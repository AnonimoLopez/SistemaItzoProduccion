<?php
require "../userData/function.php";
$funciones = new Principal();

$tabla = $funciones->tabla("alumnos", "pCAT_ALUMNOS_B", "CVE_PERSONA,NOMBRE,PATERNO,MATERNO,Celular,Correo,MATRICULA");

?>
<!DOCTYPE html>
<html lang="en">
<header>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
  </header>

  <body class="no-skin">
    <div class="main-container ace-save-state" id="main-container">
      <script type="text/javascript">
        try{ace.settings.loadState('main-container')}catch(e){}
      </script>
  <div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title" align='center'>ALUMNO</h3>
  </div>
  <div class="panel-body" >
<form>


<div class="main-content">
<div class="main-content-inner">
<div class="col-xs-12 col-sm-8 col--4 " >





 <label for="form-field-mask-2">Clave del Alumno</label>
<div class="input-group col-sm-8">
  <span class="input-group-addon" id="sizing-addon2"><a class="glyphicon glyphicon-user"></a></span>
  <input type="text" class="form-control" placeholder="Auto Generado" id='clave' disabled="disabled" aria-describedby="basic-addon1">
</div>



 <label for="form-field-mask-2">Nombre</label>
<div class="input-group col-sm-8">

    <span class="input-group-addon" id="sizing-addon2"><a class="glyphicon glyphicon-user"></a></span>
  <input type="text" class="form-control" placeholder="Nombre" id='nombre'required="" aria-describedby="basic-addon1">
</div>
  <label for="form-field-mask-2">Paterno</label>
<div class="input-group col-sm-8">
  <span class="input-group-addon" id="sizing-addon2"><a class="glyphicon glyphicon-user"></a></span>
  <input type="text" class="form-control" placeholder="Paterno" required="" id='paterno' aria-describedby="basic-addon1">
</div>

  <label for="form-field-mask-2">Materno</label>
<div class="input-group col-sm-8">
  <span class="input-group-addon" id="sizing-addon2"><a class="glyphicon glyphicon-user"></a></span>
  <input type="text" class="form-control" placeholder="Materno" required="" id='materno' aria-describedby="basic-addon1">
</div>

  <label for="form-field-mask-2">Correo</label>
 <div class="input-group col-sm-8">
   <span class="input-group-addon" id="sizing-addon2">@</span>
    <input type="text" class="form-control" placeholder="Correo" id='email' aria-describedby="sizing-addon2">
</div>

  <label for="form-field-mask-2">Celular</label>
 <div class="input-group col-sm-8">
   <span class="input-group-addon" id="sizing-addon2"><a class="glyphicon glyphicon-phone"></a></span>
    <input type="text" class="form-control" placeholder="Celular" id='celular' aria-describedby="sizing-addon2">
</div>

  <label for="form-field-mask-2">Matricula</label>
<div class="input-group col-sm-8">

   <span class="input-group-addon" id="sizing-addon2"><a class="glyphicon glyphicon-barcode"></a></span>
  <input type="text" disabled="false"  class="form-control" placeholder="Matricula" id = 'matricula' aria-describedby="basic-addon1">
</div>

              <div class="">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>Guardar</button>
                            </div>

</div>
</div>
</div>

</div>
<div>
<div id='id_result'>
  <?php echo $tabla ?>
</div>
</div>
</form>




<script type="text/javascript">
      $("i").click(function() {

        if (this.id == 'editar'){
          document.getElementById('clave').value = $(this).parents("tr").find("td")[0].innerHTML;
          document.getElementById('nombre').value = $(this).parents("tr").find("td")[1].innerHTML;
          document.getElementById('paterno').value = $(this).parents("tr").find("td")[2].innerHTML;
          document.getElementById('materno').value = $(this).parents("tr").find("td")[3].innerHTML;
          document.getElementById('email').value = $(this).parents("tr").find("td")[4].innerHTML;
          document.getElementById('celular').value = $(this).parents("tr").find("td")[5].innerHTML;
         document.getElementById('matricula').value = $(this).parents("tr").find("td")[6].innerHTML;

        }
        });


      $("button").click(function() {

           clave=     document.getElementById('clave').value
           nombre =document.getElementById('nombre').value
          paterno = document.getElementById('paterno').value
          materno= document.getElementById('materno').value
          email = document.getElementById('email').value
          celular = document.getElementById('celular').value

              vData = {
'Clave':clave,
'nombre':nombre,
'paterno':paterno,
'materno':materno,
'email':email ,
'celular':celular
              }
            Asyc('catalogo/cat_alumno_G.php',vData,'id_result')
             $('#usertable').dataTable();
               toastr['info']('Se registro Correctamente el Registro')
            return false;
        });
</script>
</div>
</div>
</div>

</body>
</html>
