<?php include_once "_compress_code.php"; ?>
<?php include_once "head.php"; ?>

<body>

  <a class="skip-link xxx" href="#maincontent">Skip to main</a>

  <?php include_once "cabecalho.php"; ?>
  <?php //include_once "slider.php"; ?>

  <main id="maincontent">

   <div class="container">
     <h1><?php echo $titulotextomodulo; ?></h1>
   </div>

   <div class="container">
    <?php echo $textomodulo; ?>
  </div>

</main>

 <div class="container">
<?php echo $modulo; ?>
</div>


<?php echo $destaques; ?>

<?php include_once "rodape.php"; ?>


<style>

  .cnt-catalogo {

    margin: 0 auto;
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;  
    align-items: stretch;
    align-content: center;
    justify-content: center;
    flex-wrap: wrap;
    width: 100%;
    max-width: 1200px;
  }
  .cnt-catalogo > div{
   border: 1px solid silver;
   width: 50%;
   width: calc(50% - 20px);
   overflow: hidden;
   text-align: center;
   margin: 0 10px 20px 10px;
   padding: 15px;
 }

 .cnt-catalogo img{
   width: 100%;
   max-width: 400px;
   height: auto;
 }

  .cnt-catalogo a{
   text-decoration: none;
   color: black;
 }


 @media (min-width: 768px) {

  .cnt-catalogo > div{
   width: 25%;
   width: calc(25% - 20px);
 }

}


</style>

</body>

</html>

<?php include_once "_final.php"; ?>
