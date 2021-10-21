<?php include_once "head2.php"; ?>

<body>

 <?php include_once "header.php"; ?>


 <div class="painel">
  <div class="p-a">
   <?php include_once "menutao.php"; ?>
 </div>
 <div class="p-b">
   <h1>Editar Slider</h1>
   <a href="<?php echo $_SESSION["voltar"] ?>" class="voltar">Voltar</a>

   <div class="cnt-imagem">
     <img id="imagem-slider" src="<?php echo myUrl("imagens/sliderslogos/".$imagem) ?>">
   </div>
   <p></p>
   <form id="form-cabecalho" method="POST" action="<?php echo myUrl('tao/editar_slider_logo/?idslider=' . $_GET["idslider"]) ?>">
    <label>Titulo:</label>
    <input type="text" name="titulo" value="<?php echo $titulo ?>">
    <label>Texto no Slider:</label>
    <textarea name="editor1" id="editor1"><?php echo $texto ?></textarea>
    <input type="hidden" name="update_slider" value="update">
    
    <script>  

      CKEDITOR.replace( 'editor1', {
        customConfig: '<?php echo myUrl("app/views/tao/ckeditor/config.js") ?>'
      } );             

    </script>

    <fieldset id="modulos-slider">
      <label>Módulos (quais módulos vai aparecer este slider?)</label>
      <?php echo $modulos ?>
    </fieldset>
    <input type="hidden" name="imagem" id="imagem" value="<?php echo $imagem ?>">
    <input type="hidden" name="myurl" id="myurl" value="<?php echo myUrl() ?>">
    <button type="submit">Aplicar Alterações</button>
  </form> 
</div>
<div class="p-c">
 <div class="logotipo-topo">
  <label>Imagem do Banner</label>
  <div id="uploader">
    <p>&nbsp;Arraste a imagem <span style="color:red">.jpg</span> aqui</p>

    <?php echo $config_site[0]->crop_imagem_w_slider_logos . " x " . $config_site[0]->crop_imagem_h_slider_logos . " px" ?> 


    <div id="loader"></div>
  </div>
</div>

<!--
<div>
  <div class='xbutton'><a href='javascript:void(0)' onclick='carregarImagens()'>Carregar imagens...</a></div>
  <div id="galeria-imagens"></div>
  <input type="hidden" id="x" value="0">
  <input type="hidden" id="y" value="0">
</div>
-->


</div>

</div>

</body>

<?php include_once "footer.php"; ?>

<style>


#uploader {
  width: 100%;
  height: 225px; 
  background: aliceblue; 
  padding: 20px;
  border: 1px dashed #5499C7;
  display: flex;
  justify-content: center;
  align-items: center;
  align-content: center;
  flex-wrap: wrap;
  box-sizing: border-box;
  margin-bottom: 20px;
  overflow: hidden;
}

#uploader p {
  text-align: center;
  width: 100%;
  margin: 0;
}

#uploader img {
  width: 100%;
  max-width: 200px;
}


#loader {
  position: absolute;
  display: none;
  border: 20px dashed #5499C7; 
  border-right: 20px dashed tomato; 
  border-top: 20px dashed blue; 
  border-bottom: 20px dashed lightblue; 
  border-radius: 100%;
  width: 0;
  height: 0;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

#modulos-slider {
  display: none;
  width: 100%;
}

.cnt-modulos div:nth-child(1) {
  width: 30px;
  display: inline-block;
}

.cnt-modulos div:nth-child(2) {
  width: auto;
  display: inline-block;
}

.cnt-imagem  {
  width: 100%;
  max-width: 250px;
  border: 1px solid silver;
  height: auto;
  overflow: hidden;
  text-align: center;
}


.xcnt-imagem img {
  width: 100%;
  height: auto!important;
}

#editor {
  display: flex;
  justify-content: flex-start;
  align-items: flex-start;
  align-content: flex-start;
  flex-wrap: wrap;
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
  background-color: white;
  padding: 25px;
}

#editor > div:nth-child(1) {
  width: 80%;
}
#editor > div:nth-child(2) {
  width: 20%;
}

.cabecalho label {
  display: block;
}

#form-cabecalho {
  display: flex;
  justify-content: flex-start;
  align-items: flex-start;
  align-content: flex-start;
  flex-wrap: wrap;
  width: 100%;
  max-width: 800px;
}

#form-cabecalho input  {
 width: 100%;
 margin-bottom: 5px;
 border: 1px solid silver;
}

#form-cabecalho textarea  {
 width: 100%;
 margin-bottom: 20px;
 border: 1px solid silver;
}

#form-descricao {
  width: 100%;
  margin-bottom: 20px;
}

#telefones,#redes_sociais {
 display: none;
}

#form-redes-sociais {
  width: 100%;
  margin-bottom: 20px;
}

#cke_editor1 {
  width: 100%;
  border: 1px solid #777;
}

#cke_editor1 iframe {
  width: 100%!important; 
  height: 300px!important;  
}

.cke_reset {
  margin: 0;
  padding: 0;
  border: 0;
  background: transparent;
  text-decoration: none;
  width: auto;
  height: 108px;
  vertical-align: baseline;
  box-sizing: content-box;
  position: static;
  transition: none;
}

#tels {
  width: 100%;
  padding: 10px;
  background-color: wheat;
  margin-bottom: 20px;
}

#tels a {
  position: relative;
  padding-left: 30px;
  pointer-events: none;
}

#tels a:after {
  content: "X";
  position: absolute;
  left: 0;
  color: red;
}

#redes {
  width: 100%;
  padding: 10px;
  background-color: wheat;
  margin-bottom: 20px;
  position: relative;
}

#redes a {
  position: relative;
  padding-left: 30px;
  pointer-events: none;
}

#redes a:after {
  content: "X";
  position: absolute;
  left: 0;
  color: red;
}

#descricao {
  height: 50px;
  margin-bottom: 20px;
}

#emails {
  height: 50px;
}
#enderecos {
  height: 200px;
}


#editor {
  display: flex;
  justify-content: flex-start;
  align-items: flex-start;
  align-content: flex-start;
  flex-wrap: wrap;
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
  background-color: white;
  padding: 25px;
}

#editor > div:nth-child(1) {
  width: 80%;
}
#editor > div:nth-child(2) {
  width: 20%;
}

#editor input {
  width: 100%;
}

#editor textarea {
  width: 100%;
}

fieldset {
  padding: 15px;
  border: 1px solid #5499C7;
  box-sizing: border-box;
  margin-bottom: 20px;
}

#cke_editor1  {
  height: 300px!important;  
}

.cke_reset {
  height: 200px!important;  
}

#cke_1_contents {
  height: 200px;
} 

</style>

<?php include_once "upload_imagem_sliderslogosjs.php"; ?>

<script>

  function passarImagem(imagem) {
    var img = document.getElementById("imagem");
    img.value = imagem;
    var imagem_slider = document.getElementById("imagem-slider");
    var myurl = document.getElementById("myurl");

    imagem_slider.src = myurl.value + "imagens/sliders/" + imagem;
  }   

  function carregarImagens() {

    var o_imgs = document.getElementById("galeria-imagens");
    var x = document.getElementById("x");
    var y = document.getElementById("y"),
    xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo myUrl('tao/carregar_imagens_sliders/') ?>');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
       o_imgs.innerHTML = xhr.responseText + o_imgs.innerHTML;
     }
     else if (xhr.status !== 200) {
      alert(xhr.status);
    }
  };
  xhr.send(encodeURI('x=' + x.value + "&y=" + y.value));
  x.value = parseInt(x.value) + 10;
  y.value = parseInt(y.value) + 10;

}

function excluirImagem(imagem,imgx) {

  var r = confirm("Tem certeza que quer excluir esta imagem?");
  var img=document.getElementById(imgx);
  if (r == true) {

    var imagem = imagem,
    xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo myUrl('tao/excluir_imagem/') ?>');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
        img.style.display="none";
      }
      else if (xhr.status !== 200) {
        alert(xhr.status);
      }
    };
    xhr.send(encodeURI('imagem=' + imagem));
  }
}

function open_modulos() {
  var modulos_slider = document.getElementById("modulos-slider");
  if(modulos_slider.style.display === "none" || modulos_slider.style.display === "") {
    modulos_slider.style.display = "block";
  } else {
    modulos_slider.style.display = "none";
  }
}

</script>

