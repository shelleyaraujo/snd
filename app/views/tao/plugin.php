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

 			<h1>Plugins</h1>

         <form id="form-add" method="POST" action="<?php echo myUrl('tao/plugin/') ?>">
     <label>Titulo:</label>
     <input type="text" name="titulo" placeholder="titulo">
     <input type="hidden" name="add" value="add">
     <button type="submit">Novo</button>
   </form> 

 			<?php echo $plugins ?>

          <div class="cnt-botoes">
      <a class="button-vazado" href="javascript:void(0)" onclick="open_upload_imagem()">Upload do Arquivo</a>
    </div>

     <div class="plugin-selecionado">
      <?php echo $plugin ?>
      </div>

    <div class="cnt-upload-imagem">
      <a href="javascript:void(0)"class="fechar" onclick="close_upload_imagem()">X</a>

       <label>Upload de Arquivo</label>
       <div id="uploader">
         <div id="loader"></div>
        <img id="picture" src="../../imagens/sem-imagem.jpg" />
        <div id="upload2">
          <label for='image-file'>x</label>
          <input id="image-file" type="file" onchange="SavePhoto(this)" >
        </div>
        <p>&nbsp;Arraste o arquivo <span style="color:red">.php</span> aqui</p>
      </div>
    </div>


    <form id="form-update" method="POST" action="<?php echo myUrl('tao/plugin/?id=') . $id ?>">
     <label>Titulo:</label>
     <input type="text" name="titulo" value="<?php echo $titulo ?>">
     <input type="hidden" name="plugin" value="<?php echo $plugin ?>">
     <input type="hidden" name="id" value="<?php echo $id ?>">
     <input type="hidden" name="update" value="update">
     <button type="submit">Atualizar</button>
   </form> 

   <form id="form-delete" method="POST" action="<?php echo myUrl('tao/plugin/') ?>">
     <h3><?php echo $titulo ?></h3>
     <input type="hidden" name="delete" value="delete">
     <input type="hidden" name="id" value="<?php echo $id ?>">
     <button type="submit" class="button-excluir">Excluir</button>
   </form> 

 		</div>
 		<div class="p-c"> 

 </div>
</div>

<input type="text" id="id" value="<?php echo $id ?>">

<?php include_once "footer.php"; ?>
<?php include_once "upload_arquivo_pluginjs.php"; ?>

<style>

.plugin-selecionado {
  color: skyblue;
  background-color: aliceblue;
  text-align: center;
  padding: 20px;
  text-transform: uppercase;
  border: 1px solid skyblue;
}

</style>

<script>

var upload_imagem = document.querySelector(".cnt-upload-imagem");

function open_upload_imagem() {

  if(upload_imagem.style.display == "none" || upload_imagem.style.display == "" ) {
    upload_imagem.style.display = "block";
  } else {
    upload_imagem.style.display = "none";
  }

}

function close_upload_imagem() {
  upload_imagem.style.display = "none";
}


</script>

</body>



</html>

