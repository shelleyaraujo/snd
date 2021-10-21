<?php

function _cadastra_usuario() { 

	$Config = new ConfigModel();
	$config = $Config->readItensXmlConfig();

	$_SESSION["nome"] = $_POST["nome"];
	$_SESSION["telefone"] = $_POST["telefone"];
	$_SESSION["endereco"] = $_POST["endereco"];
	$_SESSION["bairro"] = $_POST["bairro"];
	$_SESSION["complemento"] = $_POST["complemento"];
	$_SESSION["cidade"] = $_POST["cidade"];
	$_SESSION["estado"] = $_POST["estado"];
	$_SESSION["cep"] = $_POST["cep"];
	$_SESSION["cpf"] = $_POST["cpf"];
	$_SESSION["cnpj"] = $_POST["cnpj"];
	$_SESSION["email"] = $_POST["novo_email"];
	$_SESSION["novo_email"] = $_POST["novo_email"];

	$info = "";

	$senha1 = sha1($_POST["senha1"]);
	$senha2 = sha1($_POST["senha2"]);

	if($senha1 != $senha2){
		$info = "As senhas não conferem!";
	}

	if (strlen($_POST["senha1"])<9) {
		$info = "A senha deve ter no mínimo 9 digitos!";
	}

	if (strlen($_POST["nome"])<3) {
		$info = "Digite o nome!";
	}

	if (strlen($_POST["telefone"]) < 7) {
		$info = "Digite o telefone corretamente!";
	}		

	if($_POST["cadastrar_pessoa"] == "cpf") {
		if (strlen($_POST["cpf"]) < 11) {
			$info = "Digite o cpf corretamente!";
		}
	}

	if($_POST["cadastrar_pessoa"] == "cnpj") {
		if (strlen($_POST["cnpj"]) < 14) {
			$info = "Digite o cnpj corretamente!";
		}
	}

	if (strlen($_POST["endereco"])<3) {
		$info = "Digite o endereço!";
	}

	if (strlen($_POST["bairro"]) == "") {
		$info = "Digite o bairro!";
	}

	if (strlen($_POST["cidade"]) == "") {
		$info = "Digite a cidade!";
	}

	if (strlen($_POST["estado"])<2) {
		$info = "Digite o estado!";
	}

	if (strlen($_POST["cep"])<8) {
		$info = "Digite o cep corretamente!";
	}

	$novo_email = $_POST["novo_email"];
	if (!filter_var($novo_email, FILTER_VALIDATE_EMAIL)) {
		$info = "Email inválido!"; 
	}

	$cpf = $_POST["cpf"];
	$cpf = str_replace(".","", $cpf);
	$cpf = str_replace(",","", $cpf);
	$cpf = str_replace(" ","", $cpf);
	$cpf = str_replace("-","", $cpf);
	$cpf = str_replace("/","", $cpf);


	$cnpj = $_POST["cnpj"];
	$cnpj = str_replace(".","", $cnpj);
	$cnpj = str_replace(",","", $cnpj);
	$cnpj = str_replace(" ","", $cnpj);
	$cnpj = str_replace("-","", $cnpj);
	$cnpj = str_replace("/","", $cnpj);



	$Usuarios = new UsuariosModel();
	$Usuarios->setSenha($senha1);			
	$Usuarios->setNome($_POST["nome"]);
	$Usuarios->setTelefone($_POST["telefone"]);
	$Usuarios->setEndereco($_POST["endereco"]);
	$Usuarios->setBairro($_POST["bairro"]);
	$Usuarios->setComplemento($_POST["complemento"]);
	$Usuarios->setCidade($_POST["cidade"]);
	$Usuarios->setEstado($_POST["estado"]);
	$Usuarios->setCep($_POST["cep"]);
	$Usuarios->setCpf($cpf);
	$Usuarios->setCnpj($cnpj);
	$Usuarios->setEmail($_POST["novo_email"]);
	$Usuarios->setDma(date('Y-m-d H:i:s'));
	$Usuarios->setDmaNascimento("0000-00-00");



	if($info == ""){

		$Usuarios->addUsuario();

		$drUsuario = $Usuarios->getUltimoRegsitro();


		$_SESSION["id_usuario"] = $drUsuario["id"];

			//$this->finalizaPedido($_SESSION["pedido"],$drUsuario[0],$_POST["nome"],$_POST["email"]);	
		if($drUsuario["id"] > 0) {
			//echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '. myUrl('pagamento/forma_pagamento/') .'">';
			//addPedidoUsuario($_SESSION["pedido"],$drUsuario["id"]);
			//if($config[0]->cat_botao_comprar == "0"){ 
			//	echo myUrl('pagamento/enviar_orcamento/?email=' . $_POST["novo_email"]);
			//} else { 
			//	echo myUrl('pagamento/forma_pagamento/');
			//}

			echo myUrl('pagamento/forma_pagamento/');

		} else {
			echo "0"; 
		}
	}
	else{
		//echo "<div class='info'>";
			//echo "<a id='url-back' href='".  $_SESSION["url"] . "' class='button'>Algo saiu errado. Volte e corrija os dados de cadastro para continuar.</a>";
		//echo "<p>" . $info ."</p>";
		echo $info;
		//echo "</div>";
	}
	//	echo $this->validarCPF("470.392.165-09") . "xxxxxxxx";

	echo "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
}

function addPedidoUsuario($id_pedido,$idusuario) {
	$Pedidos = new PedidosModel();
	$Pedidos->setId($id_pedido);
	$Pedidos->setIdUsuario($idusuario);
	$Pedidos -> updatePedidoUsuario();
	return false;
}

?>