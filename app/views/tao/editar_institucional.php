<?php include_once "head.php"; ?>

<body>

 <?php include_once "header.php"; ?>

 <div class="painel">
  <div class="p-a">
    <?php include_once "menutao.php"; ?>
  </div>
  <div class="p-b">

   <h1>Editar Institucional</h1>
   <a href="<?php echo $_SESSION["voltar_itens"] ?>" class="voltar">Voltar</a>

   <?php  if(isset($_GET["modulo"])) {if($_GET["modulo"] == "Blog") { echo $post_na_home; }} ?>

   <form id="form-cabecalho" method="POST" action="<?php echo myUrl('tao/editar_institucional/?idconteudo=' . $_GET["idconteudo"]) ?>">
  
      <div>
      <button type="submit">Salvar</button>
    </div>  

    <label>Titulo:</label>


    <input type="text" name="titulo" value="<?php echo $titulo ?>">

    <div class="cnt-botoes">
      <a class="button-link" href="javascript:void(0)" onclick="open_inserir_video()">Inserir Videos</a>
      <a class="button-link" href="javascript:void(0)" onclick="open_upload_imagem()">Inserir Imagem</a>
    </div>

    <fieldset class="cnt-cnt-videos">
      <a href="javascript:void(0)" class="fechar" onclick="close_insert_videos()">X</a>
      <div id="cnt-videos">
        <small>Copie e cole aqui o url do vídeo do youtube</small>
        <input type="text" style='width: 300px;display: inline-block;' id="url_video" value="https://www.youtube.com/watch?v=exemplo">
        <a onclick="inserirVideo()" href="javascript:void[0]" class="button">Inserir</a>
      </div>
    </fieldset>

    <div class="cnt-upload-imagem">
      <a href="javascript:void(0)"class="fechar" onclick="close_upload_imagem()">X</a>
      <h3>Upload  Imagens</h3>
      <div id="uploader">
        <div id="upload2">
          <label for='image-file'>x</label>
          <input id="image-file" type="file" onchange="SavePhoto(this)" >
        </div>
        <div id="loader"></div>
      <img id="picture" src="../../imagens/sem-imagem.jpg" />
        <p>&nbsp;Arraste a imagem <span style="color:red">.JPG</span> no box ou clique no icone.</p>
        <p>Máximo de largura 800px</p>
      </div>
    </div>

    <textarea name="editor1" id="editor1"><?php echo $conteudo ?></textarea>
    <input type="hidden" name="update_conteudo" value="update">


    <div>
      <script>  

        CKEDITOR.replace( 'editor1', {
          customConfig: '<?php echo myUrl("app/views/tao/ckeditor/config.js") ?>'
        } );             

      </script>
    </div>
  </form> 

</div>

<div class="p-c">

</div>

</div>

</body>

<?php include_once "footer.php"; ?>

<style>

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
}

#form-cabecalho input  {
 width: 100%;
 margin-bottom: 5px;
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


fieldset {
  padding: 15px;
  border: 1px solid #5499C7;
  box-sizing: border-box;
  margin-bottom: 20px;
}

</style>

<?php include_once "upload_imagem_conteudojs.php"; ?>

<script>

  function passarImagem(imagem) {
    var img = "<img src='../../imagens/" + imagem + "' alt='" + imagem + "' title='" + imagem + "' />";
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

  var s = url_video;
  s = s.substring(0, s.indexOf('&'));

  if(s != "") {
    url_video = s;
  }

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

var cnt_cnt_videos = document.querySelector(".cnt-cnt-videos");

function open_inserir_video() {
  if(cnt_cnt_videos.style.display == "none" || cnt_cnt_videos.style.display == "") {
    cnt_cnt_videos.style.display = "block";
  } else {
    cnt_cnt_videos.style.display = "";
  }
}

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


function close_insert_videos() {
  cnt_cnt_videos.style.display = "none";
}

</script>


