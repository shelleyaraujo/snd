 <?php 
 ob_start("compress_code"); 
 function compress_code($code) {
   $search = array(
    '/\>[^\S ]+/s',  
    '/[^\S ]+\</s',  
    '/(\s)+/s'       
  );

   $replace = array('>','<','\\1');
   $code = preg_replace($search, $replace, $code);
   return $code;
 }

 ?>

 <?php include_once "head.php"; ?>

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

  <section id="section-modulo">
  <div class="container">
    <?php echo $modulo; ?>
</div>
  </div>
  

<?php include_once "destaques.php"; ?>



<?php include_once "slider_logos.php"; ?>
<?php include_once "footer.php"; ?>

<style>


.cnt-catalogo {
    display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;  
  flex-wrap: wrap;  
  align-items: stretch;
  justify-content: center;
  align-content: flex-end;
  text-align: center;  
}

.cnt-catalogo > div {
  width: 100%;
  box-sizing: border-box;
  margin-bottom: 20px;
  padding: 0 10px;
}

.cnt-catalogo > div > div{
  height: 100%;
  padding: 15px;
  border: 1px solid silver;
  box-sizing: border-box;
  margin-bottom: 20px;
}

.cnt-catalogo img{
 max-width: 100%;
 height: auto!important;
}

@media screen and (min-width: 550px) {

.cnt-catalogo {
    display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;  
  flex-wrap: wrap;  
  align-items: stretch;
  justify-content: center;
  align-content: flex-end;
  text-align: center;  
}

.cnt-catalogo > div {
  width: 25%;
  box-sizing: border-box;
  margin-bottom: 20px;
  padding: 0 10px;
}

.cnt-catalogo > div > div{
  height: 100%;
  padding: 15px;
  border: 1px solid silver;
  box-sizing: border-box;
  margin-bottom: 20px;
}

.cnt-catalogo img{
 max-width: 100%;
 height: auto!important;
}

}
</style>

</style>

</body>
</html>


<?php
ob_end_flush();
?>