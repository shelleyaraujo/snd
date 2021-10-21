<?php

require_once("app/controllers/core.php");

function _menu_mudar_categoria() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

	$modulo = "";

	if(isset($_GET["modulo"])) {
		$modulo = $_GET["modulo"];
	}

	$data["menu1"] = get_menu("0",$modulo);
	$data["menu2"] = get_menu2("0",$modulo);

	View::do_dump(VIEW_PATH. 'tao/menu_mudar_categoria.php',$data);
}

function get_menu($idcat, $modulo) {
	$o_menu = new MenusModel();

	$dr_menu = $o_menu->get_menu_mudar_categoria($idcat, $modulo,"ordem");
	return $dr_menu;
}

function get_menu2($idcat, $modulo) {
	$o_menu = new MenusModel();

	$dr_menu = $o_menu->get_menu_mudar_categoria2($idcat, $modulo,"ordem");
	return $dr_menu;
}
