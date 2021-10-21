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

 <main>

   <div class="cnt-titulo">
    <h1>Pesquisa</h1>
  </div>

  <div class="cnt-pesquisa">
    <?php echo $pesquisa; ?>    
  </div>

</main>


<?php include_once "footer.php"; ?>

<style>

.cnt-pesquisa {
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
    margin-top: 20px;
    padding: 0 20px;
    padding-top: 20px;
  }

  .cnt-pesquisa div {
    width: 100%;
  }

  .cnt-pesquisa a {     
    padding: 5px 15px;
    color: #222;
    border-bottom: 1px solid silver;
    text-align: left;
    margin-bottom: 5px;
    display: block;
    width: 100%;
  }
  .cnt-pesquisa a:nth-child(odd) {
   background-color: #eee;
 }
 .cnt-pesquisa a:hover {
   background-color: #ddd;
 }


</style>


</body>

</html>

<?php include_once "_final.php"; ?>
