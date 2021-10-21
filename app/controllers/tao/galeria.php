<?php

require_once("app/controllers/core.php");

function _galeria() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

	if(isset($_POST["adicionar_pagina"])) {
		$titulo=$_POST["titulo"];
		$modulo="Galeria";
    $o_modulos = new ModulosModel();
	    $dr_modulos = $o_modulos->add_modulo($titulo,$modulo,0);
	    header("Location: " .myUrl("tao/galeria/"));
	}

	$modulo = "Galeria";
	if(isset($_GET["modulo"])) {
		$modulo = $_GET["modulo"];
	}

	$data["galeria"]  = "<div class='xxxxx'>";
	$data["galeria"]  .= get_menu($modulo,"0");
	$data["galeria"]  .= "</div>";

	View::do_dump(VIEW_PATH. 'tao/galeria.php',$data);

}

function get_menu($modulo,$idcat) {
	$o_menu = new MenusModel();

	$dr_menu = $o_menu->get_menu_itens($modulo,$idcat,"ordem");
	return $dr_menu; 
}
