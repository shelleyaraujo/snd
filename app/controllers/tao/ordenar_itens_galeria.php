<?php

function _ordenar_itens_galeria() { 

	$r="Não foi ppossivel reordenar os itens.";

	if(isset($_POST['id'])) {
		$o_galeria = new GaleriaModel();
		$id = explode(",", $_POST['id']);
		$ordem = explode(",", $_POST['ordem']);
		$i=0;
		foreach ($id as $row[]) {
		$o_galeria->update_ordem($row[$i],$ordem[$i]);
		$i++;
		}

		$r = "<a href='' style='color: white; display: block; height: 100%'>Itens reordenados!</a>";
	}

	echo $r;

}

?>
