<?php

function _set_container() { 

	$r="Não foi ppossivel atualizar este destaque.";

	if(isset($_POST['id_container'])) {
    $o_containers = new ContainersModel(); 
		
		if($_POST["acao"]==1) {
			
        $o_containers->add_container_destaque($_POST["id_container"],$_POST["id_modulo"]);
			$r = "Destaque Ativado!";
		} else {
        $o_containers->delete_container_destaque($_POST["id_container"],$_POST["id_modulo"]);
			$r = "Destaque Desativado!";
		}
	}

	echo $r;
}

?>
