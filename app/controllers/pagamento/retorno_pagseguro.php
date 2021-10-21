<?php

require_once("app/controllers/core.php");

function _retorno_pagseguro() { 

  $core=new Core();
  $data = $core->getData(0,0);


  $Pedidos = new PedidosModel();
  $Pedidos -> updatePedidoPagamento($_SESSION["pedido"],$_GET["id_pagseguro"],"pagseguro");



    $data["titulotextomodulo"] = "<h1>Pedido: " . $_SESSION["pedido"] . "</h1>";
    $data["textomodulo"] .= "<h2>Código PagSeguro: " . $_GET["id_pagseguro"] . "</h2>";

    unset($_SESSION["cart_item"]);

  $tema = $data["config_site"][0]->tema;
  View::do_dump(VIEW_PATH. $tema . '/retorno_pagseguro.php',$data);
}


?>

