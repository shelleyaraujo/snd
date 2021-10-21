<?php

require_once("app/controllers/core.php");

function _imoveis_vitrine() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

  $itens_imoveis = $data['itens_imoveis'];
  $data["imoveis"] = MontaImoveisVitrine($itens_imoveis);

  View::do_dump(VIEW_PATH. 'tao/imoveis_vitrine.php',$data);

}

function MontaImoveisVitrine($itens_imoveis)
{
  $Config = new ConfigModel();
  $config = $Config->readItensXmlConfig();

  $x = "0";
  $y = "0";

  if(isset($_GET["x"]))
  {
    $x = $_GET["x"];
  }

  if(isset($_GET["y"]))
  {
    $y = $_GET["y"];
  }

  $dr = array();
  $drImoveis = array();
  $Imoveis = new ImoveisModel();
  $drImoveis = $Imoveis->readItensVitrine($itens_imoveis, $x, $y, "titulo");

  $imagem = "semimagem.png";
  $r="<table class='cnt-imoveis'>";

  $r.="<thead>";
  $r.="<tr>";
  $r.="<th>ID</th>";
  $r.="<th width='100'>Data</th>";
  $r.="<th width='50'>Imagem</th>";
  $r.="<th>";
  $r.="Titulo";
  $r.="</th>";
//  $r.="<th width='30'>";
//  $r.="";
//  $r.="</th>";  
  $r.="</thead>";

  $_SESSION["voltar_itens_imoveis"] = $_SERVER['REQUEST_URI'];

  for ($x=0; $x <= count($drImoveis); $x++) {

    if(isset($drImoveis[$x][0])) {

      if($drImoveis[$x][0] > 0) {
       $drx=$Imoveis->readItemImagem($drImoveis[$x][0]);
       $imagem=$drx[0][2];

       if($imagem==""){$imagem="semimagem.jpg";}
       $r .= "<tr id='row".$drImoveis[$x][0]."'>";

       $r .= "<td width='5'>";
       $r .= "<a href='" . myUrl("tao/imoveis_detalhes/?idimovel=". $drImoveis[$x][0]) . "'>";
       $r .= $drImoveis[$x][0];
       $r .= "</a>";
       $r .= "</td>";

       $r .= "<td width='5'>";
       $r .= "<a href='" . myUrl("tao/imoveis_detalhes/?idimovel=". $drImoveis[$x][0]) . "'>";
       $r .= "<small>" .  $drImoveis[$x][1] . "</small>";
       $r .= "</a>";
       $r .= "</td>";

       $r .= "<td width='45'>";
       $r .= "<a href='" . myUrl("tao/imoveis_detalhes/?idimovel=". $drImoveis[$x][0]) . "'>";
       $r .= "<img src='" . myUrl("ImageImagens.php?imagem=" . $imagem . "&w=50&h=225&dir=imoveis") . "'>";
       $r .= "</a>";
       $r .= "</td>";

       $r .= "<td>";
       $r .= "<a href='" . myUrl("tao/imoveis_detalhes/?idimovel=". $drImoveis[$x][0]) . "'>";
       $r .= $drImoveis[$x][4];
       $r .= "</a>";
       $r .= "</td>";
   //    $r .= "<td>";
     //  $r .= "<a class='trash icon' href='javascript:void(0)' onclick='excluir_item(".$drImoveis[$x][0].")'>";
    //   $r .= "";
     //  $r .= "</a>";
   //    $r .= "</td>";     
       $r .= "</tr>";
     }

     if($drImoveis[$x][0] == "#p#") {
      $pg = str_replace("page","imoveis_vitrine",$drImoveis[$x][1]);
      $pg = str_replace("?controle=page&acao=open&id=",myUrl("tao/imoveis_vitrine/?modulo=Imoveis&x=". $x . "&y=". $y . ""),$drImoveis[$x][1]);
      $pg = str_replace("&idcategoria=","",$pg);
    }
  }
}


$r .= "</table>";


$r .= "<div>";
$r .= $pg;
$r .= "</div>";

return $r;

}

?>