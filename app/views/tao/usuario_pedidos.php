 <?php include_once "head.php"; ?>

 <body>

 	<?php include_once "header.php"; ?>

 	<div class="painel"> 
 		<div class="p-a"> 
 			<div class="menu-tao">
 				<?php include_once "menutao.php"; ?>
 			</div>
 		</div>
 		<div class="p-b"> 
       <h1>Meus Pedidos</h1>
       <?php echo $pedidos; ?>
     </div>
     <div class="p-c"> 

     </div>
   </div>

   <?php include_once "footer.php"; ?>


   <style>

   #cnt-loader {
    position: relative;
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
    border: 1px solid aliceblue;
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
    color: #4682B4;
  }

  .pedidos-cabecalho {
    background: aliceblue; 
    color: black;
    border-bottom: 1px solid aliceblue;
    text-transform: uppercase;
    font-size: 14px;
  }

  .conteudo-texto img {
    width: 100%;
    max-width: 50px;
  }

  .pedidos-rodape {
    background: aliceblue; 
    color: #4682B4;
    border: 1px solid aliceblue;
    text-transform: uppercase;
    font-size: 14px;
    font-weight: bold;  
  }

  .mais{
    background-color: aliceblue;
    color: #4682B4;
    padding: 5px 10px;
  }

  .menos{
    background-color: aliceblue;
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

#status_transacao {
  display: none;
}

</style>

<script>

  function notificacao_pagseguro(id_transacao,id_pedido) {

    var loader = document.getElementById("loader");
    var status_transacao = document.getElementById("status_transacao");

    loader.style.display ="block";

    xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo myUrl('tao/notificacao_pagseguro/') ?>');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
        loader.style.display ="none";
        status_transacao.style.display ="block";
        status_transacao.innerHTML = xhr.responseText;
      }
      else if (xhr.status !== 200) {
        alert(xhr.status);
      }
    };
    xhr.send(encodeURI('id_transacao=' + id_transacao + '&id_pedido=' + id_pedido));
    
  }

  function dados_cliente (idusuario) {

    var dados_cliente = document.querySelector(".cnt-dados-do-cliente");
    dados_cliente.style.display = "block";

    var loader = document.getElementById("loader");
    loader.style.display ="block";

    xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo myUrl('tao/usuario_dados/') ?>');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
        loader.style.display ="none";
        dados_cliente.innerHTML = xhr.responseText;
      }
      else if (xhr.status !== 200) {
        alert(xhr.status);
      }
    };
    xhr.send(encodeURI('idusuario=' + idusuario));
    
  }
</script>
</body>

</html>

