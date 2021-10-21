<?php

function _excluir_modulo() { 

	$r="Não foi ppossivel escluir este módulo.";

	if(isset($_POST['id'])) {
	$o_modulos = new ModulosModel();
	
	$r = "Módulo Excluido!" . $o_modulos->delete_modulo($_POST['id']);
	}

	echo $r;
}

?>
