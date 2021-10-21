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
    <?php echo $conteudo_titulo; ?>
  </div>

  <div class="cnt-conteudo">
    <?php echo $conteudo_texto; ?>
  </div>

</main>

<div class="cnt-modulo">
    <p>Orçamento Enviado</p>
</div>

<?php include_once "footer.php"; ?>

<style>

.cnt-modulo {
  width: 100%;
  max-width: 1024px;
  margin: 0 auto;
  padding: 0 15px;
}


  #formas-pagamento-disponiveis {
    background-color: skyblue;
    padding: 20px;
    box-sizing: border-box;
    margin-bottom: 20px;
    width: 100%;
    margin: 0 auto;
    display: block;
    margin-bottom: 20px;
  }

  #formas-pagamento {
    display: flex;
    align-items: center;
    justify-content: center;
    align-content: center;
    width: 100%;
    max-width: 500px;
    margin: 0 auto;
    flex-wrap: wrap;   
  }

  #forma-pagseguro,
  #forma-outros {
   display: flex;
   align-items: center;
   justify-content: center;
   align-content: center;
   width: 100%;
   max-width: 300px;
   margin: 0 auto;
   margin-bottom: 20px;
   flex-wrap: wrap;
   position: relative;
   cursor: pointer;
 }

 #forma-pagseguro form {
  width: 100%;
}

 #forma-pagseguro input {
  width: 100%;
  padding: 5px;
  height: 150px;
  margin-bottom: 5px;
  display: block;   
  position: relative;
  background-color: transparent;
  border: 0;
   cursor: pointer;
}

 #forma-pagseguro:before {
  content: "";
  background-image: url("../../imagens/formas_pagamento/pagseguro.jpg");
  background-repeat: no-repeat;
  background-size: 100% auto;
  padding: 0;
  width: 100%;
  height: 200px;
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  cursor: pointer;
}



</style>


</body>

</html>

<?php include_once "_final.php"; ?>
