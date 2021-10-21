<?php

function _excluir_cliente() { 

	$r="Não foi ppossivel escluir este cliente.";

	if(isset($_POST['id'])) {
	$o_clientes = new ClientesModel();
	$o_clientes->delete_cliente($_POST['id']);
	$r = "Cliente Excluido!";
	}

	echo $r;
}

?>
