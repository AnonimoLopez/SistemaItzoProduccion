v<?php
?>
<form>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title" align='center'>MAESTRO</h3>
  </div>
  <div class="panel-body" >

<div class="main-content">
<div class="main-content-inner">
<div class="col-xs-12 col-sm-8 col--4 " >





      <div class="tab-content clearfix">
        <div class="tab-pane active" id="1b">

    <label for="form-field-mask-2">Clave del Alumno</label>
    <div class="input-group col-sm-8">
      <span class="input-group-addon" id="sizing-addon2"><a class="glyphicon glyphicon-user"></a></span>
      <input type="text" class="form-control" placeholder="Auto Generado" id='clave' disabled="disabled" aria-describedby="basic-addon1">
    </div>



 <label for="form-field-mask-2">Nombre</label>
<div class="input-group col-sm-8">

    <span class="input-group-addon" id="sizing-addon2"><a class="glyphicon glyphicon-user"></a></span>
  <input type="text"  autocomplete="off" class="form-control" placeholder="Nombre" id='nombre'required="" aria-describedby="basic-addon1">
</div>
  <label for="form-field-mask-2">Paterno</label>
<div class="input-group col-sm-8">
  <span class="input-group-addon" id="sizing-addon2"><a class="glyphicon glyphicon-user"></a></span>
  <input type="text" autocomplete="off"   class="form-control" placeholder="Paterno" required="" id='paterno' aria-describedby="basic-addon1">
</div>

  <label for="form-field-mask-2">Materno</label>
<div class="input-group col-sm-8">
  <span class="input-group-addon" id="sizing-addon2"><a class="glyphicon glyphicon-user"></a></span>
  <input type="text" autocomplete="off"  class="form-control" placeholder="Materno" required="" id='materno' aria-describedby="basic-addon1">
</div>

  <label for="form-field-mask-2">Correo</label>
 <div class="input-group col-sm-8">
   <span class="input-group-addon" id="sizing-addon2">@</span>
    <input type="text"  autocomplete="off"  class="form-control" placeholder="Correo" id='email' aria-describedby="sizing-addon2">
</div>

  <label for="form-field-mask-2">Celular</label>
 <div class="input-group col-sm-8">
   <span class="input-group-addon" id="sizing-addon2"><a class="glyphicon glyphicon-phone"></a></span>
    <input type="text" autocomplete="off"  class="form-control" placeholder="Celular" id='celular' aria-describedby="sizing-addon2">
</div>
												
              <div class="">
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
</div>

<div id='id_result'>
 
</div>
</div>

</form>



<script type="text/javascript">

function delete2(id){
  alert(id);
}


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

        }else if (this.id == 'eliminar'){
          id = $(this).parents("tr").find("td")[0].innerHTML;
          descripción =  $(this).parents("tr").find("td")[1].innerHTML;
          toastr["success"]("¿Seguro que desea eliminar el Registro No. " + id + " con la descripción: "  + descripción  + " ?</br><button type='button' class='btn btn-primary' onclick='delete2(\""+id+"\");' style='width: 45%'>SI</button> <button type='button' class='btn btn btn-danger' style='width:45%'>NO</button>")
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
          MATRICULA = document.getElementById('matricula').value;
         id_AlumnoGrupo =  document.getElementById('ID_GRADO_GRUPO').value;

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

                 vData       = {
                 'proceso' : '<?echo $funciones->encriptar("save"); ?>',
                 'Clave'           : clave,
                 'nombre'          : nombre,
                 'paterno'         : paterno,
                 'materno'         : materno,
                 'email'           : email ,
                 'matricula' : MATRICULA,
                 'celular'         : celular,
                  'GrupoAlumno':id_AlumnoGrupo,
                 }

                key = '<?echo $funciones->encriptar("mostrar"); ?>';
                resultado=save_r('catalogo/cat_alumno_G.php',vData, 'clave', key, 'id_result',id_AlumnoGrupo);
                //Asyc('catalogo/cat_alumno_G.php',vData,'id_result')

                 return false;
  });


</script>

