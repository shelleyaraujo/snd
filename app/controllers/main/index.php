<?php

require_once("app/controllers/core.php");

function _index() {

  $core=new Core();
  $data = $core->getData($id="1",$idcat="0");

  $data['destaques_fixos']=$data["destaques_fixos"];

  $data['vitrine']=MontaVitrineCatalogo();
  $data['vitrine']="";

  $Config = new ConfigModel();
  $config = $Config->readItensXmlConfig();

  if($config[0]->cat_vitrine == "1") {
    $data['vitrine']=MontaVitrineCatalogo();  
  } 


  $data["posts_home"] = read_posts_home();
  
  $tema = $data["config_site"][0]->tema;

  View::do_dump(VIEW_PATH. $tema . '/home.php',$data);
  
}

function MontaVitrineCatalogo() {

 $Config = new ConfigModel();
 $config = $Config->readItensXmlConfig();

 $Catalogo = new CatalogoModel();
 $drCatalogo = $Catalogo->readItensVitrine('24', '0', '0', 'ordem');

 $r = "<div class='frame flex-center cnt-catalogo'>";
 $i = 0;

 foreach ($drCatalogo as $row[]) {

  if ($row[$i][0] == "#p#") {

   $pg = str_replace("page", "Catalogo", $row[$i][1]);
 } else if ($row[$i][0] > 0) {
   $drx = $Catalogo->readItemImagem($row[$i][0]);
   $imagem = $drx[0][2];

   if($imagem==""){$imagem="semimagem.jpg";}

   $r .= "<div class='w25'>";
   $r .= "<div>";
   $r .= "<div>";
   $r .= "<a href='" . myUrl("catalogo/detalhes/1/". $row[$i][2]) . "/". $row[$i][0] ."'  title='" . $row[$i][4] . "'>";
   $r .= "<img src='" . myUrl("imagens/mini_" . $imagem) . "' alt='" . $row[$i][4] . "'>";
   $r .= "</a>";
   $r .= "</div>";
   $r .= "<a href='" . myUrl("catalogo/detalhes/1/". $row[$i][2]) . "/". $row[$i][0] ."'  title='" . $row[$i][4] . "'>";
   $r .= "<h2>" . $row[$i][4] . "</h2>";
   if($config[0]->cat_descricao_simplificada == "1"){
     $r .= $row[$i][11];
   }

   $r .= "</a>";

   if(isset($_SESSION["credencial"])) {
    if($_SESSION["credencial"] == "0" || $_SESSION["credencial"] == "1") {
      $r .= "<a  class='editar' href='". myUrl("tao/catalogo_detalhes/?idcatalogo=") . $row[$i][0] ."' class='editar'>Editar</a>";
    }
  }

  $preco = $row[$i][5];
  $precocusto = $row[$i][6];
  $preco_formatado = "R$ " . number_format($row[$i][5]/100,2,",",".");
  $precocusto_formatado = "R$ " . number_format($row[$i][6]/100,2,",",".");

      if( $row[$i][7] <= 0) { // SE O ESTOQUE FOR 0 NÃO APRESENTA O PRODUTO
      $r .="<p>";
      $r .="<span style='color: red;font-weight:bold'>Produto indisponível!</span>";
      $r .="</p>";
    }

if ($precocusto == 0) {
   $r .= "<a href='" . myUrl("catalogo/detalhes/1/". $row[$i][2]) . "/". $row[$i][0] ."'  title='" . $preco_formatado . "'>";
   $r .= "<p class='detalhes-por'>". $preco_formatado  . "</p>";
   $r .= "</a>";
 } else {
   $r .= "<a href='" . myUrl("catalogo/detalhes/1/". $row[$i][2]) . "/". $row[$i][0] ."'  title='" . $precocusto_formatado . "'>";
   $r .= "<p class='detalhes-de'>". $preco_formatado  . "</p>";
   $r .= "<p class='detalhes-por'>". $precocusto_formatado  . "</p>";

   $r .= "</a>";

 }


  /*
  if($precocusto > 0){
   $r .= "<a href='" . myUrl("catalogo/detalhes/1/". $row[$i][2]) . "/". $row[$i][0] ."'  title='" . $preco . "'>";
   $r .= "<p class='detalhes-de'>R$ " .  number_format($row[$i][5]/100,2,",",".")  . "</p>";
   $r .= "</a>";
   $r .= "<a href='" . myUrl("catalogo/detalhes/1/". $row[$i][2]) . "/". $row[$i][0] ."' title='". $precocusto ."'>";
   $r .= "<p class='detalhes-por'>R$ " .  number_format($row[$i][6]/100,2,",",".")  . "</p>";
   $r .= "</a>";
 } else {
     $r .= "<a href='" . myUrl("catalogo/detalhes/1/". $row[$i][2]) . "/". $row[$i][0] ."'  title='" . $preco. "'>";
      $r .= "<p class='detalhes-preco'>R$ " . number_format($row[$i][5]/100,2,",",".") . "</p>"; // PREÇO 
      $r .= "</a>";
 }
 */

 $r .= "</div>";
 $r .= "</div>";

}

$i++;
}

      // $r .= "<div class='row'>";
      // $r .= "<div class='small=12 columns'>";
      // $r .= $pg;
      // $r .= "</div>";
      // $r .= "</div>";

$r .= "</div>";

return $r;
}


function read_posts_home() {
  $r = "";
  $blog = new BlogModel();
  $posts = "";

  if ( $blog->getTotalRegistrosVitrine() > 0) {

  $posts = "<div class='posts-recents'>Posts recentes</div>";
  $posts .= $blog->read_posts_home("dma");
    
  }


  return $posts;
}

?>
