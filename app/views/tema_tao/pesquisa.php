<?php include_once "_compress_code.php"; ?>
<?php include_once "head.php"; ?>

<body>
  <a class="skip-link xxx" href="#maincontent">Skip to main</a>

  <?php include_once "cabecalho.php"; ?>
  <?php //include_once "slider.php"; ?>

  <main id="maincontent">

   <div class="container">
     <h1>Pesquisa</h1>
   </div>

   <div class="container">
<?php echo $pesquisa; ?>
  </div>

</main>


  

<?php include_once "rodape.php"; ?>


<style>

  #resultado-pesquisa {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
  }

  #resultado-pesquisa a {
    text-decoration: none;
  }

  #resultado-pesquisa h2 {
    margin-bottom: 0;
  }

  #resultado-pesquisa p{
    margin: 0;
  }

  #resultado-pesquisa  div {
    margin-bottom: 15px;
    border-bottom: 1px solid silver;
    overflow: hidden;
    padding-bottom: 15px;
  }

   #resultado-pesquisa img {
    float: left;
    margin-right: 15px;
   }

   .button_pesquisa{
    margin: 0 auto;
    display: block;
   }

   .fim_pesquisa {
    color: red;
   }

 @media (min-width: 768px) {

}

</style>

</body>

</html>

<?php include_once "_final.php"; ?>
