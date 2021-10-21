<?php

ini_set('default_charset','UTF-8');

require_once("app/controllers/core.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('plugin/Exception.php');
require_once('plugin/PHPMailer.php');
require_once('plugin/SMTP.php');

function _enviar_orcamento() { 

  $core=new Core();
  $dr = $core->getData(1,0);

  $data['menu_geral']="";$dr["menu_geral"];
  $data['menu_institucional']=$dr["menu_institucional"];
  // $data['menu_lateral']=$dr["menu_lateral"];
  $data['meta_tag']=$dr["meta_tag"];
  $data['config_site']=$dr["config_site"];
  $data['destaques_fixos']=$dr["destaques_fixos"];



  $r = "";

  if(isset($_SESSION["pedido"]))
  {
    $r = "<hr>";
    $r .= "Envio do Pedido";
    $idpedido = $_SESSION["pedido"];

    $Pedidos = new PedidosModel();
    $Pedidos -> setIdPedido($idpedido);
    $pedidos =  $Pedidos->readPedidoItens();

    $r .= "<br>";
    $r .= "Número do Pedido: " . $idpedido;
    $r .= "<br>";

    $subtotal = 0;
    $valortotal = 0;

    $i=0;
    foreach($pedidos as $row[]) { 

      $r .= "<img src='". $dr["config_site"][0]->dns  . myUrl("imagens/imagem.php?&dir=catalogo&w=100&h=50&imagem=") . $row[$i][10] . "' alt='". $row[$i][3] . "' width='100' height='50' style='width: 100px; height: auto' />";
      $r .= "<br>";
      $r .= "Nome do Peoduto: " . $row[$i][3];http://casaejardimvalinhos1.tempsite.ws/imagens//2019-06-28-13-59-08.jpg
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
      $r .= "<hr>";
      $i++;

      $valortotal = $subtotal + $valortotal;
    }

    $r .= "<br>";

    if($dr["config_site"][0]->cat_botao_comprar == "1") {
    $r .= "Valor Total: R$ " . number_format($valortotal/100,2,",",".");
    }

    //envia_email($r,$_GET["email"]);

    if(isset($_SESSION['pedido'])) {
    $r .= $_SESSION['pedido'];
    }

    $r .= "<div class='cnt-pedido-enviado'>";      
    $r .= "Seu orçamento foi enviado,";
    $r .= "<br>";   
    $r .= "Entraremos em contato assim que possível.";
    $r .= "<br>";      
    $r .= "Número do seu Pedido: " . $idpedido;
    $r .= "<br>";
    $r .= "<br>";
    $r .= "<br>";
    $r .= "<br>";    
    $r .= "Agradecemos por seu interesse em nossos produtos.";
    $r .= "<br>";      
    $r .= "A Gerente";
    $r .= "</div>"; 
  }
  
  $data['description'] = "Forma de Pagamento";
  $data['keywords'] = "Forma de Pagamento";
  $data['title'] = "Forma de Pagamento";
  $data['conteudo_titulo'] = "<h1>Pedido Enviado</h1>";
  $data['conteudo_texto'] = $r;

  $tema = $dr["config_site"][0]->tema;
  View::do_dump(VIEW_PATH. $tema . '/orcamento_enviado.php',$data);
}

function envia_email($r,$email) {

 $Usuarios = new UsuariosModel();
 $Usuarios->setEmail($email);
 $dr_usuario = $Usuarios->getUsuarioByEmail();

 $Pedidos = new PedidosModel();
 $Pedidos -> setIdPedido($_SESSION["pedido"]);
 $Pedidos -> setIdUsuario($dr_usuario[0]);
 $Pedidos -> setNome($dr_usuario["nome"]);
 $Pedidos -> setEmail($dr_usuario["email"]);
 $pedidos =  $Pedidos->finalizaPedido();

 $dados_usuario = "ID: " . $dr_usuario[0];
 $dados_usuario .= "<br>";
 $dados_usuario .= "Email: " .$dr_usuario["email"];
 $dados_usuario .= "<br>";
 $dados_usuario .= "Nome: " .$dr_usuario["nome"];
 $dados_usuario .= "<br>";
 $dados_usuario .= "Tel.: " .$dr_usuario["telefone"];
 $dados_usuario .= "<br>";
 $dados_usuario .= "End.: " .$dr_usuario["endereco"] . ", " .$dr_usuario["numero"];
 $dados_usuario .= "<br>";
 $dados_usuario .= "Bairro: " .$dr_usuario["bairro"];
 $dados_usuario .= "<br>";
 $dados_usuario .= "Cidade.: " .$dr_usuario["cidade"] . " / Estado: " .$dr_usuario["estado"];
 $dados_usuario .= "<br>";

 $info = "0";

 $path_xml = "app/config/config.xml";
 $dr = array();
 $xml = simplexml_load_file($path_xml);

 if ($xml === false) {

  $info = "Failed loading XML: ";
  foreach(libxml_get_errors() as $error) {
    $info = $error->message;
  }
} else {
  $xml=simplexml_load_file($path_xml) or die("Error: Cannot create object");
  $dr = $xml->config[0];
}

$remetente = $dr->email_remetente;
$destinatario = $dr->email_destinatario;
$marca = $dr->marca;
$email = $dr_usuario["email"];
$nome = $dr_usuario["nome"];
$para = explode(",", $destinatario); 

$msg = "Pedido de Orçamento pelo site " . $dr->dns;
$msg .= "<br><br>";
$msg .= $dados_usuario;

$msg .= str_replace("dns_da_imagem", $dr->dns, $r);

$assunto = "Pedido de Orçamento pelo site " . $dr->dns;
$mensagem = "";
$mensagem .= $msg;
$mail = new PHPMailer;
$mail->setLanguage('br');                             // Habilita as saídas de erro em Português
$mail->CharSet='UTF-8';                               // Habilita o envio do email como 'UTF-8'

//$mail->SMTPDebug = 3;                               // Habilita a saída do tipo "verbose"

$mail->isSMTP();                                      // Configura o disparo como SMTP
$mail->Host = 'email-ssl.com.br';                        // Especifica o enderço do servidor SMTP da Locaweb
$mail->SMTPAuth = true;                               // Habilita a autenticação SMTP
$mail->Username = 'webmaster@portalprojetos.com.br';                        // Usuário do SMTP
$mail->Password = 't26a05o02@@@@';                          // Senha do SMTP
$mail->SMTPSecure = 'tls';                            // Habilita criptografia TLS | 'ssl' também é possível
$mail->Port = 587;                                    // Porta TCP para a conexão

$mail->From = $remetente;                          // Endereço previamente verificado no painel do SMTP
$mail->FromName = $nome;   
                  // Nome no remetente
foreach ($para as $key => $value) {
  $mail->AddAddress($value); 
}

$mail->addAddress($destinatario, $nome);// Acrescente um destinatário
$mail->addAddress($email, $nome);// Acrescente um destinatário
$mail->addReplyTo('webmaster@portalprojetos.com.br', 'Informação');
$mail->addCC('webmaster@portalprojetos.com.br');
//$mail->addBCC('');

$mail->isHTML(true);                                  // Configura o formato do email como HTML

$mail->Subject = $assunto;
$mail->Body    = $mensagem;
$mail->AltBody = $mensagem;

if(!$mail->send()) {
  $info =  'A mensagem não pode ser enviada';
  $info =  'Mensagem de erro: ' . $mail->ErrorInfo;
} else {
  $info =  '1';
}

if($info == "1") {
  unset( $_SESSION['pedido'] ); 
  return $info;
} else {
  return "Não foi possível enviar o pedido.";
}

}


?>