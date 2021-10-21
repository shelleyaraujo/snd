<?php

function _excluir_imagem_catalogo() { 

	$r="Não foi ppossivel excluir a imagem.";

	if(isset($_POST['id'])) {
		$o_catalogo = new CatalogoModel();
		$o_catalogo->delete_imagem($_POST['id']);
		$imagem = $_POST["imagem"];
		unlink("imagens/" . $imagem);
		unlink("imagens/mini_" . $imagem);
		$r = "A imagem:" . $imagem . " foi excluída.";
	}

	echo $r;
}

?>
