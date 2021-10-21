<?php

function _busca() { 

  if(isset($_POST['x'])) {
    $x = $_POST['x'];
    $y = $_POST['y'];
  }

  $busca = $_POST['busca'];

  $r = "";

  $drpesquisa = array();
  $pesquisa = new PesquisaModel();

   $drpesquisa = $pesquisa->pesquisar($x, $y, $busca);


 if($drpesquisa != "") {
    $r .= $drpesquisa . "";
  } 

  if($r == "") {
    $r = "<div class='fim_pesquisa'>Fim da Pesquisa!</div><style>.button_pesquisa {display: none!important}</style>";
  }

  echo $r;

}
