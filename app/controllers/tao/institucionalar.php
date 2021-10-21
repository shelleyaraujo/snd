<?php

require_once("app/controllers/core.php");

function _institucionalar() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

	if(isset($_POST["adicionar_pagina"])) {
		$titulo=$_POST["titulo"];
		$modulo="Institucionalar";
		$o_modulos = new ModulosModel();
	    $dr_modulos = $o_modulos->add_modulo($titulo,$modulo,0);
	    header("Location: " .myUrl("tao/institucionalar/"));

	}

	$modulo = "institucionalar";
	if(isset($_GET["modulo"])) {
		$modulo = $_GET["modulo"];
	}

	$data["institucionalar"]   = "<div class='xxxxx'>";
	$data["institucionalar"]  .= get_menu($modulo,"0");
	$data["institucionalar"]  .= "</div>";

	View::do_dump(VIEW_PATH. 'tao/institucionalar.php',$data);

}

function get_menu($modulo,$idcat) {
	$o_menu = new MenusModel();
	$dr_menu = $o_menu->get_menu_itens($modulo,$idcat,"ordem");
	return $dr_menu; 
}