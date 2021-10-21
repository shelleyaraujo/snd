<?php

function _add_imagem_galeria() { 

	$r="";
	if(isset($_POST['imagem'])) {
		$o_imagens = new GaleriaModel();
		$o_imagens->add_imagem($_POST['id'], TRIM($_POST['imagem']));
		$r = "Imagem adicionada!";
	}

	echo $r;
}

?>
