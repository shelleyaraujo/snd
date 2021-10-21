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

  $estoque = $dr_catalogo[7];

  $dr_catalogoMiniaturas = $Catalogos->readItemMiniaturas();

  $detalhes = "<div class='produtos-detalhes'>";

  if(isset($_SESSION["credencial"])) {
    if($_SESSION["credencial"] == "0" || $_SESSION["credencial"] == "1") {
      $detalhes .= "<a  class='editar' href='". myUrl("tao/catalogo_detalhes/?idcatalogo=") . $dr_catalogo[0] ."' class='editar'>Editar</a>";
    }
  } 

    $detalhes .= "<h2 class='detalhes-titulo'><strong><a href=''>" . $dr_catalogo[4] . "</a></strong></h2>"; // TITULO


    if($config[0]->cat_codigo == "1"){
     if($dr_catalogo[3] != ""){
      $detalhes .= "<p class='detalhes-codigo'>Código: " . $dr_catalogo[3] . "</p>"; // CODIGO DO ITEM
    }
  }


  $preco = $dr_catalogo[5];
  $precocusto = $dr_catalogo[6];
  $preco_formatado = "R$ " . number_format($dr_catalogo[5]/100,2,",",".");
  $precocusto_formatado = "R$ " . number_format($dr_catalogo[6]/100,2,",",".");

  if ($precocusto == 0) {
    if ($preco > 0) {
      $detalhes .= "<p class='detalhes-preco'>R$ " . number_format($dr_catalogo[5]/100,2,",",".") . "</p>"; // PREÇO 
    }
  } else {
    $detalhes .= "<div>";
    $detalhes .= "<p class='detalhes-de'>De: R$ " .  number_format($dr_catalogo[5]/100,2,",",".")  . "</p>";
    $detalhes .= "<p class='detalhes-por'>Por: R$ " .  number_format($dr_catalogo[6]/100,2,",",".")  . "</p>";
    $detalhes .= "</div>";
  }


  $itens_modelos=$Catalogos->getModelos();
  $itens_cores=$Catalogos->getCores();
  $itens_tamanhos=$Catalogos->getTamanhos();

  if($config[0]->cat_modelo == "1"){

    if($itens_modelos != "") {
      $detalhes .= "<div class='detalhes-modelos'>Modelo:" .  $Catalogos->getModelos() . "</div>";
    }

  } 


  if($config[0]->cat_cor == "1"){
    if($itens_cores != "") {
      $detalhes .= "<div class='detalhes-cores'>Cor:" .  $Catalogos->getCores() . "</div>";
    }
  } 

  if($config[0]->cat_tamanho == "1"){
    if($itens_tamanhos != "") {
      $detalhes .= "<div class='detalhes-tamanhos'>Tamanho:" .  $Catalogos->getTamanhos() . "</div>";
    }
  } 


  $detalhes .= "<input type='hidden' name='modelo' id='modelo' value='0'>";
  $detalhes .= "<input type='hidden' name='cor' id='cor' value='0'>";
  $detalhes .= "<input type='hidden' name='tamanho' id='tamanho' value='0'>";
  ##$detalhes .= "<p></p>";
  ##$detalhes .= "<p style='color: red'>Quantidade</p>";
  ##$detalhes .= "<a href='javascript:void(0)' onclick='subtrai_quantidade()'' style='padding: 0 15px'>-</a>";
  $detalhes .= "<input type='hidden' name='quantidade' value='1' maxlength='9' style='width: 30px'>";
  ##$detalhes .= "<a href='javascript:void(0)' onclick='adiciona_quantidade()'' style='padding: 0 15px'>+</a>";


    if($config[0]->cat_botao_comprar == "1"){ # se for 0 vai gerar o botão de orçamento
      //$detalhes .= "<button type='button' id='setquantidade' class='button success'>Escolha a Quantidade</button>";
      //$detalhes .= "<div id='quantidade'></div>";
      ## A LINHA ABAIXO E PARA O SITE ROOTSARTS ##
      //$detalhes .= "<a href='javascript;void(0)' class='zap-duvidas-comprar' onclick=zap_duvidas_comprar('". $dr_catalogo[0] ."','". $dr_catalogo[3] ."')>Dúvidas?</a>";
      $detalhes .= "<input type='hidden' name='controle' value='PedidoOrcamento'>";
      $detalhes .= "<input type='hidden' name='acao' value='addPedidoItem'>";   
      $detalhes .= "<input type='hidden' name='tipo' value='1'>";   
    }
    
    # gera botão de compra / orçamento #
    # 
    if($config[0]->cat_botao_comprar == "0"){ # se for 0 vai gerar o botão de orçamento
      $detalhes .= "<button type='submit' name='add' class='button'>Orçamento</button>";
    }
    
    if($dr_catalogo[5] > 0) {
    if($config[0]->cat_botao_comprar == "1"){ // se for 1 vai gerar o botão de compra
      $detalhes .= "<button type='submit' name='add' id='colocar-carrinho' class='button-primary'>Eu quero esta camiseta!</button>";
      $detalhes .= "<input type='hidden' name='tipo' value='0'>";   
    }
  }

  $detalhes .= "<p></p>";
  $detalhes .= "<p style='font-style: italic'>" . $dr_catalogo[15] . "</p>";

  $descricao ="";
  if($dr_catalogo[10] != "") {
    $descricao = "<p class='titulo_descricao'>Descrição Geral</p>";
  }

  $descricao .= str_replace("../../",myUrl(),$dr_catalogo[10]);

  $detalhes .= get_imagem_fornecedor($dr_catalogo[12]);

    # fim gera botão de compra / orçamento #
    # 
    # 
  $detalhes .="</div>";

    if( $dr_catalogo[7] <= 0) { // SE O ESTOQUE FOR 0 NÃO APRESENTA O PRODUTO
      $detalhes  ="<p>";
      $detalhes .="<span style='color: red;font-weight:bold'>Produto indisponível!</span>";
      $detalhes .="</p>";
    }

    $i=0;
    $imagem = "semimagem.jpg";

   //$r = "<div id='imagens-catalogo'>";
    
    $imgs="";
    $img_ritch_card = "";

    foreach($dr_catalogoMiniaturas as $row[])    {
      $imagem = trim($row[$i][2]);
      $imgs .= "<div onclick=carrega_imagem_grande('". $imagem ."') class='swiper-slide'>";
      $imgs .= "<img src='" . myUrl("ImageImagens.php?imagem=" . $imagem . "&w=600&h=400&dir=catalogo") . "' alt='" . $imagem . "' title='" . $imagem . "'>";
      $imgs .= "</div>";
      $img_ritch_card = $imagem;
      $i++;
    }

    $slider = "<div class='swiper-container'>";
    $slider .= "<div class='swiper-wrapper'>";
    $slider .= $imgs;
    $slider .= "</div>";   
    $slider .= "</div>";   

/*$r = "<div id='imagens-catalogo'>";
    $imgs="";

    foreach($dr_catalogoMiniaturas as $row[])    {
      $imagem = $row[$i][2];
      $imgs .= $imagem;
      $i++;
    }

    $r .= "<input id='imagens' type='hidden' value='";
    $r .= $imgs;
    $r .= "'>";

    */
    $rich_card = "
    <div itemtype='http://schema.org/Product' itemscope>
    <meta itemprop='mpn' content='" . $dr_catalogo[0] . "' />
    <meta itemprop='name' content='". $dr_catalogo[4] . "' />
    <link itemprop='image' href='".  myUrl("imagens/imagem.php?&dir=catalogop&w=200&h=225&imagem=" . $img_ritch_card) ."' />
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
    $dr[1] =  $slider;
    $dr[2] = $dr_catalogo[0];
    $dr[3] = MontaTd( $dr_catalogo[0] );
    $dr[4] = $rich_card;
    $dr[5] = $descricao;

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