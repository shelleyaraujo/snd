<?php include_once "head.php"; ?>

<body>


 <?php include_once "header.php"; ?>


 <div class="painel">
  <div class="p-a">
    <?php include_once "menutao.php"; ?>
  </div>
  <div class="p-b">

   <h1>Editar Conteudo</h1>

   <form id="form-cabecalho" method="POST" action="<?php echo myUrl('tao/editar_container_fixo/?idcontainer=' . $_GET["idcontainer"] ) ?>">
   <div>
    <label id="xbtn-classes">Largura do box em % (de 1 a 100 apenas numero)</label>
    <input type="text" name="classe" id="classe" style="width: 50px" value="<?php echo $classe ?>">
</div>


    <label>Titulo:</label>

    <?php include_once "./app/views/". $tema ."/classes_css_destaques_box.php" ?>

    <input type="text" name="titulo" id="titulo" value="<?php echo $titulo ?>" placeholder="Titulo do Destaque">

    <div class="cnt-botoes">
      <a class="button-link" href="javascript:void(0)" onclick="open_inserir_video()">Inserir Video</a>
      <a class="button-link" href="javascript:void(0)" onclick="open_upload_imagem()">Inserir Imagem</a>
    </div>

    <button type="submit">Aplicar Alterações</button>
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

    <label>Upload  Imagem</label>
    <div id="uploader">
     <div id="loader"></div>
     <div id="upload2">
      <label for='image-file'>x</label>
      <input id="image-file" type="file" onchange="SavePhoto(this)" >
    </div>
    <img id="picture" src="../../imagens/sem-imagem.jpg" />
    <p>
     Posicione o cursor do mouse no editor de texto onde deseja aplicar 
     a image e em seguida arraste a imagem <span style="color:red">.JPG</span> dentro deste box ou clique no icone.
   Máximo de largura 1200px</p>
 </div>


</div>

    <textarea name="editor1" id="editor1"><?php echo $conteudo ?></textarea>
    
    <input type="hidden" name="iddestaque" id="iddestaque" value="<?php echo $_GET["iddestaque"] ?>">
    <input type="hidden" name="update_conteudo" value="update">

    <script>  

      CKEDITOR.replace( 'editor1', {
        customConfig: '<?php echo myUrl("app/views/tao/ckeditor/config.js") ?>'
      } );             

    </script>

  </form> 
</div>
<div class="p-c">

  <div>
    <label>Plugins</label>
    <?php echo $plugin; ?>
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
    display: fixo;
    justify-content: fixo-start;
    align-items: fixo-start;
    align-content: fixo-start;
    fixo-wrap: wrap;
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
  .cnt-imagem  {
    width: 100%;
    height: auto!important;
    max-height: 300px;
    overflow: hidden;
  }



  #form-cabecalho {
    display: fixo;
    justify-content: fixo-start;
    align-items: fixo-start;
    align-content: fixo-start;
    fixo-wrap: wrap;
    width: 100%;
    position: relative;
  }

  #form-cabecalho input  {
   width: 100%;
   margin-bottom: 5px;
 }

 #form-cabecalho textarea  {
   width: 100%;
   margin-bottom: 20px;
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
  border: 0px solid #777;
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
  display: fixo;
  justify-content: fixo-start;
  align-items: fixo-start;
  align-content: fixo-start;
  fixo-wrap: wrap;
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


function set_plugin(id) {

  var plugin = document.getElementById("plugin").value;

  xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php echo myUrl('tao/set_plugin_destaques/') ?>');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      msg_cnt.style.display="flex";
      msg_info.innerHTML =  xhr.responseText;
    }
    else if (xhr.status !== 200) {
      alert(xhr.status);
    }
  };
  xhr.send(encodeURI('id=' + id + "&plugin=" + plugin));
  
}

var classes = document.getElementById("btn-classes");
var lista_classes = document.getElementById("lista-classes-box");
var classe = document.getElementById("classe");

classes.addEventListener("click", function(){
  if(lista_classes.style.display === "none" || lista_classes.style.display === "") {
    lista_classes.style.display = "block"; 
    get_classes();
  } else {
    lista_classes.style.display = "none"; 
  }

});

var lista_classes_p = lista_classes.querySelectorAll("p");

for (var i = 0; i < lista_classes_p.length; i++) {
 lista_classes_p[i].addEventListener("click", function(){

  classe.value += " " + this.innerText; 
  lista_classes.style.display = "none"; 
}); 

}







function close_upload_imagem() {
  upload_imagem.style.display = "none";
}

function close_insert_videos() {
  cnt_cnt_videos.style.display = "none";
}

</script>


