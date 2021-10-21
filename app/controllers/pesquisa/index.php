<?php

require_once("app/controllers/core.php");


function _index() { 

  $core=new Core();
  $data = $core->getData($id="1",$idcat="0");

  $x = 0;
  $y = 5;

  $xx = 5;
  $yy = 10;

  if(isset($_POST['x'])) {
    $x = $_POST['x'];
    $y = $_POST['y'];
  }

  $busca = $_POST['busca'];


 $r = "";

    $r .= "<input type='hidden' id='palavra-a-pesquisar' value='". $busca ."'>";
  $r .= "<input type='hidden' id='x-pesquisa-item' value='".$xx."'>";
  $r .= "<input type='hidden' id='y-pesquisa-item' value='".$yy."'>";

 $drpesquisa = array();
 $pesquisa = new PesquisaModel();

 $drpesquisa = $pesquisa->pesquisar($x, $y, $busca);

if($drpesquisa != "") {
  $r .= "<div id='resultado-pesquisa'>";
  $r .= $drpesquisa;
  $r .= "</div>";

  $r .= "<button type='button' onclick=pesquisar() class='button_pesquisa'>Carregar mais</button>";
} else {
  $r .= "";
}

$data['pesquisa'] =  $r;


$tema = $data["config_site"][0]->tema;

View::do_dump(VIEW_PATH. $tema . '/pesquisa.php',$data);


}

