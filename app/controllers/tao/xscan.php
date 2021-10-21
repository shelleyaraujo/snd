<?php

require_once("app/controllers/core.php");

function _xscan() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

	$dir = "/www/taosystem/imagens/imoveis/";
	$data["imagens"]="";
	$drImagens = "";
	$Imagens = new FilesModel();
	$drImagens = $Imagens->openDir($dir);
	$i=0;

	$r = "<div class='cnt'>";

	foreach ($drImagens as $key => $row[]) {

	    $r .= "<div id='row". $row[$i] ."'>";  
		$r .= "<div class='w10'>";
		$r .= "<img style='width:50px; float: left; margin-right: 25px;' src='" . myUrl("imagem_imoveis_300.php?imagem=" . $row[$i]) . "'>";
		$r .= "</div>";
		$r .= "<div class='w10'>";
		$r .= "<img style='width:50px; float: left; margin-right: 25px;' src='" . myUrl("imagem_imoveis_300.php?imagem=" . get_imagens_catalogo($row[$i])) . "'>";
		$r .= "</div>";
		$r .= "<div class='w5'>";
		$r .= "<a class='icone-lixo' href='javascript:void(0)' onclick=exclui_imagem('". $row[$i] ."')>xxx</a>";
		$r .= "</div>";
		$r .= "</div>";
		$i++;
	}
	$r .= "</div>";

	$data["catalogo"] = $r;
	$data["imagens"] = $r;

	View::do_dump(VIEW_PATH. 'tao/xscan.php',$data);

}

function get_imagens_catalogo($imagem) {

	$Xscan = new XscanModel();
	$drXscan = $Xscan->get_imagem_by_name($imagem);

	return $drXscan;

}