<?php

function _set_plugin_destaques() { 

	$r="Não foi ppossivel atualizar o plugin.";

	if(isset($_POST['id'])) {
		$o_destaques = new DestaquesModel();
		$o_destaques->set_plugin($_POST['id'],$_POST['plugin']);
		
		$r = "Plugin atualizado!";
	}

	echo $r;
}

?>
