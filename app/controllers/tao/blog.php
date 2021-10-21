<?php

require_once("app/controllers/core.php");

function _blog() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

		$o_modulos = new ModulosModel();


	if(isset($_POST["adicionar_pagina"])) {
		$titulo=$_POST["titulo"];
		$modulo="Blog";
	    $dr_modulos = $o_modulos->add_modulo($titulo,$modulo,0);
	    header("Location: " .myUrl("tao/blog/"));

	}

	$modulo = "Blog";
	if(isset($_GET["modulo"])) {
		$modulo = $_GET["modulo"];
	}

	$data["blog"]  = "";
	$data["blog"]  .=  "<div class='xxxxx'>";
	$data["blog"]  .= get_menu($modulo,"0");
	$data["blog"]  .= "</div>";

	View::do_dump(VIEW_PATH. 'tao/blog.php',$data);

}

function get_menu($modulo,$idcat) {
	$o_menu = new MenusModel();
	$dr_menu = $o_menu->get_menu_itens($modulo,$idcat,"ordem");
	return $dr_menu; 
}

