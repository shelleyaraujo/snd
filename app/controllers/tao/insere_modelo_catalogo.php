<?php

function _insere_modelo_catalogo() { 

	$r="Não foi ppossivel adicionar o modelo.";

	if(isset($_POST['id'])) {
	$o_modulos = new CatalogoModel();
	$o_modulos->add_modelo($_POST['id'],$_POST['modelo']);
	$r = "Modelo Adicionado!";
	}

	echo $r;
}

?>
