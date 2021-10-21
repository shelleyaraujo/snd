<?php include_once "head.php"; ?>

<body>

 <?php include_once "header.php"; ?>

 <div class="painel">

   <div class="p-a">
    <?php include_once "menutao.php"; ?>
  </div>

  <div class="p-b">
    <h1>Editar Container Destaques</h1>

    <form id="form-container" method="POST" action="<?php echo myUrl('tao/editar_container_flex/?idcontainer=' . $_GET["idcontainer"]) ?>">
      <div>
        <label>Titulo do Container:</label>
        <input type="text" name="titulo" value="<?php echo $titulo ?>">
      </div>
      <input type="hidden" name="classe" value="<?php echo $classe ?>">
      <input type="hidden" name="id" value="<?php echo $idcontainer ?>">
      <input type="hidden" name="update_container_flex" value="update">
      <div>
        <button type="submit">Atualizar</button>
      </div>
    </form> 

    <form id="form-blocos" method="POST" action="<?php echo myUrl('tao/editar_container_flex/?idcontainer=' . $_GET["idcontainer"]) ?>">
      <input type="hidden" name="id" value="<?php echo $idcontainer ?>">
      <input type="hidden" name="add_conteudo" value="update">
      <button type="submit">Inserir Bloco de Conteúdo</button>
    </form> 

    <?php echo $conteudo ?>

    <div>
    <botton class="button" onclick="getElem()" />Aplicar Alterações</button>
      
    </div>
  




  </div>
</body>

<?php include_once "footer.php"; ?>

<style>

#xdestino { 
  width:100%; 
  min-height: 100px;
  height: auto; 
  padding:10px; 
  border:1px solid silver;
  box-sizing: border-box;
  text-size: 12px;
  display: flex;
  align-items: flex-start;
  align-content: flex-start;
  justify-content: flex-start;
  flex-wrap: wrap;
  font-size: 8px;
  color: red;
  padding-bottom: 100px;
}

#destino > div { 
  box-sizing: border-box;
  background-color: white;
  text-size: 12px;
  position: relative;
}

#destino > div > div { 
  border: 1px solid silver;
  background-color: #ebebeb;
  padding: 10px; 
  cursor: move;
}

#fig {
  width: 1000px;
  height: 200px;
  padding: 10px;
  border: 2px solid #aaaaaa;
}

.p-b {
  width: 80%!important;
}

.excluir {
  width: 20px;
  text-align: right;
  display: block;
  color: red;
  position: absolute;
  right: 15px;
  top: 2px;
  text-decoration: none;
}

.cnt-dst-flex {
  display: flex;
  align-items: stretch;
  align-content: stretch;
  justify-content: flex-start;
  flex-wrap: wrap;
} 

.cnt-dst-flex > div {
  box-sizing: border-box;
  margin-bottom: 20px;
} 

.cnt-dst-flex > div > div{
  border: 1px solid silver;
  box-sizing: border-box;
  padding: 20px;
  padding-bottom: 0;
  height: 100%;
  overflow: hidden;
  margin: 0 10px;
}


.cnt-dst-flex img {
  width: 100%;
  max-width: 100px;
  display: block;
  height: auto!important;
  margin-bottom: 10px;
}


.cnt-dst-flex iframe {
  width: 100%;
  max-width: 500px;
  height: 250px;
  display: block;
  height: auto!important;
  margin-bottom: 10px;
}


.cnt-dst-flex p {
 font-size: 8px;
 line-height: 10px;
 margin-bottom: 10px;
}

.cnt-dst-flex h2 {
 font-size: 12px;
 line-height: 10px;
 margin-bottom: 10px;
}

#form-container {

  display: flex;
  align-items: flex-end;
  align-content: flex-end;
  justify-content: flex-start;
  flex-wrap: nowrap;
}

#form-container > div{
  width: 20%;
}


#form-container button {
  margin-bottom: 15px;
}

display: flex;
align-items: center;
align-content: center;
justify-content: center;
flex-wrap: wrap;
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

function getElem() {
  var destino = document.querySelectorAll("#destino > div");
  var id = "";
  var ordem = "";

  for (i = 0; i < destino.length; i++) {
    id += destino[i].getAttribute("id") + ",";
    ordem += i + ",";
  } 

    xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo myUrl('tao/ordenar_destaques_flex/') ?>');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    info.innerHTML =  "Salvando..."

    xhr.onload = function() {
      if (xhr.status === 200) {
        info.style.display="block";
        info.innerHTML =  xhr.responseText;
      }
      else if (xhr.status !== 200) {
        alert(xhr.status);
      }
    };
    xhr.send(encodeURI('id=' + id + "&ordem=" + ordem));

}



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
  ev.preventDefault();
}



function excluir_item(id) {

  var row = document.getElementById(id);

  console.log(row);

  var r = confirm("Tem certeza que quer excluir este item?");

  if (r == true) {

    var imagem = imagem,
    xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo myUrl('tao/excluir_conteudo/') ?>');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
        info.style.display="block";
        info.innerHTML= xhr.responseText;
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

