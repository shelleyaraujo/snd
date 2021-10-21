<?php

function _set_ativo() { 

	$r="Não foi ppossivel ativar este item.";

	if(isset($_POST['id'])) {
		$o_catalogo = new CatalogoModel();
		$o_catalogo->set_ativo($_POST['id'],$_POST['ativo']);
		
		if($_POST['ativo']=="1") {
			$r = "Item ativado!";
		} else {
			$r = "Item desativadoe!";
		}
	}

	echo $r;
}

?>
