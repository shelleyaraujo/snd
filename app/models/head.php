<?php 
$meta = array(); 
$meta[0] = "";
$meta[1] = "";
$meta[2] = "";
$meta[3] = "";
$meta[4] = "";
$meta[5] = "";
$meta[6] = $description;
$meta[7] = $keywords;
$meta[8] = $title;

?>

<?php $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>

<?php $_SESSION["visualizar"] = "<a href='". $_SERVER['REQUEST_URI'] ."' class='button'>Ir para o site</a>" ?>

<?php $logo = "http://" . $_SERVER['HTTP_HOST'] . "/imagens/logo_opengraph.png"; ?>

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

  <link rel="icon" type="image/png" href="<?php echo myUrl("./imagens/favicon.gif")?>">
  
  <title><?php echo $meta[8]?></title>  

  <script>

    function mascara(o,f){
      v_obj=o
      v_fun=f
      setTimeout("execmascara()",1)
    }
    function execmascara(){
      v_obj.value=v_fun(v_obj.value)
    }
    function mtel(v){
      v=v.replace(/\D/g,"");             
      v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); 
      v=v.replace(/(\d)(\d{4})$/,"$1-$2");    
      return v;
    }
    function id( el ){
      return document.getElementById( el );
    }
    window.onload = function(){
      id('telefone').onkeypress = function(){
        mascara( this, mtel );
      }
    }
  </script>

  <script src='<?php echo myUrl("app/views/layout_imoveis/swipe.js") ?>'></script>

 <?php include_once "estilo.php"; ?>


</head>





