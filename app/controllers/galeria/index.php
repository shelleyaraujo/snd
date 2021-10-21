<?php

require_once("app/controllers/core.php");

function _index($id="1",$idcat="0",$x=0,$y=0) {

  $core=new Core();
  $data = $core->getData($id,$idcat);

  $width = $data["config_site"][0]->crop_imagem_w_galeriap;
  $height = $data["config_site"][0]->crop_imagem_h_galeriap;
  
  $data['modulo'] = GetGaleria($id,$idcat,$data["ordem_registros"],$data["config_site"][0]->itens_galeria,$width,$height);

  $tema = $data["config_site"][0]->tema;

  View::do_dump(VIEW_PATH. $tema . '/galeria.php',$data);
}

function GetGaleria($id,$idcategoria,$ordem,$itens,$width,$height) {

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
  $drGaleria = array();
  $Galeria = new GaleriaModel();
  $Galeria->setIdCategoria($idcategoria);
  $o_modulos = new ModulosModel(); 
  $dr_modulos = $o_modulos->get_ordem_registros($idcategoria);
  $ordem_registro=$dr_modulos[1];
  $drGaleria = $Galeria->readItens($itens, $x, $y, $ordem_registro);

  $imagem = "semimagem.png";

  $r = "<nav id='nav-galeria'>";
  $r .= "<ul id='galeria' class='galeria'>";

  for ($i=0; $i <= count($drGaleria); $i++) {

    if(isset($drGaleria[$i][0])) {

      if($drGaleria[$i][0] > 0) {

       $imagem= str_replace("","",$drGaleria[$i][4]);
       $imagem= trim($imagem);

       if($imagem==""){$imagem="semimagem.jpg";}

       $r .= "<li>";
       if(isset($_SESSION["credencial"])) {
        if($_SESSION["credencial"] == "0" || $_SESSION["credencial"] == "1") {
          $r .= "<a  class='editar' href='". myUrl("tao/editar_galeria/?idgaleria=") . $drGaleria[$i][0] ."' class='editar'>Editar</a>";
        }
      } 
     
      $r .= "<div onclick=getImagem('".$imagem."','". $i ."');fullImagem()>";
      $r .= "<img src='" . myUrl("imagens/mini_" . $imagem) . "' alt='" . $imagem . "' title='" . $drGaleria[$i][3] . "' width='". $width."' height='200'>";
      $r .= "<p class='legenda-galeria'>" .$drGaleria[$i][3] . "</p>";
      $r .= "<div>";
      $r .= "</li>";
      $imgs .= $imagem . ",";
    }

    if($drGaleria[$i][0] == "#p#") {
      $pg = str_replace("?controle=page&acao=open&id=",myUrl("galeria/index/"),$drGaleria[$i][1]);
      $pg = str_replace("page","Galeria",$drGaleria[$i][1]);
      $pg = str_replace("?controle=page&acao=open&id=",myUrl("galeria/index/".$id),$drGaleria[$i][1]);
      $pg = str_replace("&idcategoria=","/" . "",$pg);
      $pg = str_replace("&x=","/?x=", $pg);
      $pg = str_replace("&y=","&y=", $pg);

    }
  }
}

$stringimg = "<input id='imagens' type='hidden' value='" . $imgs . "'>";

$r .= "</ul>";
$r .= "</nav>";


$r .= "<div>";
$r .= $pg;
$r .= "</div>";

return $r . $stringimg;

}

?>
