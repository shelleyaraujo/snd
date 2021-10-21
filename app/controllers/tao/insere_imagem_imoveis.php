<?php

function _insere_imagem_imoveis() { 

	$r="Não foi ppossivel inserir a imagem.";

	if(isset($_POST['id'])) {
	$o_imoveis = new ImoveisModel();
	$o_imoveis->add_imagem($_POST['id'],$_POST['imagem']);
	$r = "Imagem inserida!";
	}

	echo $r;
}

?>
