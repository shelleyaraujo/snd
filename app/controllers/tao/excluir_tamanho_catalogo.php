<?php

function _excluir_tamanho_catalogo() { 

	$r="Não foi ppossivel excluir o tamanho.";

	if(isset($_POST['id'])) {
		$o_catalogo = new CatalogoModel();
		$o_catalogo->delete_tamanho($_POST['id']);
		$r="Tamanho excluido.";
	}

	echo $r;
}

?>
