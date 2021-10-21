<?php include_once "head2.php"; ?>

<body>

 <?php include_once "header.php"; ?>

 <div class="painel">
  <div class="p-a">
    <?php include_once "menutao.php"; ?>
  </div>
  <div class="p-b">

   <a href="<?php 
   if(isset($_SESSION["voltar_itens_galeria"])) {
   echo $_SESSION["voltar_itens_galeria"]; } ?>"

    class="voltar">Voltar</a>

   <h1>Editar Página</h1>
   
   <div class="''">
    <button onclick="get_categorias_mudar()">Mudar Categoria</button>
    <div id="categorias-mudar"></div>
  </div>    

  <form id="form-cabecalho" method="POST" action="<?php echo myUrl('tao/editar_galeria/?idgaleria=' . $_GET["idgaleria"]) ?>">
    <label>Titulo:</label>
    <input type="text" name="titulo" value="<?php echo $titulo ?>">

    <div class="cnt-botoes">
      <a class="button-vazado" href="javascript:void(0)" onclick="open_upload_imagem()">Inserir Imagem</a>
    </div>


    
    <div class="cnt-upload-imagem">
      <a href="javascript:void(0)"class="fechar" onclick="close_upload_imagem()">X</a>
      <label>Upload Imagem</label>
      <div id="uploader">
        <div id="upload2">
          <label for='image-file'>x</label>
          <input id="image-file" type="file" onchange="SavePhoto(this)" >
        </div>
      <img id="picture" src="../../imagens/sem-imagem.jpg" />
        <div id="loader">_</div>
        <p>&nbsp;Arraste a imagem <span style="color:red">.JPG</span> no box ou clique no icone.</p>
        <?php echo $config_site[0]->crop_imagem_w_galeria . " x " . $config_site[0]->crop_imagem_h_galeria . " px" ?> 
      </div>
    </div>



    <label>Descrição:</label>

    <textarea name="editor1" id="editor1"><?php echo $descricao ?></textarea>
    <script>  

      CKEDITOR.replace( 'editor1', {
        customConfig: '<?php echo myUrl("app/views/tao/ckeditor2/config.js") ?>'
      } );             

    </script>

    <input type="hidden" name="update_galeria" value="update">
    <button type="submit">Aplicar Alterações</button>
    <input type="hidden" name="imagem" id="imagem" value="<?php echo $imagem ?>">
    <input type="hidden" name="myurl" id="myurl" value="<?php echo myUrl() ?>">

    <div class="cnt-imagem">
     <img id="imagem-galeria" src="<?php echo myUrl("imagens/".$imagem) ?>">
   </div>

 </form> 

 <input type="hidden" name="idgaleria" id="idgaleria" value="<?php echo $_GET["idgaleria"] ?>">

</div>

<div class="p-c">
<input type="text" id="id" value="<?php echo $_GET["idgaleria"]?>">

</div>

</div>


</body>

<?php include_once "footer.php"; ?>

<style>

#categorias-mudar {
  background-color: aliceblue;
  border: 1px solid #cae1ff;
  padding: 15px;
  box-sizing: border-box;
  margin-bottom: 20px;
  display: none;
  max-width: 200px;
  background-color: aliceblue;
  position: absolute;
  z-index: 99999!important;
}

#categorias-mudar ul{
 margin: 0;
 padding: 0;
}

#categorias-mudar li{
  font-size: 10px;
  z-index: 999999999;
  list-style: none;
}

.logotipo-topo {
  position: fixed;
}

.cnt-imagem  {
  width: 100%;
  height: auto!important;
  max-height: 300px;
  overflow: hidden;
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


.imagens li {
  height: 100px!important;
}

</style>

<?php include_once "upload_imagem_galeriajs.php"; ?>

<script> 

  function passarImagem(imagem) {
    var img = document.getElementById("imagem");
    var id = document.getElementById("id").value;
    img.value = imagem;
    var imagem_galeria = document.getElementById("imagem-galeria");
    var myurl = document.getElementById("myurl");
    imagem_galeria.src = myurl.value + "imagens/" + imagem;
    add_imagem_db(id,imagem);
  }    

  function carregarImagens() {

    var o_imgs = document.getElementById("galeria-imagens");
    var x = document.getElementById("x");
    var y = document.getElementById("y"),
    xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo myUrl('tao/carregar_imagens_galeria/') ?>');
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

  alert(imagem);

  var r = confirm("Tem certeza que quer excluir esta imagem?");
  var img=document.getElementById(imgx);
  if (r == true) {

    var imagem = imagem,
    xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo myUrl('tao/excluir_imagem_galeria/') ?>');
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


function add_imagem_db(id, imagem) { 

  var imagem = imagem,
  xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php echo myUrl('tao/add_imagem_galeria/') ?>');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
     /*alert(xhr.responseText);*/
   }
   else if (xhr.status !== 200) {
    /*alert(xhr.status);*/
  }
};
xhr.send(encodeURI('id='+ id +'&imagem=' + imagem));
}



function get_categorias_mudar() {

 var categorias_mudar = document.getElementById("categorias-mudar");
 //var idcatalogo = document.getElementById("idcatalogo").value;

 if(categorias_mudar.style.display === "none" || categorias_mudar.style.display === "") {
   categorias_mudar.style.display = "block";
 } else {
   categorias_mudar.style.display = "none";
 }

 xhr = new XMLHttpRequest();
 xhr.open('POST', '<?php echo myUrl('tao/modulos_trocar_galleria/') ?>');
 xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
 xhr.onload = function() {
  if (xhr.status === 200) {
    categorias_mudar.innerHTML =  xhr.responseText;
  }
  else if (xhr.status !== 200) {
    alert(xhr.status);
  }
};
xhr.send(encodeURI("id=0"));
}



function trocar_modulo(idmodulo) {

 var idgaleria = document.getElementById("idgaleria").value;

 xhr = new XMLHttpRequest();
 xhr.open('POST', '<?php echo myUrl('tao/set_modulo_trocar_galeria/') ?>');
 xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
 xhr.onload = function() {
  if (xhr.status === 200) {
    alert(xhr.responseText);
  }
  else if (xhr.status !== 200) {
    alert(xhr.status);
  }
};
xhr.send(encodeURI("id=" + idgaleria + "&idmodulo=" + idmodulo));
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

</script>




