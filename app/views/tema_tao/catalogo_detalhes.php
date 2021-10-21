<?php include_once "_compress_code.php"; ?>
<?php include_once "head.php"; ?>

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
$descricao = $catalogo[5];
?>

<body>

  <div id="addItem">
    <div class="AddItemfechar" onclick="AddItemfechar()"></div>
    <div class="AddItemInfo"></div>
    <a class="AddItemLinkCarrinho" href="<?php echo myUrl() ?>pedidos/carrinho">Ver carrinho</a>
  </div>

  <a class="skip-link xxx" href="#maincontent">Skip to main</a>

  <?php include_once "cabecalho.php"; ?>
  <?php //include_once "slider.php"; ?>

  <main id="maincontent">


   <div class="container">
     <h1><?php echo $titulotextomodulo; ?></h1>
   </div>

   
   <div class="container">
    <?php echo $textomodulo; ?>

    <div class="container" id="detalhes">
     <div class="a">

       <?php echo $imagens; ?>

     </div>
     <div class="b">
       <input id="id" type='hidden' value="0" />
       <div id="info"></div>
       <form id="add-item" method='POST' onsubmit="return add_item();" >
         <?php echo $rich_card; ?>
         <?php echo $detalhes; ?>
         <input type='hidden' id='idcatalogo' name='idcatalogo' value='<?php echo $idcatalogo; ?>'>       
       </form>
       <?php echo $descricao; ?>
     </div>
     <div class="c">
     </div>
   </div>
 </div>


</main>

<div class="container">
  <?php echo $textomodulo; ?>
  <?php echo $ondeestou; ?> 
</div>

<?php include_once "rodape.php"; ?>



<style>

#addItem {
  position: fixed;
  top: 45%;
  left: 50%;
  margin-left: -150px;
  width: 300px;
  text-align: center;
  padding: 20px;
  background: #264653;
  color: white;
  display: none;
  z-index: 9;
}
.AddItemfechar{
  position: relative;
  text-align: right;
}
.AddItemfechar:before {
  content: "";
  border: 1px solid #264653;
  position: absolute;
  z-index: 99;
  position: absolute;
  top: -30px;
  right: -30px;
  padding: 15px;
  border-radius: 50%;
  background-color: white;
  background-position: center;
  background-repeat: no-repeat;
  background-size: 40%;
  background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDQwOS44MDYgNDA5LjgwNiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMiIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgY2xhc3M9IiI+PGc+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+Cgk8Zz4KCQk8cGF0aCBkPSJNMjI4LjkyOSwyMDUuMDFMNDA0LjU5NiwyOS4zNDNjNi43OC02LjU0OCw2Ljk2OC0xNy4zNTIsMC40Mi0yNC4xMzJjLTYuNTQ4LTYuNzgtMTcuMzUyLTYuOTY4LTI0LjEzMi0wLjQyICAgIGMtMC4xNDIsMC4xMzctMC4yODIsMC4yNzctMC40MiwwLjQyTDIwNC43OTYsMTgwLjg3OEwyOS4xMjksNS4yMWMtNi43OC02LjU0OC0xNy41ODQtNi4zNi0yNC4xMzIsMC40MiAgICBjLTYuMzg4LDYuNjE0LTYuMzg4LDE3LjA5OSwwLDIzLjcxM0wxODAuNjY0LDIwNS4wMUw0Ljk5NywzODAuNjc3Yy02LjY2Myw2LjY2NC02LjY2MywxNy40NjgsMCwyNC4xMzIgICAgYzYuNjY0LDYuNjYyLDE3LjQ2OCw2LjY2MiwyNC4xMzIsMGwxNzUuNjY3LTE3NS42NjdsMTc1LjY2NywxNzUuNjY3YzYuNzgsNi41NDgsMTcuNTg0LDYuMzYsMjQuMTMyLTAuNDIgICAgYzYuMzg3LTYuNjE0LDYuMzg3LTE3LjA5OSwwLTIzLjcxMkwyMjguOTI5LDIwNS4wMXoiIGZpbGw9IiNmZjAwMDAiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD4KCTwvZz4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8L2c+PC9zdmc+)
}

.AddItemLinkCarrinho {
  position: relative;
  padding-left: 30px;
  margin-top: 20px;
  display: inline-block;
  color: white;
}

.AddItemLinkCarrinho:before {
  content: "";
  border: 1px solid #264653;
  position: absolute;
  z-index: 99;
  position: absolute;
  top: -4px;
  left: 0;
  padding: 10px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: 100%;
  background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxnPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPGc+CgkJPHBhdGggZD0iTTUwOC43NjQsNzQuNDY2Yy0yLjgwMy0zLjUwMy03LjA0Ni01LjU0Mi0xMS41MzMtNS41NDJIMTA0LjE1Mkw5My4xNiwyMS4yOTRjLTEuNTQ3LTYuNzAxLTcuNTE0LTExLjQ0OC0xNC4zOTEtMTEuNDQ4ICAgIGgtNjRDNi42MTMsOS44NDYsMCwxNi40NTksMCwyNC42MTZzNi42MTMsMTQuNzY5LDE0Ljc2OSwxNC43NjlINjcuMDJsNzQuNjEyLDMyMy4zMjFjMS41NDYsNi43MDEsNy41MTQsMTEuNDQ4LDE0LjM5MSwxMS40NDggICAgaDI5NS45MTVjOC4xNTcsMCwxNC43NjktNi42MTMsMTQuNzY5LTE0Ljc2OWMwLTguMTU3LTYuNjEzLTE0Ljc2OS0xNC43NjktMTQuNzY5SDE2Ny43NzNsLTExLjM2LTQ5LjIzMWgyOTYuNTExICAgIGM2LjkwOCwwLDEyLjg5My00Ljc4OCwxNC40MDktMTEuNTI3TDUxMS42NCw4Ni45MzVDNTEyLjYyNSw4Mi41NTcsNTExLjU2Nyw3Ny45Nyw1MDguNzY0LDc0LjQ2NnogTTQ0MS4xMDgsMjY1Ljg0NkgxNDkuNTk2ICAgIEwxMTAuOTY5LDk4LjQ2MmgzNjcuOEw0NDEuMTA4LDI2NS44NDZ6IiBmaWxsPSIjZmZmZmZmIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIj48L3BhdGg+Cgk8L2c+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KCTxnPgoJCTxwYXRoIGQ9Ik0yMTYuNjE1LDM5My44NDZjLTI5Ljg2LDAtNTQuMTU0LDI0LjI5My01NC4xNTQsNTQuMTU0czI0LjI5Myw1NC4xNTQsNTQuMTU0LDU0LjE1NGMyOS44NiwwLDU0LjE1NC0yNC4yOTMsNTQuMTU0LTU0LjE1NCAgICBTMjQ2LjQ3NiwzOTMuODQ2LDIxNi42MTUsMzkzLjg0NnogTTIxNi42MTUsNDcyLjYxNkMyMDMuMDQyLDQ3Mi42MTYsMTkyLDQ2MS41NzMsMTkyLDQ0OHMxMS4wNDItMjQuNjE1LDI0LjYxNS0yNC42MTUgICAgYzEzLjU3MywwLDI0LjYxNSwxMS4wNDIsMjQuNjE1LDI0LjYxNVMyMzAuMTg4LDQ3Mi42MTYsMjE2LjYxNSw0NzIuNjE2eiIgZmlsbD0iI2ZmZmZmZiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiI+PC9wYXRoPgoJPC9nPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+Cgk8Zz4KCQk8cGF0aCBkPSJNMzkzLjg0NiwzOTMuODQ2Yy0yOS44NiwwLTU0LjE1NCwyNC4yOTMtNTQuMTU0LDU0LjE1NHMyNC4yOTMsNTQuMTU0LDU0LjE1NCw1NC4xNTRjMjkuODYsMCw1NC4xNTQtMjQuMjkzLDU0LjE1NC01NC4xNTQgICAgUzQyMy43MDcsMzkzLjg0NiwzOTMuODQ2LDM5My44NDZ6IE0zOTMuODQ2LDQ3Mi42MTZjLTEzLjU3MywwLTI0LjYxNS0xMS4wNDItMjQuNjE1LTI0LjYxNXMxMS4wNDItMjQuNjE1LDI0LjYxNS0yNC42MTUgICAgYzEzLjU3MywwLDI0LjYxNSwxMS4wNDIsMjQuNjE1LDI0LjYxNVM0MDcuNDE5LDQ3Mi42MTYsMzkzLjg0Niw0NzIuNjE2eiIgZmlsbD0iI2ZmZmZmZiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiI+PC9wYXRoPgoJPC9nPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjwvZz48L3N2Zz4=)
}

#cnt-slider {
  border: 5px solid red;
}

#detalhes {
 display: -webkit-box;
 display: -moz-box;
 display: -ms-flexbox;
 display: -webkit-flex;
 display: flex;  
 align-items: stretch;
 align-content: center;
 justify-content: center;
 flex-wrap: wrap;
 width: 100%;
 max-width: 1200px;
 margin: 0 auto;
 flex-wrap: wrap;
 padding: 0 15px;
}

#detalhes .a {
  width: 100%;  
}

#detalhes .b {
  width: 100%;
}

#detalhes .c {
  width: 100%;
}
#detalhes .c img {
  width: 100%;
  max-width: 300px;
  height: auto;
}

.titulo_descricao {
  text-align: left;
  font-size: 20px;
  border-bottom: 1px solid #ccc;
  color: #264653;
}

.detalhes-de {
  text-decoration: line-through;
  margin-bottom: 10px;
  font-size: 0.8em;
  line-height: 0;
  color: #555;
}

.detalhes-por {
  font-weight: 400;
  font-size: 1.2em;
}



.detalhes-titulo a {
  font-size: 25px;
  font-weight: bold;
}

.onde-estou {
  margin: 0 auto;
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;  
  align-items: stretch;
  align-content: center;
  justify-content: flex-start;
  flex-wrap: wrap;
  width: 100%;
  max-width: 1200px;
  list-style: none;
  padding: 0;
  border-top: 1px solid silver;
  border-bottom: 1px solid silver;
  padding: 5px 15px;
  margin-bottom: 20px;
}

.onde-estou a {
  padding: 10px;
}
.onde-estou li {
 margin-bottom: 0;
}

#tire-duvidas {
 display: -webkit-box;
 display: -moz-box;
 display: -ms-flexbox;
 display: -webkit-flex;
 display: flex;  
 align-items: stretch;
 align-content: center;
 justify-content: center;
 flex-wrap: wrap;
 width: 100%;
 max-width: 1024px;
 margin: 0 auto;
 border: 5px solid lightblue;
 flex-wrap: wrap;
}

@font-face{font-family:swiper-icons;src:url('data:application/font-woff;charset=utf-8;base64, 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') format('woff');font-weight:400;font-style:normal}:root{--swiper-theme-color:#264653}.swiper-container{margin-left:auto;margin-right:auto;position:relative;overflow:hidden;list-style:none;padding:0;z-index:1}.swiper-container-vertical>.swiper-wrapper{flex-direction:column}.swiper-wrapper{position:relative;width:100%;height:100%;z-index:1;display:flex;transition-property:transform;box-sizing:content-box}.swiper-container-android .swiper-slide,.swiper-wrapper{transform:translate3d(0px,0,0)}.swiper-container-multirow>.swiper-wrapper{flex-wrap:wrap}.swiper-container-multirow-column>.swiper-wrapper{flex-wrap:wrap;flex-direction:column}.swiper-container-free-mode>.swiper-wrapper{transition-timing-function:ease-out;margin:0 auto}.swiper-slide{flex-shrink:0;width:100%;height:100%;position:relative;transition-property:transform}.swiper-slide-invisible-blank{visibility:hidden}.swiper-container-autoheight,.swiper-container-autoheight .swiper-slide{height:auto}.swiper-container-autoheight .swiper-wrapper{align-items:flex-start;transition-property:transform,height}.swiper-container-3d{perspective:1200px}.swiper-container-3d .swiper-cube-shadow,.swiper-container-3d .swiper-slide,.swiper-container-3d .swiper-slide-shadow-bottom,.swiper-container-3d .swiper-slide-shadow-left,.swiper-container-3d .swiper-slide-shadow-right,.swiper-container-3d .swiper-slide-shadow-top,.swiper-container-3d .swiper-wrapper{transform-style:preserve-3d}.swiper-container-3d .swiper-slide-shadow-bottom,.swiper-container-3d .swiper-slide-shadow-left,.swiper-container-3d .swiper-slide-shadow-right,.swiper-container-3d .swiper-slide-shadow-top{position:absolute;left:0;top:0;width:100%;height:100%;pointer-events:none;z-index:10}.swiper-container-3d .swiper-slide-shadow-left{background-image:linear-gradient(to left,rgba(0,0,0,.5),rgba(0,0,0,0))}.swiper-container-3d .swiper-slide-shadow-right{background-image:linear-gradient(to right,rgba(0,0,0,.5),rgba(0,0,0,0))}.swiper-container-3d .swiper-slide-shadow-top{background-image:linear-gradient(to top,rgba(0,0,0,.5),rgba(0,0,0,0))}.swiper-container-3d .swiper-slide-shadow-bottom{background-image:linear-gradient(to bottom,rgba(0,0,0,.5),rgba(0,0,0,0))}.swiper-container-css-mode>.swiper-wrapper{overflow:auto;scrollbar-width:none;-ms-overflow-style:none}.swiper-container-css-mode>.swiper-wrapper::-webkit-scrollbar{display:none}.swiper-container-css-mode>.swiper-wrapper>.swiper-slide{scroll-snap-align:start start}.swiper-container-horizontal.swiper-container-css-mode>.swiper-wrapper{scroll-snap-type:x mandatory}.swiper-container-vertical.swiper-container-css-mode>.swiper-wrapper{scroll-snap-type:y mandatory}:root{--swiper-navigation-size:44px}.swiper-button-next,.swiper-button-prev{position:absolute;top:50%;width:calc(var(--swiper-navigation-size)/ 44 * 27);height:var(--swiper-navigation-size);margin-top:calc(-1 * var(--swiper-navigation-size)/ 2);z-index:10;cursor:pointer;display:flex;align-items:center;justify-content:center;color:var(--swiper-navigation-color,var(--swiper-theme-color))}.swiper-button-next.swiper-button-disabled,.swiper-button-prev.swiper-button-disabled{opacity:.35;cursor:auto;pointer-events:none}.swiper-button-next:after,.swiper-button-prev:after{font-family:swiper-icons;font-size:var(--swiper-navigation-size);text-transform:none!important;letter-spacing:0;text-transform:none;font-variant:initial}.swiper-button-prev,.swiper-container-rtl .swiper-button-next{left:10px;right:auto}.swiper-button-prev:after,.swiper-container-rtl .swiper-button-next:after{content:'prev'}.swiper-button-next,.swiper-container-rtl .swiper-button-prev{right:10px;left:auto}.swiper-button-next:after,.swiper-container-rtl .swiper-button-prev:after{content:'next'}.swiper-button-next.swiper-button-white,.swiper-button-prev.swiper-button-white{--swiper-navigation-color:#ffffff}.swiper-button-next.swiper-button-black,.swiper-button-prev.swiper-button-black{--swiper-navigation-color:#000000}.swiper-button-lock{display:none}.swiper-pagination{position:absolute;text-align:center;transition:.3s opacity;transform:translate3d(0,0,0);z-index:10}.swiper-pagination.swiper-pagination-hidden{opacity:0}.swiper-container-horizontal>.swiper-pagination-bullets,.swiper-pagination-custom,.swiper-pagination-fraction{bottom:10px;left:0;width:100%}.swiper-pagination-bullets-dynamic{overflow:hidden;font-size:0}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet{transform:scale(.33);position:relative}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active{transform:scale(1)}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-main{transform:scale(1)}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-prev{transform:scale(.66)}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-prev-prev{transform:scale(.33)}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-next{transform:scale(.66)}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-next-next{transform:scale(.33)}.swiper-pagination-bullet{width:8px;height:8px;display:inline-block;border-radius:100%;background:#000;opacity:.2}button.swiper-pagination-bullet{border:none;margin:0;padding:0;box-shadow:none;-webkit-appearance:none;-moz-appearance:none;appearance:none}.swiper-pagination-clickable .swiper-pagination-bullet{cursor:pointer}.swiper-pagination-bullet-active{opacity:1;background:var(--swiper-pagination-color,var(--swiper-theme-color))}.swiper-container-vertical>.swiper-pagination-bullets{right:10px;top:50%;transform:translate3d(0px,-50%,0)}.swiper-container-vertical>.swiper-pagination-bullets .swiper-pagination-bullet{margin:6px 0;display:block}.swiper-container-vertical>.swiper-pagination-bullets.swiper-pagination-bullets-dynamic{top:50%;transform:translateY(-50%);width:8px}.swiper-container-vertical>.swiper-pagination-bullets.swiper-pagination-bullets-dynamic .swiper-pagination-bullet{display:inline-block;transition:.2s transform,.2s top}.swiper-container-horizontal>.swiper-pagination-bullets .swiper-pagination-bullet{margin:0 4px}.swiper-container-horizontal>.swiper-pagination-bullets.swiper-pagination-bullets-dynamic{left:50%;transform:translateX(-50%);white-space:nowrap}.swiper-container-horizontal>.swiper-pagination-bullets.swiper-pagination-bullets-dynamic .swiper-pagination-bullet{transition:.2s transform,.2s left}.swiper-container-horizontal.swiper-container-rtl>.swiper-pagination-bullets-dynamic .swiper-pagination-bullet{transition:.2s transform,.2s right}.swiper-pagination-progressbar{background:rgba(0,0,0,.25);position:absolute}.swiper-pagination-progressbar .swiper-pagination-progressbar-fill{background:var(--swiper-pagination-color,var(--swiper-theme-color));position:absolute;left:0;top:0;width:100%;height:100%;transform:scale(0);transform-origin:left top}.swiper-container-rtl .swiper-pagination-progressbar .swiper-pagination-progressbar-fill{transform-origin:right top}.swiper-container-horizontal>.swiper-pagination-progressbar,.swiper-container-vertical>.swiper-pagination-progressbar.swiper-pagination-progressbar-opposite{width:100%;height:4px;left:0;top:0}.swiper-container-horizontal>.swiper-pagination-progressbar.swiper-pagination-progressbar-opposite,.swiper-container-vertical>.swiper-pagination-progressbar{width:4px;height:100%;left:0;top:0}.swiper-pagination-white{--swiper-pagination-color:#ffffff}.swiper-pagination-black{--swiper-pagination-color:#000000}.swiper-pagination-lock{display:none}.swiper-scrollbar{border-radius:10px;position:relative;-ms-touch-action:none;background:rgba(0,0,0,.1)}.swiper-container-horizontal>.swiper-scrollbar{position:absolute;left:1%;bottom:3px;z-index:50;height:5px;width:98%}.swiper-container-vertical>.swiper-scrollbar{position:absolute;right:3px;top:1%;z-index:50;width:5px;height:98%}.swiper-scrollbar-drag{height:100%;width:100%;position:relative;background:rgba(0,0,0,.5);border-radius:10px;left:0;top:0}.swiper-scrollbar-cursor-drag{cursor:move}.swiper-scrollbar-lock{display:none}.swiper-zoom-container{width:100%;height:100%;display:flex;justify-content:center;align-items:center;text-align:center}.swiper-zoom-container>canvas,.swiper-zoom-container>img,.swiper-zoom-container>svg{max-width:100%;max-height:100%;object-fit:contain}.swiper-slide-zoomed{cursor:move}.swiper-lazy-preloader{width:42px;height:42px;position:absolute;left:50%;top:50%;margin-left:-21px;margin-top:-21px;z-index:10;transform-origin:50%;animation:swiper-preloader-spin 1s infinite linear;box-sizing:border-box;border:4px solid var(--swiper-preloader-color,var(--swiper-theme-color));border-radius:50%;border-top-color:transparent}.swiper-lazy-preloader-white{--swiper-preloader-color:#fff}.swiper-lazy-preloader-black{--swiper-preloader-color:#000}@keyframes swiper-preloader-spin{100%{transform:rotate(360deg)}}.swiper-container .swiper-notification{position:absolute;left:0;top:0;pointer-events:none;opacity:0;z-index:-1000}.swiper-container-fade.swiper-container-free-mode .swiper-slide{transition-timing-function:ease-out}.swiper-container-fade .swiper-slide{pointer-events:none;transition-property:opacity}.swiper-container-fade .swiper-slide .swiper-slide{pointer-events:none}.swiper-container-fade .swiper-slide-active,.swiper-container-fade .swiper-slide-active .swiper-slide-active{pointer-events:auto}.swiper-container-cube{overflow:visible}.swiper-container-cube .swiper-slide{pointer-events:none;-webkit-backface-visibility:hidden;backface-visibility:hidden;z-index:1;visibility:hidden;transform-origin:0 0;width:100%;height:100%}.swiper-container-cube .swiper-slide .swiper-slide{pointer-events:none}.swiper-container-cube.swiper-container-rtl .swiper-slide{transform-origin:100% 0}.swiper-container-cube .swiper-slide-active,.swiper-container-cube .swiper-slide-active .swiper-slide-active{pointer-events:auto}.swiper-container-cube .swiper-slide-active,.swiper-container-cube .swiper-slide-next,.swiper-container-cube .swiper-slide-next+.swiper-slide,.swiper-container-cube .swiper-slide-prev{pointer-events:auto;visibility:visible}.swiper-container-cube .swiper-slide-shadow-bottom,.swiper-container-cube .swiper-slide-shadow-left,.swiper-container-cube .swiper-slide-shadow-right,.swiper-container-cube .swiper-slide-shadow-top{z-index:0;-webkit-backface-visibility:hidden;backface-visibility:hidden}.swiper-container-cube .swiper-cube-shadow{position:absolute;left:0;bottom:0px;width:100%;height:100%;background:#000;opacity:.6;-webkit-filter:blur(50px);filter:blur(50px);z-index:0}.swiper-container-flip{overflow:visible}.swiper-container-flip .swiper-slide{pointer-events:none;-webkit-backface-visibility:hidden;backface-visibility:hidden;z-index:1}.swiper-container-flip .swiper-slide .swiper-slide{pointer-events:none}.swiper-container-flip .swiper-slide-active,.swiper-container-flip .swiper-slide-active .swiper-slide-active{pointer-events:auto}.swiper-container-flip .swiper-slide-shadow-bottom,.swiper-container-flip .swiper-slide-shadow-left,.swiper-container-flip .swiper-slide-shadow-right,.swiper-container-flip .swiper-slide-shadow-top{z-index:0;-webkit-backface-visibility:hidden;backface-visibility:hidden}

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


.detalhes-modelos ul {
  list-style: none;
  padding: 0;
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;  
  align-items: stretch;
  align-content: center;
  justify-content: flex-start;
  flex-wrap: wrap;
}

.detalhes-modelos li {
  padding: 5px 10px;
  width: auto;
  margin-right: 5px;
  cursor: pointer;
  background: black;
  color: white;
  border: 1px solid transparent;
}

.detalhes-modelos li:hover {
  border: 1px solid gold;
}

.detalhes-cores ul {
  list-style: none;
  padding: 0;
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;  
  align-items: stretch;
  align-content: center;
  justify-content: flex-start;
  flex-wrap: wrap;
}

.detalhes-cores li {
  border: 1px solid black;
  padding: 5px;
  width: 35px;
  margin-right: 5px;
  color: transparent;
  overflow: hidden;
  cursor: pointer;
    border: 1px solid silver;
}

.detalhes-cores li:hover {
  border: 1px solid gold;
}


.detalhes-tamanhos ul {
  list-style: none;
  padding: 0;
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;  
  align-items: stretch;
  align-content: center;
  justify-content: flex-start;
  flex-wrap: wrap;
}

.detalhes-tamanhos li {
  padding: 5px 10px;
  width: auto;
  margin-right: 5px;
  cursor: pointer;
  background: black;
  color: white;
    border: 1px solid transparent;

}


.detalhes-tamanhos li:hover {
  border: 1px solid gold;
}

@media (min-width: 768px) {
  #detalhes {
   display: -webkit-box;
   display: -moz-box;
   display: -ms-flexbox;
   display: -webkit-flex;
   display: flex;  
   align-items: stretch;
   align-content: center;
   justify-content: center;
   flex-wrap: wrap;

 }

 #detalhes .a {
  width: 50%;  
}

#detalhes .b {
  width: 50%;
  padding-left: 15px;
}

#detalhes .c {
  width: 100%;
}

#detalhes .c img {
  width: 100%;
  max-width: 300px;
  height: auto;
  float: right;
  margin-left: 15px;
}

}

</style>

<script>

  function setModelo(id,valor){
    document.getElementById(id).style.border = "1px solid gold";
    document.getElementById("modelo").value = valor;
  }

  function setCor(id,valor){
    document.getElementById(id).style.border = "1px solid gold";
    document.getElementById("cor").value = valor;
  }

  function setTamanho(id,valor){
    document.getElementById(id).style.border = "1px solid gold";
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


  function add_item() {
   var detalhes_modelos = document.querySelector(".detalhes-modelos ul");
   var modelo = document.getElementById("modelo").value;
   var detalhes_cores = document.querySelector(".detalhes-cores ul");
   var cor = document.getElementById("cor").value;
   var detalhes_tamanhos = document.querySelector(".detalhes-tamanhos ul");
   var tamanho = document.getElementById("tamanho").value;
   var addItem = document.querySelector("#addItem");
   var AddItemInfo = document.querySelector(".AddItemInfo");
      var AddItemLinkCarrinho = document.querySelector(".AddItemLinkCarrinho");

   var tudo_escolhido = "";

   if(detalhes_modelos != null && modelo == "0") {
     tudo_escolhido="Selecione o Modelo";
   } else  if(detalhes_cores != null && cor == "0") {
     tudo_escolhido="Selecione a Cor";
   } else  if(detalhes_tamanhos != null && tamanho == "0") {
     tudo_escolhido="Selecione o Tamanho";
   } 

   if(tudo_escolhido != "") {
    addItem.style.display = "block";
     AddItemInfo.innerHTML = tudo_escolhido;
     AddItemLinkCarrinho.style.display = "none";
   }

   if(tudo_escolhido == "") {
     addItem.style.display = "block";
     xhr = new XMLHttpRequest();
     xhr.open('POST', '<?php echo myUrl('pedidos/add') ?>');
     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
     xhr.onload = function() {
      if (xhr.status === 200) {
        AddItemInfo.innerHTML = xhr.responseText;
         AddItemLinkCarrinho.style.display = "inline-block";
      }
      else if (xhr.status !== 200) {
       AddItemInfo.innerHTML = "Não foi possível adicionar no carringo! Erro: " + xhr.status;
        AddItemLinkCarrinho.style.display = "none";
     }
   };
   xhr.send(encodeURI('idcatalogo=' + idcatalogo.value + "&acao=addPedidoItem&quantidade=1&modelo=" + modelo + "&cor=" + cor + "&tamanho=" + tamanho));
 } 


 return false;

}

function xxxxxxxxxxxxxxxxxxxadd_item() {
 var addItem = document.querySelector("#addItem");
 addItem.style.display = "block";
 var AddItemInfo = document.querySelector(".AddItemInfo");
 var modelo = document.getElementById("modelo").value;
 var cor = document.getElementById("cor").value;
 var tamanho = document.getElementById("tamanho").value,

 xhr = new XMLHttpRequest();
 xhr.open('POST', '<?php echo myUrl('pedidos/add') ?>');
 xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
 xhr.onload = function() {
  if (xhr.status === 200) {
    AddItemInfo.innerHTML = xhr.responseText;
  }
  else if (xhr.status !== 200) {
   AddItemInfo.innerHTML = "Não foi possível adicionar no carringo! Erro: " + xhr.status;
 }
};

xhr.send(encodeURI('idcatalogo=' + idcatalogo.value + "&acao=addPedidoItem&quantidade=1&modelo=" + modelo + "&cor=" + cor + "&tamanho=" + tamanho));
return false;
}

function AddItemfechar() {
 var addItem = document.querySelector("#addItem");
 addItem.style.display = "none";
}


</script>

</body>

</html>

<?php include_once "_final.php"; ?>
