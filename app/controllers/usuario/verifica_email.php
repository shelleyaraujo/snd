<?php

function _verifica_email($email="0") { 

	$Usuarios = new UsuariosModel();
	$Usuarios->setEmail($_POST["email"]);
    $resultado = $Usuarios->verificaEmail();

	echo $resultado["nome"];

}

?>