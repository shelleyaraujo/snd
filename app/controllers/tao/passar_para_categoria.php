<?php

function _passar_para_categoria() { 

	$r = "Mudança de Categoria Alterada!";
	$i=0;

	if(isset($_POST["id"])) {
	$o_modulos = new ModulosModel();
	$r .= $o_modulos->passar_para_categoria($_POST["id"],$_POST["idcategoria"]);
    }

	echo $r;
}

?>
