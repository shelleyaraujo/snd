<?php

require_once("app/controllers/core.php");

function _index($id="1",$idcat="0",$x="0",$y="0") {

  $core=new Core();
  $data = $core->getData($id,$idcat);

  $data['modulo'] = "";

  if(isset($_GET["idtexto"])){
    $data['conteudo_texto']= "";
    $data['modulo'] = getConteudo($_GET["idtexto"]);
  } else {
    $data['modulo'] .= GetConteudos($id,$idcat,$data["ordem_registros"],$data["config_site"][0]->itens_blog,$x,$y);
  }

  //MONTA ULTIMOS POST DO BLOG CONTEUDO//
  $o_conteudos = new BlogModel();
  $dr_conteudo = $o_conteudos->readConteudosBlog($idcat);

  $posts="<div class='menu-blog'>";
  $posts.="<p>Últimos Posts</p>";
  $posts.="<ul>";
  $i=0;

  foreach ($dr_conteudo as $drConteudos[]) {
   $posts .="<li>";
   $date=date_create($drConteudos[$i][1]);
   $posts .= "<p><a href='" . myUrl("blog/index/"). $id ."/". $idcat ."/?idtexto=".$drConteudos[$i][0] ."'><small>". date_format($date,"d/m/Y") ."</small></a><p>";
   $posts .= "<p><a href='" . myUrl("blog/index/"). $id ."/". $idcat ."/?idtexto=".$drConteudos[$i][0] ."'>". $drConteudos[$i][3]  ."</a></p>";
   $posts .="</li>";
   $i++;
 }
 $posts .="</ul>";
 $posts .="</div>";

 $data['ultimos_posts'] = $posts;

 $tema = $data["config_site"][0]->tema;
 View::do_dump(VIEW_PATH. $tema . '/blog.php',$data);
}

function getConteudo($idtexto) {
  $r="";
  $Conteudos = new BlogModel();
  $Conteudos->setId($idtexto);
  $drConteudos = $Conteudos->readConteudoById($_GET["idtexto"]);
  return $drConteudos;
}


function GetConteudos($id,$idcategoria,$ordem,$itens,$x,$y)
{

  if(isset($x))
  {
    $x = $x;
  }

  if(isset($y))
  {
    $y = $y;
  }

  $dr = array();
  $drConteudos = array();
  $Conteudos = new BlogModel();
  $Conteudos->setId($id);
  $Conteudos->setIdCategoria("$idcategoria");
  $drConteudos = $Conteudos->readItens("1000", $x, $y,$ordem);

  $r = "<div class='textos-links'>";

  $i=0;
  $pg = "";

  for ($i=0; $i <= count($drConteudos); $i++) {

    if(isset($drConteudos[$i][0])) {
      if($drConteudos[$i][0] > 0) {
        $r .= "<div>";
        $r .= "<a href='" . myUrl("blog/index/"). $id ."/". $idcategoria ."/?idtexto=".$drConteudos[$i][0] ."'>";
        $r .= "<h2>";

        $r .= $drConteudos[$i][3];
        $r .= "</h2>";

        $texto = $drConteudos[$i][4];

        $r .= catch_that_image($texto);

        $r .=  strip_tags(substr($drConteudos[$i][4], 0, 200)) . "...";
        $r .= "</a>";

        //echo xxx($drConteudos[$i][4]);

        $r .= "</div>";
        if($drConteudos[$i][0] == "#p#") {
          $pg = str_replace("?controle=page&acao=open&id=",myUrl("blog/index/"),$drConteudos[$i][1]);
          $pg = str_replace("&idcategoria=","/",$pg);
          $pg = str_replace("&x=","/",$pg);
          $pg = str_replace("&y=","/",$pg);
        }
      }
    }
    $texto ="";
  }

  $r .= "</div>";
  $r .= "<div>";
  $r .= $pg;
  $r .= "</div>";

  return $r;
}

function catch_that_image($conteudo) {

  $doc = new DOMDocument();
   $imagem = "";
   $i=0;

  if($conteudo != "") {
    $doc->loadHTML($conteudo);
    $elements = $doc->getElementsByTagName('img');
    foreach($elements as $element) {
      if($i == 0) {
        $imagem = $element->getAttribute('src');
      } 
      $i++;
    }
  }

  $img = pathinfo($imagem);
  $imagem = $img['basename'];

  if($imagem != "") {
    $imagem = "<img src='" . myUrl("ImageImagens.php?imagem=" . $imagem . "&w=100&h=50&dir=conteudo") . "'>";

  }



  return $imagem;
  echo $imagem;
}

?>
