<?php
ini_set('default_charset','UTF-8');

require_once("app/controllers/core.php");

function _login() { 

  $core=new Core();
  $dr = $core->getData(1,0);

  $data['menu_geral']="";
   $data['meta_tag']=$dr["meta_tag"];
  $data['config_site']=$dr["config_site"];
  $data['destaques_fixos']=$dr["destaques_fixos"];
  $data['conteudo_titulo'] = "<h1>Login / Cadastro</h1>";
  $data['conteudo_texto']="";

  $tema = $dr["config_site"][0]->tema;

  $data['description'] = "";
  $data['keywords'] = "";
  $data['title'] = "";

  $data['body'][]=View::do_fetch(VIEW_PATH.$tema.'/login_form.php');

  View::do_dump(VIEW_PATH. $tema . '/cadastro.php',$data);

}

























function _add_quantidade($item="0",$q="1") {

  $quantidade = 0;
  $quantidade = $_GET["quantidade"] + 1;

  if($quantidade <= 5){ // AQUI PODE CONTROLAR A QUANTIDADE QUE ODE VENDER
    $iditem = $_GET["iditem"];
    $Pedidos = new PedidosModel();
    $Pedidos->setIdItem($iditem);
    $Pedidos->setQuantidade($quantidade);
    $pedidos = $Pedidos->updatePedidoItemQuantidade();
  }
  $this->openAction();

}

function removeQuantidadeAction(){

  $quantidade = 0;
  $quantidade = $_GET["quantidade"] - 1;

  if($quantidade > 0){
    $iditem = $_GET["iditem"];
    $Pedidos = new PedidosModel();
    $Pedidos->setIdItem($iditem);
    $Pedidos->setQuantidade($quantidade);
    $pedidos = $Pedidos->updatePedidoItemQuantidade();
  }
  $this->openAction();

}

function deleteItemAction(){

  $iditem = $_GET["iditem"];
  $Pedidos = new PedidosModel();
  $Pedidos->setId($iditem);
  $pedidos = $Pedidos->deleteItem();

  $this->openAction();

}

function logarAction() {

  $idpedido = $_SESSION["pedido"];
  $senha = $_POST["senha"];
  $email = $_POST["email"];

  $Usuarios = new UsuariosModel();
  $Usuarios->setSenha(sha1($senha));
  $Usuarios->setEmail($email);  
  $usuarios = $Usuarios->logar();


  //die($usuarios[0]);

  if($usuarios[0] > 0) {

    $Usuarios->setId($usuarios[0]);  
    $usuario = $Usuarios->getUsuarioById();

    $cep = $usuario[11];

    $_SESSION["id_usuario"] = $usuario[0];
    $_SESSION["email"] = $email;

    $cadastro = "Id: " . $usuario[0] . "<br />";
    $cadastro .= "Data: " . $usuario[1] . "<br />";
    $cadastro .= "Data Nasc.:" . $usuario[2] . "<br />";
    $cadastro .= "Nome: " . $usuario[3] . "<br />";
    $cadastro .= "End.: " . $usuario[4] . "<br />";
    $cadastro .= "Numero: " . $usuario[19] . "<br />";
    $cadastro .= "DDD: " . $usuario[5] . "<br />";
    $cadastro .= "Tel.: " . $usuario[6] . "<br />";
    $cadastro .= "Bairro: " . $usuario[7] . "<br />";
    $cadastro .= "Complemento: " . $usuario[8] . "<br />";
    $cadastro .= "Cidade: " . $usuario[9] . "<br />";
    $cadastro .= "Estado: " . $usuario[10] . "<br />";
    $cadastro .= "Cep: " . $cep . "<br />";
    $cadastro .= "CPF: " . $usuario[12] . "<br />";
    //$cadastro .= "RG: " . $usuario[13] . "<br />";
    $cadastro .= "Email: " . $usuario[14] . "<br />";
    $cadastro .= "Site: " . $usuario[15] . "<br />";

    $Pedidos = new PedidosModel();
    $Pedidos -> setIdPedido($_SESSION["pedido"]);
    $Pedidos -> setIdUsuario($usuario[0]);
    $Pedidos -> setNome($usuario[3]);
    $Pedidos -> setEndereco($usuario[4]);
    $Pedidos -> setNumero($usuario[19]);
    $Pedidos -> setTelefone($usuario[6]);
    $Pedidos -> setBairro($usuario[8]);
    $Pedidos -> setComplemento($usuario[7]);
    $Pedidos -> setCidade($usuario[9]);
    $Pedidos -> setEstado($usuario[10]);
    $Pedidos -> setCep($usuario[11]);
    $Pedidos -> setEmail($usuario[14]);
    $Pedidos -> setIp($_SERVER["REMOTE_ADDR"]);
    $Pedidos -> setTipo("1");
    $dr = $this->readPedidoItensFinalizado($idpedido);
    $Pedidos -> setPreco($dr[0]);
    $Pedidos -> setPeso($dr[1]);


    $drPedidos = $Pedidos -> finalizaPedido();

    // SE FOR ABRIR A JANELO DO PAGSEGURO, DESATIVAR A LINHA ABAIXO //
   //header("Location: ?controle=PagSeguroCheckout&acao=open");
    
    $r = "<div class='container'>";
    $r .= "<div class='box-6'>";
    $r .= "$cadastro";
    $r .= "</div>";
    $r .= "<div class='box-6'>";

  //  $r .= $this->calculaFrete($cep,$idpedido,"04510");
   // $r .= "<br /><br />";
   // $r .= $this->calculaFrete($cep,$idpedido,"04014"); 

    $r .= "<br /><br />";
    $r .= "<h2>";
    $r .= "Clique no botão abaixo para continuar...";
    $r .= "</h2>";
    $r .= "<p>";
    $r .= "<input value='PAGSEGURO' onclick=enviaPagseguro('PAGSEGURO') type='image' src='https://stc.pagseguro.uol.com.br//img/botoes/pagamentos/209x48-comprar-assina.gif' alt='Pague com PagSeguro - é rápido, grátis e seguro!' />";
   // $r .= "<a href='?controle=PagSeguroCheckout&acao=open' class='button'><img src='https://stc.pagseguro.uol.com.br//img/botoes/pagamentos/209x48-comprar-assina.gif' alt='Pague com PagSeguro - é rápido, grátis e seguro!' /></a>";
    $r .= "</p>";
    $r .= "</div>";
    $r .= "</div>";

  } else {
    $r="<div class='text-center'><span style='color: red'>Usuário não Cadastrado !</span>  &nbsp;&nbsp;";
    $r.="<a id='open-cadastro' class='button'>Fazer Cadastro</a>";
    $r .= "</div>";
  }

  require_once("_core.php");

  $meta[6] = "Pedidos Frete";
  $meta[7] = "Pedidos Frete";
  $meta[8] = "Pedidos Frete";
  $conteudo = 'xxx';


  $dr[1] = $r;
  $dr[5] = "";
  $dr[6] = $meta;

  $tema = $dr[15] . "/";
  $Pagina = new View($tema . 'pedido_compra_frete.phtml'); 
  $Pagina->setParams($dr);
  $Pagina->showContents();

}


function addUsuarioAction() {

  require_once("_core.php");   

  $r="<div class='text-center'><span style='color: red'>Usuário já Cadastrado !</span>  &nbsp;&nbsp;";
  $r.="<a id='open-autenticacao' class='button'>Fazer Login</a>";
  $r .= "</div>";

  $tema = $dr[15] . "/";
  $Pagina = new View($tema . 'pedido_compra.phtml');     
  $senha = "";

  if(isset($_SESSION["nome"])){
    //$_SESSION["dia"] = $_POST["dia"];
    //$_SESSION["mes"] = $_POST["mes"];
    //$_SESSION["ano"] = $_POST["ano"];
    $_SESSION["nome"] = $_POST["nome"];
    $_SESSION["telefone"] = $_POST["telefone"];
    $_SESSION["endereco"] = $_POST["endereco"];
    $_SESSION["numero"] = $_POST["numero"];
    $_SESSION["bairro"] = $_POST["bairro"];
    $_SESSION["complemento"] = $_POST["complemento"];
    $_SESSION["cidade"] = $_POST["cidade"];
    $_SESSION["estado"] = $_POST["estado"];
    $_SESSION["cep"] = $_POST["cep"];
    $_SESSION["email"] = $_POST["email"];
  }
  
  $idpedido = $_SESSION["pedido"];
  $senha1 = $_POST["senha1"];
  $senha2 = $_POST["senha2"];
  $email = $_POST["email"];

  if($senha1 == $senha2) {
    $senha = $senha1;
  }

  //$dma_nascimento = $_POST["ano"] . "-" . $_POST["mes"] . "-" . $_POST["dia"];
  $dma_nascimento = "0000" . "-" . "00" . "-" . "00";

  if($senha !="") {
    $Usuarios = new UsuariosModel();
    $Usuarios->setSenha(sha1($senha));
    $Usuarios->setDmaNascimento($dma_nascimento);  
    $Usuarios->setNome($_POST["nome"]);
    $Usuarios->setEmail($_POST["email"]);
    $Usuarios->setTelefone($_POST["telefone"]);
    $Usuarios->setEndereco($_POST["endereco"]);
    $Usuarios->setNumero($_POST["numero"]);
    $Usuarios->setBairro($_POST["bairro"]);
    $Usuarios->setComplemento($_POST["complemento"]);
    $Usuarios->setCidade($_POST["cidade"]);
    $Usuarios->setEstado($_POST["estado"]);
    $Usuarios->setCep($_POST["cep"]);
    $Usuarios->setCpfCnpj($_POST["cpfcnpj"]);

    if($Usuarios->getTotalRegistrosUsuario() == 0){

      $usuarios = $Usuarios->addUsuario();
    // CARREGA OS DADOS DO USUARIO //
    // PELA SENHA E EMAIL DIGITADOS //
      $Usuarios->setSenha(sha1($senha));
      $Usuarios->setEmail($email);  
      $usuarios = $Usuarios->logar();

      if(isset($usuarios[0])) {

        $Usuarios->setId($usuarios[0]);  
        $usuario = $Usuarios->getUsuarioById();

        $cep = $usuario[11];

        $_SESSION["id_usuario"] = $usuario[0];


        $dma = $usuario[1]; 

      /*
      $dma = str_replace("-","",$dma);
      $dma = str_replace(":","",$dma);
      $dma = str_replace(" ","",$dma);
      $d = DateTime::createFromFormat("YmdHis", $dma);
      $dma = $d->format("d/m/Y H:i:s"); // or any you want

      $dmanasc = "$usuario[2]"; 
      $dmanasc = str_replace("-","",$dmanasc);
      $dmanasc = str_replace(":","",$dmanasc);
      $dmanasc = str_replace(" ","",$dmanasc);
      $dd = DateTime::createFromFormat("YmdHis", $dmanasc);
      $dmanasc = $dd->format("d/m/Y H:i:s"); // or any you want
      $dmanasc = str_replace("00:00:00","",$dmanasc);
      */

      $dma = str_replace("-","",$dma);
      $dma = str_replace(":","",$dma);
      $dma = str_replace(" ","",$dma);      
      $dma = date('d/m/Y H:i:s',strtotime($dma));

      $dmanasc = $usuario[2]; 
      $dmanasc = date('d/m/Y',strtotime($dmanasc));

      $cadastro = "Id: " . $usuario[0] . "<br />";
      $cadastro .= "Data: " . $dma . "<br />";
      $cadastro .= "Data Nasc.: " . $dmanasc . "<br />";
      $cadastro .= "Nome: " . $usuario[3] . "<br />";
      $cadastro .= "End.: " . $usuario[4] . "<br />";
      $cadastro .= "Tel.: " . $usuario[6] . "<br />";
      $cadastro .= "Bairro: " . $usuario[7] . "<br />";
      $cadastro .= "Complemento: " . $usuario[8] . "<br />";
      $cadastro .= "Cidade: " . $usuario[9] . "<br />";
      $cadastro .= "Estado: " . $usuario[10] . "<br />";
      $cadastro .= "Cep: " . $cep . "<br />";
      $cadastro .= "Cpf/Cnpj: " . $usuario[12] . "<br />";
      $cadastro .= "RG: " . $usuario[13] . "<br />";
      $cadastro .= "Email: " . $usuario[14] . "<br />";
      $cadastro .= "Site: " . $usuario[15] . "<br />"; 

      $Pedidos = new PedidosModel();
      $Pedidos -> setIdPedido($_SESSION["pedido"]);
      $Pedidos -> setIdUsuario($usuario[0]);
      $Pedidos -> setNome($usuario[3]);
      $Pedidos -> setEndereco($usuario[4]);
      $Pedidos -> setNumero($usuario[19]);
      $Pedidos -> setTelefone($usuario[6]);
      $Pedidos -> setBairro($usuario[8]);
      $Pedidos -> setComplemento($usuario[7]);
      $Pedidos -> setCidade($usuario[9]);
      $Pedidos -> setEstado($usuario[10]);
      $Pedidos -> setCep($usuario[11]);
      $Pedidos -> setEmail($usuario[14]);
      $Pedidos -> setIp($_SERVER["REMOTE_ADDR"]);
      $Pedidos -> setTipo("1");
      $Pedidos -> setPreco($this->readPedidoItensFinalizado($idpedido));

      $Pedidos -> finalizaPedido();

      // SE FOR ABRIR A JANELO DO PAGSEGURO, DESATIVAR A LINHA ABAIXO //
      // header("Location: ?controle=PagSeguroCheckout&acao=open");


      $r = "<div class='container'>";
      $r .= "<div class='box-6'>";
      $r .= $cadastro;
      $r .= "</div>";
      $r .= "<div class='box-6'>";

    //  $r .= $this->calculaFrete($cep,$idpedido,"04510");
    //  $r .= "<br /><br />";
    //  $r .= $this->calculaFrete($cep,$idpedido,"04014"); 

      $r .= "<br /><br />";
      $r .= "<h2>";
      $r .= "Clique no botão abaixo para continuar...";
      $r .= "</h2>";
      $r .= "<p>";
      $r .= "<input value='PAGSEGURO' onclick=enviaPagseguro('PAGSEGURO') type='image' src='https://stc.pagseguro.uol.com.br//img/botoes/pagamentos/209x48-comprar-assina.gif' alt='Pague com PagSeguro - é rápido, grátis e seguro!' />";
     // $r .= "<a href='?controle=PagSeguroCheckout&acao=open' class='xbutton'><img src='https://stc.pagseguro.uol.com.br//img/botoes/pagamentos/209x48-comprar-assina.gif' alt='Pague com PagSeguro - é rápido, grátis e seguro!' /></a>";
      $r .= "</p>";
      $r .= "</div>";
      $r .= "</div>";

      $tema = $dr[15] . "/";
      $Pagina = new View($tema . 'pedido_compra_frete.phtml');     


    }
    else {
      $r = "Usuário não cadastrado !";
    }


  //  $Pagina = new View('views/pedido_compra_frete.phtml');

    
  }
    // CARREGA $rd COM OS DADOS DO USUARIO //

  $meta[6] = "Pedidos Frete";
  $meta[7] = "Pedidos Frete";
  $meta[8] = "Pedidos Frete";
  $conteudo = '';

  require_once("_core.php");   

  $dr[1] = $r;
  $dr[5] = "";
  $dr[6] = $meta;

  $Pagina->setParams($dr);
  $Pagina->showContents();

}

}

function calculaFrete($cep,$id_pedido,$servico){

  $Pedidos = new PedidosModel();
  $Pedidos -> setIdPedido($id_pedido);
  $pedidos =  $Pedidos->readPedidoItens();

  $peso = 0;
  $valortotal = 0;
  $i=0;
  foreach($pedidos as $row[]) { 
    $valortotal = $row[$i][4] * $row[$i][6] + $valortotal;
    $peso = $row[$i][5] * $row[$i][6]  + $peso;
    $i++;
  }


/*servico: Modalidade de frete, modalidadas válidas:
04510 - PAC (código antigo 41106 , alterado em 05/05/2017)
04014 - SEDEX (código antigo 40010, alterado em 05/05/2017)
40045 - SEDEX a Cobrar
40215 - SEDEX 10
40290 - SEDEX Hoje
$cep_origem: CEP de origem, utilize apenas números!
$cep_destino: CEP de destino, utilize apenas números!
$peso: Peso da encomenda, qualquer valor entre 0.3 e 30 kg.
$mao_propria: Entrega na sua casa, só são aceitos dois valores 's' e 'n', se for passado outro valor a função entenderá como 'n'
$valor_declarado: Valor declarado da encomenda, se desejar declarar, por exemplo, R$1,00, use 100.
$aviso_recebimento: Aviso de recebimento, só são aceitos dois valores 's' e 'n', se for passado outro valor a função entenderá como 'n'
Abaixo o exemplo de uso:
04014 - Sedex
97032120 - CEP de origem
71939360 - CEP de destino
2 - Peso (2 kilos)
n - Mão própria
700 - Valor declarado (R$7,00)
s - Aviso de recebimento
*/

$Config = new ConfigModel();
$config = $Config->readItensXmlConfig();


$servico = $servico;
$cep_origem = $config[0]->cep_loja;
$cep_destino= $cep;
$peso= $peso/1000;
$mao_propria="s";
$valor_declarado= $valortotal; //"0";
$aviso_recebimento= "s";

$r = "";  

$mao_propria = (strtolower($mao_propria) == 's')?'s':'n';

$aviso_recebimento = (strtolower($aviso_recebimento) == 's')?'s':'n';

$url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=&sDsSenha=&sCepOrigem='. $cep_origem .'&sCepDestino='. $cep_destino .'&nVlPeso='. $peso .'&nCdFormato=1&nVlComprimento=20&nVlAltura=5&nVlLargura=15&sCdMaoPropria='. $mao_propria .'&nVlValorDeclarado='. $valor_declarado .'&sCdAvisoRecebimento='. $aviso_recebimento .'&nCdServico='. $servico .'&nVlDiametro=0&StrRetorno=xml';;

$frete_calcula = simplexml_load_string(file_get_contents($url));

$frete = $frete_calcula->cServico;

if($frete->Erro == '0'){
  switch($frete->Codigo){
    case "04510": $servico = 'PAC'; break;
    case "40045": $servico = 'SEDEX a Cobrar'; break;
    case "40215": $servico = 'SEDEX 10'; break;
    case "40290": $servico = 'SEDEX Hoje'; break;
    default: $servico = 'SEDEX'; 
  }
  
  $retorno = "<span class='button' onclick=setFrete('". $servico ."') name='frete'>" . $servico . "</span><br>";
  $retorno .= 'Valor: R$ '.$frete->Valor.'<br>';
  $retorno .= 'Prazo de entrega: '.$frete->PrazoEntrega.' dia(s)';
  
}elseif($frete->Erro == '7'){

  $retorno = 'Serviço temporariamente indisponível, tente novamente mais tarde.';
  
}else{

  $retorno = 'Erro no cálculo do frete, código de erro: '.$frete->Erro;
  
}

if($frete->Valor > "0,00") {
  return $retorno;  
} else {
  return "Digite um cep válido!";
}


}


function updatePedidoFretePagamentoAction() {

  $Pedidos = new PedidosModel();
  $Pedidos -> setIdPedido($_SESSION["pedido"]);
  $Pedidos -> setFrete($_POST["frete"]);
  $Pedidos -> setPagamento($_POST["formapagamento"]);

  $pedidos =  $Pedidos->updatePedidoFretePagamento();

}

function calcularFreteAction() {
  echo $this->calculaFrete($_POST["cep_frete"],$_POST["id_pedido"],"04014");
  echo "<br /><br />";
  echo $this->calculaFrete($_POST["cep_frete"],$_POST["id_pedido"],"04510");  
}


function pagSeguroAction() {

 $Pedidos = new PedidosModel();
 $Pedidos -> setIdPedido($_SESSION["pedido"]);
 $pedidos =  $Pedidos->readPedidoItens();

 $Config = new ConfigModel();
 $config = $Config->readItensXmlConfig();
    //$token = "A299FDCF2E9446FFA3ABBA27F17E9C08"; // TOKEN SANDBOX 
    $token = $config[0]->token_pagseguro; // TOKEN REAL
    $email_loja = $config[0]->email_loja;
    $currency = $config[0]->currency;
    
    
    $peso = 0;
    $valortotal = 0;
    $i=0;
    $item=0;
    $data['token'] ='' . $token;
    $data['email'] = '' .$email_loja;   
    $data['currency'] = '' . $currency;  //'BRL'


    foreach($pedidos as $row[]) { 
      $item++;
      $v = number_format($row[$i][4]/100,2,",",".");
      $v = str_replace(".","",$v);
      $v = str_replace(",",".",$v);

      $data['itemId'. $item] = $row[$i][0];
      $data['itemQuantity'. $item] = $row[$i][6];
      $data['itemDescription'. $item] = $row[$i][3];
      $data['itemWeight'. $item] = $row[$i][5];
      $data['itemAmount'. $item] = $v;
      $i++;   
    }
    

    //$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout'; // SANDBOX
    $url = 'https://ws.pagseguro.uol.com.br/v2/checkout'; // REAL

    $data = http_build_query($data);
    
    $curl = curl_init($url);
    
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    $xml= curl_exec($curl);
    
    curl_close($curl);
    
    $xml= simplexml_load_string($xml);
    
    echo $xml -> code;
    
    if($xml == 'Unauthorized'){
      $return = 'Não Autorizado';
      echo $return;
      exit;
    }

  }

  function compra_finalizadaAction() {
    echo "Compra Finalizada";
  }


  function notificacaoAction() {
    echo "Retorno";
  }

  function pagSeguroTransparenteAction() {

    $Pedidos = new PedidosModel();
    $Pedidos -> setIdPedido($_SESSION["pedido"]);
    $pedidos =  $Pedidos->readPedidoItens();
    
    $peso = 0;
    $valortotal = 0;
    $i=0;
    $item=0;

    foreach($pedidos as $row[]) { 
      $item++;
      $v = number_format($row[$i][4]/100,2,",",".");
      $v = str_replace(".","",$v);
      $v = str_replace(",",".",$v);

      $pedido[$item][0] = $row[$i][0];
      $pedido[$item][1] = $row[$i][3];
      $pedido[$item][2] = $v;
      $pedido[$item][3] = $row[$i][6];
      $pedido[$item][4] = $row[$i][5];
      $i++;   
    }

    $_SESSION["itens_pedido"] = $pedido;

    header("Location: /pagseguro/checkout.php");
  }

  function readPedidoItensFinalizado($idpedido){

    $Pedidos = new PedidosModel();
    $Pedidos -> setIdPedido($idpedido);
    $pedidos =  $Pedidos->readPedidoItens();

    $peso = 0;
    $valortotal = 0;
    $i=0;
    $dr=array();
    foreach($pedidos as $row[]) { 
      $valortotal = $row[$i][4] * $row[$i][6] + $valortotal;
      $peso = $row[$i][5] * $row[$i][6]  + $peso;
      $i++;
    }

    $dr[0] = $valortotal;
    $dr[1] = $peso;

    return $dr;
  }


  ?>