<?php

require_once("app/controllers/core.php");

function _xscan_conteudos() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

	$x=0;
	$y=10;
	$pg = "<div class='cnt-paginacao'>";
	$pg_prev = "<a href='" . myUrl("tao/xscan_conteudos/?x=". $x ."&y=". $y ."")  . "'>Prev<a>";
	$pg_next = "<a href='" . myUrl("tao/xscan_conteudos/?x=". $x ."&y=". $y ."")  . "'>Next<a>";

	if(isset($_GET["x"])) {
	$x = $_GET["x"];
	$x = $x +10;
	$pg_next = "<a href='" . myUrl("tao/xscan_conteudos/?x=". $x ."&y=". $y ."")  . "'>Next<a>";
	}

	if(isset($_GET["y"])) {
	$y = $_GET["y"];
	$y = $y+10;
	$pg_next = "<a href='" . myUrl("tao/xscan_conteudos/?x=". $x ."&y=". $y ."")  . "'>Next<a>";
	}

	$pg_prev = "<a href='javascript:void(0)' onclick='history.go(-1)'>Prev<a>";

	$dir = "/www/taosystem/imagens/";
	$data["imagens"]="";
	$drImagens = "";
	$Imagens = new FilesModel();
	$drImagens = $Imagens->openDirImagens($dir,$x,$y);
	$i=0;

	$r = "<div class='cnt'>";

	foreach ($drImagens as $key => $row[]) {

	    $r .= "<div id='row". $row[$i] ."'>";  
		$r .= "<div class='w10'>";
		$r .= "<img style='width:50px; float: left; margin-right: 25px;' src='" . myUrl("imagem_conteudo_100.php?imagem=" . $row[$i]) . "'>";
		$r .= "</div>";
		//$r .= "<div class='w10'>";
		//$r .= "<img style='width:50px; float: left; margin-right: 25px;' src='" . myUrl("imagem_cataloto_300.php?imagem=" . get_imagens_catalogo($row[$i])) . "'>";
		//$r .= "</div>";
		$r .= "<div class='w5'>";
		$r .= "<a class='icone-lixo' href='javascript:void(0)' onclick=exclui_imagem('". $row[$i] ."')>xxx</a>";
		$r .= "</div>";
		$r .= "</div>";
		$i++;
	}
	$r .= "</div>";


	$pg .= "<div>";
	$pg .= $pg_prev;
	$pg .= "</div>";
	$pg .= "<div>";
	$pg .= $pg_next;
	$pg .= "</div>";	$pg .= "</div>";

	$data["imagens"] = $r;
	$data["imagens"] .= $pg;

	View::do_dump(VIEW_PATH. 'tao/xscan_conteudos.php',$data);

}

function get_imagens_catalogo($imagem) {

	$Xscan = new XscanModel();
	$drXscan = $Xscan->get_imagem_by_name($imagem);

	return $drXscan;

}