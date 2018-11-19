<?php
require "../userData/function.php";
$funciones = new Principal();
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


 <label for="form-field-mask-2">
                            Clave Empresa
                        </label>
                        <div class="input-group col-sm-8">
                            <span class="input-group-addon" id="sizing-addon2">
                                <a class="glyphicon glyphicon-user">
                                </a>
                            </span>
                            <input aria-describedby="basic-addon1" class="form-control" disabled="disabled" id="clave" placeholder="Auto Generado" type="text">
                            </input>
</div>


 <label for="form-field-mask-2">Nombre</label>
<div class="input-group col-sm-8">

    <span class="input-group-addon" id="sizing-addon2"><a class="glyphicon glyphicon-user"></a></span>
  <input type="text" class="form-control" id="nombre" placeholder="Nombre" aria-describedby="basic-addon1">
</div>


  <label for="form-field-mask-2">Dirección</label>
<div class="input-group col-sm-8">
  <span class="input-group-addon" id="sizing-addon2"><a class="glyphicon glyphicon-user"></a></span>
  <input type="text" class="form-control"  id="direccion" placeholder="Dirección" aria-describedby="basic-addon1">
</div>

  <label for="form-field-mask-2">Telefono</label>
<div class="input-group col-sm-8">
  <span class="input-group-addon" id="sizing-addon2"><a class="glyphicon glyphicon-user"></a></span>
  <input type="text" class="form-control" id= "telefono" placeholder="Telefono" aria-describedby="basic-addon1">
</div>

  <label for="form-field-mask-2">Domicilio</label>
 <div class="input-group col-sm-8">
   <span class="input-group-addon" id="sizing-addon2">@</span>
    <input type="text" class="form-control" id= "domicilio" placeholder="Domicilio" aria-describedby="sizing-addon2">
</div>

  <label for="form-field-mask-2">Colonia</label>
 <div class="input-group col-sm-8">
   <span class="input-group-addon" id="sizing-addon2"><a class="glyphicon glyphicon-phone"></a></span>
    <input type="text" class="form-control" id="colonia" placeholder="Colonia" aria-describedby="sizing-addon2">
</div>

  <label for="form-field-mask-2">Ciudad</label>
 <div class="input-group col-sm-8">
   <span class="input-group-addon" id="sizing-addon2"><a class="glyphicon glyphicon-phone"></a></span>
    <input type="text" class="form-control" id="ciudad" placeholder="Ciudad" aria-describedby="sizing-addon2">
</div>

  <label for="form-field-mask-2">Sector</label>
 <div class="input-group col-sm-8">
   <span class="input-group-addon" id="sizing-addon2"><a class="glyphicon glyphicon-phone"></a></span>
    <input type="text" class="form-control" id="sector" placeholder="Sector" aria-describedby="sizing-addon2">
</div>
  <label for="form-field-mask-2">RFC</label>
 <div class="input-group col-sm-8">
   <span class="input-group-addon" id="sizing-addon2"><a class="glyphicon glyphicon-phone"></a></span>
    <input type="text" class="form-control" id="rfc" placeholder="RFC" aria-describedby="sizing-addon2">
</div>


  <label for="form-field-mask-2">FAX</label>
 <div class="input-group col-sm-8">
   <span class="input-group-addon" id="sizing-addon2"><a class="glyphicon glyphicon-phone"></a></span>
    <input type="text" class="form-control" id="fax" placeholder="FAX" aria-describedby="sizing-addon2">
</div>


  <label for="form-field-mask-2">Codigo Postal</label>
 <div class="input-group col-sm-8">
   <span class="input-group-addon" id="sizing-addon2"><a class="glyphicon glyphicon-phone"></a></span>
    <input type="text" class="form-control" id="cp" placeholder="Codigo postal" aria-describedby="sizing-addon2">
</div>


  <label for="form-field-mask-2">Mision</label>
 <div class="input-group col-sm-8">
   <span class="input-group-addon" id="sizing-addon2"><a class="glyphicon glyphicon-phone"></a></span>
    <input type="text" class="form-control" id="mision" placeholder="Mision" aria-describedby="sizing-addon2">
</div>


<br>
  <div class="">
    <button class="btn btn-lg btn-info" id="nuevo" type="submit">
    <i class="glyphicon glyphicon-ok-sign">
    </i>
    Nuevo
</button>
                                
                                <button class="btn btn-lg btn-success" type="submit" id="guardar" ><i class="glyphicon glyphicon-ok-sign"></i>Guardar</button>

</div>
</div>

</div>
</div>

<div id='id_result' style="overflow: scroll;">

</div>
</form>


<script type="text/javascript">
function actualizar(){
    vData  = {'proceso' : '<?echo $funciones->encriptar("mostrar"); ?>'}
   Asyc('catalogo/cat_empresa_G.php',vData,'id_result');
}
actualizar();




function limpiar(){
      document.getElementById('clave').value = "";
      document.getElementById('nombre').value = "";
      document.getElementById('direccion').value = "";
      document.getElementById('telefono').value = "";
      document.getElementById('domicilio').value = "";
      document.getElementById('colonia').value = "";
      document.getElementById('ciudad').value = "";
      document.getElementById('sector').value = "";
      document.getElementById('rfc').value = "";
      document.getElementById('fax').value = "";
      document.getElementById('cp').value = "";
      document.getElementById('mision').value = "";
}

$("button").click(function() {
   if (this.id == "guardar"){
           clave=     document.getElementById('clave').value;
           nombre =document.getElementById('nombre').value;
         direccion = document.getElementById('direccion').value;
          telefono = document.getElementById('telefono').value;
          domicilio = document.getElementById('domicilio').value;
          colonia = document.getElementById('colonia').value;
          ciudad  = document.getElementById('ciudad').value;
          sector= document.getElementById('sector').value;
          RFC= document.getElementById('rfc').value;
          FAX= document.getElementById('fax').value;
          cp= document.getElementById('cp').value;
          mision = document.getElementById('mision').value;



         vData       = {
                 'proceso' : '<?echo $funciones->encriptar("save"); ?>',
                 'Clave'           : clave,
                 'nombre'          : nombre,
                 'direccion'         : direccion,
                      'domicilio'         : domicilio,
                 'colonia'         : colonia,
                 'ciudad'           : ciudad,
                 'sector' : sector,
                 'rfc'         : RFC,
                  'fax':FAX,
                   'cp':cp,
                    'mision':mision,
                    'telefono' : telefono
          }


                key = '<?echo $funciones->encriptar("mostrar"); ?>';
                resultado=save_r('catalogo/cat_empresa_G.php',vData, 'clave', key, 'id_result','');
                 return false;
        }else{
          limpiar();
          return false;
        }
  });



 function jclick() { 
  $("i").click(function() {
           
        if (this.id == 'editar'){

         document.getElementById('clave').value = $(this).parents("tr").find("td")[0].innerHTML;
         document.getElementById('nombre').value = $(this).parents("tr").find("td")[1].innerHTML;
         document.getElementById('direccion').value  = $(this).parents("tr").find("td")[2].innerHTML;
         document.getElementById('telefono').value  = $(this).parents("tr").find("td")[3].innerHTML;
         document.getElementById('domicilio').value = $(this).parents("tr").find("td")[4].innerHTML;
         document.getElementById('colonia').value  = $(this).parents("tr").find("td")[5].innerHTML;
         document.getElementById('ciudad').value  = $(this).parents("tr").find("td")[6].innerHTML;
         document.getElementById('sector').value  = $(this).parents("tr").find("td")[7].innerHTML;
         document.getElementById('rfc').value  = $(this).parents("tr").find("td")[8].innerHTML;
         document.getElementById('fax').value = $(this).parents("tr").find("td")[9].innerHTML;
         document.getElementById('cp').value  = $(this).parents("tr").find("td")[10].innerHTML;
         on = document.getElementById('mision').value = $(this).parents("tr").find("td")[11].innerHTML;

        }else if (this.id == 'eliminar'){
          id = $(this).parents("tr").find("td")[0].innerHTML;
          descripción =  $(this).parents("tr").find("td")[1].innerHTML;
          toastr["success"]("¿Seguro que desea eliminar el Registro No. " + id + " con la descripción: "  + descripción  + " ?</br><button type='button' class='btn btn-primary' onclick='delete2(\""+id+"\");' style='width: 45%'>SI</button> <button type='button' class='btn btn btn-danger' style='width:45%'>NO</button>")
        }
  });
}

</script>