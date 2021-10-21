<?php

require_once("app/controllers/core.php");

function _xmenu_itens_categoria() {

	$id=0;

	if(isset($_POST["id"])) {
		$id = $_POST["id"];
	}

	$o_menu = new MenusModel();
	$dr_menu = $o_menu->get_menu_mudar_categoria($id,"ordem");

	echo $dr_menu;

}
