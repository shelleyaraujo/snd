<?php

require_once("app/controllers/core.php");

function _catalogo_desativados() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

    $itens_catalogo = $data['itens_catalogo'];
	$data["catalogo"] = MontaCatalogoDesativados($itens_catalogo);

	View::do_dump(VIEW_PATH. 'tao/catalogo_desativados.php',$data);

}

function MontaCatalogoDesativados($itens_catalogo)
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
  $drCatalogos = array();
  $Catalogos = new CatalogoModel();
  $drCatalogos = $Catalogos->readItensDesativados($itens_catalogo, $x, $y, "titulo");

  $imagem = "semimagem.png";
  $r="<table class='cnt-catalogo'>";

  $r.="<thead>";
  $r.="<tr>";
  $r.="<th>ID</th>";
  $r.="<th width='100'>Data</th>";
  $r.="<th width='50'>Imagem</th>";
  $r.="<th>";
  $r.="Titulo";
  $r.="</th>";
  $r.= "<th>Excluir</th>";
  $r.="</thead>";

  $_SESSION["voltar_itens_catalogo"] = $_SERVER['REQUEST_URI'];

  for ($x=0; $x <= count($drCatalogos); $x++) {

    if(isset($drCatalogos[$x][0])) {

      if($drCatalogos[$x][0] > 0) {
       $drx=$Catalogos->readItemImagem($drCatalogos[$x][0]);
       $imagem=$drx[0][2];

       if($imagem==""){$imagem="semimagem.jpg";}
       $r .= "<tr id='row".$drCatalogos[$x][0]."'>";

       $r .= "<td width='5'>";
       $r .= "<a href='" . myUrl("tao/catalogo_detalhes/?idcatalogo=". $drCatalogos[$x][0]) . "'>";
       $r .= $drCatalogos[$x][0];
       $r .= "</a>";
       $r .= "</td>";

       $r .= "<td width='5'>";
       $r .= "<a href='" . myUrl("tao/catalogo_detalhes/?idcatalogo=". $drCatalogos[$x][0]) . "'>";
       $r .= "<small>" .  $drCatalogos[$x][1] . "</small>";
       $r .= "</a>";
       $r .= "</td>";

       $r .= "<td width='45'>";
       $r .= "<a href='" . myUrl("tao/catalogo_detalhes/?idcatalogo=". $drCatalogos[$x][0]) . "'>";
       $r .= "<img src='" . myUrl("ImageImagens.php?imagem=" . $imagem . "&w=50&h=225&dir=catalogo") . "'>";
       $r .= "</a>";
       $r .= "</td>";

       $r .= "<td>";
       $r .= "<a href='" . myUrl("tao/catalogo_detalhes/?idcatalogo=". $drCatalogos[$x][0]) . "'>";
       $r .= $drCatalogos[$x][4];
       $r .= "</a>";
       $r .= "</td>";

       $r .= "<td><a class='trash icon' href='javascript:void(0)' 
      onclick=excluir_item('". $drCatalogos[$x][0] ."')></a></td>";

       $r .= "</tr>";
     }

     if($drCatalogos[$x][0] == "#p#") {
      $pg = str_replace("page","Galeria",$drCatalogos[$x][1]);
      $pg = str_replace("?controle=page&acao=open&id=",myUrl("tao/itens_modulo/?modulo=Catalogo&x=". $x . "&y=". $y . ""),$drCatalogos[$x][1]);
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