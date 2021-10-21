<?php

function _insere_imagem_catalogo() { 

	$r="Não foi ppossivel inserir a imagem.";

	if(isset($_POST['id'])) {
	$o_catalogo = new CatalogoModel();
	$o_catalogo->add_imagem($_POST['id'],$_POST['imagem']);
	$r = "Imagem inserida!";
	}

	echo $r;
}

?>
