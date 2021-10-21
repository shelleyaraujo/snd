<?php

function _logar_esqueci_senha() { 

	$o_config = new ConfigModel();
	$config = $o_config->readItensXmlConfig();
	$r="";

	$o_usuarios = new UsuariosModel();
	$o_usuarios->setEmail($_POST["email"]);		
	$dr_usuarios = $o_usuarios->verificaEmail();

	if($dr_usuarios["email"] != "0" && $dr_usuarios["email"] != "") {

		$codigo = sha1(gmdate("Ymd"));
		$dns = $config[0] -> dns;
		$marca = $config[0] -> marca;
		$remetente = $config[0] -> email_remetente;
		$mensagem = "";
		$mensagem .= "Caro(a) usuário";
		$mensagem .= "\r\n";
		$mensagem .= "<br>";
		$mensagem .= "Por razões de segurança não enviamos sua senha atual.";
		$mensagem .= "\r\n";
		$mensagem .= "\r\n";
		$mensagem .= "<br>";
		$mensagem .= "Em vez disso, você pode criar uma nova senha clicando no link abaixo:";
		$mensagem .= "\r\n";
		$mensagem .= "http://". $dns ."/tao/logar_trocar_senha/?email=". $dr_usuarios["email"] ."&codigo=". $codigo;	
		$mensagem .= "\r\n";
		$mensagem .= "\r\n";
		$mensagem .= "<br>";
		$mensagem .= "<br>";
		$mensagem .= "Por favor observe que você só pode utilizar o link durante um período limitado.";
		$mensagem .= "\r\n";
		$mensagem .= "<br>";
		$mensagem .= "<br>";
		$mensagem .= "Atenciosamente";
		$mensagem .= "\r\n";
		$mensagem .= $marca;
		$mensagem .= "\r\n";
		$mensagem .= $dns;
		
		$info = "1";

		require_once('./plugin/class.phpmailer.php');
		$remetente = $config[0]->email_remetente;
		$destinatario = $dr_usuarios["email"];
		$marca = $config[0]->marca;
		$email = $dr_usuarios["email"];
		$nome = "Nome: " . $dr_usuarios["nome"];;
		$assunto = "Troca de Senha (" . $dns . ")";
		$mensagem = $mensagem;
		$destinatario .= "," . $remetente; 
		$para = explode(",", $destinatario); 

		$msg = "";
		$msg .= "\r\n";
		$msg .= $dr_usuarios["email"];;
		$msg .= "\r\n";
		$msg .= "\r\n";
		$msg .= $dr_usuarios["nome"];;
		$msg .= "\r\n";
		$msg .= "\r\n";
		$msg .= $mensagem;
		$msg .= "\r\n"; 

			$mail = new PHPMailer();
 $mail->IsSMTP(); // enable SMTP
 $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
 $mail->SMTPAuth = true; // authentication enabled
 //$mail->SMTPSecure = 'SSL'; // secure transfer enabled REQUIRED for Gmail
 $mail->Host = "mail.artstao.com.br";
 $mail->Port = 587; // or 587
 $mail->IsHTML(true);
 $mail->Username = $remetente;
 $mail->Password = "tao011820TAO@@@";
 $mail->SetFrom($remetente);

		$mail->Subject = utf8_decode($assunto);

		$mail->Body = $msg;
 $mail->AddAddress("shelleyaraujo@gmail.com");
  

		foreach ($para as $key => $value) {
			$mail->AddAddress($value); 
		}

    if(!$mail->Send()) {
       echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
      if($info == "1") {
			$info = "<p>Verifique sua caixa de email e siga as instruções.<p>";
		} else {
			$info = "";
		}
    }

echo $info;
	}

}

?>
