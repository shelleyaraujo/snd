<?php

require_once("app/controllers/core.php");

function _cliente() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

	if(isset($_POST["update_cliente"])) {
		update_cliente();
	}

	$o_clientes = new ClientesModel();
	$o_clientes->setId($_SESSION["id"]);

	if($_SESSION["credencial"] == 0 && isset($_GET["id"])) {
		$o_clientes->setId($_GET["id"]);
	}

	$Config = new ConfigModel();
	$config = $Config->readItensXmlConfig();

	$dr_clientes = $o_clientes->readCliente();

	$data["cliente"] = "ID: <span style='color: red'>" . $_SESSION["id"] . "</span><br>";
	$data["cliente"] .= "Data do Cadastro: <span style='color: red'>" . $dr_clientes[1]. "</span><br>";
	$data["cliente"] .= "Email: <span style='color: red'>" . $dr_clientes[14]. "</span><br>";

	$data["id"] =$dr_clientes[0];
	$data["dma"] =$dr_clientes[1]; 
	$data["dmanascimento"] =$dr_clientes[2]; 
	$data["nome"] =$dr_clientes[3];
	$data["endereco"] =$dr_clientes[4];
	$data["numero"] =  $dr_clientes[5];
	$data["telefone"] =  $dr_clientes[6];    
	$data["bairro"] =  $dr_clientes[7]; 
	$data["complemento"] =  $dr_clientes[8]; 
	$data["cidade"] =  $dr_clientes[9];  
	$data["estado"] =  $dr_clientes[10];  
	$data["cep"] =  $dr_clientes[11];  
	$data["cpf"] =  $dr_clientes[12];  
	$data["rg"] =  $dr_clientes[13]; 
	$data["email"] =  $dr_clientes[14];
	$data["site"] =  $dr_clientes[15]; 
	$data["imagem"] = $dr_clientes[18];
	$data["cnpj"] =  $dr_clientes[20];  

	View::do_dump(VIEW_PATH. 'tao/cliente.php',$data);

}


function update_cliente() {

	$Clientes = new ClientesModel();
	$Clientes->setId($_POST["id"]);
	$Clientes->setNome($_POST["nome"]);
	$Clientes->setEndereco($_POST["endereco"]);
	$Clientes->setNumero($_POST["numero"]);
	$Clientes->setTelefone($_POST["telefone"]);
	$Clientes->setBairro($_POST["bairro"]);
	$Clientes->setComplemento($_POST["complemento"]);
	$Clientes->setCidade($_POST["cidade"]);
	$Clientes->setEstado($_POST["estado"]);
	$Clientes->setCep($_POST["cep"]);
	$Clientes->setCpf($_POST["cpf"]);
	$Clientes->setCnpj($_POST["cnpj"]);  
	$Clientes->setEmail($_POST["email"]);
  $Clientes->setRg($_POST["rg"]);

	$Clientes->update_cliente();

	if(isset($_POST['excluir']))
	{
		$Clientes->setId($_POST['id']);
		$Clientes->deleteCliente();
	}
	else{
		if(isset($_POST["cliente_ativo"])) {
		}  else {
		}
	}  

}

?>

