<?php

function _set_credencial() { 

	$r="Não foi ppossivel atualizar a credencial.";

	if(isset($_POST['id'])) {
		$o_usuarios = new UsuariosModel();
		$o_usuarios->set_credencial($_POST['id'],$_POST['credencial']);
		
		$r = "Plugin atualizado!";
	}

	echo $r;
}

?>
