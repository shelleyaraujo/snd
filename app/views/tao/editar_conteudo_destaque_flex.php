<?php include_once "head.php"; ?>

<body>

 <?php include_once "header.php"; ?>


 <div class="painel">
  <div class="p-a">
    <?php include_once "menutao.php"; ?>
  </div>
  <div class="p-b">

   <h1>Editar Conteudo</h1>

   <form id="form-cabecalho" method="POST" action="<?php echo myUrl('tao/editar_container_flex/?idcontainer=' . $_GET["idcontainer"] ) ?>">
    <label>Classe:</label>
    <input type="text" name="classe" value="<?php echo $classe ?>">
    <label>Titulo:</label>
    <input type="text" name="titulo" id="titulo" value="<?php echo $titulo ?>">
    <fieldset>
      <div id="cnt-videos">
        <small>Copie e cole aqui o url do vídeo do youtube</small>
        <input type="text" style='width: 300px;display: inline-block;' id="url_video" value="https://www.youtube.com/watch?v=exemplo">
        <a onclick="inserirVideo()" href="javascript:void[0]" class="button">Inserir</a>
      </div>
    </fieldset>
    <textarea name="editor1" id="editor1"><?php echo $conteudo ?></textarea>
    <input type="hidden" name="idconteudo" id="idconteudo" value="<?php echo $_GET["idconteudo"] ?>">
    <input type="hidden" name="update_conteudo" value="update">
    <button type="submit">Aplicar Alterações</button>
    <script>               
      CKEDITOR.replace( 'editor1' );
    </script>
  </form> 
</div>
<div class="p-c">


 <div class="logotipo-topo">
  <label>Upload  Imagena</label>
  <div id="uploader">
    <img id="picture" src="../../imagens/semimagem.jpg" />
    <p>&nbsp;Arraste a imagem <span style="color:red">.jpg</span> aqui</p>
    <div id="loader"></div>
  </div>
</div>

</div>

</div>

</body>

<?php include_once "footer.php"; ?>

<style>

.logotipo-topo {
  position: fixed;
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

#uploader {
  width: 100%;
  height: 300px; 
  background: #ebebeb; 
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
  height: 500px!important;  
}

.cke_reset {
  margin: 0;
  padding: 0;
  border: 0;
  background: transparent;
  text-decoration: none;
  width: auto;
  height: 508px;
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

#xcke_editor1  {
  height: 600px!important;  
}

.xcke_reset {
  height: 450px!important;  
}

#cke_1_contents {
  height: 500px;
} 

</style>

<?php include_once "upload_imagem_conteudojs.php"; ?>

<script>

  function passarImagem(imagem) {
    var img = "<img src='../../imagens/" + imagem + "' />";
    CKEDITOR.instances.editor1.insertHtml(img);
  }   

  function carregarImagens() {

    var o_imgs = document.getElementById("galeria-imagens");
    var x = document.getElementById("x");
    var y = document.getElementById("y"),
    xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo myUrl('tao/carregar_imagens/') ?>');
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

function inserirVideo() {
  var url_video = document.getElementById("url_video").value;
  if(url_video =="https://www.youtube.com/watch?v=exemplo") {
  alert("Copie uma URL válida do youtube.");
  } else {
  url_video = url_video.replace("/watch?v=", "/embed/");
  var video = "-iframe src="+ url_video +" style=width:640;height:450 width=640 height=360 frameborder=0 allow=autoplay; encrypted-media-/iframe-";
  CKEDITOR.instances.editor1.insertHtml("<p>" + video + "</p><p>&nbsp;</p>");
}
}


function ativar_post(id) {

  var vitrine="0";
  var checkBox = document.getElementById("vitrine");

  if (checkBox.checked == true){
    vitrine="1";
  } 


  xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php echo myUrl('tao/ativar_post/') ?>');
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
  xhr.send(encodeURI('id=' + id + "&vitrine=" + vitrine));
  
}

</script>

