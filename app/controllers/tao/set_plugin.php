<?php

function _set_plugin() { 

	$r="Não foi ppossivel atualizar o plugin.";

	if(isset($_POST['id'])) {
		$o_conteudos = new ConteudosModel();
		$o_conteudos->set_plugin($_POST['id'],$_POST['plugin']);
		
		$r = "Plugin atualizado!";
	}

	echo $r;
}

?>
