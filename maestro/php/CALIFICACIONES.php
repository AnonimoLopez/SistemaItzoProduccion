<?php

require("../../userData/function.php");

class AsignarMaterias extends Principal {
    
}

$funciones = new Principal();

$comboGrupo = $funciones->calificaciones("calificaciones", "pCALIFICACIONES_B");
?>

<? echo $comboGrupo; ?>

