<?php include_once "_inicial.php"; ?>

<?php 
 $meta[0] = "";
 $meta[1] = "";
 $meta[2] = "";
 $meta[3] = "";
 $meta[4] = "";
 $meta[5] = "";
 $meta[6] = $GLOBALS['sitename'] . " - Carrinho de Compra";
 $meta[7] = "loja,virtual,e-commerce,pedido,comprar";
 $meta[8] = $GLOBALS['sitename'] . " - Carrinho de Compra";
?>

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

 <?php include_once "header.php"; ?>

 <main>

   <div class="cnt-titulo">
    <?php echo $conteudo_titulo; ?>
  </div>

  <div class="cnt-conteudo">
    <?php echo $conteudo_texto; ?>
  </div>

</main>

 <div class="container">

   <div id="cadastro">
    <a href="#" id="fechar-cadastro"><i class='fa fa-close' aria-hidden='true'></i></a>
    <h2>Dados Cadastrais</h2>
    <form id="form-cadastro" name="form-cadastro" method="POST">
      <!--
      <legenda>Data Nascimento:</legenda>
      <input type="text" id="dia" name="dia" placeholder="Dia" maxlength="2" value="<?php echo $_SESSION["dia"] ?>" style="width: 50px; display:inline;">
      <input type="text" id="mes" name="mes" placeholder="Mês" maxlength="2" value="<?php echo $_SESSION["mes"] ?>" style="width: 50px; display:inline;">
      <input type="text" id="ano" name="ano" placeholder="Ano" maxlength="4" value="<?php echo $_SESSION["ano"] ?>" style="width: 100px; display:inline;">
    -->
    <input type="text" id="nome" name="nome" placeholder="Nome" maxlength="50" value="<?php echo $_SESSION["nome"] ?>">
    <input type="text" id="endereco" name="endereco" placeholder="Endereço" maxlength="250" value="<?php echo  $_SESSION["endereco"] ?>">   
    <input type="text" id="numero" name="numero" placeholder="Número" maxlength="10" value="<?php echo  $_SESSION["numero"] ?>">   
    <input type="text" id="telefone" name="telefone" placeholder="Telefone" maxlength="50" value="<?php echo  $_SESSION["telefone"] ?>">   
    <input type="text" id="bairro" name="bairro" placeholder="Bairro" maxlength="50" value="<?php echo  $_SESSION["bairro"] ?>">   
    <input type="text" id="complemento" name="complemento" placeholder="complemento" value="">   
    <input type="text" id="cidade" name="cidade" placeholder="Cidade" maxlength="50" value="<?php echo  $_SESSION["cidade"] ?>">   
    <input type="text" id="estado" name="estado" placeholder="Estado" maxlength="2" value="<?php echo  $_SESSION["estado"] ?>">   
    <input type="text" id="cep" name="cep" placeholder="CEP" maxlength="8" value="<?php echo  $_SESSION["cep"] ?>">   
    <input type="text" id="cpfcnpj"  name="cpfcnpj" placeholder="CPF/CNPJ" maxlength="11" value="<?php echo  $_SESSION["cpfcnpj"] ?>">   
    <input type="text" id="email" name="email" placeholder="Email" maxlength="50" value="">   
    <input type='password' id='senha1' name='senha1' placeholder="Senha" maxlength="15" value=''>
    <input type='password' id='senha2' name='senha2' placeholder="Redigite a Senha" maxlength="15" value=''>

    <input type='hidden' name='controle' value='PedidoCompra'>
    <input type='hidden' name='acao' value='addUsuario'>
    <button type='submit' name='add' class='button'>Cadastrar</button>
  </form>
</div>

<div id="autenticacao">
 <a href="#" id="fechar-autenticacao"><i class='fa fa-close' aria-hidden='true'></i></a>
 <form id="form-autenticacao" method='POST'>
   <input type='text' id="emaillogar" name='email' placeholder="email" value=''>
   <input type='password' id="senhalogar" name='senha' maxlength="15" placeholder="senha" value=''>
   <input type='hidden' name='controle' value='PedidoCompra'>
   <input type='hidden' name='acao' value='logar'>
   <button type='submit' name='add' class='button'>Continuar...</button>
   <a href="/tao/?controle=Logar&acao=open&tipo=0">Esqueceu sua senha?</a>
 </form>
</div>

</div>

<?php include_once "footer.php"; ?>

<style>

.cnt-modulo {
  width: 100%;
  max-width: 1024px;
  margin: 0 auto;
  padding: 0 15px;
}

.float-right{
  float: right;
}

.quantidade {
  text-align: right;
}

.pedidos {
  margin: 0;
  padding: 0;
}

.cnt-pedidos{
  width: 100%;
  margin-bottom: 20px;
}

.pedidos li{
  display: block;
  margin: 1px;
  border: 1px solid #ddd;
  text-align: left;    
}

.pedidos li:hover{
  border-bottom: 1px dashed silver;
}

.pedidos li div{
  display: inline-block;
  padding: 10px;
}

.pedidos li .itens{
  width: 40%;
  text-align: left;
}

.pedidos li .preco{
  width: 20%;
}

.pedidos li .quantidade{
  width: 10%;
}

.pedidos li .sub-total{
  width: 15%;
}

.total{
  font-weight: bold;
  color: green;
}

.pedidos-cabecalho {
  background: #ddd; 
  color: black;
  border-bottom: 1px solid #ddd;
  text-transform: uppercase;
  font-size: 14px;
}

.pedidos-rodape {
  background: #ebebeb; 
  color: green;
  border: 1px solid #ddd;
  text-transform: uppercase;
  font-size: 14px;
  font-weight: bold;  
}

.mais{
  background-color: #ebebeb;
  color: green;
  padding: 5px 10px;
}

.menos{
  background-color: #ebebeb;
  color: #ff0000;
  padding: 5px 10px;
}

.valor-total{
  text-align: right;
  font-size: 16px;
  padding-right: 20px;
  color: red;
  font-weight: bold;
  text-transform: uppercase;
}

.pedidos li .itens-orcamento{
  width: 90%;
  text-align: left;
}

.pedidos li .quantidade-orcamento{
  width: 10%;
}

#cnt-logar{
  display: none;
  top: 0;
  left: 0;
  z-index: 9999;
  background-color: rgba(000,000,000, 0.5);
}

#autenticacao{
  border: 1px solid #999;
  width: auto;
  max-width: 400px;
  margin-left: auto;
  margin-right: auto;
  text-align: left;
  color: #111;
  background-color: red;
  padding: 15px;
  display: none;
  position: relative; 
}

#fechar-autenticacao,
#fechar-cadastro{
  right: 0;
  position: absolute;
  top: 0;
  color: #ff0000;
  font-size: 20px;
  padding-right: 5px;
}

#cadastro{
  display: none;
  border: 1px solid #ED8211;
  text-align: left;
  color: #111;
  background-color: white;
  padding: 25px;
  padding-bottom: 15px;
  position: relative;
  width: auto;
  max-width: 500px;
  margin-left: auto;
  margin-right: auto;
  margin-top: 20px;
  background-color: #ebebeb;
}

#cadastro form {
  margin-bottom: 0;
}

#cadastro h2 {
  padding-left: 0;
}

[type=color], [type=date], [type=datetime-local], [type=datetime], [type=email], [type=month], [type=number], [type=password], [type=search], [type=tel], [type=text], [type=time], [type=url], [type=week], textarea {
  color: #5499C7;
  border: 1px solid silver;
  margin: 0 0 5px;
}

.info{
  background-color: #ffff00;
  padding: 20px;
  border: 5px solid #999;
}

#xnovo-cadastro{
  cursor: pointer;
  color: #ff0000;
  background-color: #ffff00;
  padding:8px;
  font-weight: bold;
  border: 1px solid #ffb76b;
  position: relative;
  padding-left: 20px;
}

#xnovo-cadastro:before{
  content: "";
  border-top: 20px solid transparent;
  border-right: 5px solid transparent;
  border-left: 10px solid #111;
  border-bottom: 20px solid transparent;
}

#autenticacao{
  border: 1px  solid #ED8211;
  width: auto;
  text-align: left;
  color: #111;
  background-color: white;
  padding: 25px;
  padding-bottom: 10px;
  margin-top: 20px;

}

@media screen and (max-width: 40em) {

  #autenticacao{
    border: 5px solid #999;
    width: 100%;
    text-align: left;
    top: 0;
    left: 0;
    color: #111;
    background-color: #fff;
    padding: 25px;
  }
  #cnt-logar, #cadastro{
    width: 100%;
  }

}

#login-cadastro {
  display: none;
}



.cnt-vazio {
  color: white;
  background-color: #FF4E06;
  padding: 20px;
}

.cnt-finalizar-compra {
  position: fixed;
  bottom: 0;
  width: 100%;
  margin: 0 auto;
  left: 0;
  right: 0;
  text-align: center;
  background-color: #e9ecef;
  background-color: rgba(0,0,0,0.8);
  z-index: 99999999999;
}

.cnt-finalizar-compra .button {
  margin: 5px;
}

@media (min-width: 550px) {

.cnt-finalizar-compra {
  position: absolute;
  top: 150px;
  bottom: 100%;
  width: 100%;
  margin: 0 auto;
  left: 0;
  right: 0;
  text-align: center;
  background-color: #e9ecef;
  background-color: rgba(0,0,0,0.8);
  z-index: 99999999999;
}


}




</style>


<script>

  function add_quantidade(id_item) {

    xhr = new XMLHttpRequest();

    xhr.open('POST', '<?php  echo myUrl('pedidos/add_quantidade/') ?>');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
     }
     else if (xhr.status !== 200) {
      alert(xhr.status);
    }
  };
  xhr.send(encodeURI('id_item=' + id_item));

  setTimeout(function(){  
  window.location.href =  "";  
}, 300);

}

 function remove_quantidade(id_item) {

    xhr = new XMLHttpRequest();

    xhr.open('POST', '<?php  echo myUrl('pedidos/remove_quantidade/') ?>');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
     }
     else if (xhr.status !== 200) {
      alert(xhr.status);
    }
  };
  xhr.send(encodeURI('id_item=' + id_item));

    setTimeout(function(){  
  window.location.href =  "";  
}, 300);


}


function delete_item(id) {

  var row = document.getElementById("row" + id);

  var r = confirm("Tem certeza que quer excluir este item?");

  if (r == true) {

    var imagem = imagem,
    xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo myUrl('pedidos/excluir_item_pedido/') ?>');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
        row.style.display="none";
      }
      else if (xhr.status !== 200) {
        alert(xhr.status);
      }
    };
    xhr.send(encodeURI('id=' + id));

      setTimeout(function(){  
  window.location.href =  "";  
}, 300);
      
  }
}


</script> 


</body>

</html>

<?php include_once "_final.php"; ?>
