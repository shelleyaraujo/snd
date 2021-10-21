<?php

require_once("app/controllers/core.php");

function _usuario_institucional() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

	$o_usuarios = new UsuariosModel();
	$o_usuarios->setId($_SESSION["id"]);

	$data["titulo"] = GetModulo($_SESSION["id"]);

	View::do_dump(VIEW_PATH. 'tao/usuario_institucional.php',$data);

}


function GetModulo($idusuario) {

	$o_modulos = new MenusModel();
	$menu = $o_modulos->menuAr();

	return $idusuario . $menu . "xxx";

}


?>

