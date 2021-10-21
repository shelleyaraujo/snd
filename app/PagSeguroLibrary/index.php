<?php

session_start();

include_once("PagSeguroLibrary.php");

$paymentRequest = new PagSeguroPaymentRequest();  
$m="";
$t="";

foreach ($_SESSION["cart_item"] as $item){
    $preco = number_format($item["preco"]/100,2,".",".");
    if($item["modelo"]!=""){$m=" Mod: " . utf8_decode($item["modelo"]);}
    if($item["tamanho"]!=""){$t=" Tam: " . utf8_decode($item["tamanho"]);}
     if($item["cor"]!=""){$c=" Cor: " . utf8_decode($item["cor"]);}

    $paymentRequest->addItem($item["id"], substr($item["nome"],0,50) . $item["id"] . $m . $t . $c,  $item["quantidade"], $preco); 
}

$paymentRequest->setCurrency("BRL");  


    // Referenciando a transação do PagSeguro em seu sistema  
$paymentRequest->setReference("REF123");  

    // URL para onde o comprador será redirecionado (GET) após o fluxo de pagamento  
$paymentRequest->setRedirectUrl("https://loja.artstao.com.br/pagamento/retorno_pagseguro/");  

    // URL para onde serão enviadas notificações (POST) indicando alterações no status da transação  
$paymentRequest->addParameter('notificationURL', 'https://loja.artstao.com.br/pagamento/notificacao_pagseguro'); 

try {  

        $credentials = PagSeguroConfig::getAccountCredentials(); // getApplicationCredentials()  
        $checkoutUrl = $paymentRequest->register($credentials); 
        
        echo "{$checkoutUrl}";

     //   echo $nome . $_SESSION["pedido"];
        
    } catch (PagSeguroServiceException $e) {  
        die($e->getMessage());  
    }  



    ?>