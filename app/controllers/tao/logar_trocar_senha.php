<?php

require_once("app/controllers/core.php");

function _logar_trocar_senha() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

	$data["email"]= "";
	$data["codigo"]= "";

	if(isset($_GET["email"]) && isset($_GET["codigo"])) {
		$data["email"]= $_GET["email"];
		$data["codigo"]= $_GET["codigo"];
	}

	View::do_dump(VIEW_PATH. 'tao/trocar_senha.php',$data);

}

?>
