<?php
function _modulo_set_ar() { 
    $id = $_POST["id"];
    $ar = $_POST["ar"];
    $o_modulos = new ModulosModel();
    $dr_modulos = $o_modulos->SetAr($id, $ar);

    echo $ar;
}

?>
