<?php

function _excluir_pedido() { 

	$r="Não foi ppossivel escluir este oedido.";

	if(isset($_POST['id'])) {
	$o_pedidos = new PedidosModel();
	$o_pedidos->setId($_POST['id']);
	$o_pedidos->delete_pedido();
	$r = "Pedido excluído!";
	}

	echo "XXXX";
}

?>
