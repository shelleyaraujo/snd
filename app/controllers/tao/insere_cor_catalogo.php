<?php

function _insere_cor_catalogo() { 

	$r="Não foi ppossivel adicionar o cor.";

	if(isset($_POST['id'])) {
	$o_modulos = new CatalogoModel();
	$o_modulos->add_cor($_POST['id'],$_POST['cor']);
	$r = "Cor Adicionada!";
	}

	echo $r;
}

?>
