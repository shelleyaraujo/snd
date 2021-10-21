<?php

function _excluir_downloads() { 

	$r="Não foi ppossivel escluir este item de Downloads.";

	if(isset($_POST['id'])) {
	$o_downloads = new DownloadsModel();
	$o_downloads->delete_downloads($_POST['id']);
	$r = "Item de downloads excluido!";
	}

	echo $r;
}

?>
