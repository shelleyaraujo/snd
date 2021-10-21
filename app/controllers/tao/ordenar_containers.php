<?php

function _ordenar_containers() { 

	$r="Não foi ppossivel reordenar o container.";

	if(isset($_POST['id'])) {
		$o_container = new ModulosModel();
		$id = explode(",", $_POST['id']);
		$ordem = explode(",", $_POST['ordem']);
		$i=0;
		foreach ($id as $row[]) {
		$o_container->update_container($row[$i],$ordem[$i]);
		$i++;
		}

		$r = "<a href='' style='color: white; display: block; height: 100%'>Itens de container reordenados!</a>";
	}

	echo $ordem[0];

}

?>
