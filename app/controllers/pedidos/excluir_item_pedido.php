<?php

function _excluir_item_pedido() { 

	$r="Não foi ppossivel excluir o item.";

	if(isset($_POST['id'])) {
		$o_pedidos = new PedidosModel();
		$o_pedidos->delete_item($_POST['id']);
		$r="Item excluido.";
	}

	echo $r;
}

?>
