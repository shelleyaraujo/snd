<?php

function _excluir_destaque() { 

	$r="Não foi ppossivel escluir este destaque.";

	if(isset($_POST['id'])) {
	$o_destaques = new ContainersCaixaTextoFixoModel();
	$o_destaques->delete_destaque($_POST['id']);
	$r = "Contéudo Excluido!";
	}

	echo $r;
}

?>
