<?php

function _excluir_imagem_catalogo_unica() { 

	$r="Não foi ppossivel excluir a imagem.";

	if(isset($_POST['id'])) {
		$o_catalogo = new CatalogoModel();
		$o_catalogo-> delete_imagem_unica($_POST['id']);
		$imagem = $_POST["imagem"];

		if (file_exists("imagens/" . $imagem))  {
			unlink("imagens/" . $imagem);
		}

		if (file_exists("imagens/mini_" . $imagem))  {
			unlink("imagens/mini_" . $imagem);
		}

		$r = "A imagem:" . $imagem . " foi excluída.";
	}

	echo $r;
}

?>
