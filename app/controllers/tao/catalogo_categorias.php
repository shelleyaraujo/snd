<?php

require_once("app/controllers/core.php");

function _catalogo_categorias() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

	if(isset($_POST["adicionar_pagina"])) {
		$titulo=$_POST["titulo"];
		$modulo="CatalogoCategorias";
		$o_conteudos = new ConteudosModel();
		$dr_conteudos = $o_conteudos->add_conteudo();
		$dr_conteudos = $o_conteudos->getUltimoRegsitro();
		$idconteudo=$dr_conteudos;	

		$o_modulos = new ModulosModel();
		$dr_modulos = $o_modulos->add_modulo($titulo,$modulo,$idconteudo);
	}

	$modulo = "CatalogoCategorias";
	if(isset($_GET["modulo"])) {
		$modulo = $_GET["modulo"];
	}

	$data["catalogo_categorias"]  = "<div class='xxxxx'>";
	$data["catalogo_categorias"]  .= get_menu($modulo,"0");
	$data["catalogo_categorias"]  .= "</div>";

	if(isset($_POST["pesquisar"])) {
		$data["catalogo_categorias"]  = "<div class='xxxxx'>";
		$data["catalogo_categorias"] .= get_menu_itens_busca($_POST["pesquisa"], $modulo);
		$data["catalogo_categorias"] .= "</div>";
	} 
	
	View::do_dump(VIEW_PATH. 'tao/catalogo_categorias.php',$data);

}

function get_menu($modulo,$idcat) {
	$o_menu = new MenusModel();

	$dr_menu = $o_menu->get_menu_itens($modulo,$idcat,"ordem");
	return $dr_menu; 
}

function get_menu_itens_busca($busca,$modulo) {
	$o_menu = new MenusModel();

	$dr_menu = $o_menu->get_menu_itens_busca($busca,$modulo);
	return $dr_menu; 
}


function getModulos() {

	//$Config = new ConfigModel();
	//$config = $Config->readItensXmlConfig();
	$x=0;
	$y=0;
	$i=0;
	$itens=50;
	$ordem = "titulo";

	$r = "";

	if(isset($_REQUEST["x"]))    {
		$x = $_REQUEST["x"];
	}

	if(isset($_REQUEST["y"]))    {
		$y = $_REQUEST["y"];
	}

	$r = "<table>";
	$r.= "<thead>";
	$r.= "<tr>";
	$r.= "<th>Titulo da Página</th>";
	$r.= "<th>Módulo</th>";
	$r.= "<th>Ativado</th>";
	$r.= "<th>Excluir</th>";
	$r.= "</tr>";
	$r.= "</thead>";
	$pg = "";
	$i=0;
	$ativo="0";

	$o_modulos = new ModulosModel();
	$dr_modulos = $o_modulos->getRows($itens,$x,$y,"CatalogoCategorias",$ordem);
	foreach ($dr_modulos as $row[])
	{
		if ($row[$i][0] == "#p#") {
			$pg = str_replace("CatalogoCategorias","",$row[$i][1]);
		} else if ($row[$i][0] > 0) {  

			$checked="";

			if($row[$i][5] == 1) {
				$checked="checked";
			}

			$r .="<tr id='row".$row[$i][0] ."'>";
			$r .= "<td><a href='". myUrl("tao/editar_modulo/?idconteudo=".$row[$i][6] ."") ."'><span class='icone_lapis'></span>" . $row[$i][3] . "</a></td>";
			$r .= "<td>" . $row[$i][4] . "</td>";
			$r .= "<td>";
			$r .= "<label class='switch'>";
			$r .= "<input id='checkbox".$row[$i][0]."' type='checkbox' $checked  value='". $ativo ."' onclick=setAtivo('". $row[$i][0] ."')>";
			$r .= " <span class='slider'></span>";
			$r .= "</label>";
			$r .= "</td>";
			$r .= "<td><a href='javascript:void(0)' 
			onclick=excluir_moodulo('". $row[$i][0] ."')>Excluir</a></td>";
			$r .="</tr>";

		}
		$i++;
	}

	$r.="</table>";
	$r.=$pg;

	return $r;
}
