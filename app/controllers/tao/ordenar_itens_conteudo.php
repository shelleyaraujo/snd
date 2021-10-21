<?php

function _ordenar_itens_conteudo() { 

	$r="Não foi ppossivel reordenar os itens.";

	if(isset($_POST['id'])) {
		$o_conteudos = new ConteudosModel();
		$id = explode(",", $_POST['id']);
		$ordem = explode(",", $_POST['ordem']);
		$i=0;
		foreach ($id as $row[]) {
		$o_conteudos->update_ordem($row[$i],$ordem[$i]);
		$i++;
		}

		$r = "<a href='' style='color: white; display: block; height: 100%'>Itens reordenados!</a>";
	}

	echo $r;

}

?>
