<?php

function _excluir_imovel() { 

	$r="Não foi ppossivel escluir este imóvel.";

	if(isset($_POST['id'])) {
	$o_imovel = new ImoveisModel();
	$o_imovel->delete_imovel($_POST['id']);
	$r = "Imovel excluido!";
	}

	echo $r;
}

?>
