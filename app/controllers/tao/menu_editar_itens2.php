<?php

require_once("app/controllers/core.php");

function _menu_editar_itens2() {

	$Config = new ConfigModel();
	$config = $Config->readItensXmlConfig();
	$ordem_menu_catalogo = $config[0]->ordem_menu_catalogo;

	$id=0;

	if(isset($_POST["id"])) {
		$id = $_POST["id"];
	}

	if(isset($_POST["modulo"])) {
		$modulo = $_POST["modulo"];
	}

	$o_menu = new MenusModel();
	$dr_menu = $o_menu->get_menu_itens2($modulo,$id,$ordem_menu_catalogo);

	echo $dr_menu;

}
