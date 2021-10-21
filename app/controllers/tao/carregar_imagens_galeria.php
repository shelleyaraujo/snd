<?php

function _carregar_imagens_galeria() { 

  $r = "";
  $x=0;
  $y=0;
  $itens=1000;
  $modulo="galeria";
  $ordem = "id";

  if(isset($_GET["x"]))
  {
    $x = $_GET["x"];
  }

  if(isset($_GET["y"]))
  {
    $y = $_GET["y"];
  }

  $dr = array();
  $drImagem = array();
  $Imagem = new Imagens2Model();
  $drImagem = $Imagem->get_rows($itens, $x, $y, $modulo, $ordem);

  $r .= "<ul id='galeria' class='galeria'>";

  $i=0;
  $pg = "";
  $imgs ="";
  $imagem="";

  $r = "<ul class='imagens'>";
  foreach ($drImagem as $row[])
  {
    if ($row[$i][0] == "#p#") {
      $pg = str_replace("?controle=page&acao=open&id=",myUrl("galeria/index/"),$row[$i][1]);
      $pg = str_replace("&idcategoria=","/",$pg);
      $pg = str_replace("&x=","/",$pg);
      $pg = str_replace("&y=","/",$pg);
    } else if ($row[$i][0] > 0) {

      if($row[$i][2]!=""){$imagem=$row[$i][2];}

      $imagem=trim($imagem);

      $r .= "<li id='img" . $i . "'>";
      $r .= "<a href='javascript:void(0)' onclick=excluirImagem('". $imagem ."','img".$i."')>X</a>";
      $r .= "<img src='" . myUrl("ImageImagens.php?imagem=" . $imagem . "&w=100&h=25&dir=galeria") . "' onclick=passarImagem('". $imagem ."')>";
      $r .= "</li>";


    }
    $i++;
  }

  $r .= "</ul>";

  $r .= "<div>";
  $r .= $pg;
  $r .= "</div>";

  echo $r;

}


?>
