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

#nav-accordion {
  width: 100%;
 display: flex;
 align-items: flex-start;
 align-content: flex-start;
 justify-content: flex-start; 
 flex-wrap: nowrap;
}

#nav-accordion  ul {
 margin: 0;
 padding: 0;
 list-style: none;
}

#nav-accordion  h2 {
 text-align: left;
 padding: 0;
 margin: 0;
}

#nav-accordion li {
  width: 100%;
  box-sizing: border-box;
}

#nav-accordion > ul {
 display: flex;
 justify-content: center; 
 align-items: center;
 align-content: center;
 flex-wrap: wrap;
}

#nav-accordion > ul ul {
 display: none;
 padding: 0;
}

#nav-accordion > ul a {
  display: block;
  width: 100%;
  background-color: white;
  box-sizing: border-box;
  padding: 10px;
}

#nav-accordion > ul ul a {
  display: block;
  background-color: black;
  box-sizing: border-box;
}

#nav-accordion > ul ul ul a {
  background-color: #5499C7;
}

#accordion li a:not(:only-child) {
  position: relative;
}

#accordion li a:not(:only-child):before {
  content: "";
  position: absolute;
  border-top: 5px solid white;
  border-bottom: 5px solid transparent;
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
  position: absolute;
  top: 15px;
  right: 10px;
}


#accordion  div{
  width: 100%;
  display: block;
  padding: 20px;
  background-color: #ebebeb;
  box-sizing: border-box;
  text-align: left;
}

#nav-accordion  h2{
  position: relative;
  padding-left: 20px;
  font-size: 16px;
}

#nav-accordion  h2:before {
 content: "";
 border-top: 5px solid green;
 border-bottom: 5px solid transparent;
 border-left: 5px solid transparent;
 border-right: 5px solid transparent;
 position: absolute;
 top: 50%;
 left: 0;
}

#accordion .editar {
  width: 20px!important;
  height: 20px!important;
  position: relative;
  background-color: yellow!important;
}

</style>


<script>

  var accordion = document.getElementById("accordion"); 
  var ul = accordion.querySelectorAll("li");

  for (var i = 0; i < ul.length; i++) {
    ul[i].setAttribute("id", "accor"+i+"");
    ul[i].setAttribute("onclick", "exibirAccordion('accor" +i+ "')");
  }

  function exibirAccordion(id) {
    var m = document.getElementById(id);
    var x = m.querySelectorAll("ul");

    var ulul = m.querySelectorAll("ul ul");
    for (var i = ulul.length - 1; i >= 0; i--) {

      if(i>=0) {
        if(ulul[0].style.display === '' || ulul[0].style.display === 'none')  { 
          ulul[0].style.display="block";
        } 
        var a = m.querySelectorAll("a");
        a[0].setAttribute("href", "javascript: void(0)");
        a[0].setAttribute("ondblclick", "ocultarAccordion('" +id+ "')");
      }
    }
  }

  function ocultarAccordion(id) {
    var y = document.getElementById(id);
    var xx = y.querySelectorAll("ul");
    xx[0].style.display = "";
  }


</script>

</body>

</html>

<?php include_once "_final.php"; ?>


