<?php

require_once("app/controllers/core.php");

function _forma_pagamento() { 

  $core=new Core();
  $dr = $core->getData(1,0);

  $data['menu_geral']="";$dr["menu_geral"];
  $data['menu_institucional']=$dr["menu_institucional"];
  $data['menu_rodape']=$dr["menu_rodape"];
  $data['meta_tag']=$dr["meta_tag"];
  $data['config_site']=$dr["config_site"];
  $data['destaques_fixos']=$dr["destaques_fixos"];



  $data['conteudo_texto']="Formas de Pagamento disponíveis.";

  $data['description'] = "Forma de Pagamento";
  $data['keywords'] = "Forma de Pagamento";
  $data['title'] = "Forma de Pagamento";
 // die($_SESSION["cart_item"]);
 // 
 //   $Pedidos = new PedidosModel();
  
$Pedidos = new PedidosModel();
  $Pedidos -> setTipo("1"); # tipo de pedido / o 0 é orçamento o 1 é compra
  $Pedidos -> addPedido();
  $_SESSION["pedido"] = $Pedidos -> getUltimoRegsitro();

  foreach ($_SESSION["cart_item"] as $item){

    $Pedidos->setIdPedido($_SESSION["pedido"]);
    $Pedidos->setIdCatalogo($item["id"]);
    $Pedidos->setTitulo($item["nome"]);
    $Pedidos->setImagem($item["imagem"]);
    $Pedidos->setQuantidade($item["quantidade"]);
    $Pedidos->setPreco($item["preco"]);
    $Pedidos->setCor($item["cor"]);
    $Pedidos->setTamanho(utf8_decode($item["tamanho"]));
    $Pedidos->setModelo(utf8_decode($item["modelo"])); 
    $Pedidos->setPeso($item["peso"]);
    $pedidos = $Pedidos->addPedidoItem();
  }

   // unset($_SESSION["cart_item"]);


  $Usuarios = new UsuariosModel();
  addPedidoUsuario($_SESSION["pedido"],$_SESSION["id_usuario"]);
  //unset($_SESSION["cart_item"]);

  $data["botao_comprar"] = "0";
    $data['conteudo_titulo']="Orçamento";

  if($dr["botao_comprar"] == "1") {
    $data["botao_comprar"] = "1";
      $data['conteudo_titulo']="Forma de Pagamento";

  }

  $r="";


 if(isset($_SESSION["pedido"]))
  {

    $idpedido = $_SESSION["pedido"];

    $Pedidos = new PedidosModel();
    $Pedidos -> setIdPedido($idpedido);
    $pedidos =  $Pedidos->readPedidoItens();

    $r .= "<br>";
    $r .= "<strong>Número do Pedido: " . $idpedido  . "</strong>";;
    $r .= "<br>";
    $r .= "<br>";

    $subtotal = 0;
    $valortotal = 0;

    $i=0;
    foreach($pedidos as $row[]) { 

      $r .= "<img src='". myUrl() ."ImageImagens.php?imagem=". $row[$i][10] ."&w=80&h=50'>";
$r .= "<br>";
     $r .=   $row[$i][3];
      $r .= "<br>";
      if($row[$i][8] != ""){
        $r .= "Tamanho: " .$row[$i][8] . " | ";
      }
      if($row[$i][7] != ""){
        $r .= "Cor: <span style='background-color: #". $row[$i][7] ."; padding: 0 10px'>&nbsp;</span> | ";
      }
      if($row[$i][9] != ""){
        $r .= "Modelo: " .$row[$i][9];
      }
      $r .= "<br>";

      $subtotal = $row[$i][4] * $row[$i][6];

      if($dr["config_site"][0]->cat_botao_comprar == "1") {
      $r .= "Valor: R$ " .  number_format($row[$i][4]/100,2,",",".");
      }
      
      $r .= " - ";
      $r .= "Quant.: " . $row[$i][6];
      $r .= " - ";

      if($dr["config_site"][0]->cat_botao_comprar == "1") {
      $r .= "Sub-total: R$ " . number_format($subtotal/100,2,",",".");
    }
     
      $r .= "<br>";
      $r .= "<hr style='border-top: 1px solid silver;'>";
      $i++;

      $valortotal = $subtotal + $valortotal;
    }

    $r .= "<br>";

    if($dr["config_site"][0]->cat_botao_comprar == "1") {
    $r .= "<strong>Valor Total: R$ " . number_format($valortotal/100,2,",",".") . "</strong>";
    }

    //envia_email($r,$_GET["email"]);

  //  if(isset($_SESSION['pedido'])) {
  //  $r .= $_SESSION['pedido'];
   // }

   // $r .= "<div class='cnt-pedido-enviado'>";      
   // $r .= "Seu orçamento foi enviado,";
   // $r .= "<br>";   
    //$r .= "Entraremos em contato assim que possível.";
   // $r .= "<br>";      
   // $r .= "Número do seu Pedido: " . $idpedido;
   // $r .= "<br>";
   // $r .= "</div>"; 
  }
  
  $data['pedido'] = $r;

  $tema = $dr["config_site"][0]->tema;

  View::do_dump(VIEW_PATH. $tema . '/forma_pagamento.php',$data);
}

function addPedidoUsuario($id_pedido,$idusuario) {

  $ip = get_client_ip_env();
  $Pedidos = new PedidosModel();
  $Pedidos->setId($id_pedido);
  $Pedidos->setIdUsuario($idusuario);
  $Pedidos->setIp($ip);
  $Pedidos -> updatePedidoUsuario();
  return false;
}

function get_client_ip_env() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}


?>