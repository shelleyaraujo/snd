<?php

function _ordenar_imagens_catalogo() { 

	$r="Não foi ppossivel reordenar as imagens.";

	if(isset($_POST['id'])) {
		$o_catalogo = new CatalogoModel();
		$id = explode(",", $_POST['id']);
		$ordem = explode(",", $_POST['ordem']);
		$i=0;
		foreach ($id as $row[]) {
		$o_catalogo->update_ordem_imagem($row[$i],$ordem[$i]);
		$i++;
		}

		$r = "<a href='' style='color: white; display: block; height: 100%'>Caixas Reordenadas!</a>";
	}

	echo $r;

}

?>
