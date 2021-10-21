<?php

require_once("app/controllers/core.php");

function _index($id="1",$idcat="0",$x="0",$y="0") {

  $core=new Core();
  $data = $core->getData($id,$idcat);

  $data['modulo'] = getCategorias($id,$idcat,$data["ordem_registros"]);
  $data['modulo'] .= GetConteudo($id,$idcat,$data["ordem_registros"],$data["config_site"][0]->itens_textos_empilhados,$x,$y);

  $tema = $data["config_site"][0]->tema;
  View::do_dump(VIEW_PATH. $tema . '/institucional.php',$data);
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
    $drInstitucional = array();
    $Institucional = new InstitucionalModel();
    $Institucional->setId($id);
    $Institucional->setIdCategoria($idcategoria);
    $drInstitucional = $Institucional->readItens($itens, $x, $y,$ordem);

    $r = "<div id='nav-empilhados'>";
    $r .= "<div id='textos-empilhados' class='textos-empilhados'>";

    $i=0;
    $pg = "";

 for ($i=0; $i <= count($drInstitucional); $i++) {

    if(isset($drInstitucional[$i][0])) {

      if($drInstitucional[$i][0] > 0) {
       
        $r .= "<div>";

        $r .= "<a href='#item1' class='empilhados-title' id='item1-heading". $drInstitucional[$i][0] ."'>";
        $r .= "<h2>";
        $r .= $drInstitucional[$i][3];
        $r .= "</h2>";
        $r .= "</a>";
      if(isset($_SESSION["credencial"])) {
        if($_SESSION["credencial"] == "0" || $_SESSION["credencial"] == "1") {
          $r .= "<a href='". myUrl("tao/editar_conteudo/?idconteudo=") . $drInstitucional[$i][0]."' class='editar'>Editar</a>";
        }
      }
        $r .= "<div>";
        $r .= $drInstitucional[$i][4];
        $r .= "</div>";
        $r .= "</div>";
     }

     if($drInstitucional[$i][0] == "#p#") {
        $pg = str_replace("?controle=page&acao=open&id=",myUrl("pte/index/"),$drInstitucional[$i][1]);
        $pg = str_replace("&idcategoria=","/",$pg);
        $pg = str_replace("&x=","/",$pg);
        $pg = str_replace("&y=","/",$pg);
    }
  }
}

    $r .= "</div>";
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

