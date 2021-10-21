<?php

require_once("app/controllers/core.php");

function _menu_itens_categoria2() {

	$id=0;

	if(isset($_POST["id"])) {
		$id = $_POST["id"];
	}

	$o_menu = new MenusModel();
	$dr_menu = $o_menu->get_menu_mudar_categoria2($id,"ordem");

	echo $dr_menu;

}
