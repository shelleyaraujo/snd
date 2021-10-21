<?php

function _excluir_blog() { 

	$r="Não foi ppossivel escluir este post.";

	if(isset($_POST['id'])) {
	$o_conteudos = new BlogModel();
	$o_conteudos->delete_blog($_POST['id']);
	$r = "Post Excluido!";
	}

	echo $r;
}

?>
