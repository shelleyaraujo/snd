<?php

function _excluir_galeria() { 

	$r="Não foi ppossivel escluir este item da galeria.";

	if(isset($_POST['id'])) {
	$o_galeria = new GaleriaModel();
	$o_galeria->delete_galeria($_POST['id']);
	$r = "Item da galeria eExcluida!";
	}

	echo $r;
}

?>
