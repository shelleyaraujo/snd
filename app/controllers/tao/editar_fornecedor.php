<?php

require_once("app/controllers/core.php");

function _editar_fornecedor() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

	if(isset($_POST["update_fornecedor"])) {
		$Usuarios = new FornecedoresModel();
		$Usuarios->setId($_POST["idfornecedor"]);
		$Usuarios->setNome($_POST["nome"]);
		$Usuarios->setEmail($_POST["email"]);
		$Usuarios->setImagem($_POST["imagem"]);
		$Usuarios->update_fornecedor();
	}

	$o_fornecedors = new FornecedoresModel();
	$o_fornecedors->setId($_GET["idfornecedor"]);
	$dr_fornecedors = $o_fornecedors->readFornecedor();

	$data["idfornecedor"] =$dr_fornecedors[0];
	$data["dma"] =$dr_fornecedors[1]; 
	$data["nome"] =$dr_fornecedors[2];
	$data["email"] =  $dr_fornecedors[3];
	$data["imagem"] = $dr_fornecedors[4];

	View::do_dump(VIEW_PATH. 'tao/editar_fornecedor.php',$data);

}

?>

