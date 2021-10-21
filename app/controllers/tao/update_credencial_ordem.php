<?php

function _update_credencial_ordem() { 

	$r="Ordem alterada!";

	$id = $_POST["id"];
	$ordem = $_POST["ordem"];

	$Menus = new MenusModel();
	$menus = $Menus->update_credencial_ordem($id,$ordem);

	echo "xxxx";
}

?>
