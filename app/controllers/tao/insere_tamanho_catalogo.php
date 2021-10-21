<?php

function _insere_tamanho_catalogo() { 

	$r="Não foi ppossivel adicionar o tamanho.";

	if(isset($_POST['id'])) {
	$o_modulos = new CatalogoModel();
	$o_modulos->add_tamanho($_POST['id'],$_POST['tamanho']);
	$r = "Tamanho Adicionado!";
	}

	echo $r;
}

?>
