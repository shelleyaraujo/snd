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

  <?php include_once "css/geral.php"; ?>
  <?php include_once "css/cabecalho.php"; ?>
  <?php include_once "css/sliders.php"; ?>
  <?php include_once "css/blog.php"; ?>
  <?php include_once "css/destaques.php"; ?>
  <?php include_once "css/rodape.php"; ?>
  <?php include_once "_js_geral.php"; ?>

</head>

 <body>

   <?php include_once "header.php"; ?>

   <main>

   <div class="cnt-titulo">
    <h1>Compra Finalizada</h1>
  </div>

  <div class="cnt-conteudo">
    <?php echo $conteudo_texto; ?>
    <p>
      Agradecemos por comprar em nosso site.
    </p>
      <p>
      Entraremos em contato assim que recebermos a notificação do Pagseguro.
    </p>
    <p></p>
    <p></p>
    <p>Atenciosamente</p>
    <p>A Gerencia</p>
    
  </div>

    </main>

<?php include_once "footer.php"; ?>

</body>

</html>

<?php include_once "_final.php"; ?>




