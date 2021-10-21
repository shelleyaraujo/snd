<?php

function _excluir_item_institucional() { 

	$r="Não foi ppossivel escluir este item.";

	if(isset($_POST['id'])) {
	$o_conteudos = new InstitucionalModel();
	$o_conteudos->delete_item($_POST['id']);
	$r = "Item Excluido!";
	}

	echo $r;
}

?>
