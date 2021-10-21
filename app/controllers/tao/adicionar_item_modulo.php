<?php

function _adicionar_item_modulo() {  

	$r="Não foi ppossivel adicionar item.";

	$titulo = "Titulo do Item";
	
	$o_modulo = new ModulosModel();

	if(isset($_POST['id_modulo'])) {

		if(isset($_POST['titulo'])) {
			$titulo = $_POST['titulo'];
		} 

		if($_POST['titulo'] == "") {
			$titulo = "Titulo do Item";
		} 
		
		switch ($_POST['modulo']) {

			case 'Catalogo':
			$o_modulo->addItemModulo($_POST['id_modulo'],"catalogo",$titulo);
			break;

			case 'Galeria':
			$o_modulo->addItemModulo($_POST['id_modulo'],"galeria",$titulo);
			break;

		    case 'Downloads':
			$o_modulo->addItemModulo($_POST['id_modulo'],"downloads",$titulo);
			break;

			case 'Blog':
			$o_modulo->addItemModulo($_POST['id_modulo'],"blog",$titulo);
			break;

			case 'Institucional':
			$o_modulo->addItemModulo($_POST['id_modulo'],"institucional",$titulo);
			break;

			case 'Landingpage':
			$o_modulo->addItemModulo($_POST['id_modulo'],"landingpage",$titulo);
			break;

			case 'Institucionalar':
			$o_modulo->addItemModulo($_POST['id_modulo'],"institucionalar",$titulo);
			break;

		}

		$r = "Item adicionado no o módulo: " . $_POST['modulo'];
	}

	echo $r;
}

?>
