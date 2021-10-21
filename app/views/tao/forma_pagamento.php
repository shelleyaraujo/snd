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
  <?php include_once "css/formapagamento.php"; ?>
  <?php include_once "css/rodape.php"; ?>
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

  <div id="formas-pagamento-disponiveis">
       Formas de Pagamento disponíveis:
     </div>
 
     <div id="formas-pagamento">

       <div id="forma-pagseguro">
         <form id="comprar" action="https://sandbox.pagseguro.uol.com.br/checkout/v2/payment.html" method="post" onsubmit="PagSeguroLightbox(this); return false;">
          <!-- <form id="comprar" action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post" onsubmit="PagSeguroLightbox(this); return false;">-->
           <input type="hidden" name="code" id="code" value="" />
           <input type="submit" value="Pagseguro"/>
         </form>
         <script type="text/javascript" src="xhttps://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
         <script type="text/javascript" src="xhttps://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
       </div>

    </div>

    <div id="info"></div>

</div>

<?php include_once "footer.php"; ?>

</body>

</html>

<?php include_once "_final.php"; ?>


<script>

  pag_seguro();

  var isOpenLightbox = PagSeguroLightbox({
    code: 'code'
  }, {
    success : function(transactionCode) {
      alert("success - " + transactionCode);
    },
    abort : function() {
      alert("abort");
    }
  });


// Redirecionando o cliente caso o navegador não tenha suporte ao Lightbox

if (!isOpenLightbox){
  location.href="https://pagseguro.uol.com.br/v2/checkout/payment.html?code="+code;
}

function pag_seguro() {

  var o_code = document.getElementById("code");
  var o_info = document.getElementById("info");
 
  xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php  echo myUrl('pagamento/pag_seguro') ?>');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
     o_code.value = xhr.responseText;
   }
   else if (xhr.status !== 200) {
    o_info.innerHTML = (xhr.status);
  }
};
xhr.send(encodeURI());
}


</script>