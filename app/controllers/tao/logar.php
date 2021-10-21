<?php

require_once("app/controllers/core.php");

function _logar() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

	if(isset($_POST["esqueci-senha"])) {
		$email = $_POST["email"];

		echo enviar_email($email);

		die();
	}

	if(isset($_GET["logar"])) {
		if($_GET["logar"] == "0") {
			unset($_SESSION["logado"]);
			unset($_SESSION["credencial"]);
			//session_destroy();
			//header('Location: ' . myUrl('main/') );
			echo '
			<div id="cnt-loader">
			...
			<div id="loader"></div>
			</div>

			<script>
			setTimeout(function() {
				window.location.href = "/main/";
				}, 5000);

				</script>

				';
				die();
			}
		} 

		$data["info"] = "";

		if(isset($_POST["email"])) {

			$o_usuarios = new UsuariosModel();
			$o_usuarios->setEmail($_POST["email"]);
			$o_usuarios->setSenha(sha1($_POST["senha"]));

			$dr_usuario = $o_usuarios->logar();

			if($dr_usuario["id"] == "0") {
				$data["info"] = "Erro: Email inválido ou senha incorreta.";
			} else {
				$_SESSION["id"] = $dr_usuario["id"];
				$_SESSION["usuario"] = $dr_usuario["nome"];
				$_SESSION["email"] = $dr_usuario["email"];
				$_SESSION["credencial"] = $dr_usuario["credencial"];
				$_SESSION["logado"] = "1";
		    //header('Location: ' . myUrl('tao/index/') );

				echo '
				<div id="cnt-loader">
				<div id="loader"></div>
				</div>

				<script>

				setTimeout(function() {
					window.location.href = "/tao/";
					}, 5000);

					</script>

					';
					die();
				}
			}	

			View::do_dump(VIEW_PATH. '/tao/logar.php',$data);

		}


		function enviar_email() {

			$Config = new ConfigModel();
			$config = $Config->readItensXmlConfig();

			$o_usuarios = new UsuariosModel();
			$o_usuarios->setEmail($_POST["email"]);		
			$dr_usuarios = $o_usuarios->verificaEmail();

			return $dr_usuarios[1];
		}


		function xenviar_email() {

			$info = "1";

			$path_xml = myUrl("/app/config/config.xml");
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

			require_once('/plugin/class.phpmailer.php');
			$remetente = $dr->email_remetente;
			$destinatario = $dr->email_destinatario;
			$marca = $dr->marca;
			$destino = $destinatario;
			$email = $_POST['email'];
			$nome = "Nome: " . $_POST['nome'];
			$assunto = $_POST['assunto'];
			$mensagem = $_POST['mensagem'];
			$destinatario .= "," . $remetente; 
			$para = explode(",", $destinatario); 

			$msg = "";
			$msg .= "\r\n";
			$msg .= $email;
			$msg .= "\r\n";
			$msg .= "\r\n";
			$msg .= utf8_decode($nome);
			$msg .= "\r\n";
			$msg .= "\r\n";
			$msg .= utf8_decode($mensagem);
			$msg .= "\r\n"; 

			$mailer = new PHPMailer();
			$mailer->IsSMTP();
			$mailer->SMTPDebug = 1;
			$mailer->Port = 465; 
			$mailer->Host = 'mail.artstao.com.br'; 
			$mailer->SMTPAuth = true; 
			$mailer->Username = $remetente; 
			$mailer->Password = 'tao011820TAO@@@'; 
			$mailer->FromName = utf8_decode($assunto); 
			$mailer->From = $remetente; 

			foreach ($para as $key => $value) {
				$mailer->AddAddress($value); 
			}

			$mailer->Subject = utf8_decode($assunto);
			$mailer->Body = $msg;
			$info = $mailer->Send();

			return $info;

		}

		?>
		<style>

			#cnt-loader {
				position: relative;
				display: -webkit-box;
				display: -moz-box;
				display: -ms-flexbox;
				display: -webkit-flex;
				display: flex;  
				align-items: center;
				align-content: center;
				justify-content: center;
				flex-wrap: wrap;
				box-sizing: border-box;
				width: 100%;
				height: 100%;
				background-color: aliceblue;
			}

			#loader {
				position: absolute;

 border: 15px solid black; 
  border-right: 15px solid red; 
  border-top: 15px solid gold; 
  border-bottom: 15px solid dodgerblue; 

  				width: 100px;
				height: 100px;
				border-radius: 50%;
				animation: spin 2s linear infinite;
				top: 50%;
				left: 50%;
				margin-left: -50px;
				margin-top: -50px;
				box-sizing: border-box;
			}

			@keyframes spin {
				0% { transform: rotate(0deg); }
				100% { transform: rotate(360deg); }
			}

			@keyframes spin {
				0% { transform: rotate(0deg); }
				100% { transform: rotate(360deg); }
			}

		</style>