<?php

#credits()
# implementa funcao de calculo de preços e prazos 
# para serviços dos correios
#
if( !function_exists( 'calculaFrete' ))
{
   function calculaFrete(
      $cod_servico, /* codigo do servico desejado */
      $cep_origem,  /* cep de origem, apenas numeros */
      $cep_destino, /* cep de destino, apenas numeros */
      $peso,        /* valor dado em Kg incluindo a embalagem. 0.1, 0.3, 1, 2 ,3 , 4 */
      $altura,      /* altura do produto em cm incluindo a embalagem */
      $largura,     /* altura do produto em cm incluindo a embalagem */
      $comprimento, /* comprimento do produto incluindo embalagem em cm */
      $valor_declarado='0' /* indicar 0 caso nao queira o valor declarado */
  ){

      $cod_servico = strtoupper( $cod_servico );
      if( $cod_servico == 'SEDEX10' ) $cod_servico = 40215 ; 
      if( $cod_servico == 'SEDEXACOBRAR' ) $cod_servico = 40045 ; 
      if( $cod_servico == 'SEDEX' ) $cod_servico = 40010 ; 
      if( $cod_servico == 'PAC' ) $cod_servico = 41106 ;

      # ###########################################
      # Código dos Principais Serviços dos Correios
      # 41106 PAC sem contrato
      # 40010 SEDEX sem contrato
      # 40045 SEDEX a Cobrar, sem contrato
      # 40215 SEDEX 10, sem contrato
      # ###########################################

      $correios = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=&sDsSenha=&sCepOrigem=".$cep_origem."&sCepDestino=".$cep_destino."&nVlPeso=".$peso."&nCdFormato=1&nVlComprimento=".$comprimento."&nVlAltura=".$altura."&nVlLargura=".$largura."&sCdMaoPropria=n&nVlValorDeclarado=".$valor_declarado."&sCdAvisoRecebimento=n&nCdServico=".$cod_servico."&nVlDiametro=0&StrRetorno=xml";

      $xml = simplexml_load_file($correios);

      $_arr_ = array();
      if($xml->cServico->Erro == '0'):
         $_arr_['codigo'] = $xml -> cServico -> Codigo ;
         $_arr_['valor'] = $xml -> cServico -> Valor ;
         $_arr_['prazo'] = $xml -> cServico -> PrazoEntrega .' Dias' ;
         // return $xml->cServico->Valor;
         return $_arr_ ; 
     else:
         return false;
     endif;
 }
}
#
# fim da funcao
#


$Config = new ConfigModel();
$config = $Config->readItensXmlConfig();
$cep_origem = $config[0]->cep_loja;
$cep_destino = str_replace("-", "", $_POST["cep_destino"]);
$cep_destino = str_replace("/", "", $cep_destino);
$cep_destino = str_replace(".", "", $cep_destino);
$cep_destino = TRIM($cep_destino);

$peso = 0;
$peso_total = 0;
$preco_total = 0;
$valortotal = 0;
$peso_total =0;
$total_quantidade = 0;
$preco_total = 0;


if(isset($_SESSION["cart_item"])) {
    foreach ($_SESSION["cart_item"] as $item){
      $preco_total = $item["quantidade"]*$item["preco"];
      $valortotal = $preco_total + $valortotal;
      $peso = $item["quantidade"]*$item["peso"];
      $peso_total = $peso + $peso_total;
      $total_quantidade += $item["quantidade"];
      $preco_total = ($item["preco"]*$total_quantidade);
  }
}

  $peso = $peso_total/1000;
   $valor_declarado = number_format($valortotal/100,2,",",".");




$sedex = calculaFrete( 
    '40010', 
    $cep_origem, 
    $cep_destino, 
    1, 
    20, 18, 20, 0 );


$pac = calculaFrete( 
    '41106', 
    $cep_origem, 
    $cep_destino, 
    1, 
    20, 18, 20, 0 );

$r="Erros ao processar ou cep inválido!";

if($cep_origem == $cep_destino) {
    $r="Cep é o mesmo da loja!";
}

$valor_frete=0;


if($sedex) {
   # $r.= "Código: " . $sedex["codigo"] . "<br>";
    $valor_frete = str_replace(",",".",$sedex["valor"]) + str_replace(",",".",$valor_declarado);
    $r  = "<table>";
    $r .= "<tr>";
    $r .= "<td><input type='radio' name='tipo-frete' id='tipo-frete-sedex' /></td>";
    $r .= "<td>SEDEX</td>";
    $r .= "<td>Prazo: " .$sedex["prazo"] . "</td>";
    $r .= "</tr>";

    $r .= "<tr>";
    $r .= "<td></td>";
    $r .= "<td>Frete:</td><td>R$ " . $sedex["valor"] . "</td>";
    $r .= "</tr>";


    $r .= "<tr>";
    $r .= "<td></td>";
    $r .= "<td>Valor Total: </td><td>R$ " . number_format($valor_frete,2,",",".") . "</td>";
    $r .= "</tr>";
    $r .= "</table>";

}

if($pac) {
    $valor_frete = str_replace(",",".",$pac["valor"]) + str_replace(",",".",$valor_declarado);
    $r  .= "<table>";
    $r .= "<tr>";
    $r .= "<td><input type='radio' name='tipo-frete' id='tipo-frete-pac' /></td>";
    $r .= "<td>PAC</td>";
    $r .= "<td>Prazo: " .$pac["prazo"] . "</td>";
    $r .= "</tr>";

    $r .= "<tr>";
    $r .= "<td></td>";
    $r .= "<td>Frete:</td><td>R$ " . $pac["valor"] . "</td>";
    $r .= "</tr>";


    $r .= "<tr>";
    $r .= "<td></td>";
    $r .= "<td>Valor Total: </td><td>R$ " . number_format($valor_frete,2,",",".") . "</td>";
    $r .= "</tr>";
    $r  .= "</table>";

}

echo $r;
die();

?>



