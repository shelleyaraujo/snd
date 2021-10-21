<?php

function _set_modulo_trocar_galeria() { 

	$r="Não foi ppossivel realizar esta ação.";
	$x=0;

	if(isset($_POST['id'])) { 
		$o_modulos = new GaleriaModel();
		$x = $o_modulos->trocar_modulo($_POST['id'],$_POST['idmodulo']);
		$r="Item trocado de Categoria.";
	}

	echo $r;

}

?>
