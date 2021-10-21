<?php

require_once("app/controllers/core.php");

function _detalhes($id="0",$idcategoria="0",$idcatalogo="0") { 

  $core=new Core();
  $data = $core->getData($id,$idcategoria);

  $data['catalogo_detalhes'] = readCatalogo($idcatalogo);

  $tema = $data["config_site"][0]->tema;
  View::do_dump(VIEW_PATH. $tema . '/catalogo_detalhes.php',$data);
}

function readCatalogo($idcatalogo)
{
  $Config = new ConfigModel();
  $config = $Config->readItensXmlConfig();

  $dr = array();
  $dr_catalogo = array();
  $Catalogos = new CatalogoModel();
  $Catalogos->setId($idcatalogo);
  $dr_catalogo = $Catalogos->readItem();

  $dr_catalogoMiniaturas = $Catalogos->readItemMiniaturas();

  $detalhes = "<div class='produtos-detalhes'>";

  if(isset($_SESSION["credencial"])) {
    if($_SESSION["credencial"] == "0" || $_SESSION["credencial"] == "1") {
      $detalhes .= "<a  class='editar' href='". myUrl("tao/catalogo_detalhes/?idcatalogo=") . $dr_catalogo[0] ."' class='editar'>Editar</a>";
    }
  } 

  $detalhes .= "<h2 class='detalhes-titulo'><strong>" . $dr_catalogo[4] . "</strong></h2>"; // TITULO

  if($config[0]->cat_codigo == "1"){
    $detalhes .= "<p class='detalhes-codigo'>Código: " . $dr_catalogo[3] . "</p>"; // CODIGO DO ITEM
  }

  if($config[0]->preco == "1"){

    if($dr_catalogo[5] > 0) {
    $detalhes .= "<p class='detalhes-preco'>R$ " . number_format($dr_catalogo[5]/100,2,",",".") . "</p>"; // PREÇO 
  }

}

if($config[0]->promocao == "1"){
  $detalhes .= "<p class='detalhes-de'>" .  number_format($dr_catalogo[5]/100,2,",",".")  . "</p>";
  $detalhes .= "<p class='detalhes-por'>" .  number_format($dr_catalogo[6]/100,2,",",".")  . "</p>";
}

if($config[0]->cat_modelo == "1"){
  $detalhes .= "<div class='detalhes-modelos'>" .  $Catalogos->getModelos() . "</div>";
  $detalhes .= "<input type='hidden' name='modelo' id='modelo' value='xxx'>";
} 

$detalhes .= "<p></p>";
$detalhes .= "<p style='font-style: italic'>" . $dr_catalogo[15] . "</p>";

if($config[0]->cat_cor == "1"){
  $detalhes .= "<div class='detalhes-cores'>" .  $Catalogos->getCores() . "</div>";
  $detalhes .= "<input type='hidden' name='cor' id='cor' value=''>";
} 

if($config[0]->cat_tamanho == "1"){
  $detalhes .= "<div class='detalhes-tamanhos'>" .  $Catalogos->getTamanhos() . "</div>";
  $detalhes .= "<input type='hidden' name='tamanho' id='tamanho' value=''>";
} 

$detalhes .= "<p>" . str_replace("../../",myUrl(),$dr_catalogo[10]) . "</p>";

$detalhes .= get_imagem_fornecedor($dr_catalogo[12]);

  if($config[0]->cat_botao_comprar == "1"){ # se for 0 vai gerar o botão de orçamento
    $detalhes .= "<button type='button' id='setquantidade' class='button success'>Escolha a Quantidade</button>";
    $detalhes .= "<div id='quantidade'></div>";
  }
  
  # gera botão de compra / orçamento #
  if($config[0]->cat_botao_comprar == "0"){ # se for 0 vai gerar o botão de orçamento
    $detalhes .= "<button type='submit' name='add' class='button'>Colocar na Lista</button>";
    $detalhes .= "<input type='hidden' name='controle' value='PedidoOrcamento'>";
    $detalhes .= "<input type='hidden' name='acao' value='addPedidoItem'>";   
    $detalhes .= "<input type='hidden' name='tipo' value='1'>";   
  }
  
  if($dr_catalogo[5] > 0) {
  if($config[0]->cat_botao_comprar == "1"){ // se for 1 vai gerar o botão de compra
    $detalhes .= "<button type='submit' name='add' id='colocar-carrinho' class='button'>Colocar no Carrinho</button>";
    $detalhes .= "<input type='hidden' name='tipo' value='0'>";   
  }
}

  # fim gera botão de compra / orçamento #
  # 
  # 
$detalhes .="</div>";

  if( $dr_catalogo[7] == "0") { // SE O ESTOQUE FOR 0 NÃO APRESENTA O PRODUTO
    $detalhes  ="<div>";
    $detalhes .="Produto não disponível no momento !";
    $detalhes .="</div>";
  }

  $i=0;
  $imagem = "semimagem.jpg";

  $r = "";
  $imgs="";
  $img_ritch_card = "";

  foreach($dr_catalogoMiniaturas as $row[])    {
    $imagem = $row[$i][2];
    $imgs .= "<div class='swiper-slide'>";
    $imgs .= "<img src='" . myUrl("imagem_catalogo_500.php?imagem=" . $imagem) . "' alt='" . $imagem . "' title='" . $imagem . "'>";
    $imgs .= "</div>";
    $img_ritch_card = $imagem;
    $i++;
  }

  $r .= $imgs;

  $rich_card = "
  <div itemtype='http://schema.org/Product' itemscope>
  <meta itemprop='mpn' content='" . $dr_catalogo[0] . "' />
  <meta itemprop='name' content='". $dr_catalogo[4] . "' />
  <link itemprop='image' href='".  myUrl("imagem_catalogo_300.php?imagem=" . $img_ritch_card) ."' />
  <meta itemprop='description' content='". $dr_catalogo[15] ."' />
  <div itemprop='offers' itemtype='http://schema.org/Offer' itemscope>
  <link itemprop='url' href='". myUrl("/catalogo_detalhes/?idcatalogo=") . $dr_catalogo[0] ."' />
  <meta itemprop='availability' content='https://schema.org/InStock' />
  <meta itemprop='priceCurrency' content='BRL' />
  <meta itemprop='itemCondition' content='https://schema.org/UsedCondition' />
  <meta itemprop='price' content='" . number_format($dr_catalogo[5]/100,2,".",".") . "' />
  </div>
  </div>
  ";

  $dr[0] = $detalhes;
  $dr[1] = $r;
  $dr[2] = $dr_catalogo[0];
  $dr[3] = MontaTd( $dr_catalogo[0] );
  /* RITCH CARD */
  $dr[4] = $rich_card;

  return $dr;
}

function MontaTd($idcatalogo)
{
  $x=0; 
  $y=0;

  if(isset($_REQUEST["x"]))
  {
    $x = $_REQUEST["x"];
  }

  if(isset($_REQUEST["y"]))
  {
    $y = $_REQUEST["y"];
  }

  $dr = array();
  $drTD = array();
  $TD = new CatalogoComentariosModel();
  $TD->setIdCatalogo($idcatalogo);
  $drTD = $TD->readItens("1000", $x, $y, "id desc");

  $r = "<ul class='lista-itens-comentarios'>";
  $i=0;
  $pg = "";

  foreach ($drTD as $row[])
  {
    if ($row[$i][0] == "#p#") {

      $pg = str_replace("page","Textos",$row[$i][1]);

    } else if ($row[$i][0] > 0) {

      $r .= "<li>";
      $r .= "<div class='td-pergunta' onclick=setId(". $row[$i][0] .")>";
      $r .= $row[$i][2];
      $r .= "<div class='td-resposta'>";
      $r .= "R.: " . $row[$i][3];
      $r .= "</div>";
      $r .= "</div>";

      $r .= "</li>";
    }

    $i++;
  }

  $r .= "</ul>";


  $r .= "<div class=''>";
  $r .= "<div class=''>";
  $r .= $pg;
  $r .= "</div>";
  $r .= "</div>";

  return $r;
}

function carregaImagemAction(){
  echo $_POST["imagem"];
}


function get_imagem_fornecedor($idfornecedor) {

  $r = "";

  if($idfornecedor > 0) {
    $o_fornecedores = new FornecedoresModel();
    $o_fornecedores->setId($idfornecedor);
    $dr_fornecedores = $o_fornecedores->readFornecedor();

    $r = "<div style='margin-bottom: 20px'>";

    if($dr_fornecedores[2] != "") {
      $r .= "Fornecedor: '" . $dr_fornecedores[2] . "<br>";
    }

    if($dr_fornecedores[4] != "") {
      $r .= "<img src='" . myUrl("ImageImagens.php?imagem=" . $dr_fornecedores[4] . "&w=100&h=50&dir=fornecedores") . "'>";
    }

    $r .= "</div>";
  }

  return $r;

}

function get_name_fornecedor($idfornecedor) {

  $r = "";

  if($idfornecedor > 0) {
    $o_fornecedores = new FornecedoresModel();
    $o_fornecedores->setId($idfornecedor);
    $dr_fornecedores = $o_fornecedores->readFornecedor();
    if($r != "") {
      $r = $dr_fornecedores[1];
    }
  }

  return $r;

}