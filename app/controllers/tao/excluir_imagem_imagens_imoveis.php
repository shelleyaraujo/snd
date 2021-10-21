<?php

function _excluir_imagem_imagens_imoveis() { 

	$r="Não foi ppossivel excluir a imagem.";

	if(isset($_POST['imagem'])) {
		$imagem = $_POST['imagem'];
		unlink("imagens/imoveis/" . $imagem);
		$r = "A imagem:" . $imagem . " foi excluída.";
	}

	echo $r;
}

?>
