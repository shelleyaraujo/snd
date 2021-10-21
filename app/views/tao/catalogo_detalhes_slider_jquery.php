<?php 
$catalogo = array();
$catalogo = $catalogo_detalhes;
$catalogominiatura='';
$idcatalogo = $catalogo[2];
$detalhes = $catalogo[0];
$imagens = $catalogo[1];
$td = $catalogo[3];
$rich_card = $catalogo[4];
$titulo = $catalogo[1];
$preco = $catalogo[1];
$cor = $catalogo[1];
$tamanho = $catalogo[1];
$peso = $catalogo[1];
?>

<?php include_once "_inicial.php"; ?>

<!doctype html>

<html lang="pt-BR" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="TAO Shelley Araujo">
  <meta name="description" content="<?php echo $meta[6]?>">
  <meta name="keywords" content="<?php echo $meta[7]?>">

  <meta property="og:url"                content="<?php echo $url ?>" />
  <meta property="og:type"               content="article" />
  <meta property="og:title"              content="<?php echo $meta[8]?>" />
  <meta property="og:description"        content="<?php echo $meta[6]?>" />
  <!--<meta property="og:site_name"          content="<?php echo $config[0]->marca; ?>">-->
  <meta property="og:image"              content="<?php echo $logo ?>" />

  <link rel="icon" type="image/png" href="<?php echo myUrl("./imagens/favicon.png")?>">

  <title><?php echo $meta[8]?></title>  

  <?php include_once "estilo.php"; ?>
  <?php include_once "_js_geral.php"; ?>

</head>


<body>

 <?php include_once "header.php"; ?>
 <?php include_once "slider.php"; ?>

 <main>

   <div class="cnt-titulo">
    <h1><?php echo $titulotextomodulo; ?></h1>
  </div>

  <div class="cnt-conteudo">
    <?php echo $textomodulo; ?>
    <?php echo $ondeestou; ?> 
  </div>

</main>

<div class="cnt-detalhes">

 <div>

  <input id="id" type='hidden' value="0" />

  <div id="cnt-slider">
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <?php echo $imagens; ?> 
      </div>
      <div class="swiper-pagination"></div>
      <!--<div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>-->
      </div>
    </div>

    <div id="info"></div>

  </div>
  <div>
    <form id="add-item" method='POST' action="<?php echo myUrl('pedidos/add_item') ?>">
     <?php echo $rich_card; ?>
     <?php echo $detalhes; ?>
     <input type='hidden' id='idcatalogo' name='idcatalogo' value='<?php echo $idcatalogo; ?>'>       
   </form>

<!--
 <div id="tire-duvidas">
   <h3>Tire suas dúvidas ou comente sobre este produto</h3>
   <form  method="POST">
    <input type="hidden" name="classe" value="">
    <textarea name="editor1" id="editor1" rows="2" cols="80"></textarea>
    <input type="hidden" name="id" value="">
    <input type='hidden' name='controle' value='CatalogoDetalhes'>
    <input type='hidden' name='acao' value='addTd'>
    <input type='hidden' id="id" name='id' value='0'>
    <input type='hidden' name='idcatalogo' value='<?php echo $catalogo[2]; ?>'>
    <button type="submit" name="atualizar" class="button success">Comentar</button>
  </form>
  <?php echo $td; ?>
</div>
-->

</div>
</div>

<?php include_once "footer.php"; ?>
<?php include_once "estilo.php"; ?>
<style>

  .cnt-modulo {
    width: 100%;
    max-width: 1024px;
    margin: 0 auto;
    padding: 0 15px;
  }

  .detalhes-preco {
    font-size: 20px;
    font-weight: bold;
    color: mediumvioletred;
  }

  #tire-duvidas {
    border: 1px solid skyblue;
    background-color: aliceblue;
    width: 100%;
    box-sizing: border-box;
    display: block;
    padding-top: 20px;
    margin-top: 50px;
    padding: 20px;
  }

  #tire-duvidas textarea {
    width: 100%;
    box-sizing: border-box;

  }

  #cnt-imagens {
    height: 100%;
    position: relative;
    top: 0;
    z-index: 9999999;
    left: 0;
    right: 0;
    text-align: center;
  }

  #xximg  { 
    line-height: 100%;
  }

  #ximg img { 
    width: 100%; height: auto; position: relative;
    border: 10px solid white;
  }

  #ximg:before {
    position: absolute; content: ""; border: 5px solid #e9d3a8; 
    border-top: 5px solid #dcbe8a; 
    border-bottom: 5px solid #dcbe8a; 
    border-radius: 50%; 
    width: 30px; height: 30px;
    animation: spin 2s linear infinite; z-index: -1; left: 50%; top: 50%;
  }

  @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); }}

  #img-reduzida {
    display: none;
    cursor: pointer;
    padding-right: 50px;
  }

  #img-direita,
  #img-ampliada {
    display: none;
  }

  .arrow-right.icon {
    color: #ff0000;
    position: absolute;
    margin-left: 2px;
    margin-top: 10px;
    width: 16px;
    height: 1px;
    background-color: transparent;
    top: 50%;
    margin-top: -20px;
    right: -18px;
    border-width: 5px 0 15px 15px;
    border-style: solid solid solid solid; 
    border-color: transparent transparent transparent transparent; 
    cursor: pointer;
  }

  .arrow-right.icon:after {
    content: '';
    position: absolute;
    right: 15px;
    top: -5px;
    width: 10px;
    height: 10px;
    -webkit-transform: rotate(45deg);
    transform: rotate(45deg);
    color: red;
    border-top: 1px solid red;
    border-right: 1px solid red;
  }

  .arrow-right.icon:before {
    content: '';
    position: absolute;
    right: 1px;
    top: -5px;
    width: 10px;
    height: 10px;
    -webkit-transform: rotate(45deg);
    transform: rotate(45deg);
  }

  .arrow-left.icon {
    color: #ff0000;
    position: absolute;
    margin-left: 3px;
    margin-top: 10px;
    width: 16px;
    height: 1px;
    background-color: transparent;
    top: 50%;
    margin-top: -20px;
    left: -15px;;
    border-width: 15px 0 15px 15px;
    border-style: solid solid solid solid; 
    border-color: transparent transparent transparent transparent; 
    cursor: pointer;
  }

  .arrow-left.icon:after {
    content: "";
    width: 12px;
    position: absolute;
    left: 0;
  }

  .arrow-left.icon:before {
    content: '';
    position: absolute;
    left: 1px;
    top: -5px;
    width: 10px;
    height: 10px;
    border-top: solid 1px currentColor;
    border-right: solid 1px currentColor;
    -webkit-transform: rotate(-135deg);
    transform: rotate(-135deg);
  }


  .zoom.icon {
    color: #000;
    position: absolute;
    margin-left: 2px;
    margin-top: 2px;
    width: 15px;
    height: 15px;
    border-radius: 1px;
    border: solid 1px currentColor;
    cursor: pointer;
    left: 50%;
  }

  .zoom.icon:before {
    content: '';
    position: absolute;
    left: 3px;
    top: -2px;
    width: 9px;
    height: 19px;
    color: white;
    background-color: currentColor;
    -webkit-transform-origin: center;
    transform-origin: center;
  }

  .zoom.icon:after {
    content: '';
    position: absolute;
    left: 3px;
    top: -2px;
    width: 9px;
    height: 19px;
    color: white;
    background-color: currentColor;
    -webkit-transform-origin: center;
    transform-origin: center;
    -webkit-transform: rotate(90deg);
    transform: rotate(90deg);
  }

  .zoom-.icon {
    position: relative;
    width: 20px;
    height: 20px;
    border-radius: 100%;
    top: 0;
    left: 100%;
  }

  .zoom-.icon:before {
    content: "";
    width: 20px;
    position: absolute;
    border-top: 1px solid white;
    -webkit-transform: rotate(45deg);
    transform: rotate(45deg);  top: 50%;
    left: 50%;
    margin-left: -5px;
  }

  .zoom-.icon:after {
    content: "";
    width: 20px;
    position: absolute;
    border-top: 1px solid white;
    -webkit-transform: rotate(-45deg);
    transform: rotate(-45deg);  top: 50%;
    left: 50%;
    margin-left: -5px;
  }

  .enlarge-img {
    position: absolute;
    background: #000;
    background: rgba(000,000,000,0.8); 
    z-index: 9999;
  }

  .cnt-catalogo {
    display: block;
    border: 0px solid silver;
    background-color: white;
    padding: 0;
    box-sizing: border-box;
  }

  .cnt-catalogo > div {
    padding: 20px;
  }

  .detalhes-titulo {
    padding: 0;
    text-align: left;
  }

  .detalhes-de:before {
    content: "DE:";
    font-size: 12px;
    color: red;
  }

  .detalhes-por:before {
    content: "POR:";
    font-size: 12px;
    color: tomato;
  }

  .detalhes-de {
    font-size: 18px;
    color: red;
    display: inline;
    width: auto;
    margin-right: 20px;
  }

  .detalhes-por {
    font-size: 25px;
    color: tomato;
    display: inline;
  }

  .cnt-catalogo fieldset {
    margin-top: 20px;
    margin-bottom: 20px;
    border: 1px solid skyblue;
    background-color: aliceblue;
  }

  .detalhes-modelos ul:before {
    content: "Modelo:";
    padding-top: 10px;
    padding-right: 10px;
  }


  .detalhes-modelos ul {
    display: flex;
    flex-wrap: wrap;
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .detalhes-modelos li {
    cursor: pointer;
    padding: 10px;
    border: 1px solid silver;
    margin-right: 5px;
    margin-bottom: 5px;
  }

  .detalhes-modelos li:last-child {
    margin-right: 0;
  }

  .detalhes-modelos li:hover {
    cursor: pointer;
    padding: 10px;
    border: 1px solid tomato;
  }

  .detalhes-cores ul:before {
    content: "Cor: ";
    padding-right: 10px;
    padding-top: 1px;
  }

  .detalhes-cores ul {
    display: flex;
    flex-wrap: wrap;
    list-style: none;
    margin: 0;
    padding: 0;
    margin-bottom: 15px;
  }

  .detalhes-cores li {
    cursor: pointer;
    padding: 1px;
    border: 1px solid silver;
    margin-right: 1px;
    color: transparent;
    margin-bottom: 1px;
    width: 20px;
  }

  .detalhes-cores li:last-child {
    margin-right: 0;
  }

  .detalhes-cores li:hover {
    cursor: pointer;
    padding: 1px;
    border: 1px solid tomato;
  }

  .detalhes-tamanhos ul:before {
    content: "Tamanho: ";
    padding-right: 10px;
    padding-top: 10px;
  }

  .detalhes-tamanhos ul {
    display: flex;
    flex-wrap: wrap;
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .detalhes-tamanhos li {
    cursor: pointer;
    padding: 10px;
    border: 1px solid silver;
    margin-right: 5px;
    color: tomato;
    margin-bottom: 5px;
  }

  .detalhes-tamanhos li:last-child {
    margin-right: 0;
  }

  .detalhes-tamanhos li:hover {
    cursor: pointer;
    padding: 10px;
    border: 1px solid tomato;
  }


  .lista-itens-comentarios {
    list-style: none;
    margin: 0;
    padding: 0;
  }


  .lista-itens-comentarios li{
    padding: 10px;
    padding-left: 0;
  }

  .cnt-detalhes {
    display: block;
    align-items: center;
    align-content: center;
    justify-content: center;
    box-sizing: border-box;
    width: 100%;
    max-width: 1024px;
    margin: 0 auto;
    margin-top: 25px;
  }

  .cnt-detalhes .button {
    display: block;
    max-width: 200px;
    text-align: center;
    margin-top: 20px;
  }


  #setquantidade {
    display: none;
  }

  @media (min-width: 550px) {

    #next {
      position: absolute; 
      top: 50%;
      right: 0;
      font-size: 0;
      margin-top: 0;
      z-index: 99999;
    }

    #prev {
      position: absolute; 
      top: 50%;
      left: 0;
      font-size: 0;
      margin-top: 0;
      z-index: 99999;
    }

    #next:before {
      content: "";
      border-top: 10px solid transparent;
      border-bottom: 10px solid transparent;
      border-left: 10px solid tomato;
      border-right: 10px solid transparent;
    }

    #prev:before {
      content: "";
      border-top: 10px solid transparent;
      border-bottom: 10px solid transparent;
      border-left: 10px solid transparent;
      border-right: 10px solid tomato;
    }

    .cnt-detalhes {
      display: grid;
      align-items: stretch;
      align-content: flex-start;
      justify-content: center;
      grid-template-columns:  50% 50%;
      box-sizing: border-box;
      width: 100%;
      max-width: 1024px;
      margin: 0 auto;
      margin-top: 25px;
    }

    .cnt-catalogo {
      display: flex;
      border: 0px solid silver;
      background-color: white;
      max-width: 1024px;
      margin-left: auto;
      margin-right: auto;
      box-sizing: border-box;
    }

    .c-imagens {
      order: 1;
      width: 50%;
    }

    .c-detalhes {
      order: 2;
      width: 50%;
    }

    #ximg img { 
      max-width: 100%;
      height: auto;
    }


    #img-direita,
    #img-ampliada {
      display: block;
    }

    .arrow-right.icon {
      right: 2px;
    }

  }

  /*NOVO*/

  .cnt-detalhes > div {
    padding: 0;
    box-sizing: border-box;
  }
  .cnt-detalhes > div:nth-child(2) {
    padding: 20px;
    box-sizing: border-box;
    background-color: white;
  }

  #start-slider {
    display: block;
    font-size: 12px;
    text-transform: uppercase;
    cursor: pointer;
  }

  #stop-slider {
    display: none;
    font-size: 12px;
    text-transform: uppercase;
    cursor: pointer;
  }

  .slideInLeft {
    -webkit-animation-name: slideInLeft;
    animation-name: slideInLeft;
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;

  }

  @-webkit-keyframes slideInLeft {
    0% {
      -webkit-transform: translateX(-100%);
      transform: translateX(-100%);
      visibility: visible;
    }
    100% {
      -webkit-transform: translateX(0);
      transform: translateX(0);
    }
  }
  @keyframes slideInLeft {
    0% {
      -webkit-transform: translateX(-100%);
      transform: translateX(-100%);
      visibility: visible;
    }
    100% {
      -webkit-transform: translateX(0);
      transform: translateX(0);
    }
  } 

</style>


<style>

  #cnt-slider {
    position: relative;
    width: 100%;
    max-width: 100%;
    min-height: auto;
    padding: 0 15px;
  }

  #cnt-slider img {
    width: 100%;
    max-width: 100%;
    height: auto!important;
  }

  #info {
    display: none;
  }



  #loader {
    position: absolute;
    display: none;
    border: 5px solid transparent; 
    border-right: 5px solid red; 
    border-top: 5px solid red; 
    border-bottom: 5px solid red; 
    border-radius: 100%;
    width: 30px;
    height: 30px;
    animation: spin 2s linear infinite;
    top: 50%;
    margin-top: -15px;
    left: 50%;
    margin-left: -15px;
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
  @keyframes opacidade {
    from { -webkit-filter: grayscale(0); filter: grayscale(0); }
    to { -webkit-filter: grayscale(5); filter: grayscale(5); }
  }

</style>



<style>

  @font-face{font-family:swiper-icons;src:url('data:application/font-woff;charset=utf-8;base64, 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') format('woff');font-weight:400;font-style:normal}:root{--swiper-theme-color:#5499C7}.swiper-container{margin-left:auto;margin-right:auto;position:relative;overflow:hidden;list-style:none;padding:0;z-index:1}.swiper-container-vertical>.swiper-wrapper{flex-direction:column}.swiper-wrapper{position:relative;width:100%;height:100%;z-index:1;display:flex;transition-property:transform;box-sizing:content-box}.swiper-container-android .swiper-slide,.swiper-wrapper{transform:translate3d(0px,0,0)}.swiper-container-multirow>.swiper-wrapper{flex-wrap:wrap}.swiper-container-multirow-column>.swiper-wrapper{flex-wrap:wrap;flex-direction:column}.swiper-container-free-mode>.swiper-wrapper{transition-timing-function:ease-out;margin:0 auto}.swiper-slide{flex-shrink:0;width:100%;height:100%;position:relative;transition-property:transform}.swiper-slide-invisible-blank{visibility:hidden}.swiper-container-autoheight,.swiper-container-autoheight .swiper-slide{height:auto}.swiper-container-autoheight .swiper-wrapper{align-items:flex-start;transition-property:transform,height}.swiper-container-3d{perspective:1200px}.swiper-container-3d .swiper-cube-shadow,.swiper-container-3d .swiper-slide,.swiper-container-3d .swiper-slide-shadow-bottom,.swiper-container-3d .swiper-slide-shadow-left,.swiper-container-3d .swiper-slide-shadow-right,.swiper-container-3d .swiper-slide-shadow-top,.swiper-container-3d .swiper-wrapper{transform-style:preserve-3d}.swiper-container-3d .swiper-slide-shadow-bottom,.swiper-container-3d .swiper-slide-shadow-left,.swiper-container-3d .swiper-slide-shadow-right,.swiper-container-3d .swiper-slide-shadow-top{position:absolute;left:0;top:0;width:100%;height:100%;pointer-events:none;z-index:10}.swiper-container-3d .swiper-slide-shadow-left{background-image:linear-gradient(to left,rgba(0,0,0,.5),rgba(0,0,0,0))}.swiper-container-3d .swiper-slide-shadow-right{background-image:linear-gradient(to right,rgba(0,0,0,.5),rgba(0,0,0,0))}.swiper-container-3d .swiper-slide-shadow-top{background-image:linear-gradient(to top,rgba(0,0,0,.5),rgba(0,0,0,0))}.swiper-container-3d .swiper-slide-shadow-bottom{background-image:linear-gradient(to bottom,rgba(0,0,0,.5),rgba(0,0,0,0))}.swiper-container-css-mode>.swiper-wrapper{overflow:auto;scrollbar-width:none;-ms-overflow-style:none}.swiper-container-css-mode>.swiper-wrapper::-webkit-scrollbar{display:none}.swiper-container-css-mode>.swiper-wrapper>.swiper-slide{scroll-snap-align:start start}.swiper-container-horizontal.swiper-container-css-mode>.swiper-wrapper{scroll-snap-type:x mandatory}.swiper-container-vertical.swiper-container-css-mode>.swiper-wrapper{scroll-snap-type:y mandatory}:root{--swiper-navigation-size:44px}.swiper-button-next,.swiper-button-prev{position:absolute;top:50%;width:calc(var(--swiper-navigation-size)/ 44 * 27);height:var(--swiper-navigation-size);margin-top:calc(-1 * var(--swiper-navigation-size)/ 2);z-index:10;cursor:pointer;display:flex;align-items:center;justify-content:center;color:var(--swiper-navigation-color,var(--swiper-theme-color))}.swiper-button-next.swiper-button-disabled,.swiper-button-prev.swiper-button-disabled{opacity:.35;cursor:auto;pointer-events:none}.swiper-button-next:after,.swiper-button-prev:after{font-family:swiper-icons;font-size:var(--swiper-navigation-size);text-transform:none!important;letter-spacing:0;text-transform:none;font-variant:initial}.swiper-button-prev,.swiper-container-rtl .swiper-button-next{left:10px;right:auto}.swiper-button-prev:after,.swiper-container-rtl .swiper-button-next:after{content:'prev'}.swiper-button-next,.swiper-container-rtl .swiper-button-prev{right:10px;left:auto}.swiper-button-next:after,.swiper-container-rtl .swiper-button-prev:after{content:'next'}.swiper-button-next.swiper-button-white,.swiper-button-prev.swiper-button-white{--swiper-navigation-color:#ffffff}.swiper-button-next.swiper-button-black,.swiper-button-prev.swiper-button-black{--swiper-navigation-color:#000000}.swiper-button-lock{display:none}.swiper-pagination{position:absolute;text-align:center;transition:.3s opacity;transform:translate3d(0,0,0);z-index:10}.swiper-pagination.swiper-pagination-hidden{opacity:0}.swiper-container-horizontal>.swiper-pagination-bullets,.swiper-pagination-custom,.swiper-pagination-fraction{bottom:10px;left:0;width:100%}.swiper-pagination-bullets-dynamic{overflow:hidden;font-size:0}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet{transform:scale(.33);position:relative}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active{transform:scale(1)}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-main{transform:scale(1)}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-prev{transform:scale(.66)}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-prev-prev{transform:scale(.33)}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-next{transform:scale(.66)}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-next-next{transform:scale(.33)}.swiper-pagination-bullet{width:8px;height:8px;display:inline-block;border-radius:100%;background:#000;opacity:.2}button.swiper-pagination-bullet{border:none;margin:0;padding:0;box-shadow:none;-webkit-appearance:none;-moz-appearance:none;appearance:none}.swiper-pagination-clickable .swiper-pagination-bullet{cursor:pointer}.swiper-pagination-bullet-active{opacity:1;background:var(--swiper-pagination-color,var(--swiper-theme-color))}.swiper-container-vertical>.swiper-pagination-bullets{right:10px;top:50%;transform:translate3d(0px,-50%,0)}.swiper-container-vertical>.swiper-pagination-bullets .swiper-pagination-bullet{margin:6px 0;display:block}.swiper-container-vertical>.swiper-pagination-bullets.swiper-pagination-bullets-dynamic{top:50%;transform:translateY(-50%);width:8px}.swiper-container-vertical>.swiper-pagination-bullets.swiper-pagination-bullets-dynamic .swiper-pagination-bullet{display:inline-block;transition:.2s transform,.2s top}.swiper-container-horizontal>.swiper-pagination-bullets .swiper-pagination-bullet{margin:0 4px}.swiper-container-horizontal>.swiper-pagination-bullets.swiper-pagination-bullets-dynamic{left:50%;transform:translateX(-50%);white-space:nowrap}.swiper-container-horizontal>.swiper-pagination-bullets.swiper-pagination-bullets-dynamic .swiper-pagination-bullet{transition:.2s transform,.2s left}.swiper-container-horizontal.swiper-container-rtl>.swiper-pagination-bullets-dynamic .swiper-pagination-bullet{transition:.2s transform,.2s right}.swiper-pagination-progressbar{background:rgba(0,0,0,.25);position:absolute}.swiper-pagination-progressbar .swiper-pagination-progressbar-fill{background:var(--swiper-pagination-color,var(--swiper-theme-color));position:absolute;left:0;top:0;width:100%;height:100%;transform:scale(0);transform-origin:left top}.swiper-container-rtl .swiper-pagination-progressbar .swiper-pagination-progressbar-fill{transform-origin:right top}.swiper-container-horizontal>.swiper-pagination-progressbar,.swiper-container-vertical>.swiper-pagination-progressbar.swiper-pagination-progressbar-opposite{width:100%;height:4px;left:0;top:0}.swiper-container-horizontal>.swiper-pagination-progressbar.swiper-pagination-progressbar-opposite,.swiper-container-vertical>.swiper-pagination-progressbar{width:4px;height:100%;left:0;top:0}.swiper-pagination-white{--swiper-pagination-color:#ffffff}.swiper-pagination-black{--swiper-pagination-color:#000000}.swiper-pagination-lock{display:none}.swiper-scrollbar{border-radius:10px;position:relative;-ms-touch-action:none;background:rgba(0,0,0,.1)}.swiper-container-horizontal>.swiper-scrollbar{position:absolute;left:1%;bottom:3px;z-index:50;height:5px;width:98%}.swiper-container-vertical>.swiper-scrollbar{position:absolute;right:3px;top:1%;z-index:50;width:5px;height:98%}.swiper-scrollbar-drag{height:100%;width:100%;position:relative;background:rgba(0,0,0,.5);border-radius:10px;left:0;top:0}.swiper-scrollbar-cursor-drag{cursor:move}.swiper-scrollbar-lock{display:none}.swiper-zoom-container{width:100%;height:100%;display:flex;justify-content:center;align-items:center;text-align:center}.swiper-zoom-container>canvas,.swiper-zoom-container>img,.swiper-zoom-container>svg{max-width:100%;max-height:100%;object-fit:contain}.swiper-slide-zoomed{cursor:move}.swiper-lazy-preloader{width:42px;height:42px;position:absolute;left:50%;top:50%;margin-left:-21px;margin-top:-21px;z-index:10;transform-origin:50%;animation:swiper-preloader-spin 1s infinite linear;box-sizing:border-box;border:4px solid var(--swiper-preloader-color,var(--swiper-theme-color));border-radius:50%;border-top-color:transparent}.swiper-lazy-preloader-white{--swiper-preloader-color:#fff}.swiper-lazy-preloader-black{--swiper-preloader-color:#000}@keyframes swiper-preloader-spin{100%{transform:rotate(360deg)}}.swiper-container .swiper-notification{position:absolute;left:0;top:0;pointer-events:none;opacity:0;z-index:-1000}.swiper-container-fade.swiper-container-free-mode .swiper-slide{transition-timing-function:ease-out}.swiper-container-fade .swiper-slide{pointer-events:none;transition-property:opacity}.swiper-container-fade .swiper-slide .swiper-slide{pointer-events:none}.swiper-container-fade .swiper-slide-active,.swiper-container-fade .swiper-slide-active .swiper-slide-active{pointer-events:auto}.swiper-container-cube{overflow:visible}.swiper-container-cube .swiper-slide{pointer-events:none;-webkit-backface-visibility:hidden;backface-visibility:hidden;z-index:1;visibility:hidden;transform-origin:0 0;width:100%;height:100%}.swiper-container-cube .swiper-slide .swiper-slide{pointer-events:none}.swiper-container-cube.swiper-container-rtl .swiper-slide{transform-origin:100% 0}.swiper-container-cube .swiper-slide-active,.swiper-container-cube .swiper-slide-active .swiper-slide-active{pointer-events:auto}.swiper-container-cube .swiper-slide-active,.swiper-container-cube .swiper-slide-next,.swiper-container-cube .swiper-slide-next+.swiper-slide,.swiper-container-cube .swiper-slide-prev{pointer-events:auto;visibility:visible}.swiper-container-cube .swiper-slide-shadow-bottom,.swiper-container-cube .swiper-slide-shadow-left,.swiper-container-cube .swiper-slide-shadow-right,.swiper-container-cube .swiper-slide-shadow-top{z-index:0;-webkit-backface-visibility:hidden;backface-visibility:hidden}.swiper-container-cube .swiper-cube-shadow{position:absolute;left:0;bottom:0px;width:100%;height:100%;background:#000;opacity:.6;-webkit-filter:blur(50px);filter:blur(50px);z-index:0}.swiper-container-flip{overflow:visible}.swiper-container-flip .swiper-slide{pointer-events:none;-webkit-backface-visibility:hidden;backface-visibility:hidden;z-index:1}.swiper-container-flip .swiper-slide .swiper-slide{pointer-events:none}.swiper-container-flip .swiper-slide-active,.swiper-container-flip .swiper-slide-active .swiper-slide-active{pointer-events:auto}.swiper-container-flip .swiper-slide-shadow-bottom,.swiper-container-flip .swiper-slide-shadow-left,.swiper-container-flip .swiper-slide-shadow-right,.swiper-container-flip .swiper-slide-shadow-top{z-index:0;-webkit-backface-visibility:hidden;backface-visibility:hidden}

  .swiper-container {
    width: 100%;
    height: auto!important;
    margin-left: auto;
    margin-right: auto;
  }


  .swiper-wrapper img {
    display: block;
    width: 100%;
    max-width: 100%;
  }

  .swiper-slide {
    text-align: center;
    background: #fff;
    display: -webkit-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    -webkit-align-items: center;
    align-items: center;
    box-sizing: border-box;
  }

  .swiper-slide > div {
    box-sizing: border-box;
    display: -webkit-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    -webkit-align-items: center;
    align-items: center;
    box-sizing: border-box;
    position: absolute;
  }

  .slider-padrao {
    width: 100%;
    max-width: 500px;
    background-color: black;
    padding: 20px;
    padding-bottom: 2px;
    box-sizing: border-box;
  }

  .swiper-slide > div {
    box-sizing: border-box;
    display: block;
  }

  .swiper-wrapper {
    height: auto;
    box-sizing: border-box;
  }

  .slider-padrao {
    width: 100%;
    max-width: 100%;
    background-color: black;
    padding: 20px;
    padding-bottom: 2px;
    box-sizing: border-box;
  }

  .slider-padrao p{
    color: white;
  }

  .slider-padrao a {
    color: gray;
  }

  @media (min-width: 768px) {


  }

</style>

<script>

  function setModelo(id,valor){
    document.getElementById(id).style.border = "3px double tomato";
    document.getElementById("modelo").value = valor;
  }

  function setCor(id,valor){
    document.getElementById(id).style.border = "3px double tomato";
    document.getElementById("cor").value = valor;
  }

  function setTamanho(id,valor){
    document.getElementById(id).style.border = "3px double tomato";
    document.getElementById("tamanho").value = valor;
  }

  document.getElementById("setquantidade").addEventListener("click", setquantidade);

  function setquantidade() {

    var idcatalogo = document.getElementById("idcatalogo").value;
    var modelo = document.getElementById("modelo").value;
    var cor = document.getElementById("cor").value;
    var tamanho = document.getElementById("tamanho").value,
    xhr = new XMLHttpRequest();

    xhr.open('POST', '<?php  echo myUrl('catalogo/set_quantidade/') ?>');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
       document.getElementById("info").innerHTML = xhr.responseText;
       document.getElementById("colocar-carrinho").style.display = "block";
     }
     else if (xhr.status !== 200) {
      alert(xhr.status);
    }
  };
  xhr.send(encodeURI('idcatalogo=' + idcatalogo  + '&modelo=' + modelo + '&cor=' + cor+ '&tamanho=' + tamanho));
}

</script>


<script>


  var swiper_container = document.querySelectorAll(".swiper-container img");

  console.log(swiper_container.length);

  if(swiper_container.length > 1) {

    var swiper = new Swiper('.swiper-container', {
      spaceBetween: 0,
      centeredSlides: true,
      loop: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

  }

</script>

</body>

</html>

<?php include_once "_final.php"; ?>
