<?php

require_once("app/controllers/core.php");

function _landingpage() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

		$o_modulos = new ModulosModel();


	if(isset($_POST["adicionar_pagina"])) {
		$titulo=$_POST["titulo"];
		$modulo="Landingpage";
	    $dr_modulos = $o_modulos->add_modulo($titulo,$modulo,0);
	    header("Location: " .myUrl("tao/landingpage/"));

	}

	$modulo = "Landingpage";
	if(isset($_GET["modulo"])) {
		$modulo = $_GET["modulo"];
	}

	$data["landingpage"]  = "";
	$data["landingpage"]  .=  "<div class='xxxxx'>";
	$data["landingpage"]  .= get_menu($modulo,"0");
	$data["landingpage"]  .= "</div>";

	View::do_dump(VIEW_PATH. 'tao/landingpage.php',$data);

}

function get_menu($modulo,$idcat) {
	$o_menu = new MenusModel();
	$dr_menu = $o_menu->get_menu_itens($modulo,$idcat,"ordem");
	return $dr_menu; 
}


