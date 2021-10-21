<?php

require_once("app/controllers/core.php");

function _index($id="1",$idcat="0",$x="0",$y="0") {

  $core=new Core();
  $data = $core->getData($id,$idcat);

  $data['modulo'] = getCategorias($id,$idcat,$data["ordem_registros"]);
  $data['modulo'] .= GetConteudo($id,$idcat,$data["ordem_registros"],$data["config_site"][0]->itens_textos_empilhados,$x,$y);

  $tema = $data["config_site"][0]->tema;
  View::do_dump(VIEW_PATH. $tema . '/landingpage.php',$data);
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
    $Conteudos = new LandingpageModel();
    $Conteudos->setId($id);
    $Conteudos->setIdCategoria($idcategoria);
    $drConteudos = $Conteudos->readItens($itens, $x, $y,$ordem);

    $r = "<nav id='nav-empilhados'>";
    $r .= "<ul id='textos-empilhados' class='textos-empilhados'>";

    $i=0;
    $pg = "";

 for ($i=0; $i <= count($drConteudos); $i++) {

    if(isset($drConteudos[$i][0])) {

      if($drConteudos[$i][0] > 0) {
       
        $r .= "<li>";

        $r .= "<a href='#item1' class='empilhados-title' id='item1-heading". $drConteudos[$i][0] ."'>";
        $r .= "<h2>";
        $r .= $drConteudos[$i][3];
        $r .= "</h2>";
        $r .= "</a>";
      if(isset($_SESSION["credencial"])) {
        if($_SESSION["credencial"] == "0" || $_SESSION["credencial"] == "1") {
          $r .= "<a href='". myUrl("tao/editar_conteudo/?idconteudo=") . $drConteudos[$i][0]."' class='editar'>Editar</a>";
        }
      }
        $r .= "<div>";
        $r .= $drConteudos[$i][4];
        $r .= "</div>";
        $r .= "</li>";
     }

     if($drConteudos[$i][0] == "#p#") {
        $pg = str_replace("?controle=page&acao=open&id=",myUrl("Pad/index/"),$drConteudos[$i][1]);
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




  function getCategorias($id,$idcategoria,$ordem_registros)
  {
    $Modulos = new MenusModel();
    $r = $Modulos->readItensCategorias($idcategoria,$ordem_registros);
    return $r;
  }
?>

