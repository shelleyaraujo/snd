<?php

function _set_vitrine() { 

	$r="Não foi ppossivel colocar na vitrine este item.";

	if(isset($_POST['id'])) {
		$o_catalogo = new CatalogoModel();
		$o_catalogo->set_vitrine($_POST['id'],$_POST['vitrine']);
		
		if($_POST['vitrine']=="1") {
			$r = "Item colocado na vitrine!";
		} else {
			$r = "Item retirado da vitrine!";
		}
	}

	echo $r;
}

?>
