<?php

if(!isset($_SESSION["logado"]) || $_SESSION["logado"] == "0"){
	header('Location: ' . myUrl('tao/logar/') );
}


require_once("app/controllers/core.php");

function _index() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

	$data["usuario"] = "";

	if(isset($_SESSION["id"])) {
		$data["usuario"] = "Seu ID: <span style='color: skyblue'>" . $_SESSION["id"] . "</span>";
		$data["usuario"] .= "<br>";
		$data["usuario"] .= "<br>";
		$data["usuario"] .= "Olá! <span style='color: skyblue'>" . $_SESSION["usuario"] . "</span>, ";
		$data["usuario"] .= "<br>";
		$data["usuario"] .= "você esta na Área Administrativa da sua conta.";
		$data["usuario"] .= "<br>";
		$data["usuario"] .= "<br>";
		$data["usuario"] .= "Dúvidas ou sugestões envie email para:";
		$data["usuario"] .= "<br>";
		$data["usuario"] .= "<span style='color: skyblue'>shelleyaraujo@gmail.com</span>";
	}


	View::do_dump(VIEW_PATH. 'tao/home.php',$data);
}

?>
