<?php include_once "head.php"; ?>

<body>

 <?php include_once "header.php"; ?>


 <div class="painel">
  <div class="p-a">
   <?php include_once "menutao.php"; ?>
 </div>
 <div class="p-b">

   <a href="<?php 
   if(isset($_SESSION["voltar"])) {
     echo $_SESSION["voltar"]; 
   }

   ?>" class="voltar">Voltar</a>
   
   <h1>Editar Slider Celular</h1>

  <div class="cnt-imagem">
   <img id="imagem-slider" src="<?php echo myUrl("imagens/".$imagem) ?>">
 </div>
 <p></p>

    <div class="cnt-botoes">
    <a class="button-vazado" href="javascript:void(0)" onclick="open_upload_imagem()">Inserir Imagem</a>
    <!--<a class="button-vazado" href="javascript:void(0)" onclick="open_modulos()">Exibir nos Módulos</a>-->
  </div>


 <form id="form-cabecalho" method="POST" action="<?php echo myUrl('tao/editar_slider/?idslider=' . $_GET["idslider"]) ?>">
  <label>Titulo Alternativo: <span style="color: red"><small>(Digite o nome da imagem para ajudar no (SEO).)</small></span></label>
  <input type="text" name="titulo" value="<?php echo $titulo ?>">
  <label>Ao clicar abrir a página: <span style="color: red"><small>(Copie e Cole aqui a url da página.)</small></span></label>
  <input type="text" name="url_pagina" value="<?php echo $url_pagina ?>">
  <label id="btn-classes">Classes:</label>
  <input type="text" name="classe" id="classe" value="<?php echo $classe ?>"> 
  <?php include_once "./app/views/". $tema ."/classes_css_banner.php" ?>

  
  <button type="submit">Aplicar Alterações</button>


  <label>Texto no Slider:</label>
  <textarea name="editor1" id="editor1"><?php echo $texto ?></textarea>
  <input type="hidden" name="update_slider" value="update">

  <script>  

    CKEDITOR.replace( 'editor1', {
      customConfig: '<?php echo myUrl("app/views/tao/ckeditor/config.js") ?>'
    } );             

  </script>

  <fieldset id="modulos-slider">
    <a href="javascript:void(0)" class="fechar" onclick="fechar_modulos()">X</a>
    <?php echo $modulos ?>
  </fieldset>

  <input type="hidden" name="imagem" id="imagem" value="<?php echo $imagem ?>">
  <input type="hidden" name="myurl" id="myurl" value="<?php echo myUrl() ?>">

</form> 

</div>

<div class="p-c">

</div>

</div>


<div class="cnt-upload-imagem">
    <a href="javascript:void(0)"class="fechar" onclick="close_upload_imagem()">X</a>

    <label>Upload da Imagem</label>

    <div id="uploader">

      <div id="upload2">
        <label for='image-file'>Selecionar Arquivo</label>
        <input id="image-file" type="file" onchange="SavePhoto(this)" >
      </div>
      <img id="picture" src="../../imagens/sem-imagem.jpg" />
      <div id="loader"></div>


      <p>&nbsp;Arraste a imagem .JPG no box ou clique no icone.</p>

      <?php echo $config_site[0]->crop_imagem_w_sliderp . " x " . $config_site[0]->crop_imagem_h_sliderp . " px" ?> 


    </div>


  </div>
</body>

<?php include_once "footer.php"; ?>

<style>

#form-cabecalho {
  position: relative;
}

#modulos-slider {
  display: none;
  width: 100%;
  max-width: 250px;
  position: absolute;
  z-index: 999;
  background-color: #048AC1;
  font-size: 12px;
  top: 0;
  border: 0;
  color: white;
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
  max-height: 300px;
  overflow: hidden;
  text-align: center; 
  background-color: aliceblue;
}

.cnt-imagem img {
  width: 100%;
  max-width: 500px;
  margin: 0 auto;
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

#cke_editor1 {
  width: 100%;
  border: 0px solid #777;
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


@media (min-width: 550px) {

  #modulos-slider {
    display: none;
    width: 100%;
    max-width: 250px;
    position: absolute;
    z-index: 999;
    background-color: #048AC1;
    font-size: 12px;
    top: 0;
    left: 50%;
    margin-left: -125px;
    border: 0;
    color: white;
  }

}

</style>

<?php include_once "upload_imagem_slidersjs.php"; ?>

<script>

  function passarImagem(imagem) {
    var img = document.getElementById("imagem");
    img.value = imagem;
    var imagem_slider = document.getElementById("imagem-slider");
    var myurl = document.getElementById("myurl");

    imagem_slider.src = myurl.value + "imagens/" + imagem;
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

var modulos_slider = document.getElementById("modulos-slider");
function open_modulos() {
  if(modulos_slider.style.display === "none" || modulos_slider.style.display === "") {
    modulos_slider.style.display = "block";
  } else {
    modulos_slider.style.display = "none";
  }
}


var classes = document.getElementById("btn-classes");
var lista_classes = document.getElementById("lista-classes");
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

}); 

}

var upload_imagem = document.querySelector(".cnt-upload-imagem");

function open_upload_imagem() {

  if(upload_imagem.style.display === "" || upload_imagem.style.display === "none" ) {
    upload_imagem.style.display = "block";
  } else {
    upload_imagem.style.display = "none";
  }

}

function close_upload_imagem() {
  upload_imagem.style.display = "none";
}

function fechar_modulos() {
  modulos_slider.style.display = "none";
}




</script>


