<?php

require_once("app/controllers/core.php");

function _catalogo() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

	if(isset($_POST["adicionar_pagina"])) {
		$titulo=$_POST["titulo"];
		$modulo="Catalogo";
		//$o_conteudos = new ConteudosModel();
		//$dr_conteudos = $o_conteudos->add_conteudo();
		//$dr_conteudos = $o_conteudos->getUltimoRegsitro();
		//$idconteudo=$dr_conteudos;	

		$o_modulos = new ModulosModel();
		$dr_modulos = $o_modulos->add_modulo($titulo,$modulo,"0");
		header("Location: " .myUrl("tao/catalogo/"));
	}

	$modulo = "Catalogo";
	if(isset($_GET["modulo"])) {
		$modulo = $_GET["modulo"];
	}

	$data["catalogo"]  = "<div class='xxxxx'>";
	$data["catalogo"]  .= get_menu($modulo,"0");
	$data["catalogo"]  .= "</div>";

	if(isset($_POST["pesquisar"])) {
		$data["catalogo"]  = "<div class='xxxxx'>";
		$data["catalogo"] .= get_menu_itens_busca($_POST["pesquisa"], $modulo);
		$data["catalogo"] .= "</div>";
	} 

	View::do_dump(VIEW_PATH. 'tao/catalogo.php',$data);

}

function get_menu($modulo,$idcat) {
	$Config = new ConfigModel();
	$config = $Config->readItensXmlConfig();
	$ordem_menu_catalogo = $config[0]->ordem_menu_catalogo;

	$o_menu = new MenusModel();
	$dr_menu = $o_menu->get_menu_itens($modulo,$idcat,$ordem_menu_catalogo);
	return $dr_menu; 
}

function get_menu_itens_busca($busca,$modulo) {
	$o_menu = new MenusModel();

	$dr_menu = $o_menu->get_menu_itens_busca($busca,$modulo);
	return $dr_menu; 
}

function xgetModulos() {

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
	$r.= "<th>Itens</th>";
	$r.= "<th>Filhos</th>";
	$r.= "<th>Titulo do Menu</th>";
	$r.= "<th>Data/Hora</th>";
	$r.= "<th>Visualizar</th>";
	$r.= "<th>Excluir</th>";
	$r.= "</tr>";
	$r.= "</thead>";
	$ativo="0";
	$i=0;

	$idcategoria = "0";

	if(isset($_GET["idcategoria"])) {
		$idcategoria = $_GET["idcategoria"];
	}

	$o_modulos = new ModulosModel();
	$dr_modulos = $o_modulos->getRows($itens,$x,$y,"Catalogo","titulo",$idcategoria);

	$_SESSION["voltar_itens_catalogo"] = $_SERVER['REQUEST_URI'];

	foreach ($dr_modulos as $row[])
	{
		if ($row[$i][0] == "#p#") {
			$pg = str_replace("Catalogo","",$row[$i][1]);
		} else if ($row[$i][0] > 0) {  
			$checked="";

			if($row[$i][5] == 1) {
				$checked="checked";
			}
			
			$_SESSION["voltar_modulos"] = $_SERVER['REQUEST_URI'];

			$r .="<tr id='row".$row[$i][0] ."'>";
			$r .= "<td><a class='link-total-itens' href='". myUrl("tao/itens_modulo/?idmodulo=". $row[$i][0] ."&modulo=Catalogo") ."'><span class='icone_edit_itens'></span>". getTotal($row[$i][0]) ."</a>";        
			$r .= "<td style='text-align: center'><a style='padding: 0 5px;color: black;background: #264653' href='". myUrl("tao/catalogo/?idcategoria=".$row[$i][0] ."") ."'>". get_filhos($row[$i][0]) ."</a></td>";			
			$r .= "<td style='text-align: left'><a href='". myUrl("tao/editar_modulo/?idconteudo=".$row[$i][6] ."") ."'><span class='icone_lapis'></span>" . $row[$i][3] . "</a></td>";
			$r .= "<td>";
			$dma = new DateTime($row[$i][1]);
			$r .= "<spam style='color:skyblue'>" . $dma->format('d/m/Y h:i:s') . "</spam>";
			$r .= "</td>";
			$r .= "<td>";
			$r .= "<label class='switch'>";
			$r .= "<input id='checkbox".$row[$i][0]."' type='checkbox' $checked  value='". $ativo ."' onclick=setAtivo('". $row[$i][0] ."')>";
			$r .= "</label>";
			$r .= "</td>";
			$r .= "<td><a class='trash icon' href='javascript:void(0)' 
			onclick=excluir_moodulo('". $row[$i][0] ."')></a></td>";
			$r .="</tr>";

		}
		$i++;
	}

	$r.="</table>";
	$r.=$pg;

	return $r;
}


function get_filhos($idcategoria) {

	$o_modulos = new ModulosModel();
	$total = $dr_modulos = $o_modulos->get_total($idcategoria);
	return $total;
}

function getModulosPesquisa($buscar) {

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
	$r.= "<th>Visualizar</th>";
	$r.= "<th>Excluir</th>";
	$r.= "</tr>";
	$r.= "</thead>";
	$ativo="0";
	$i=0;

	$o_modulos = new ModulosModel();
	$dr_modulos = $o_modulos->getRowsPesquisa($itens,$x,$y,"Catalogo","titulo",$buscar);

	foreach ($dr_modulos as $row[])
	{
		if ($row[$i][0] == "#p#") {
			$pg = str_replace("Catalogo","",$row[$i][1]);
		} else if ($row[$i][0] > 0) {  
			$checked="";

			if($row[$i][5] == 1) {
				$checked="checked";
			}

			
			$r .="<tr id='row".$row[$i][0] ."'>";
			$r .= "<td><a class='link-total-itens' href='". myUrl("tao/itens_modulo/?idmodulo=". $row[$i][0] ."&modulo=Catalogo") ."'><span class='icone_edit_itens'></span>". getTotal($row[$i][0]) ."</a>";        
			$r .= "<td style='text-align: left'><a href='". myUrl("tao/editar_modulo/?idconteudo=".$row[$i][6] ."") ."'><span class='icone_lapis'></span>" . $row[$i][3] . "</a></td>";
			$r .= "<td>";
			$dma = new DateTime($row[$i][1]);
			$r .= "<spam style='color:skyblue'>" . $dma->format('d/m/Y h:i:s') . "</spam>";
			$r .= "</td>";
			$r .= "<td>";

			$r .= "<label class='switch'>";
			$r .= "<input id='checkbox".$row[$i][0]."' type='checkbox' $checked  value='". $ativo ."' onclick=setAtivo('". $row[$i][0] ."')>";
			$r .= "</label>";

			$r .= "</td>";
			$r .= "<td><a class='trash icon' href='javascript:void(0)' 
			onclick=excluir_moodulo('". $row[$i][0] ."')></a></td>";
			$r .="</tr>";

		}
		$i++;
	}

	$r.="</table>";
	$r.=$pg;

	return $r;
}




function getTotal($idcategoria) {
	$o_catalogo = new CatalogoModel();
	$total = $o_catalogo->getTotalRegistrosCategoria($idcategoria);
	return $total;
}