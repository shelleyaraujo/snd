<?php

function _remove_quantidade($iditem="0",$quantidade="1") { 

  $quantidade = $quantidade + 1;

  if($quantidade <= 5){ // AQUI PODE CONTROLAR A QUANTIDADE QUE ODE VENDER
    $iditem = $iditem;
    $Pedidos = new PedidosModel();
    $Pedidos->setIditem($_POST["id_item"]);
    $pedidos = $Pedidos->updatePedidoItemQuantidade("remove");
  }

}

?>