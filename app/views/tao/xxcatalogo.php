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

   <section id="section-conteudo">
    <div class="conteudo-titulo">
      <?php echo $conteudo_titulo; ?>
    </div>
    <div class="container conteudo-texto">
     <?php echo $conteudo_texto; ?>
   </div>
 </section>


  <div class="frame">
   <?php echo $catalogo; ?>
 </div>


<?php include_once "destaques.php"; ?>
<?php include_once "footer.php"; ?>

<style>



.voltar {
  display: none;
}

.container-wrap-catalogo {
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;  
  flex-wrap: wrap;  
  align-content: flex-end;
  align-items: stretch;
  justify-content: center;
  text-align: center;
}

.container-wrap-catalogo > div {
  margin: auto;
  align-items: center;
  width: 100%;
  margin: 0;
  margin-bottom: 50px;
  text-align: center;
}

.produto {
  display: block;
  border-bottom: 0px solid silver;
  height: 100%;
  margin: 0;
  padding: 0 15px;
  background-color: transparent;
}

.detalhes-de {
  font-size: 16px;
  margin: 0;
}

.detalhes-por {
  font-size: 20px;
  color: green;
  margin: 0;
}

.detalhes-preco {
  font-size: 20px;
  color: green;
  margin: 0;
}


@media screen and (min-width: 550px) {

  .container-wrap-catalogo > div {
    width: 25%;
  }

  .produto {
    margin: 0 10px;
    padding: 0 15px;
  }


}

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
  width: 100%; 
  background-color: #E7E7E7;
}

.cnt-catalogo > div {
  width: 100%;
  box-sizing: border-box;
  margin-bottom: 20px;
  padding: 0 10px;
}

.cnt-catalogo > div > div{
  height: 100%;
  padding: 0;
  border: 0px solid silver;
  box-sizing: border-box;
  text-align: center;
}

.cnt-catalogo img{
 max-width: 100%;
 height: auto!important;
}

.cnt-catalogo h2 {
font-size: 1em;
padding: 0;
margin: 0;
}

.cnt-catalogo h3:empty {
  display: none;
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
  width: 20%;
  box-sizing: border-box;
  margin-bottom: 20px;
  padding: 0;
}

.cnt-catalogo > div > div{
  height: 100%;
  padding: 15px;
  border: 0px solid silver;
  box-sizing: border-box;
  margin-bottom: 20px;
}

.cnt-catalogo img{
 max-width: 100%;
 height: auto!important;
}

}
</style>

</body>
</html>


<?php
ob_end_flush();
?>