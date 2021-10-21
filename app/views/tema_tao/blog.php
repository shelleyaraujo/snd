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

<?php echo $destaques; ?>

<div class="container cnt-posts">
  <div>
    <?php echo $modulo; ?>
  </div>
  <div>
    <?php echo $ultimos_posts; ?>
  </div>
</div>


<?php include_once "rodape.php"; ?>

<style>

  .cnt-posts {
    display: flex;
    align-content: flex-start;
    align-items: stretch;
    justify-content: center;
    flex-wrap: wrap;
    box-sizing: border-box;
    margin: 0 auto;  background-color: transparent;
    margin: 0 auto;
    text-align: left;
  }

  .cnt-posts > div:nth-child(1) {
    width: 100%;
  }

  .cnt-posts > div:nth-child(2) {
    width: 100%;
  }

  .cnt-posts li {
    list-style: none;
  }

  .cnt-posts a {
    color: #222;
  }

  .menu-blog > p {
    background: #264653;
    color: white;
    padding: 5px 15px;
  }

  .textos-links img {
    margin-right: 25px;
    margin-top: 7px;
    margin-bottom: 5px;
    float: left;
  }

  .textos-links > div {
    border-bottom: 1px solid silver;
    margin-bottom: 25px;
    padding-bottom: 25px;
  }

  .posts-home ul {
   display: -webkit-box;
   display: -moz-box;
   display: -ms-flexbox;
   display: -webkit-flex;
   display: flex;  
   align-items: stretch;
   align-content: center;
   justify-content: center;
   flex-wrap: wrap;
   margin: 0 auto;
 }

 .posts-home li {
  width: 33.33%;
  padding: 15px;
  list-style: none;
  margin: 0;
}


.cnt-posts a {
    text-decoration: none;
  }

.cnt-posts h2 {
    margin-bottom: 0;
  }

.cnt-posts p{
    margin: 0;
  }

.cnt-posts  div {
    margin-bottom: 15px;
    border-bottom: 1px solid silver;
    overflow: hidden;
    padding-bottom: 15px;
  }

 .cnt-posts img {
    float: left;
    margin-right: 15px;
   }

   
@media screen and (min-width: 768px) {

  .cnt-posts > div:nth-child(1) {
    width: 80%;
    padding-right: 20px;
  }

  .cnt-posts > div:nth-child(2) {
    width: 20%;
    border-left: 1px solid silver;
    padding-left: 20px;
  }

}

</style>

<?php include_once "rodape.php"; ?>


<style>


.conteudo-vitrine {
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
  list-style: none;
  padding: 0 20px;
}

.conteudo-vitrine:empty {
  display: none;
}


.conteudo-vitrine:before {
  content: "Posts em Destaque";
  border-bottom: 1px solid silver;
  margin-bottom: 20px;
  width: 100%;
  display: block;
  text-transform: uppercase;
  font-size: 20px;
}

.conteudo-vitrine > li div {
  border-bottom: 1px solid silver;
  margin-bottom: 20px;
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
