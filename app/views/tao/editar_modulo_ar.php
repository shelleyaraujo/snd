<?php include_once "head.php"; ?>

<body>

 <?php include_once "header.php"; ?>

 <div class="painel">

   <div class="p-a">
    <?php include_once "menutao.php"; ?>
  </div>

  <div class="p-b">

    <a href="<?php if(isset($_SESSION["voltar_modulos"])) { echo $_SESSION["voltar_modulos"]; } ?>" class="voltar">Voltar</a>

    <?php if($idconteudo == "1") { $c= ""; if($ativo == "1") { $c = "checked"; }

    echo "<h2>Página Inicial</h2>

    <div class='ativo-home'>
    <input id='item-home' type='checkbox' ". $c ." onclick='javascript:ativar_home()'>
    Visualizar no menu
    </div>";
  }

  ?>

  <form id="form-modulo" method="POST" action="<?php echo myUrl('tao/editar_modulo_ar/?idconteudo=' . $_GET["idconteudo"]) ?>">

    <?php echo "<h1>" . $modulo . "</h1>" ?>

    <?php echo $ondeestou_tao ?>
    
    <button type="submit">Salvar</button>
    <label>Titulo do Menu:</label>
    <input type="text" name="titulo_menu" value="<?php echo $titulo_menu ?>" placeholder="Titulo do menu">

    <label>Titulo do Conteúdo da Página:</label>
    <input type="text" name="titulo" value="<?php echo $titulo ?>" placeholder="Titulo da Página">

    <?php if($idconteudo != "1") { ?>
      <label>Url externo:</label>
      <input type="text" name="url_externo" value="<?php echo $url_externo ?>">
    <?php }
    ?>

    <div class="cnt-botoes">
      <?php if($idconteudo != "1") { 
        echo "<div class='button-link'>" . $itens_filhos . "</div>";
      }
      ?>
      <a class="button-link" href="javascript:void(0)" onclick="open_meta_tags()">Meta Tags</a>
      <a class="button-link" href="javascript:void(0)" onclick="open_inserir_video()">Inserir Videos</a>

      <?php
      if($_GET["idconteudo"] != "1" && $modulo == "") {
        $_SESSION["voltar_editar_modulo"] = $_SERVER['REQUEST_URI'];
      }
      ?>


      <a class="button-link" href="javascript:void(0)" onclick="open_upload_imagem()">Inserir Imagem</a>
      <a class="button-link" href="javascript:void(0)" onclick="open_sliders()">Exibir Slider</a>
      <div id="cnt-sliders"><div onclick="close_sliders()" class="fechar">X</div><?php echo $sliders ?></div>

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
        <div id="itens-modulo">
         <?php if($_GET["idconteudo"] != "1") { ?>
           <!-- <a href="<?php echo myUrl('tao/itens_modulo/?idmodulo=' . $idmodulo . "&modulo=" . $modulo) ?>" class='button'>Editar Itens desta página</a>-->
         <?php } $_SESSION["voltar_editar_modulo"] = $_SERVER['REQUEST_URI']; ?>
       </div>

       <div id="uploader">
        <div id="loader"></div>
        <div id="upload2">
          <label for='image-file'>x</label>
          <input id="image-file" type="file" onchange="SavePhoto(this)" >
        </div>
        <img id="picture" src="../../imagens/sem-imagem.jpg" />
      </div>
      <p>&nbsp;Posicione o cursor do mouse no editor de texto onde deseja aplicar a image e em seguida arraste a imagem <span style="color:red; font-weight: bold">.JPG</span> dentro do box ou clique no icone.</p>
      <p>Máximo de largura 1200px</p>
    </div>
  </div>

  <div class="meta-tags">
    <a href="javascript:void(0)" class="fechar" onclick="close_meta_tags()">X</a>
    <label>Meta Tags</label>

    <fieldset class="meta-tag">

      <label>Title:</label>
      <input type="text" name="title" value="<?php echo $title ?>">
      <label>Description:</label>
      <textarea name="description" id="description"><?php echo $description ?></textarea>
      <label>Keywords:</label>
      <input type="text" name="keywords" value="<?php echo $keywords ?>">
    </fieldset>
  </div>



  <fieldset>

    <textarea name="editor1" id="editor1"><?php echo $conteudo ?></textarea>

    <script>  

      CKEDITOR.replace( 'editor1', {
        customConfig: '<?php echo myUrl("app/views/tao/ckeditor/config.js") ?>'
      } );             

    </script>

  </fieldset>





</div>

<div class="p-c">

  <div style="display: none;"><?php echo $modulos ?></div>

  <input type="hidden" id="idModulo" name="idModulo" value="<?php echo $_REQUEST["idconteudo"] ?>">
 

   <div style="display: none;"><label>Módulo desta Página:</label><?php echo $modulos ?></div>
  <input type="hidden" name="update_modulo" value="update">


  
</form> 

<div class="cnt-destaques">

  <div>


  <div>Área restrita:<input type="text" id="ar" nome="ar" style="width: 50px;" value="<?php echo $ar; ?>"/><a href="javascript:void(0)" onclick="SetAr()" class="button">Aplicar</a></div>
  
  <div style="display: none;"><label>Módulo desta Página:</label><?php echo $modulos ?></div>
   <input type="hidden" id="idModulo" name="idModulo" value="<?php echo $_REQUEST["idconteudo"] ?>">
  <input type="hidden" name="update_modulo" value="update">
  </div>


</div>
</div>

</div>

</body>

<?php include_once "footer.php"; ?>

<style>

.cnt-botoes {
  position: relative;
}

#form-modulo {
  position: relative;
}

.cnt-destaques {
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  align-items: center;
  align-content: center;
  justify-content: center;
  flex-wrap: wrap;
  width: 100%;
  box-sizing: border-box;
  background-color: skyblue;
  margin-top: 20px;
  padding: 15px;
}

.cnt-destaques > div{
  width: 100%;
}

.dst-selecionados > div {
  background-color: lightblue;
  color: #5499C7;
  margin-bottom: 5px;
  padding: 5px;
}


.cnt-container {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  align-content: flex-start;
  padding: 10px 0;
}

.cnt-container a {
  text-decoration: none;
}

.cnt-container div:nth-child(1) {
  width: 20px;
}

.cnt-container div:nth-child(2) {
  width: auto;
}

fieldset {
  padding: 0;
  border: 0px solid #5499C7;
  box-sizing: border-box;
  margin: 0;
}

#destino { 
  width: 100%;  
  min-height: 100%;
  background-color: white;
  box-sizing: border-box;
  padding: 5px;
  padding-bottom: 100px;
  border: 1px solid #cae1ff;
}

#destino > div { 
  box-sizing: border-box;
  background-color: white;
  margin-bottom: 5px;
}

#destino > div > div { 
  background-color: #ebebeb;
  cursor: move;
}

#destino a { 
  padding: 5px;
  display: block;
  border: 1px solid #cae1ff;
  background-color: aliceblue;
  text-decoration: none;
}

.cnt-cnt-menu {
  width: 100%;
  display: block;
}

.cnt-cnt-menu > div {
  width: 50%;
}

.cnt-menu > div {
  padding-right: 50px;
  cursor: move;
  margin: 5px;
}

.cnt-menu > div {
  display: block;
}

.cnt-menu > div {
  position: relative;
  padding: 5px;
  border: 1px solid skyblue;
  background-color: lightblue;
}

.cnt-menu > div a {
  position: relative;
  padding: 5px;
  text-decoration: none;
}


.cnt-menu > div:active {
  background-color: lightblue;
}

.xnt-menu > div:after {
 content: "";
 position: absolute;
 top: 10px;
 right: -5px;
 border-top: 10px solid transparent;
 border-bottom: 10px solid transparent;
 border-left: 10px solid #5499C7;
 border-right: 10px solid transparent;
}



.cnt-cnt-menu {
  display: flex;
  align-items: stretch;
  align-content: flex-start;
  justify-content: flex-start;
  flex-wrap: wrap;
}

.cnt-cnt-menu > div {
  width: 50%;
}



@media (min-width: 550px) {


  .cnt-destaques {
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    align-items: flex-start;
    align-content: stretch;
    justify-content: space-between;
    flex-wrap: wrap;
    width: 100%;
    box-sizing: border-box;
  }

  .cnt-destaques > div{
    width: 100%;
  }

}

#cnt-sliders {
  padding: 20px;
  background-color: #5499C7;
  position: fixed;
  top: 50%;
  left: 50%;
  display: none;
  width: 200px;
  margin-left: -100px;
  z-index: 99999999999999999;
  margin-top: -100px;
}

#cnt-sliders li{
  list-style: none;
  text-align: left;
  color: white;
}

#cnt-sliders img{
  width: 100%;
}

#cnt-sliders .fechar{
  color: white;
  cursor: pointer;
  top: 5px;
  right: 5px;
  position: absolute;
}
#cnt-sliders .fechar:hover{
  color: black;
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

function adicionar_item_modulo(id_modulo, modulo) {

  xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php echo myUrl('tao/adicionar_item_modulo/') ?>');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      info.style.display="block";
      info.innerHTML = xhr.responseText;
    }
    else if (xhr.status !== 200) {
      alert(xhr.status);
    }
  };
  xhr.send(encodeURI('id_modulo=' + id_modulo + "&modulo=" + modulo));
  


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


function ativar_home() {

  var ativo="0";
  var checkBox = document.getElementById("item-home");

  if (checkBox.checked == true){
    ativo="1";
  } 

  xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php echo myUrl('tao/ativar_modulo/') ?>');
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
  xhr.send(encodeURI('id=1' + "&ativo=" + ativo));
  
}

</script>


<script>

  function allowDrop(ev)
  {
    ev.preventDefault();
  }

  function drag(ev)
  {
    ev.dataTransfer.setData("Text",ev.target.id);
  }

  function drop(ev)
  {
    var data = ev.dataTransfer.getData("Text");
    ev.target.appendChild(document.getElementById(data));

    var x = ev.target.querySelectorAll("div");

    ev.preventDefault();
  }

</script>



<style>

.column.over {
  border: 2px dashed #000;
}

</style>

<script>

  function handleDragStart(e) {
  this.style.opacity = '0.4';  // this / e.target is the source node.
}

function handleDragOver(e) {
  if (e.preventDefault) {
    e.preventDefault(); // Necessary. Allows us to drop.
  }

  e.dataTransfer.dropEffect = 'move';  // See the section on the DataTransfer object.

  return false;
}

function handleDragEnter(e) {
  // this / e.target is the current hover target.
  this.classList.add('over');
}

function handleDragLeave(e) {
  this.classList.remove('over');  // this / e.target is previous target element.
}

var cols = document.querySelectorAll('#cnt-menu .column');
[].forEach.call(cols, function(col) {
  col.addEventListener('dragstart', handleDragStart, false);
  col.addEventListener('dragenter', handleDragEnter, false);
  col.addEventListener('dragover', handleDragOver, false);
  col.addEventListener('dragleave', handleDragLeave, false);
});

function handleDrop(e) {
  // this / e.target is current target element.

  if (e.stopPropagation) {
    e.stopPropagation(); // stops the browser from redirecting.
  }

  // See the section on the DataTransfer object.

  return false;
}

function handleDragEnd(e) {
  // this/e.target is the source node.

  [].forEach.call(cols, function (col) {
    col.classList.remove('over');
  });
}

var cols = document.querySelectorAll('#cnt-menu .column');
[].forEach.call(cols, function(col) {
  col.addEventListener('dragstart', handleDragStart, false);
  col.addEventListener('dragenter', handleDragEnter, false)
  col.addEventListener('dragover', handleDragOver, false);
  col.addEventListener('dragleave', handleDragLeave, false);
  col.addEventListener('drop', handleDrop, false);
  col.addEventListener('dragend', handleDragEnd, false);
});

var dragSrcEl = null;

function handleDragStart(e) {
  // Target (this) element is the source node.
  this.style.opacity = '0.4';

  dragSrcEl = this;

  e.dataTransfer.effectAllowed = 'move';
  e.dataTransfer.setData('text/html', this.innerHTML);
}

function handleDrop(e) {

  // this/e.target is current target element.

  if (e.stopPropagation) {
    e.stopPropagation(); // Stops some browsers from redirecting.
  }

  // Don't do anything if dropping the same column we're dragging.
  if (dragSrcEl != this) {
    // Set the source column's HTML to the HTML of the columnwe dropped on.
    dragSrcEl.innerHTML = this.innerHTML;
    this.innerHTML = e.dataTransfer.getData('text/html');
  }

  return false;
}

var info = document.getElementById("info");

function getIds() {
  var divs = document.querySelectorAll("#cnt-menu > div");
  for(var i=0; i < divs.length; i++) {
    var ids = divs[i].querySelector("div");
    var id = ids.getAttribute('id');
    var id_container = ids.getAttribute('data-id_container');
    getElem(id, i);
  }

}

function getElem(id, ordem) {

  xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php echo myUrl('tao/ordenar_containers/') ?>');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  info.innerHTML =  "Salvando..."

  xhr.onload = function() {
    if (xhr.status === 200) {
      info.style.display="block";
      info.innerHTML =  "Destaques Reordenados";
    }
    else if (xhr.status !== 200) {
     /* alert(xhr.status); */
   }
 };
 xhr.send(encodeURI('id=' + id + "&ordem=" + ordem));

 setTimeout(function(){  
  window.location.href =  "";  
}, 500);

}

function set_container(id,id_container,id_modulo) {

  var checkBox = document.getElementById(id);
  var acao = 0;

  if (checkBox.checked == true){
    acao = 1;
  } 

  xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php echo myUrl('tao/set_container/') ?>');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      msg_cnt.style.display="flex";
      msg_info.innerHTML = xhr.responseText;
    }
    else if (xhr.status !== 200) {
      alert(xhr.status);
    }
  };
  xhr.send(encodeURI("acao=" + acao + "&id_modulo=" + id_modulo + "&id_container=" + id_container));
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


function open_sliders() {

  var cnt_sliders = document.getElementById("cnt-sliders");

  if(cnt_sliders.style.display == "none" || cnt_sliders.style.display == "") {
    cnt_sliders.style.display = "block";
  } else {
    cnt_sliders.style.display = "none";
  }

}

function close_sliders() {

  var cnt_sliders = document.getElementById("cnt-sliders");

  if(cnt_sliders.style.display == "none" || cnt_sliders.style.display == "") {
    cnt_sliders.style.display = "block";
  } else {
    cnt_sliders.style.display = "none";
  }

}


var meta_tags = document.querySelector(".meta-tags");

function open_meta_tags() {
  if(meta_tags.style.display == "none" || meta_tags.style.display == "") {
    meta_tags.style.display = "block";
  } else {
    meta_tags.style.display = "";
  }
}



function close_meta_tags() {

  if(meta_tags.style.display == "none" || meta_tags.style.display == "") {
    meta_tags.style.display = "block";
  } else {
    meta_tags.style.display = "";
  }
}


function SetAr() {

  var id = document.getElementById("idModulo").value;
  var ar = document.getElementById("ar").value;

  xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php echo myUrl('tao/modulo_set_ar/') ?>');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      alert("Área restrita " + xhr.responseText + " salvo!");
    }
    else if (xhr.status !== 200) {
      alert(xhr.status);
    }
  };
  xhr.send(encodeURI("id=" + id + "&ar=" + ar));

}


</script>


</body>

</html>



