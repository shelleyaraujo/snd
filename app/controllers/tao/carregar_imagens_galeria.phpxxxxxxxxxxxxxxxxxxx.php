<?php

function _carregar_imagens_galeria() { 

  $o_imagens = new FilesModel();
  $drimagens = $o_imagens->openDir("imagens/galeria/");
  $r = $drimagens;

  $i=0;
  $x=0;
  $y=100;

  if(isset($_POST["x"])) { $x += $_POST["x"]; }
  if(isset($_POST["y"])) { $y += $_POST["y"]; }

  $total=$x;

  $r = "<ul class='imagens'>";
  foreach ($drimagens as $key => $value) {
    if($i > $x && $i < $y) {
      if($i > 1) {
        $r .= "<li id='img" . $i . "'>";
        $r .= "<a href='javascript:void(0)' onclick=excluirImagem('". $value ."','img".$i."')>X</a>";
        $r .= "<img src='" . myUrl("ImageImagens.php?imagem=" . $value . "&w=100&h=25&dir=galeria") . "' onclick=passarImagem('". $value ."')>";
        $r .= "</li>";
      }
    }
    $i++;
  }

  $r .= "</ul>";

  echo $r;
}

?>
