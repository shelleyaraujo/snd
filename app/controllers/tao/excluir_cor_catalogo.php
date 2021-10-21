<?php

function _excluir_cor_catalogo() { 

	$r="Não foi ppossivel excluir a cor.";

	if(isset($_POST['id'])) {
		$o_catalogo = new CatalogoModel();
		$o_catalogo->delete_cor($_POST['id']);
		$r="Cor excluida.";
	}

	echo $r;
}

?>
