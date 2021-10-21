<?php

require_once("app/controllers/core.php");

function _index($id="1",$idcat="0",$x="0",$y="0") {

  $core=new Core();
  $data = $core->getData($id,$idcat);

  $data['modulo'] = GetConteudo($id,$idcat,$data["ordem_registros"],$data["config_site"][0]->itens_videosyoutube,$x,$y);

  $tema = $data["config_site"][0]->tema;
  View::do_dump(VIEW_PATH. $tema . '/youtube.php',$data);
}

function GetConteudo($id,$idcategoria,$ordem,$itens,$x,$y)
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
  $Conteudos = new ConteudosModel();
  $Conteudos->setId($id);
  $Conteudos->setIdCategoria($idcategoria);
  $drConteudos = $Conteudos->readItens($itens, $x, $y,$ordem);

  $v = "";
  $r = "<nav id='nav-videosyoutube'>";
  $r .= "<ul id='videosyoutube' class='videosyoutube'>";

  $i=0;
  $pg = "";

  for ($i=0; $i <= count($drConteudos); $i++) {

    if(isset($drConteudos[$i][0])) {

      if($drConteudos[$i][0] > 0) {
        $r .= "<li>";
        if(isset($_SESSION["credencial"])) {
          if($_SESSION["credencial"] == "0" || $_SESSION["credencial"] == "1") {
            $r .= "<a href='". myUrl("tao/editar_videoyoutube/?idconteudo=") . $drConteudos[$i][0]."' class='editar'>Editar</a>";
          }
        }
        $r .= "<div class='cnt-video'>";
        $r .= "<div>";
        
        $r .= "<a href='javascript:void(0)'  onclick=openVideo('". $drConteudos[$i][6] ."') class='videosyoutube-title'>";
        $r .= "<img src='http://i1.ytimg.com/vi/". $drConteudos[$i][6] ."/default.jpg' />";
        $r .= "</a>";
        $r .= "</div>";
        $r .= "<div>";
        $r .= "<h2>";
        $r .= $drConteudos[$i][3];
        $r .= "</h2>";
        $r .= $drConteudos[$i][4];
        $r .= "<small><a href='javascript:void(0)'  onclick=openVideo('". $drConteudos[$i][6] ."') class='videosyoutube-title'>";
        $r .= "Assistir vídeo";
        $r .= "</a></small>";

        $r .= "</div>";
        $r .= "</div>";

        $r .= "</li>";
      }

      if($drConteudos[$i][0] == "#p#") {
        $pg = str_replace("?controle=page&acao=open&id=",myUrl("youtube/index/"),$drConteudos[$i][1]);
        $pg = str_replace("&idcategoria=","/",$pg);
        $pg = str_replace("&x=","/",$pg);
        $pg = str_replace("&y=","/",$pg);
      }
    }
  }

  $r .= "</ul>";
  $r .= "</nav>";

  $r .= "<div>";
  $r .= $pg;
  $r .= "</div>";

  return $r;
}
?>
