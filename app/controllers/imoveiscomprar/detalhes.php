<?php

require_once("app/controllers/core.php");

function _detalhes($id="0",$idcategoria="0",$idimovel="0") { 

  $core=new Core();
  $data = $core->getData($id,$idcategoria);

  $data['imovel_detalhes'] = readimoveis($idimovel);

  $tema = $data["config_site"][0]->tema;
  View::do_dump(VIEW_PATH. $tema . '/imoveis_detalhes.php',$data);
}

function readimoveis($idimovel)
{
  $Config = new ConfigModel();
  $config = $Config->readItensXmlConfig();

  $dr = array();
  $drimoveis = array();
  $imoveiss = new ImoveisModel();
  $imoveiss->setId($idimovel);
  $drimoveis = $imoveiss->readItem();

  $drimoveisMiniaturas = $imoveiss->readItemMiniaturas();

  $detalhes = "<div class='produtos-detalhes'>";
  $detalhes .= "<h2 class='detalhes-titulo'><strong>" . $drimoveis[4] . "</strong></h2>"; 
  $detalhes .= "<p class='detalhes-imovel'>Código: " . $drimoveis[3] . "</p>"; 
  $detalhes .= "<p class='detalhes-imovel'>" . $drimoveis[10] . "</p>"; 
  $detalhes .= "<p class='detalhes-imovel'>" . $drimoveis[11] . " - " . $drimoveis[12] .  "</p>"; 
  $detalhes .= "<p class='detalhes-imovel'>Área: " . $drimoveis[7] . "</p>"; 
  $detalhes .= "<p class='detalhes-imovel'>Dormitórios: " . $drimoveis[8] . " - Suites: " . $drimoveis[9] . "</p>"; 
  $detalhes .= "<p class='detalhes-preco'>Valor: R$ " . number_format($drimoveis[6]/100,2,",",".") . "</p>";  
  $detalhes .= "<p class='detalhes-imovel'>&nbsp;</p>"; 
  $detalhes .= "<p class='detalhes-imovel'>" . $drimoveis[15] . " - Suites: " . $drimoveis[9] . "</p>"; 

  $detalhes .="</div>";

  $i=0;
  $imagem = "semimagem.jpg";

  $r = "<div id='imagens-imovel'>";
  $imgs="";

  foreach($drimoveisMiniaturas as $row[])    {
    $imagem = $row[$i][2];
    $imgs .= $imagem;
    $i++;
  }

  $r .= "<input id='imagens' type='hidden' value='";
  $r .= $imgs;
  $r .= "'>";

  $r .="</div>";

  $dr[0] = $detalhes;
  $dr[1] = $r;
  $dr[2] = $drimoveis[0];

  return $dr;
}


function carregaImagemAction(){
  echo $_POST["imagem"];
}
