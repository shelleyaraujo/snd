<?php

function _update_arquivo_downloads() { 

$r="";
	if(isset($_POST['arquivo'])) {

	$arquivo = TRIM($_POST['arquivo']);

	$o_downloads = new DownloadsModel();
	$o_downloads->setId($_POST['id']);
	$o_downloads->update_arquivo($_POST['id'], $arquivo);
	$r = "Arquivo enviado!";
	}

	echo $r;
}

?>
