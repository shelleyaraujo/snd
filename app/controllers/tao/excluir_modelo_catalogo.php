<?php

function _excluir_modelo_catalogo() { 

	$r="Não foi ppossivel excluir o modelo.";

	if(isset($_POST['id'])) {
		$o_catalogo = new CatalogoModel();
		$o_catalogo->delete_modelo($_POST['id']);
		$r="Modelo excluido.";
	}

	echo $r;
}

?>
