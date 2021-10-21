<?php

require_once("app/controllers/core.php");

function _index($id="1",$idcat="0",$x=0,$y=0) {

  $core=new Core();
  $data = $core->getData($id,$idcat);

  $data['modulo'] = GetDownloads($id,$idcat,$data["ordem_registros"],$data["config_site"][0]->itens_downloads,$x,$y);

  $tema = $data["config_site"][0]->tema;
  View::do_dump(VIEW_PATH. $tema . '/downloads.php',$data);
}

function GetDownloads($id,$idcategoria,$ordem,$itens) {

  $x = 0;
  $y = 0;
  $pg="";
  $imgs = "";

  if(isset($_GET["x"]))
  {
    $x = $_GET["x"];
  }

  if(isset($_GET["y"]))
  {
    $y = $_GET["y"];
  }

  $dr = array();
  $drDownloads = array();
  $Downloads = new DownloadsModel();
  $Downloads->setIdCategoria($idcategoria);
  $o_modulos = new ModulosModel(); 
  $dr_modulos = $o_modulos->get_ordem_registros($idcategoria);
  $ordem_registro=$dr_modulos[1];
  $drDownloads = $Downloads->readItens($itens, $x, $y, $ordem_registro);

  $r = "<div id='cnt-download' class='cnt-download'>";

  for ($i=0; $i <= count($drDownloads); $i++) {

    if(isset($drDownloads[$i][0])) {

      if($drDownloads[$i][0] > 0) {
      
      $r .= "<div class='download'>";

      $r .= "<div>";
      $r .= $drDownloads[$i][3];
      $r .= "<p>";
      $r .= "<a href='". myUrl("downloads/") .  $drDownloads[$i][4] ."' target='_blank'>" . $drDownloads[$i][4] . "</a>";
      $r .= "</p>";
      if(isset($_SESSION["credencial"])) {
        if($_SESSION["credencial"] == "0" || $_SESSION["credencial"] == "1") {
          $r .= "<a  class='editar' href='". myUrl("tao/editar_downloads/?iddownload=") . $drDownloads[$i][0] ."' class='editar'>Editar</a>";
        }
      } 
      $r .= "</div>";

      $r .= "<div>";
      $r .= "<div>" . $drDownloads[$i][7] . "</div>";
      $r .= "</div>";

      $r .= "</div>";

    }

    if($drDownloads[$i][0] == "#p#") {
      $pg = str_replace("?controle=page&acao=open&id=",myUrl("downloads/index/"),$drDownloads[$i][1]);
      $pg = str_replace("page","Downloads",$drDownloads[$i][1]);
      $pg = str_replace("?controle=page&acao=open&id=",myUrl("downloads/index/".$id),$drDownloads[$i][1]);
      $pg = str_replace("&idcategoria=","/" . "",$pg);
      $pg = str_replace("&x=","/?x=", $pg);
      $pg = str_replace("&y=","&y=", $pg);

    }
  }
}

$r .= "</div>";

$r .= "<div>";
$r .= $pg;
$r .= "</div>";

return $r;

}

?>
