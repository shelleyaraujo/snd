<?php

function _ativar_modulo() { 

	$r="Módulo ativado!";

	if(isset($_POST['id'])) {
	$o_modulos = new ModulosModel();

	$o_modulos->ativar_modulo($_POST['id'],$_POST['ativo'],$_POST['menu']);

	}

	if($_POST['ativo'] == "0") {
		$r="Módulo desativado!";
	}

	echo $r;
}

?>
