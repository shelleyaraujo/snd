<?php

require_once("app/controllers/core.php");

function _notificacao_pagseguro_() { 

  $core=new Core();
  $dr = $core->getData(1,0);



  $info = "info";
      $resposta ="";

  //header("access-control-allow-origin: https://sandbox.pagseguro.uol.com.br");

  $Config = new ConfigModel();
  $config = $Config->readItensXmlConfig();

    $token = $config[0]->token_pagseguro; // TOKEN REAL
    $email = $config[0]->email_loja;
    $id_transacao = $_GET["id_transacao"]; //"A9ABBF79-9A98-40F3-92C4-2A28B5EBFCE3";

  //  if(isset($_POST['notificationType']) && $_POST['notificationType'] == 'transaction'){

    $url = "https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/". $id_transacao ."?email=". $email ."&token=" . $token;

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $transaction= curl_exec($curl);
    curl_close($curl);

    if($transaction == 'Unauthorized'){
      print_r("nao autorizado");
      exit;
    }
    $transaction = simplexml_load_string($transaction);

    $status = $transaction -> status;

    $resposta ="";

    switch ($status) {

      case '1':
      $resposta = "Aguardando pagamento";
      break;
      case '2':
      $resposta = "Em análise";
      break;
      case '3':
      $resposta = "Pagamento Realizado";
      break;
      case '4':
      $resposta = "Disponível";
      break;
      case '5':
      $resposta = "Em disputa";
      break;
      case '6':
      $resposta = "Devolvida";
      break;
      case '7':
      $resposta = "Cancelada";
      break;    
      case '8':
      $resposta = "Debitado";
      break;   
      case '8':
      $resposta = "Retenção temporária";
      break;   
      default:
      $resposta = "Sem resposta";
      break;
    }

 //   }

      $Pedidos = new PedidosModel();

  $Pedidos -> updatePedidoPagamentoStatus($_GET["id_pedido"],$resposta);


    echo $resposta;
}

  


  ?>