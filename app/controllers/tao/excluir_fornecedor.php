<?php

function _excluir_fornecedor() { 

	$r="Não foi ppossivel escluir este fornecedor.";

	if(isset($_POST['id'])) {
	$o_fornecedores = new FornecedoresModel();
	$o_fornecedores->delete_fornecedor($_POST['id']);
	$r = "Fornecedor Excluido!";
	}

	echo $r;
}

?>
