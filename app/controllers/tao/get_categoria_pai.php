<?php

function _get_categoria_pai() { 

	$r="Erros";

	if(isset($_POST['id'])) {
	$o_modulos = new ModulosModel();
	$dr_modulos = $o_modulos->get_categoria_pai($_POST['id']);
	$r = $dr_modulos;
	}

	echo $r;
}

?>
