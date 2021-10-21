<?php include_once "_compress_code.php"; ?>
<?php include_once "head.php"; ?>

<body>

 <?php include_once "cabecalho.php"; ?>

 <main>

   <div class="container">
    <?php echo $conteudo_titulo; ?>
  </div>

   <div class="container">
    <?php echo $conteudo_texto; ?>
  </div>

</main>

<?php include_once "rodape.php"; ?>

<style>

.cnt-modulo {
  width: 100%;
  max-width: 1024px;
  margin: 0 auto;
  padding: 0 15px;
}


  #formas-pagamento-disponiveis {
    background-color: skyblue;
    padding: 20px;
    box-sizing: border-box;
    margin-bottom: 20px;
    width: 100%;
    margin: 0 auto;
    display: block;
    margin-bottom: 20px;
  }

  #formas-pagamento {
    display: flex;
    align-items: center;
    justify-content: center;
    align-content: center;
    width: 100%;
    max-width: 500px;
    margin: 0 auto;
    flex-wrap: wrap;   
  }

  #forma-pagseguro,
  #forma-outros {
   display: flex;
   align-items: center;
   justify-content: center;
   align-content: center;
   width: 100%;
   max-width: 300px;
   margin: 0 auto;
   margin-bottom: 20px;
   flex-wrap: wrap;
   position: relative;
   cursor: pointer;
 }

 #forma-pagseguro form {
  width: 100%;
}

 #forma-pagseguro input {
  width: 100%;
  padding: 5px;
  height: 150px;
  margin-bottom: 5px;
  display: block;   
  position: relative;
  background-color: transparent;
  border: 0;
   cursor: pointer;
}

 #forma-pagseguro:before {
  content: "";
  background-image: url("../../imagens/formas_pagamento/pagseguro.jpg");
  background-repeat: no-repeat;
  background-size: 100% auto;
  padding: 0;
  width: 100%;
  height: 200px;
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  cursor: pointer;
}



</style>


</body>

</html>

<?php include_once "_final.php"; ?>
