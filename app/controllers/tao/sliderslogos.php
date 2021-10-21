<?php

require_once("app/controllers/core.php");

function _sliderslogos() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

	if(isset($_POST["adicionar_slider"])) {
		$titulo=$_POST["titulo"];
		$o_sliders = new SliderLogosModel();
	    $dr_sliders = $o_sliders->add_slider($titulo);
	}

	$data["sliders"] = getSliders();

	View::do_dump(VIEW_PATH. 'tao/sliderslogos.php',$data);

}

function getSliders() {

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
    $r.= "<th>Titulo do Slider</th>";
    $r.= "<th>Imagem</th>";
  //  $r.= "<th>Visivel</th>";
    $r.= "<th>Excluir</th>";
    $r.= "</tr>";
  	$r.= "</thead>";
	$pg = "";
	$i=0;
	$ativo="0";
	$imagem="";

		  $_SESSION["voltar"] = $_SERVER['REQUEST_URI'];


	$o_sliders = new SliderLogosModel();
	$dr_sliders = $o_sliders->getRows($itens,$x,$y,"Pad",$ordem);
	foreach ($dr_sliders as $row[])
	{
		if ($row[$i][0] == "#p#") {
			$pg = str_replace("Pad","",$row[$i][1]);
		} else if ($row[$i][0] > 0) {  

			$checked="";

			if($row[$i][5] == 1) {
				$checked="checked";
			}

			$imagem=$row[$i][4];

            if($imagem==""){$imagem="semimagem.jpg";}

			$r .="<tr id='row".$row[$i][0] ."'>";
			$r .= "<td><a href='". myUrl("tao/editar_slider_logo/?idslider=".$row[$i][0] ."") ."'>" . $row[$i][3] . "</a></td>";
			$r .= "<td>";
			$r .= "<a href='". myUrl("tao/editar_slider_logo/?idslider=".$row[$i][0] ."") ."'>";
			$r .= "<img src='" . myUrl("ImageImagens.php?imagem=" . $imagem . "&w=150&h=100&dir=sliderslogos") . "'>";
			$r .= "</a>";
			$r .= "</td>";
		//	$r .= "<td><small>" . str_replace(",","<br>",$row[$i][8]) . "</small></td>";
			$r .= "<td><a class='trash icon' href='javascript:void(0)' 
			onclick=excluir_slider('". $row[$i][0] ."')></a></td>";
	        $r .="</tr>";

		}
		$i++;
	}

	$r.="</table>";
	$r.=$pg;

	return $r;
}
