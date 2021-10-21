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
      <h1>Pedidos</h1>
 		<?php echo $pedidos; ?>
 		</div>
 		<div class="p-c"> 
 			
 		</div>
 	</div>

 	<?php include_once "footer.php"; ?>


<style>

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


</style>

<script>


function set_pago(id) {

  var pago="0";
  var checkBox = document.getElementById("item"+id);

  if (checkBox.checked == true){
    pago="1";
  } 

  xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php echo myUrl('tao/set_pedido_pago/') ?>');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      info.style.display="block";
      info.innerHTML =  xhr.responseText;
      row.style.display="none";
    }
    else if (xhr.status !== 200) {
      alert(xhr.status);
    }
  };
  xhr.send(encodeURI('id=' + id + "&pago=" + pago));
  
}

function excluir_pedido(id) {

  var row = document.getElementById("row" + id);

  var r = confirm("ATENÇÃO: Esta ação apagará este pedido definitivamente!");

  if (r == true) {

  xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php echo myUrl('tao/excluir_pedido/') ?>');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      info.style.display="block";
      info.innerHTML =  xhr.responseText;
      row.style.display="none";
    }
    else if (xhr.status !== 200) {
      alert(xhr.status);
    }
  };
  xhr.send(encodeURI('id=' + id));
}
  
}

</script>

 </body>
 </html>

