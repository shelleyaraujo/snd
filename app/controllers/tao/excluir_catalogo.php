<?php

function _excluir_catalogo() { 

	$r="Não foi ppossivel escluir este item de catalogo.";

	if(isset($_POST['id'])) {
	$o_catalogo = new CatalogoModel();
	$o_catalogo->delete_catalogo($_POST['id']);
	$r = "Item de catalogo excluido!";
	}

	echo $r;
}

?>
