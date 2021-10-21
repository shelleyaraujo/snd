<?php

function _ordenar_menu() { 

	$r="Não foi ppossivel reordenar o menu.";

	if(isset($_POST['id'])) {
		$o_menus = new MenusModel();
		$id = explode(",", $_POST['id']);
		$ordem = explode(",", $_POST['ordem']);
		$i=0;
		foreach ($id as $row[]) {
		$o_menus->update_ordem_menu($row[$i],$ordem[$i]);
		$i++;
		}

		$r = "<a href='' style='color: white; display: block; height: 100%'>Itens de Menu Reordenados!</a>";
	}

	echo $r;

}

?>
