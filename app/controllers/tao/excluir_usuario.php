<?php

function _excluir_usuario() { 

	$r="Não foi ppossivel escluir este usuario.";

	if(isset($_POST['id'])) {
	$o_usuarios = new UsuariosModel();
	$o_usuarios->delete_usuario($_POST['id']);
	$r = "Usuário Excluido!";
	}

	echo $r;
}

?>
