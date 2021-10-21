<?php

function _excluir_itens_galeria() { 

	$r="Não foi ppossivel escluir as imagens da galeria.";

	if(isset($_POST['idcategoria'])) {
	$o_galeria = new GaleriaModel();
	$o_galeria->excluir_itens_galeria($_POST['idcategoria']);
	$r = "Item da galeria excluida!";
	}

	echo $r;
}

?>
