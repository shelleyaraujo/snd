<?php

require_once("app/controllers/core.php");

function _posts_home() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

	$data["posts"] = getPosts();

	View::do_dump(VIEW_PATH. 'tao/posts_home.php',$data);

}

function getPosts() {

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


	$r = "<div class='xxxxx'>";

	$r .= "<div class='cnt-edicao gravata'>";
	$r .= "<div  style='width: 80%'>Título</div>";
	$r .= "<div  style='width: 20%'>Data</div>";
	$r .= "</div>";



	$pg = "";
	$i=0;
	$ativo="0";

	$o_conteudos = new BlogModel();
	$dr_conteudos = $o_conteudos->getRowsPosts($itens,$x,$y,"Conteudos",$ordem);
	foreach ($dr_conteudos as $row[])
	{
		if ($row[$i][0] == "#p#") {
			$pg = str_replace("Conteudos","",$row[$i][1]);
		} else if ($row[$i][0] > 0) {  

			$checked="";

			if($row[$i][5] == 1) {
				$checked="checked";
			}

			$r .="<div id='row".$row[$i][0] ."' class='cnt-edicao'>";
			$r .= "<div style='width: 80%'><a href='". myUrl("tao/editar_blog/?idconteudo=".$row[$i][0] ."") ."'>" . $row[$i][3] . "</a></div>";
			$r .= "<div style='width: 20%'>" . $row[$i][1] . "</div>";
			$r .="</div>";

		}
		$i++;
	}
	$r .= "</div>";

	$r.=$pg;

	return $r;
}
