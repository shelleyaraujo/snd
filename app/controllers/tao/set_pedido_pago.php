<?php

function _set_pedido_pago() { 

	$r="Não foi ppossivel alterar este item.";

	if(isset($_POST['id'])) {
		$o_pedidos = new PedidosModel();
        $o_pedidos -> setId($_POST['id']);
		$r = $o_pedidos->set_pago($_POST['pago']);
		
		if($_POST['pago']=="1") {
			$r = "Item alterado como pago!";
		} else {
			//$r = "Item alterado como não pago!";
		}
	}

	echo $r;
}

?>
