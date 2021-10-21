<?php

function _ordenar_imagens_imovel() { 

	$r="Não foi ppossivel reordenar as imagens.";

	if(isset($_POST['id'])) {
		$o_imoveis = new ImoveisModel();
		$id = explode(",", $_POST['id']);
		$ordem = explode(",", $_POST['ordem']);
		$i=0;
		foreach ($id as $row[]) {
		$o_imoveis->update_ordem_imagem($row[$i],$ordem[$i]);
		$i++;
		}

		$r = "Imagens Reordenadas !";
	}

	echo $r;

}

?>
