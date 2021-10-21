<?php

require_once("app/controllers/core.php");

function _index($id="0",$idcategoria="0",$x="0",$y="0") { 

  $core=new Core();
  $data = $core->getData($id,$idcategoria);

$busca= "casa";

  if(isset($_POST['busca'])) {
    if(preg_match("/[A-Z  | a-z]+/", $_POST['busca'])){ 
      $busca = $_POST['busca'];
      $x = $_POST['x'];
      $y = $_POST['y'];
    }
  } else {
    if(isset($_GET['busca'])) {
      $busca=$_GET['busca'];
    }
  }

  if(isset($_GET['busca'])) {
      $busca=$_GET['busca'];
    }

  if(isset($_GET['x'])) {
      $x = $_GET['x'];
      $y = $_GET['y'];
    }

  $data['imoveis'] = Montaimoveis($id,$idcategoria,$data["ordem_registros"],$data["config_site"][0]->itens_imoveis,$x,$y,$busca);

  $tema = $data["config_site"][0]->tema;
  View::do_dump(VIEW_PATH. $tema . '/imoveis.php',$data);
}

function Montaimoveis($id,$idcategoria,$ordem_imoveis,$itens,$x,$y,$busca)
{
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
  $drimoveis = array();
  $imoveis = new ImoveisModel();
  $drimoveis = $imoveis->read_itens_perfil("1000", $x, $y, $busca);

  $r="<div class='cnt-imoveis'>";
  $i=0;

  for ($i=0; $i <= count($drimoveis); $i++) {

    if(isset($drimoveis[$i][0])) {

      if($drimoveis[$i][0] > 0) {

       $drx=$imoveis->readItemImagem($drimoveis[$i][0]);
       $imagem=str_replace("","",$drx[0][2]);
       $imagem= trim($imagem);

       if($imagem==""){$imagem="semimagem.jpg";}

       $r .= "<div>";
       $r .= "<div>";
       $r .= "<a href='" . myUrl("imoveisalugar/detalhes/". $id . "/". $drimoveis[$i][2]) . "/". $drimoveis[$i][0] ."'>";
       $r .= "<img src='" . myUrl("ImageImagens.php?imagem=" . $imagem . "&w=300&h=225&dir=imoveis") . "'>";
       $r .= "</a>";
       $r .= "<p>" .$drimoveis[$i][4] . "</p>";
       $r .= "<p>Bairro: " .$drimoveis[$i][10] . "</p>";
       $r .= "<p>Cidade: " .$drimoveis[$i][11] . "</p>";
       $r .= "<p>Estado: " .$drimoveis[$i][12] . "</p>";
       $r .= "<p class='detalhes-preco'>Valor: R$ " . number_format($drimoveis[$i][6]/100,2,",",".") . "</p>"; 
       $r .= "</div>";
       $r .= "</div>";

     }

     if($drimoveis[$i][0] == "#p#") {
      $pg = str_replace("page","imoveispesquisa",$drimoveis[$i][1]);
      $pg = str_replace("?controle=page&acao=open&id=",myUrl("imoveispesquisa/index/"),$drimoveis[$i][1] . "&busca=" . $busca);
      $pg = str_replace("&idcategoria=","/",$pg);
      $pg = str_replace("&x=","/?busca=". $busca ."&x=",$pg);
     // $pg = str_replace("&y=","/",$pg);
    }
  }
}


$r .= "</div>";
$r .= "<div id='cnt-imoveis'></div>";



//$r .= "<div>";
//$r .= $pg;
//$r .= "</div>";
//
 $r .= "<input type='hidden' value='". $busca ."' id='palavra-a-pesquisar'>";
 $r .= "<button id='btn-pesquisa' class='button' onclick='busca_imoveis()'>Buscar mais...</button>";


return $r;

}

