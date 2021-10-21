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

  <?php 

  $tabela_pesquisa = "catalogo";

  if(isset($_POST["tabela-radio"])) {
      $tabela_pesquisa = $_POST["tabela-radio"];
  }

  $busca = "";
  if(isset($_POST['busca'])) {
    $busca = $_POST['busca'];
  }

  ?>

  <?php include_once "header.php"; ?>
  <?php include_once "slider.php"; ?>


 <main>

   <div class="cnt-titulo">
    <h1>Pesquisa</h1>
  </div>

  <div class="cnt-conteudo">
    <?php echo $textomodulo; ?>
  </div>

</main>

  <input id='palavra-a-pesquisar' type='hidden' value='<?php echo $busca; ?>'>
  <input type='hidden' id="x-pesquisa-item" value="0">
  <input type='hidden' id="y-pesquisa-item" value="10">
  <input type='text' id="tabela-pesquisa" value="<?php echo $tabela_pesquisa; ?>">

  <div id="erro-pesquisar"></div>
  
  <div class="cnt-modulo">
   <?php echo $modulo; ?> 
 </div>

 <?php include_once "footer.php"; ?>

</body>

</html>

<?php include_once "_final.php"; ?>

<script>

 function pesquisar() {

   var tabela = document.getElementById('tabela-pesquisa').value; 

   var o_x = document.getElementById("x-pesquisa-item");
   var o_y = document.getElementById("y-pesquisa-item");
   var o_busca = document.getElementById("palavra-a-pesquisar");
   var o_erro = document.getElementById("erro-pesquisar");

   o_x.value = parseInt(o_x.value) + 10;
   o_y.value = parseInt(o_y.value) + 10;

   var o_resultado = document.querySelector(".cnt-pesquisa");

   var msg = "";

   if(o_busca.value == "") {
    msg = "Digite algo"
    o_erro.style.backgroundColor = "yellow";
    o_erro.style.display = "block";
    o_erro.innerHTML = msg;
  } 

  if(msg == "") {

    xhr = new XMLHttpRequest();

    xhr.open('POST', '<?php echo myUrl('pesquisa/busca/') ?>');

    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
        o_resultado.innerHTML += xhr.responseText;

        if(xhr.responseText == "") {
         o_x.value = 0 ;
         o_y.value = 10;
       }
       o_erro.style.display="none";
     }  else if (xhr.status !== 200) {
      alert(xhr.status);
    }
  };
  xhr.send(
    encodeURI('busca=' 
      + o_busca.value 
      + "&x=" + o_x.value 
      + "&y=" + o_y.value 
      + "&radio_tabela=" + tabela
      ));
} else {
  o_erro.style.display="block";
  o_erro.innerHTML =  msg;
}

}

</script>

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


<?php
ob_end_flush();
?>