<?php

function _ativar_post() { 

	$r="Não foi ppossivel ativar o post.";

	if(isset($_POST['id'])) {
		$o_conteudos = new BlogModel();
		$o_conteudos->ativar_post($_POST['id'],$_POST['vitrine']);
		if($_POST['vitrine']=="1") {
			$r = "Post ativado!";
		} else {
			$r = "Post desaativado!";
		}
	}

	echo $r;
}

?>
