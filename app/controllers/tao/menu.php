<?php

require_once("app/controllers/core.php");

function _menu() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");
	$data["menu_titulo"] =  "";

	if(isset($_GET["idcat"])) {
		$idcat = $_GET["idcat"];
		$data["menu_titulo"] = get_modulo_by_id($idcat);
	}

	$modulo="";
	if(isset($_GET["modulo"])) {
		$modulo=$_GET["modulo"];
	}

	switch ($modulo) {
		case 'Catalogo':
		$data["menu"] = get_menu_catalogo($idcat);
		break;
		
		default:
		$data["menu"] = get_menu($idcat);
		break;
	}

	View::do_dump(VIEW_PATH. 'tao/menu.php',$data);
}

function get_menu($idcat) {
	$o_menu = new MenusModel();

	$dr_menu = $o_menu->get_menu($idcat,"ordem");
	return $dr_menu;
}

function get_menu_catalogo($idcat) {
	$o_menu = new MenusModel();
	$dr_menu = $o_menu->get_menu_catalogo($idcat,"ordem");
	return $dr_menu;
}

function get_modulo_by_id($idcat) {
	$o_menu = new MenusModel();
	$modulo = $o_menu->get_modulo_by_id($idcat);
	return $modulo;
}
