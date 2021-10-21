<?php

function _mudar_categoria() { 

	$r = "";
	$i=0;

	if(isset($_POST["idcategoria"])) {
	$o_modulos = new ModulosModel();
	$r = $o_modulos->mudar_categorias($_POST["idcategoria"]);
    }

	echo $r;
}

?>
