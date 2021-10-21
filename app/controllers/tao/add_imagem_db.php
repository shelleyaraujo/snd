<?php

function _add_imagem_db() { 

	$r="";
	if(isset($_POST['imagem'])) {
		$o_imagens = new Imagens2Model();
		$o_imagens->add_imagem(TRIM($_POST['imagem']),"galeria");
		$r = "Imagem adicionada!";
	}

	echo $r;
}

?>
