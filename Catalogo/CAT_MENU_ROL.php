<?php
require "../userData/function.php";
$funciones = new Principal();
$comboproyecto = $funciones->LlenarSelect("CAT_ROL_B", "CVE_ROL", "DESCRIPCION", "id_ROL", " ");
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
ul, #myUL {
  list-style-type: none;
}

#myUL {
  margin: 0;
  padding: 0;
}



.box {
  cursor: pointer;
  -webkit-user-select: none; /* Safari 3.1+ */
  -moz-user-select: none; /* Firefox 2+ */
  -ms-user-select: none; /* IE 10+ */
  user-select: none;
   font-size: 20px;
}




.box::before {
  content: "\2610";
  color: black;
  display: inline-block;
  margin-right: 6px;
}



.check-box::before {
  content: "\2611";
  color: dodgerblue;
}

.nested {
  display: none;
   font-size: 20;
}

.active {
  display: block;
}
</style>
</head>
<body>


<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title" align='center'>ASIGNAR ACCESOS A LOS ROLES: <BR> NOMBRE DEL ROL: 
      <br>
         <?php echo $comboproyecto; ?>
    </h3>

  </div>
  <div class="panel-body" >
    <form>

      <div class="main-content">
        <div class="main-content-inner">
          <div class="col-xs-12 col-sm-6 col--4 " >


         


<div id='arbol'>
</div>



          </div>

      </div>

    </div>
<button type="button" class="btn btn-success col-xs-12 col-sm-2">Registrar</button>
 <div id='prueba'>
 </div>
</form>




<script>


  $('select').on('change', function() {
        if (this.id == "id_ROL"){
          vData = {id:'<? echo $funciones->encriptar("comboRol"); ?>', valor: this.value ,}
          Asyc('Catalogo/CAT_MENU_ROL_AJAX.php',vData,'arbol')
        }
  });









</script>

</body>
</html>
