<?php
require "../userData/function.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $funciones = new Principal();
    $proceso = $funciones->desencriptar($id);
    $id      = $funciones->desencriptar($_POST['valor']);

   # echo $_POST['valor'];
    #echo $funciones->desencriptar($_POST['valor']);
  #  echo $funciones->encriptar("")
    #echo "-----------------------------------------";
   # echo $funciones->id_user();
    #$proceso = "comboRol";

    if ($proceso == "comboRol") {

        $arrayName = "";
        $arrayName = array('@CVE_ROL' =>  $id);

        $result  = $funciones->querySelect("pMENU_GRUPO_B", $arrayName);
        $sAcceso = '';
        if ($result) {
            while ($fila = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                $checked = 'check-box';
                $isnull  = is_null($fila['CVE_ROL']);
                if ($isnull) {
                    $checked = '';
                }
                $sAcceso .= ' <ul id="acceso">
  <li><span value="' . $funciones->encriptar($fila['cve_acceso']) . '" class="box ' . $checked . '">' . $fila['Descripcion'] . '</span>
    <ul class="subIndice">';

                $arrayName = array('@GRUPO' => $fila['Descripcion'],'@CVE_ROL' =>  $id);

                $submodulo = $funciones->querySelect("pMENU_GRUPO_ACCESO_B", $arrayName);

                if ($submodulo) {
                    while ($result_submodulo = sqlsrv_fetch_array($submodulo, SQLSRV_FETCH_ASSOC)) {
                        $checked = 'check-box';
                        $isnull  = is_null($result_submodulo['CVE_ROL']);
                        if ($isnull) {
                            $checked = '';
                        }
                        $sAcceso .= '<li><span value="' . $funciones->encriptar($result_submodulo['cve_acceso']) . '" class="box ' . $checked . '">' . $result_submodulo['Descripcion'] . '</span></li>';

                    }
                }
                $sAcceso .= '</ul>
  </li>
</ul>';
            }

        }
    }}


echo $sAcceso;

echo '<type="button" id="guardar"> Guardar</botton>';
echo '<script>var toggler = document.getElementsByClassName("box");
var i;

for (i = 0; i < toggler.length; i++) {
  toggler[i].addEventListener("click", function() {

    this.classList.toggle("check-box");
     this.parentElement.querySelector(".subIndice").classList.toggle("active");
  });

}

$( "#guardar" ).click(function() {



 


});



 $("button").click(function() {

 var id = "";
        $("#acceso span").each(function(){

              if ($(this).hasClass("check-box") == true){
              
                 id+= $(this).attr("value") + "@";
              }
          });


         rol = document.getElementById("id_ROL").value
         vData = {"ids": id, "srol":rol}
         Asyc("Catalogo/CAT_MENU_ROL_G.php",vData,"prueba")
            

            return false;
});


</script>';