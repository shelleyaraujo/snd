<?php

function _pag_seguro() { 

    //  const PAGSEGURO_TOKEN_SANDBOX = "A299FDCF2E9446FFA3ABBA27F17E9C08";
  //  9F28A5F676763A4BB4882FA815D34F51


  $Config = new ConfigModel();
  $config = $Config->readItensXmlConfig();
  
     //$token = "A299FDCF2E9446FFA3ABBA27F17E9C08"; // TOKEN SANDBOX 
    $token = $config[0]->token_pagseguro; // TOKEN PRODUCAO
    // $email_loja = $config[0]->email_loja;
     $currency = $config[0]->currency;

     $peso = 100;
     $valortotal = 0;
     $i=0;
     $item=0;
     $data['token'] = $token;
     $data['email'] = 'shelleyaraujo@gmail.com'; // .$email_loja;   
     $data['currency'] = 'BRL' . $currency;  //'BRL'



     foreach ($_SESSION["cart_item"] as $item){
      $preco = number_format($item["preco"]/100,2,".",".");
      if($item["modelo"]!=""){$m=" Mod: " . utf8_decode($item["modelo"]);}
      if($item["tamanho"]!=""){$t=" Tam: " . utf8_decode($item["tamanho"]);}
      if($item["cor"]!=""){$c=" Cor: " . utf8_decode($item["cor"]);}
      $data['itemId'. $item] = $item["id"];
      $data['itemQuantity'. $item] = $item["quantidade"];
      $data['itemDescription'. $item] = substr($item["nome"],0,50);
      $data['itemWeight'. $item] = $peso;
      $data['itemAmount'. $item] = $preco;

  } 

      echo $data['token'] . $data['email'] . $data['itemAmount'. $item];


    //$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout'; ## SANDBOX
    $url = 'https://ws.pagseguro.uol.com.br/v2/checkout'; ## PRODUCAO



    $datax = http_build_query($data);
    $curl = curl_init($url);


    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $datax);
    curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

    $xml= curl_exec($curl);

     if($xml == 'Unauthorized') {

        echo "xxxxxxxxxxxxxx";
     }

    
    curl_close($curl);
    

echo $xml;

    $xml = simplexml_load_string($xml);
    $json = json_encode($xml);
    $arr = json_decode($json,true);


    
    echo $xml -> code;

    if($xml == 'Unauthorized'){
      $return = 'Não Autorizado';
      echo $return;
      exit;
  }

 


  //echo $data['token'] . $data['email'];


}


?>