<?php

function _excluir_imagem_imoveis() { 

	$r="Não foi ppossivel excluir a imagem.";

	if(isset($_POST['id'])) {
		$o_imoveis = new ImoveisModel();
		$o_imoveis->delete_imagem($_POST['id']);
		$imagem = $_POST["imagem"];
		unlink("imagens/imoveis/" . $imagem);
		$r = "A imagem:" . $imagem . " foi excluída.";
	}

	echo $r;
}

?>
