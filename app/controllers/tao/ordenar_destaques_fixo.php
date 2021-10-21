<?php

function _ordenar_destaques_fixo() { 

	$r="Não foi ppossivel reordenar as caixas.";

	if(isset($_POST['id'])) {
		$o_destaques = new ContainersCaixaTextoFixoModel();
		$id = explode(",", $_POST['id']);
		$ordem = explode(",", $_POST['ordem']);
		$i=0;
		foreach ($id as $row[]) {
		$o_destaques->update_destaque($row[$i],$ordem[$i]);
		$i++;
		}

		$r = "Caixas Reordenadas!";
	}

	echo $r;

}

?>
