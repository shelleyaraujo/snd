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
 <?php echo $imoveis; ?> 
</div>

<?php echo $destaques; ?>

<?php include_once "footer.php"; ?>

<style>

  .cnt-modulo {
    width: 100%;
  }

  .cnt-modulo > div {
     display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;  
    align-items: center;
    align-content: center;
    justify-content: center;
    flex-wrap: wrap;
    box-sizing: border-box;
     width: 100%;
    max-width: 1024px;
    margin: 0 auto;
  }

   .cnt-modulo > div > div {
    margin-bottom: 20px;
    padding: 15px;
    box-sizing: border-box;
    width: 100%;
   }

   .cnt-modulo > div > div div {
    border: 1px solid silver;
    margin-bottom: 20px;
    padding: 15px;
    box-sizing: border-box;
    width: 100%;
    background-color: #eee;
   }

  .cnt-modulo h2 {
    color: #222;
    font-size: 18px;
    font-weight: 400;
  }

  .cnt-modulo a {
    color: #222;
  }


  @media (min-width: 550px) {

 .cnt-modulo > div {
     display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;  
    align-items: stretch;
    align-content: center;
    justify-content: center;
    flex-wrap: wrap;
    box-sizing: border-box;
     width: 100%;
    max-width: 1024px;
    margin: 0 auto;
  }
   .cnt-modulo > div > div {
    width: 25%;
   }

  }

</style>

</body>

</html>

<?php include_once "_final.php"; ?>
