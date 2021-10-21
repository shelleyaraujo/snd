<?php

require_once("app/controllers/core.php");

function _menu_update_item() {

	$id =  $_POST["id"];
	$idcategoria = $_POST["idcategoria"];

	if($id != $idcategoria) {

	$o_menu = new MenusModel();
	$o_menu->update_item($id, $idcategoria);
	echo "Item alterado.";
} else {
	echo "Não é possivel mudar para si mesmo.";
}

}
