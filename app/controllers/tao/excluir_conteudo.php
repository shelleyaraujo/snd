<?php

function _excluir_conteudo() { 

	$r="Não foi ppossivel escluir este conteúdo.";

	if(isset($_POST['id'])) {
	$o_conteudos = new ConteudosModel();
	$o_conteudos->delete_conteudo($_POST['id']);
	$r = "Contéudo Excluido!";
	}

	echo $r;
}

?>
