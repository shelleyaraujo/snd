<?php

function _pesquisa() { 

  $r = "";
  $x = 0;
  $y = 0;

  if(isset($_POST['busca'])) {
    if(preg_match("/[A-Z  | a-z]+/", $_POST['busca'])){ 
      $busca = $_POST['busca'];
      $x = $_POST['x'];
      $y = $_POST['y'];
      $r = Montaimoveis($x,$y,$busca);
    }
  } else {
    if(isset($_GET['busca'])) {
      $busca=$_GET['busca'];
      $r = Montaimoveis($x,$y,$busca);
    }
  }

if($r != "")  
  echo $r;
} 

function Montaimoveis($x,$y,$busca) {

  if(isset($x))  {
    $x = $x;
  }

  if(isset($y))  {
    $y = $y;
  }

  $dr = array();
  $drimoveis = array();
  $imoveis = new ImoveisModel();
  $drimoveis = $imoveis->busca_imoveis("1000", $x, $y, $busca);

  $r="<div class='cnt-imoveis'>";
  $i=0;

  foreach ($drimoveis as $row[])
  {
    if ($row[$i][0] == "#p#") {

      $pg = str_replace("page","Imoveis",$row[$i][1]);
      $pg = str_replace("?controle=page&acao=open&id=",myUrl("imoveiscomprar/index/"),$row[$i][1]);
      $pg = str_replace("&idcategoria=","/",$pg);
      $pg = str_replace("&x=","/",$pg);
      $pg = str_replace("&y=","/",$pg);

    } else if ($row[$i][0] > 0) {                
     $drx=$imoveis->readItemImagem($row[$i][0]);
     $imagem=str_replace("","",$drx[0][2]);
     $imagem= trim($imagem);

     if($imagem==""){$imagem="semimagem.jpg";}

     $r .= "<div>";
     $r .= "<div>";

     $r .= "<a href='" . myUrl("imoveiscomprar/detalhes/1/". $row[$i][2]) . "/". $row[$i][0] ."'>";
     $r .= "<img src='" . myUrl("ImageImagens.php?imagem=" . $imagem . "&w=300&h=225&dir=imoveis") . "'>";
     $r .= "</a>";
     $r .= "<a href='" . myUrl("imoveiscomprar/detalhes/1/". $row[$i][2]) . "/". $row[$i][0] ."'>";
     $r .= "<h2>" .$row[$i][5] . " - " . $row[$i][3] . "</h2>";

     $r .= "</a>";
     $r .= "<p>" .$row[$i][4] . "</p>";
     $r .= "<p>Bairro: " .$row[$i][10] . "</p>";
     $r .= "<p>Cidade: " .$row[$i][11] . "</p>";
     $r .= "<p>Estado: " .$row[$i][12] . "</p>";
     $r .= "<p class='detalhes-preco'>Valor: R$ " . number_format($row[$i][6]/100,2,",",".") . "</p>"; // PREÇO 

     if(isset($_SESSION["credencial"])) {
      if($_SESSION["credencial"] == "0" || $_SESSION["credencial"] == "1") {
        $r .= "<a  class='editar' href='". myUrl("tao/imoveis_detalhes/?idimovel=") . $row[$i][0] ."' class='editar'>Editar</a>";
      }
    }

    $r .= "</div>";
    $r .= "</div>";
  }

  $i++;
}
$r .= "</div>";

//$r .= "<div>";
//$r .= $pg;
//$r .= "</div>";

return $r;

}

