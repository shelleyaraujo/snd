<?php

require_once("app/controllers/core.php");

function _pte() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

	if(isset($_POST["adicionar_pagina"])) {
		$titulo=$_POST["titulo"];
		$modulo="pte";
		$o_conteudos = new ConteudosModel();
		$dr_conteudos = $o_conteudos->add_conteudo();
		$dr_conteudos = $o_conteudos->getUltimoRegsitro();
		$idconteudo=$dr_conteudos;	

		$o_modulos = new ModulosModel();
		$dr_modulos = $o_modulos->add_modulo($titulo,$modulo,$idconteudo);
		header("Location: " .myUrl("tao/pte/"));
	}

	$modulo = "Pte";
	if(isset($_GET["modulo"])) {
		$modulo = $_GET["modulo"];
	}

	$data["textos_empilhados"]  = "<div class='xxxxx'>";
	$data["textos_empilhados"]  .= get_menu($modulo,"0");
	$data["textos_empilhados"]  .= "</div>";

	View::do_dump(VIEW_PATH. 'tao/textos_empilhados.php',$data);

}

function get_menu($modulo,$idcat) {
	$o_menu = new MenusModel();

	$dr_menu = $o_menu->get_menu_itens($modulo,$idcat,"ordem");
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
	$r.= "<th>Itens</th>";
	$r.= "<th>Titulo do Menu</th>";
	$r.= "<th>Data/Hora</th>";
	$r.= "<th>Visivel</th>";
	$r.= "<th>Ex</th>";
	$r.= "</tr>";
	$r.= "</thead>";

	$pg = "";
	$i=0;
	$ativo="0";

	$o_modulos = new ModulosModel();
	$dr_modulos = $o_modulos->getRows($itens,$x,$y,"Pad",$ordem);
	foreach ($dr_modulos as $row[])
	{
		if ($row[$i][0] == "#p#") {
			$pg = str_replace("Pad","",$row[$i][1]);
		} else if ($row[$i][0] > 0) {  

			$checked="";

			if($row[$i][5] == 1) {
				$checked="checked";
			}

			$_SESSION["voltar_modulos"] = $_SERVER['REQUEST_URI'];

			$r .="<tr id='row".$row[$i][0] ."'>";
			$r .= "<td><a class='link-total-itens' href='". myUrl("tao/itens_modulo/?idmodulo=". $row[$i][0] ."&modulo=Pad") ."'><span class='icone_edit_itens'></span>". getTotal($row[$i][0]) ."</a>";        
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
	$o_conteudos = new ConteudosModel();
	$total = $o_conteudos->getTotalRegistrosCategoria($idcategoria);
	return $total;
}