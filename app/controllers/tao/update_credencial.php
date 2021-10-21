<?php

function _update_credencial() { 

	$r="Credencial alterada!";

	$id = $_POST["id"];
	$credencial = $_POST["credencial"];

	$Menus = new MenusModel();
	$menus = $Menus->update_credencial($id,$credencial);

	echo "xxxx";
}

?>
