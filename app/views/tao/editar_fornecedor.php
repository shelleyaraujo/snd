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
      <h1>Fornecedor</h1>
      <?php echo $nome; ?>
      <form id="utualizar-cadastro" method="POST" action="<?php echo myUrl('tao/editar_fornecedor/?idfornecedor=' . $idfornecedor) ?>">
       <p>Data do Cadastro: <?php echo $dma; ?></p>
       <label>Nome:</label>
       <input type="text" id="nome" name="nome" placeholder="Nome" value="<?php echo $nome; ?>">
       <label>Email:</label>
       <input type="text" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>">   
       <input type="hidden" name="idfornecedor" value="<?php echo $idfornecedor; ?>">
       <input type="hidden" id="imagem" name="imagem" value="<?php echo $imagem; ?>">
       <input type='hidden' name='update_fornecedor' value='update_fornecedor'>
       <br><br>
       <img id="picture" src="../../imagens/fornecedores/<?php echo $imagem; ?>" />
       <br><br>
       <button type="submit" name="atualizar" class="button">Atualizar</button>
     </form>
   </div>
   <div class="p-c"> 
    <h3>Logotipo</h3>
    <div id="uploader">
      <div id="upload2">
        <br>
        <label for='image-file'>x</label>
        <input id="image-file" type="file" onchange="SavePhoto(this)" >
      </div>
      <img id="picture" src="../../imagens/sem-imagem.jpg" />
      <div id="loader"></div>
      <p>&nbsp;Arraste o logotipo no box ou clique na seta. 
      </p>
    </div>
  </div>

  <div>
  </div>
</div>
</div>

<?php include_once "uploadlogofornecedorjs.php"; ?>
<?php include_once "footer.php"; ?>

<style>
  
  #picture {
    width: 100%;
    max-width: 200px;
  }

</style>

<script>

function passarImagem(img) {
  var imagem = document.getElementById("imagem");
  imagem.value = img;
}


  </script>

</body>
</html>

