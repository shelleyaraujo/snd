<?php

function _excluir_container_fixo() { 

	$r="Não foi ppossivel escluir este container.";

	if(isset($_POST['id'])) {
	$o_containerflex = new ContainersCaixaTextoFixoModel();
	$o_containerflex->delete_container($_POST['id']);
	$r = "Container Excluido!";
	}

	echo $r;
}

?>
