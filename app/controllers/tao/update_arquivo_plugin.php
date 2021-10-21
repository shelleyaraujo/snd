<?php

function _update_arquivo_plugin() { 

$r="";
	if(isset($_POST['arquivo'])) {

	$arquivo = TRIM($_POST['arquivo']);

	$o_plugin = new PluginModel();
	$o_plugin->setId($_POST['id']);
	$o_plugin->update_arquivo(str_replace(".php","",$arquivo));
	$r = "Arquivo enviado!";
	}

	echo $r;
}

?>
