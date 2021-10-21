<?php

require_once("app/controllers/core.php");

function _pedidos() {

  $core=new Core(); 
  $data = $core->getData($id="1",$idcat="0");

  $data["pedidos"] = readPedidos();

  View::do_dump(VIEW_PATH. 'tao/pedidos.php',$data);
}


function readPedidos() {

  $x=0;
  $y=0;
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

  $drPedidos = $Pedidos -> readPedidos(10, $x, $y, "id desc", "0", "0");

  $r  = "<table class='tabela-pedidos'>";      
  $r .= "<thead>";
  $r .= "<th>N Pedido</th>";
  $r .= "<th>Data</th>";
  $r .= "<th>Forma Pag.</th>";
   // $r .= "<th>Peso</th>";
  $r .= "<th>IP</th>";
  $r .= "<th>Pago</th>";
  $r .= "<th>Dados</th>";
  $r .= "<th>Ex</th>";
  $r .= "</thead>";
  $i=0;
  $item=1;

  $vitrine="";
  $checkedpago = "";

  foreach ($drPedidos as $row[])
  {
    if ($row[$i][0] == "#p#") {

      $pg = str_replace("page","Pedidos",$row[$i][1]);

    } else if ($row[$i][0] > 0) {

      $r .= "<tr id='row". $row[$i][0] ."'>";
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

      if($row[$i][20] == "1"){
        $checkedpago="checked";
      }

      $r .= "<td>";
      $r .= "<input id='item". $row[$i][0] . "' type='checkbox' ". $checkedpago ." name='pago' onclick=set_pago('". $row[$i][0] ."')>";
      $r .= "</td>";

      $r .= "<td>";
      $r .= dados_usuario($row[$i][2]);
      $r .= "</td>";

      $r .= "<td><a class='icone-lixo' href='javascript:void(0)' onclick=excluir_pedido('". $row[$i][0] ."')></a></td>";

      $r .= "</tr>";

      $i++;
      $item++;
      $checkedpago="";
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


function dados_usuario($id_usuario) {

 $r ="Sem Dados!";

 $id = 0;
 $dma = ""; 
 $nome = "";
 $endereco="";
 $numero="";
 $telefone = "";    
 $bairro = ""; 
 $complemento=""; 
 $cidade = "";  
 $estado = "";  
 $cep="";  
 $cpfcnpj = "";
 $rg="";
 $email ="";
 $site = "";
 
 if($id_usuario > 0) {
  $o_usuarios = new UsuariosModel();
  $o_usuarios->setId($id_usuario);
  $dr_usuarios = $o_usuarios->readUsuario();

  $dma = date('d/m/Y H:i:s', strtotime($dr_usuarios[1]));
   // $dma = str_replace("-","",$dma);
   // $dma = str_replace(":","",$dma);
    //$dma = str_replace(" ","",$dma);
   // $dma = str_replace("00:00:00","",$dma);



    if(isset($dr_usuarios[0])) {
      $id = $dr_usuarios[0];
      $nome = $dr_usuarios[3];
      $endereco=$dr_usuarios[4];
      $numero=$dr_usuarios[5];
      $telefone = $dr_usuarios[6];    
      $bairro = $dr_usuarios[7]; 
      $complemento=$dr_usuarios[8]; 
      $cidade = $dr_usuarios[9];  
      $estado = $dr_usuarios[10];  
      $cep=$dr_usuarios[11];  
      $cpfncpj = $dr_usuarios[12];
      $rg=$dr_usuarios[13];
      $mail =$dr_usuarios[14];
      $site = $dr_usuarios[15];
    }

    $r = "<div class='cnt-dados-usuario'>"; 
    $r .= "ID:" . $id . "<br/>"; 
    $r .= "Data: " . $dma . "<br/>";
    $r .= "Nome: " . $nome . "<br/>";
    $r .= "Endereco: " . $endereco . ", ";
    $r .= "Numero: " .   $numero . "<br/>";
    $r .= "Telefone: " .   $telefone . "<br/>";    
    $r .= "Bairro: " .   $bairro . " - "; 
    $r .= "Complemento: " .   $complemento . "<br/>"; 
    $r .= "Cidade: " .   $cidade . " - ";  
    $r .= "Estado: " .   $estado . " - ";  
    $r .= "Cep: " .   $cep . "<br/>";  
    $r .= "CPFCNPJ: " .   $cpfcnpj . " - ";  
    $r .= "RG: " .   $rg . "<br/>"; 
    $r .= "Email: " .  "<a style='color:red' href='mailto:". $email."'>" . $email . "</a>" . " - ";
    $r .= "Site: " .   $site . "<br/>"; 
    $r .= "</div>"; 
  }

  return $r;
}

?>

