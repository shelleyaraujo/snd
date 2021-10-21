<?php

require_once("app/controllers/core.php");

function _usuario_itens_pedido() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

	if(isset($_SESSION["id"])) {
    if(isset($_GET["idpedido"])) {
     $data["pedidos"] = readPedidos($_GET["idpedido"],$_SESSION["id"]);
   }
 }	

 View::do_dump(VIEW_PATH. 'tao/usuario_pedidos.php',$data);
}

function readPedidos($id_pedido) {

  $r="";
  $Pedidos = new PedidosModel();
  $Pedidos -> setIdPedido($id_pedido);
  $Pedidos -> setId($id_pedido);
  $pedidos =  $Pedidos->readPedidoItens();    
  $dr_pedido =  $Pedidos->getPedidoById();

  $r .="<h2>Número do Pedido " . $id_pedido ."</span></h2>";

  $r .= "<div>";
  $r .= "Forma de Pagamento: <span style='color: skyblue'>" . $dr_pedido[7] . "</span>";
  $r .= "<br>";
  $r .= "Cód. do Pagamento: <span style='color: skyblue'> " . $dr_pedido[11]. "</span>";
  $r .= "<br>";
  $r .= "<br>";
  $r .= "</div>";

  switch ($dr_pedido[7]) {
    case 'pagseguro':
    $r .= "<a href='javascript:void(0)' onclick=notificacao_pagseguro('". $dr_pedido[11] ."','". $dr_pedido[0] ."') class='button-vazado'>Verificar Status</a>";
    $r .= "<br>";
    $r .= "<div id='status_transacao' style='color: green; background-color: lightblue; padding: 10px;border: 1px solid lightblue'></div>";
    $r .= "<br>";
    break;
  }

  $r .= "<div>";
  $r .= "<a class='button' href='javascript:void(0)' onclick='dados_cliente(". $dr_pedido[2]  .")'>Exibir Dados do Cliente</a>";
  $r .= "<div class='cnt-dados-do-cliente'>";
  $r .= "";
  $r .= "</div>";
  $r .= "</div>";

  $r .= "<div id='cnt-loader' style='display: block; position: relative'>";
  $r .= "<div id='loader'></div>";
  $r .= "</div>";

  $r .="<div class='cnt-pedidos'>";
  $r.="<ul class='pedidos'>";
  $r .= "<li class='pedidos-cabecalho'>";
  $r .= "<div class='itens'>Produto</div>";
  $r .= "<div class='preco'>P. Unit.</div>";
  $r .= "<div class='quantidade'>Quant.</div>";
  $r .= "<div class='sub-total'>Sub-Total</div>";
  $r .= "</li>";

  $subtotal = 0;
  $valortotal = 0;

  $i=0;

  foreach($pedidos as $row[]) { 

    $r .= "<li id='row". $row[$i][0] ."'>";
    $r .= "<div class='itens'>";
    $r .= $row[$i][3] . "</br>";
    $r .= "<img src='". myUrl("ImageImagens.php?imagem=" .  $row[$i][10] . "&w=80&h=50") ."'>" . "</br>";
    if($row[$i][8] != ""){
      $r .= "Tamanho: " .$row[$i][8] . " / ";
    }
    if($row[$i][7] != ""){
      $r .= "Cor: <span style='background-color: #". $row[$i][7] ."; padding: 0 10px'>&nbsp;</span> / ";
    }
    if($row[$i][9] != ""){
      $r .= "Modelo: " .$row[$i][9] . "</br>";
    }

    $r .= "</div>";  

    $subtotal = $row[$i][4] * $row[$i][6];

    $r .= "<div class='preco'>R$ " .  number_format($row[$i][4]/100,2,",",".")   . "</div>";
    $r .= "<div class='quantidade'>";

    $r .= $row[$i][6];

    $r .= "</div>"; 

    $r .= "<div class='sub-total'>R$ " . number_format($subtotal/100,2,",",".") . "</div>";

    $r .= "</li>";

    $i++;

    $valortotal = $subtotal + $valortotal;
  }

  $r .= "<li class='pedidos-rodape'>";
  $r .= "<div class='itens'></div>";
  $r .= "<div class='preco'></div>";
  $r .= "<div class='quantidade total'>Total: </div>";
  $r .= "<div class='total'>R$ " . number_format($valortotal/100,2,",",".");
  $r .= "</div>";
  $r .= "</li>";
  $r.="</ul>";
  $r.="</div>";

  return $r;
}

?>

