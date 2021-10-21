<?php

function _ordenar_destaques_flex() { 

	$r="Não foi ppossivel reordenar as caixas.";

	if(isset($_POST['id'])) {
		$o_conteudos = new ConteudosModel();
		$id = explode(",", $_POST['id']);
		$ordem = explode(",", $_POST['ordem']);
		$i=0;
		foreach ($id as $row[]) {
		$o_conteudos->update_conteudo_destaque($row[$i],$ordem[$i]);
		$i++;
		}

		$r = "<a href='' style='color: white; display: block; height: 100%'>Caixas Reordenadas!</a>";
	}

	echo $r;

}

?>
