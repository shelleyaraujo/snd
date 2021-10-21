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
  </div>

</main>

<div class="cnt-modulo">
 <?php echo $modulo; ?> 
</div>

<?php echo $destaques; ?>

<?php include_once "footer.php"; ?>

<style>

.cnt-modulo {
  width: 100%;
  max-width: 1024px;
  margin: 0 auto;
  padding: 0 15px;
}

#nav-empilhados {
  width: 100%;
  display: flex;
  align-items: flex-start;
  align-content: flex-start;
  justify-content: flex-start; 
  flex-wrap: nowrap;
}

#nav-empilhados ul {
  text-align: left;
  list-style: none;
  margin: 0;
  padding: 0;
}

.conteudo-texto {
  margin-bottom: 50px;
}

#row-2 {
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
}

#row-2 iframe {
  width: 100%;
}



.menu-blog > p{
  color: mediumvioletred;
  font-size: 22px;
  text-align: center;
  line-height: 30px;
  margin-top: 0;
  margin-bottom: 20px;
}


.menu-blog ul{
  margin: 0;
  padding: 0;
  list-style: none;

}
.menu-blog li{
  padding: 0px 10px;
  border-bottom: 1px solid silver;
  position: relative;
}

.menu-blog li:before{
 content: "";
 padding: 5px;
 background: mediumvioletred;
 left: 50%;
 position: absolute;
 border-radius: 100%;
 bottom: -6px;
 margin-left: -2px;
}

.menu-blog li a{
  font-weight: bold!important;
  display: block;
  line-height: 1.6;
}

.menu-blog li:nth-child(odd) {
  
}


.menu-blog  small{
 color: mediumvioletred;
}


.cnt-textos-links {
  width: 100%;
  display: flex;
  align-items: flex-start;
  align-content: flex-start;
  justify-content: flex-start; 
  flex-wrap: wrap;
}


.cnt-textos-links > div {
  padding: 15px;
  overflow: hidden;
  margin-bottom: 100px;
  box-sizing: border-box;
}

.cnt-textos-links img {
  width: 100%;
  max-width: 400px;
  height: auto!important;
  float: left;
  margin-right: 20px;
  margin-top: 7px;
  padding-bottom: 20px;
}

.cnt-textos-links iframe {
  width: 100%;
  max-width: 400px;
  float: left;
  padding-right: 20px;
  margin-top: 7px;
}

.cnt-textos-links > div:nth-child(2) {
 border: 1px dashed mediumvioletred;
 /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#f7f2f6+0,f9e3f2+50,ffe8f8+100 */
 background: #f7f2f6; /* Old browsers */
 background: -moz-linear-gradient(-45deg, #f7f2f6 0%, #f9e3f2 50%, #ffe8f8 100%); /* FF3.6-15 */
 background: -webkit-linear-gradient(-45deg, #f7f2f6 0%,#f9e3f2 50%,#ffe8f8 100%); /* Chrome10-25,Safari5.1-6 */
 background: linear-gradient(135deg, #f7f2f6 0%,#f9e3f2 50%,#ffe8f8 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
 filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f7f2f6', endColorstr='#ffe8f8',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */

}



.cnt-textos-links  h2{
  color: mediumvioletred;
  text-align: left;
  padding: 0;
}

.textos-links > div{
  margin-bottom: 25px;
  border-bottom: 1px solid silver;
  overflow: hidden;
  padding-bottom: 20px;
  clear: both;
}

.cnt-textos-links  h1{
  color: mediumvioletred;
  text-align: left;
  padding: 0;
}

.textos-links  {
  border-top: 1px solid silver;
}

@media screen and (min-width: 550px) {

  .cnt-textos-links {
    width: 100%;
    display: flex;
    align-items: stretch;
    align-content: stretch;
    justify-content: flex-start; 
    flex-wrap: nowrap;
  }

  .cnt-textos-links > div {
  }

  .cnt-textos-links > div:nth-child(1) {
    width: 1000%;
  }

  .cnt-textos-links > div:nth-child(2) {
    width: 0%;
    display: none;
  }


}

</style>


</body>

</html>

<?php include_once "_final.php"; ?>
