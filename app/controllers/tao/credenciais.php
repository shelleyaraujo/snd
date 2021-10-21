<?php

require_once("app/controllers/core.php");

function _credenciais() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

	if(isset($_POST["adicionar_pagina"])) {
		$titulo=$_POST["titulo"];
		$modulo="Blog";
		$o_conteudos = new ConteudosModel();
		$dr_conteudos = $o_conteudos->add_conteudo();
		$dr_conteudos = $o_conteudos->getUltimoRegsitro();
		$idconteudo=$dr_conteudos;	

		$o_modulos = new ModulosModel();
		$dr_modulos = $o_modulos->add_modulo($titulo,$modulo,$idconteudo);
	}

	$Menus = new MenusModel();
	$menus = $Menus->readCredenciais();

	$data["credenciais"] = $menus;

	View::do_dump(VIEW_PATH. 'tao/credenciais.php',$data);

}

