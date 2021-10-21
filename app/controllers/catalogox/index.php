<?php

require_once("app/controllers/core.php");

function _index($id="0",$idcategoria="0",$x="0",$y="0") { 

  $core=new Core();
  $data = $core->getData($id,$idcategoria);

  $data['catalogo'] = getCategorias($id,$idcategoria);
  $data['catalogo'] .= MontaCatalogos($id,$idcategoria,$data["ordem_registros"],$data["config_site"][0]->itens_catalogo,$x,$y);
  $data['catalogo'] .= get_relacionados($id,$idcategoria,$data["ordem_registros"],$data["config_site"][0]->itens_catalogo,$x,$y);

  $tema = $data["config_site"][0]->tema;
  View::do_dump(VIEW_PATH. $tema . '/catalogo.php',$data);

}

function MontaCatalogos($id,$idcategoria,$ordem_catalogo,$itens,$x,$y) {
  $Config = new ConfigModel();
  $config = $Config->readItensXmlConfig();

  if(isset($x))
  {
    $x = $x;
  }

  if(isset($y))
  {
    $y = $y;
  }

  $dr = array();
  $drCatalogos = array();
  $Catalogos = new CatalogoModel();
  $Catalogos->setIdCategoria($idcategoria);
  $Catalogos->setId($id);
  $drCatalogos = $Catalogos->readItens($itens, $x, $y, $ordem_catalogo);

  $dados_estruturados = "";

  $r="<div class='cnt-catalogo'>";
  $i=0;

  foreach ($drCatalogos as $row[])
  {
    if ($row[$i][0] == "#p#") {

      $pg = str_replace("page","Catalogo",$row[$i][1]);
      $pg = str_replace("?controle=page&acao=open&id=",myUrl("catalogo/index/"),$row[$i][1]);
      $pg = str_replace("&idcategoria=","/",$pg);
      $pg = str_replace("&x=","/",$pg);
      $pg = str_replace("&y =","/",$pg);

    } else if ($row[$i][0] > 0) {                
     $drx=$Catalogos->readItemImagem($row[$i][0]);
     $imagem=str_replace("","",$drx[0][2]);
     $imagem= trim($imagem);

     if($imagem==""){$imagem="semimagem.jpg";}

     $dados_estruturados .= "
     <div itemtype='http://schema.org/Product' itemscope>
     <meta itemprop='mpn' content='" . $row[$i][0] . "' />
     <meta itemprop='name' content='". $row[$i][4] . "' />
     <link itemprop='image' href='".  myUrl("imagem_catalogo_300.php?imagem=" . $imagem) ."' />
     <meta itemprop='description' content='". $row[$i][11]."' />
     <div itemprop='offers' itemtype='http://schema.org/Offer' itemscope>
     <link itemprop='url' href='". myUrl("/catalogo_detalhes/?idcatalogo=") . $row[$i][0] ."' />
     <meta itemprop='availability' content='https://schema.org/InStock' />
     <meta itemprop='priceCurrency' content='BRL' />
     <meta itemprop='itemCondition' content='https://schema.org/UsedCondition' />
     <meta itemprop='price' content='" . number_format($row[$i][5]/100,2,".",".") . "' />
     </div>
     </div>
     ";

     $r .= "<div>";
     $r .= "<div>";

     $r .= "<a href='" . myUrl("catalogo/detalhes/". $id . "/". $row[$i][2]) . "/". $row[$i][0] ."' title='". $row[$i][4] ."'>";
     $r .= "<img src='" . myUrl("imagem_catalogo_300.php?imagem=" . $imagem) . "' alt='" . $row[$i][4] . "'>";
     $r .= "</a>";
     $r .= "<a href='" . myUrl("catalogo/detalhes/". $id . "/". $row[$i][2]) . "/". $row[$i][0] ."'   title='". $row[$i][4] ."'>";
     $r .= "<h2>" .$row[$i][4] . "</h2>";
     $r .= "</a>";
     $r .= "<p>" .$row[$i][11] . "</p>";

     $preco = "R$ " . number_format($row[$i][5]/100,2,",",".");
     $precocusto = "R$ " . number_format($row[$i][6]/100,2,",",".");

     if($row[$i][5] > 0) {
       if($config[0]->preco == "1"){
        $r .= "<a href='" . myUrl("catalogo/detalhes/". $id . "/". $row[$i][2]) . "/". $row[$i][0] ."'  title='". $preco ."'>";
      $r .= "<p class='detalhes-preco'>R$ " . number_format($row[$i][5]/100,2,",",".") . "</p>"; // PREÇO 
      $r .= "</a>";
    }

  }

  if($config[0]->promocao == "1"){

   $r .= "<a href='" . myUrl("catalogo/detalhes/". $id . "/". $row[$i][2]) . "/". $row[$i][0] ."'  title='". $preco."'>";
   $r .= "<p class='detalhes-de'>R$ " .  number_format($row[$i][5]/100,2,",",".")  . "</p>";
   $r .= "</a>";

   $r .= "<a href='" . myUrl("catalogo/detalhes/". $id . "/". $row[$i][2]) . "/". $row[$i][0] ."' title='". $precocusto ."'>";
   $r .= "<p class='detalhes-por'>R$ " .  number_format($row[$i][6]/100,2,",",".")  . "</p>";
   $r .= "</a>";

 }

 if(isset($_SESSION["credencial"])) {
  if($_SESSION["credencial"] == "0" || $_SESSION["credencial"] == "1") {
    $r .= "<a  class='editar' href='". myUrl("tao/catalogo_detalhes/?idcatalogo=") . $row[$i][0] ."' class='editar'>Editar</a>";
  }
}
       //  $r .= "</div>";
       //  
$r .=   $dados_estruturados;

$r .= "</div>";
$r .= "</div>";
}

$i++;
}
$r .= "</div>";

$r .= "<div>";
$r .= $pg;
$r .= "</div>";

return $r;

}

function get_relacionados($id,$idcategoria,$ordem_catalogo,$itens,$x,$y)
{
  $r = "";
  $drCatalogos = array();
  $Catalogos = new CatalogoModel();
  $Catalogos->setIdCategoria($idcategoria);
  $drCatalogos  = $Catalogos->get_relacionados($ordem_catalogo);
  $i=0;
  $ii=0;

  $r .= "<h3>Itens Relacionados:</h3>";
  $r .= "<div class='cnt-catalogo'>";

  foreach ($drCatalogos as $row[])
  {

    foreach ($row[$i] as $row2[]){

     $drx=$Catalogos->readItemImagem($row2[$i][0]);
     $imagem=$drx[0][2];

     $r .= "<div>";
     $r .= "<div>";

     $r .= "<a href='" . myUrl("catalogo/detalhes/". $id . "/". $row2[$i][2]) . "/". $row2[$i][0] ."'>";

     $r .= "<img src='" . myUrl("ImageImagens.php?imagem=" . $imagem . "&w=300&h=225&dir=catalogo") . "'>";
     $r .= "<h3>" . $row2[$i][4] . "</h3>";
     $r .= "</a>";
     if(isset($_SESSION["credencial"])) {
      if($_SESSION["credencial"] == "0" || $_SESSION["credencial"] == "1") {
        $r .= "<a  class='editar' href='". myUrl("tao/catalogo_detalhes/?idcatalogo=") . $row2[$i][0] ."' class='editar'>Editar</a>";
      }
    } 
    $r .= "</div>";
    $r .= "</div>";

    $i++;
  }

}

$r .= "</div>";

if($i==0){
  $r="";
}
return $r;

}

function getCategorias($id,$idcategoria)
{
 $Config = new ConfigModel();
 $config = $Config->readItensXmlConfig();
 $ordem_registros = $config[0]->ordem_menu_catalogo;
 $Modulos = new MenusModel();
 $r = $Modulos->readItensCategorias($idcategoria,$ordem_registros);
 return $r;
}