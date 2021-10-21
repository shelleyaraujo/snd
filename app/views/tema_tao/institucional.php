<?php include_once "_compress_code.php"; ?>
<?php include_once "head.php"; ?>

<body>
  <a class="skip-link xxx" href="#maincontent">Skip to main</a>

  <?php include_once "cabecalho.php"; ?>
  <?php include_once "slider.php"; ?>

  <main id="maincontent">

   <div class="container">
     <h1><?php echo $titulotextomodulo; ?></h1>
   </div>

 
   <div class="container">
    <?php echo $textomodulo; ?>
  </div>

</main>

 <div class="container">
<?php echo $destaques; ?>
</div>



<?php include_once "rodape.php"; ?>


<style>

</style>

</body>

</html>

<?php include_once "_final.php"; ?>
