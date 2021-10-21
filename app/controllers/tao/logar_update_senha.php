<?php

function _logar_update_senha() { 

$r="Não foi possível alterar a senha!";

	if(isset($_POST['email'])) {

	$email = TRIM($_POST['email']);
	$senha = $_POST['senha'];
	$codigo = $_POST['codigo'];


	$o_usuarios = new UsuariosModel();
	$o_usuarios->setEmail($email);
	$o_usuarios->setSenha(sha1($senha));


	$dr_usuario = $o_usuarios->get_usuario_by_email();


	if($codigo == sha1(gmdate("Ymd"))) {
	$o_usuarios->update_senha();
		$r = "Senha alterada! Espere um momento. Redirecionando para logar.";
	} else {
		$r = "Email inválido!";
	}

	}

	echo $r;
}

?>
