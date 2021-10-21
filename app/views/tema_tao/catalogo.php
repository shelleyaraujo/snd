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
  <?php echo $categorias; ?> 
  <?php echo $catalogo; ?>
  <?php echo $ondeestou; ?> 
</div>

  <div>
    <?php echo $destaques; ?>
  </div>

<?php include_once "rodape.php"; ?>


<style>

  .onde-estou {
    margin: 0 auto;
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;  
    align-items: stretch;
    align-content: center;
    justify-content: flex-start;
    flex-wrap: wrap;
    width: 100%;
    max-width: 1200px;
    list-style: none;
    padding: 0;
    background: #ebebeb;
    border: 1px solid silver;
    padding: 5px 15px;
  }

    .onde-estou a {
      padding: 10px;
    }

    .onde-estou li {
   margin-bottom: 0;
    }


    #sm-categorias {
    margin: 0 auto;
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;  
    align-items: stretch;
    align-content: center;
    justify-content: flex-start;
    flex-wrap: wrap;
    width: 100%;
    max-width: 1200px;
    list-style: none;
    padding: 0;
    padding: 15px;
  }

    #sm-categorias ul {
list-style: none;
padding: 0;
    }

    #sm-categorias a {
      padding: 5px 20px;
      text-decoration: none;
      display: block;
    }



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
   width: 50%;
   width: calc(50% - 20px);
   overflow: hidden;
   margin: 0 10px 20px 10px;
   padding: 10px;
 }

 .cnt-catalogo img{
    width: 100%;
    max-width: 400px;
    height: auto;
    border: 1px solid silver;
  }

  .cnt-catalogo a{
    text-decoration: none;
    color: black;
  }

  .detalhes-de {
    text-decoration: line-through;
    margin-bottom: 0;
    font-size: 1em;
    line-height: 1em;
    margin-top: 20px;
    color: #555;
  }

  .detalhes-por {
    font-size: 1.4em;
    font-weight: bold;
  }

  .cnt-catalogo p{
    margin-bottom: 5px;
  }

  .cnt-catalogo h2 {
    margin-bottom: 20px;
    font-size: 1.4em;
    font-weight: bold;
    margin-top: 20px;
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
