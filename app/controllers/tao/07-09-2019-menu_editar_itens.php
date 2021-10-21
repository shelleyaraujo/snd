<?php

require_once("app/controllers/core.php");

function _menu_editar_itens() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

	$modulo = "Pad";
	if(isset($_GET["modulo"])) {
		$modulo = $_GET["modulo"];
	}

	$data["menu1"] = get_menu($modulo,"0");

	View::do_dump(VIEW_PATH. 'tao/menu_editar_itens.php',$data);
}

function get_menu($modulo,$idcat) {
	$o_menu = new MenusModel();

	$dr_menu = $o_menu->get_menu_itens($modulo,$idcat,"ordem");
	return $dr_menu; 
}
