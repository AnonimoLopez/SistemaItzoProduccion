<?php
require "../userData/function.php";
$funciones = new Principal();

$tabla = $funciones->tabla("alumnos", "pCAT_ALUMNOS_B", "CVE_PERSONA,NOMBRE,PATERNO,MATERNO,Celular,Correo,MATRICULA");

$comboAsignacionGrado   = $funciones->LlenarSelect("pASIGNACION_GRADO_CARRERA_B", "CVE_ASIGNACION_GRADO_CARRERA", "GRADO_CARRERA", "id_AsignacionGrado", "CARRERA Y GRADO");
$comoboAsignacionAlumno = $funciones->LlenarSelect("pAsignacion_Alumno_Grupo", "CVE_ASIGNACION_ALUMNO_GRADO", "GRADO_GENERACION", "id_AsignacionAlumno", "GRUPO Y GENERACION");

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
<ul  class="nav nav-pills">
      <li class="active">
        <a  href="#1b" data-toggle="tab">Información personal</a>
      </li>
      <li><a href="#2b" data-toggle="tab">Información Acedemica</a>
      </li>
</ul>

      <div class="tab-content clearfix">
        <div class="tab-pane active" id="1b">

    <label for="form-field-mask-2">Clave del Alumno</label>
    <div class="input-group col-sm-8">
      <span class="input-group-addon" id="sizing-addon2"><a class="glyphicon glyphicon-user"></a></span>
      <input type="text" class="form-control" placeholder="Auto Generado" id='clave' disabled="disabled" aria-describedby="basic-addon1">
    </div>


  <label for="form-field-mask-2">Matricula</label>
<div class="input-group col-sm-8">

   <span class="input-group-addon" id="sizing-addon2"><a class="glyphicon glyphicon-barcode"></a></span>
  <input type="text" disabled="false"  class="form-control" placeholder="Matricula" id = 'matricula' aria-describedby="basic-addon1">
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
        </div>
        <div class="tab-pane" id="2b">


         <?php echo $comboAsignacionGrado ?>
        <div id='onchange'>
            <?php echo $comoboAsignacionAlumno ?>
        </div>

        </div>
      </div>
  </div>






</div>

</div>
  <div class="">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>Guardar</button>
  </div>
</div>




<div id='id_result'>
  <?php echo $tabla ?>
</div>
</div>
</form>




<script type="text/javascript">


      function validar(valor){
        if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
          return false;
        }else{
          return true;
        }
      }



 function jclick() { 
  $("i").click(function() {
           
        if (this.id == 'editar'){

          document.getElementById('clave').value = $(this).parents("tr").find("td")[0].innerHTML;
          document.getElementById('nombre').value = $(this).parents("tr").find("td")[1].innerHTML;
          document.getElementById('paterno').value = $(this).parents("tr").find("td")[2].innerHTML;
          document.getElementById('materno').value = $(this).parents("tr").find("td")[3].innerHTML;
          document.getElementById('email').value = $(this).parents("tr").find("td")
          [4].innerHTML;
          document.getElementById('celular').value = $(this).parents("tr").find("td")[5].innerHTML;
         document.getElementById('matricula').value = $(this).parents("tr").find("td")[6].innerHTML;

        }
  });
}

  


      $("button").click(function() {

           clave=     document.getElementById('clave').value;
           nombre =document.getElementById('nombre').value;
          paterno = document.getElementById('paterno').value;
          materno= document.getElementById('materno').value;
          email = document.getElementById('email').value;
          celular = document.getElementById('celular').value;
         id_AlumnoGrupo =  document.getElementById('id_AsignacionAlumno').value;

        if (!validar(nombre)){
          toastr['warning']('Por favor, Ingrese un Nombre');
          return false;
        }

        if (!validar(paterno)){
          toastr['warning']('Por favor, Ingrese el apellido Paterno');
          return false;
        }

        if (!validar(materno)){
          toastr['warning']('Por favor, Ingrese el apellido Materno');
          return false;
        }


        if (!validar(id_AlumnoGrupo)){
          toastr['warning']('Por favor, Seleccione El Grado y Grupo');
          return false;
        }


                 vData       = {
                 'Clave'           : clave,
                 'nombre'          : nombre,
                 'paterno'         : paterno,
                 'materno'         : materno,
                 'email'           : email ,
                 'celular'         : celular, 'GrupoAlumno':id_AlumnoGrupo,
                 }

                 Asyc('catalogo/cat_alumno_G.php',vData,'id_result')
                 $('#usertable').dataTable();
                 toastr['info']('Se registro Correctamente el Registro');
                 return false;
  });



                 $('select').on('change', function() {
                 if (this.id == "id_AsignacionGrado"){
                 vData  = {id : '<?echo $funciones->encriptar("comboAsignarGrado"); ?>', valor: this.value}

                 Asyc('maestro/php/ajax.php',vData,'onchange')
                 }
                 });
</script>
</div>
</div>
</div>

</body>
</html>
