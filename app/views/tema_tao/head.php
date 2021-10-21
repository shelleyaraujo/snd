<!DOCTYPE html>
<html lang="pt-BR">
<head>

  <?php
  $texto = "";

  if(isset($textomodulo)) {
    $texto = $textomodulo;
  }
  

  if(isset($catalogo)){
    $texto = $catalogo;
  }
  $dns="http://".$config_site[0]->dns;
  $img_opng = get_opng($texto,$dns);

  function get_opng($conteudo,$dns) {
    $doc = new DOMDocument();
    $imagem = "";
    $i=0;
    if($conteudo != "") {
      $doc->loadHTML($conteudo);
      $elements = $doc->getElementsByTagName('img');
      foreach($elements as $element) {
        if($i == 0) {
          $imagem = $element->getAttribute('src');
        } 
        $i++;
      }
    }
    $img = pathinfo($imagem);
    $imagem = $img['basename'];

    if($imagem == ""){
      $imagem = $dns . myUrl() .  "imagens/opng.jpg";
    } else {
      $imagem = $dns . myUrl() . "imagens/" . $imagem;
    }
    return $imagem;
  }

  ?>


  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="TAO Shelley Araujo">
  <meta name="description" content="<?php echo $description ?>">
  <meta name="keywords" content="<?php echo $keywords ?>">

  <meta property="og:url"                content="<?php echo $config_site[0]->dns; ?>">
  <meta property="og:type"               content="article" />
  <meta property="og:title"              content="<?php echo $title ?>" />
  <meta property="og:description"        content="<?php echo $description ?>" />
  <meta property="og:site_name"          content="<?php echo $config_site[0]->marca; ?>">
  <meta property="og:image" content="<?php echo $img_opng ?>" />

  <link rel="icon" type="image/png" href="<?php echo myUrl("./imagens/favicon.png") ?>">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">


  <title><?php echo $title; ?></title> 

  <?php include_once "normalize.html"; ?>
  <?php include_once "estilo.php"; ?>
  <?php include_once "estilo-font-inter.php"; ?>
  <?php include_once "estilo_menu.php"; ?>
  <?php include_once "estilo_dst.php"; ?>
  <?php include_once "_js_geral.php"; ?>

  <style>

  <?php include_once "estilo_suplementar.css"; ?>


   </style>


</head>