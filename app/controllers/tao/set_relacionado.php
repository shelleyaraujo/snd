<?php

function _set_relacionado() { 

	$r="Não foi ppossivel realizar esta ação.";
	$x=0;

	if(isset($_POST['id'])) {
		$o_modulos = new ModulosModel();

      $x = $o_modulos->existe_relacionado($_POST['id'],$_POST['idmodulo']);

		if($x > 0) {
			$x = $o_modulos->out_relacionado($_POST['id'],$_POST['idmodulo']);
			$r = "Item retirado como relacionado!";	
		} else {
			$o_modulos->set_relacionado($_POST['id'],$_POST['idmodulo']);
			$r = "Item aplicado como relacionado!";	
		}

		echo $r;
	}

}

	?>
