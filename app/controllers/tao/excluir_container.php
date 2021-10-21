<?php

function _excluir_container() { 

	$r="Não foi ppossivel escluir este container.";

	if(isset($_POST['id'])) {
	$o_containerflex = new ContainersCaixaTextoFlexModel();
	$o_containerflex->delete_container($_POST['id']);
	$r = "Container Excluido!";
	}

	echo $r;
}

?>
