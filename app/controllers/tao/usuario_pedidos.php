<?php

require_once("app/controllers/core.php");

function _usuario_pedidos() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

	if(isset($_SESSION["usuario"])) {
   $data["pedidos"] = readPedidos($_SESSION["id"]);
	}	

	View::do_dump(VIEW_PATH. 'tao/usuario_pedidos.php',$data);
}


function readPedidos($id_usuario) {

  $x=0;
  $y=0;
  $fechado = 1;
  $tipo = 0;
  $pago="<span style='color:red'>Não</span>";

  if(isset($_REQUEST["x"]))
  {
    $x = $_REQUEST["x"];
  }

  if(isset($_REQUEST["y"]))
  {
    $y = $_REQUEST["y"];
  }

  if(isset($_REQUEST["tipo"]))
  {
    $_SESSION["tipo"] = $_REQUEST["tipo"];
  }

  if(isset($_SESSION["tipo"]))
  {
    $tipo = $_SESSION["tipo"];
  }

  if(isset($_SESSION["id_usuario"]))
  {
    $id_usuario =  $_SESSION["id_usuario"];
  }

  $drPedidos = array();
  $Pedidos = new PedidosModel();

  $drPedidos = $Pedidos -> readPedidos(10, $x, $y, "id desc", $id_usuario, 1);

  $r  = "<table class='tabela-pedidos'>";      
  $r .= "<thead>";
  $r .= "<th>N Pedido</th>";
  $r .= "<th>Data</th>";
  $r .= "<th>Forma Pag.</th>";
   // $r .= "<th>Peso</th>";
  $r .= "<th>IP</th>";
  $r .= "<th>Pago</th>";
  $r .= "<th>End</th>";
  $r .= "</thead>";
  $i=0;
  $item=1;

  $vitrine="";


  foreach ($drPedidos as $row[])
  {
    if ($row[$i][0] == "#p#") {

      $pg = str_replace("page","Pedidos",$row[$i][1]);

    } else if ($row[$i][0] > 0) {

      $r .= "<tr>";
      $r .= "<td>";
      $r .= "<a href='". myUrl("tao/usuario_itens_pedido/?idpedido=". $row[$i][0]) . "'>". $row[$i][0] . "</a>";
      $r .= "</td>";

      $dma = new DateTime($row[$i][1]);
      $r .= "<td>";
      $r .= "<a href='". myUrl("tao/usuario_itens_pedido/?idpedido=". $row[$i][0]) . "'><span style='color:skyblue'>" . $dma->format('d/m/Y h:i:s') . "</span></a>";
      $r .= "</td>";

      $r .= "<td>";
      $r .= "<span style='color:skyblue'>" . $row[$i][24] . "</span>";
      $r .= "</td>";

      //  $r .= "<td>";
      //  $r .= $row[$i][4];
      //  $r .= "</td>";

      $r .= "<td>";
      $r .= $row[$i][9];
      $r .= "</td>";

      if($row[$i][20]=="1"){
        $pago="<span style='color:green'>Sim</span>";
      }

      $r .= "<td>";
      $r .= $pago;
      $r .= "</td>";

      $r .= "<td style='font-size: 14px; text-align:left'>";
      $r .= "<div class='cnt-dados-usuario'>";
      $r .= $row[$i][13] . " ";
      $r .= $row[$i][23] . "<br />";
      $r .= $row[$i][14] . "<br />";
      $r .= $row[$i][12] . "<br />";
      $r .= $row[$i][15] . "<br />";
      $r .= $row[$i][16] . " / ";
      $r .= $row[$i][17] . " / ";
      $r .= $row[$i][18] . "<br />";
      $r .= $row[$i][19] ;
      $r .= "</div>";
      $r .= "</td>";
      $r .= "</tr>";

      $i++;
      $item++;
      $pago="<span style='color:red'>Não</span>";
    }
  }

  $r .= "</table>";
  $r .= $pg;

  return $r;

}

function readPedidosItens($idpedido){

  $drPedidos = array();
  $Pedidos = new PedidosModel();
  $Pedidos -> setIdPedido($idpedido);
  $drPedidos = $Pedidos -> readPedidosItens();

  $quantidade= 0;
  $preco= 0;
  $peso= 0;
  $totalquantidade= 0;
  $totalpreco= 0;
  $totalpeso= 0;

  $r = "<table class='tabela-pedido-itens'>";      
  $r .= "<thead>";
  $r .= "<th>Itens</th>";
  $r .= "<th>Id Catalogo</th>";
  $r .= "<th>Descrição</th>";
  $r .= "<th>Quant.</th>";
  $r .= "<th>Preço</th>";
  $r .= "<th>Peso/G</th>";

  $r .= "</thead>";
  $i=0;

  $item=1;

  $vitrine="";

  foreach ($drPedidos as $row[])
  {
    $quantidade=$row[$i][5];
    $preco=$row[$i][6];
    $peso=$row[$i][7];

    $r .= "<tr>";

    $r .= "<td>";
    $r .= $item;
    $r .= "</td>";

    $r .= "<td>";
    $row[$i][0] . "'>";
    $r .= $row[$i][2];
    $r .= "</td>";

    $r .= "<td>";
    $r .= "<img src='views/ImageImagem.php?w=10&h=10&imagem=". $row[$i][4] . "' alt='". $row[$i][4] . "' style='width: 50px' />";
    $r .= "<br />";      
    $r .= $row[$i][3];
    $r .= "<br />";      
    $r .= "Cor: <span style='background:#". $row[$i][8] ."; padding: 0 5px; color: white'>". $row[$i][8] . "</span>";
    $r .= "<br />";
    $r .= "Tamanho: ". $row[$i][9];
    $r .= "<br />";
    $r .= "Modelo: ". $row[$i][10];
    $r .= "</td>";

    $r .= "<td>";
    $row[$i][0] . "'>";
    $r .= $quantidade;
    $r .= "</td>";

    $total = $preco * $quantidade;

    $r .= "<td>";
    $row[$i][0] . "'>";
    $r .= "R$ " . number_format($total/100,2,",",".");
    $r .= "</td>";

    $peso = $peso * $quantidade;

    $r .= "<td>";
    $row[$i][0] . "'>";
    $r .= $peso;
    $r .= "</td>";


    $r .= "</tr>";

    $totalquantidade = $totalquantidade+$quantidade;
    $totalpreco = $totalpreco+$total;
    $totalpeso = $totalpeso+$peso;

    $i++;

    $item++;
  }

  $r .= "<tr>";
  $r .= "<td colspan='3' style='text-align: right'>";
  $r .= "Total Geral:";
  $r .= "</td>";    
  $r .= "<td>";
  $r .= $totalquantidade;
  $r .= "</td>";
  $r .= "<td>";
  $r .= "R$ " . number_format($totalpreco/100,2,",",".");
  $r .= "</td>";
  $r .= "<td>";
  $r .= $totalpeso;
  $r .= "</td>";
  $r .= "</tr>";

  $r .= "</table>";


  return $r;
}



?>

