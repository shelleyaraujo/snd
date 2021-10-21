<?php include_once "head.php"; ?>

<body>

 <?php include_once "header.php"; ?>

 <div class="painel">

   <div class="p-a">
    <?php include_once "menutao.php"; ?>
  </div>

  <div class="p-b">
    <h1>Editar Container Destaques</h1>

    <form id="form-container" method="POST" onsubmit="return verificar()" action="<?php echo myUrl('tao/editar_container_fixo/?idcontainer=' . $_GET["idcontainer"]) ?>">
      <div>
        <label>Titulo do Container:</label>
        <input type="text" name="titulo" id="titulo" value="<?php echo $titulo ?>">
        <label id="btn-classes">Escolha o Container das Caixas de Texto</label>
        <?php include_once "./app/views/". $tema ."/classes_css_destaques.php" ?>

        <input type="text" name="classe" id="classe" value="<?php echo $classe ?>">
      </div>
      <input type="hidden" name="id" value="<?php echo $idcontainer ?>">
      <input type="hidden" name="update_container_fixo" value="update">
      <div>
        <button type="submit">Salvar</button>
      </div>
    </form> 
    
    <form id="form-blocos" method="POST" action="<?php echo myUrl('tao/editar_container_fixo/?idcontainer=' . $_GET["idcontainer"]) ?>">
      <input type="hidden" name="id" value="<?php echo $idcontainer ?>">
      <input type="hidden" name="add_conteudo" value="update">
      <button type="submit">Novo Bloco</button>
    </form> 

    <?php echo $conteudo ?>
    

    <div>




    </div>
  </div>

  <div class="p-c">

    <div class="ajuda">
      Com o mouse sobre a caixa de texto, segure e arraste para reordenar os blocos. Depois clique no botão abaixo (Aplicar).
    </div>
    <br>

    <button onclick="getIds()">Aplicar</button>

  </div>

</div>

</body>

<?php include_once "footer.php"; ?>

<style>

.ajuda {
  padding: 10px;
  text-align: center;
  border: 1px solid lightblue;
  background-color: aliceblue;
}

#xdestino { 
  width:100%; 
  min-height: 100px;
  height: auto; 
  padding:10px; 
  border:1px solid silver;
  box-sizing: border-box;
  text-size: 12px;
  display: fixo;
  align-items: fixo-start;
  align-content: fixo-start;
  justify-content: fixo-start;
  fixo-wrap: wrap;
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

.cnt-dst-fixo {
  display: fixo;
  align-items: stretch;
  align-content: stretch;
  justify-content: fixo-start;
  fixo-wrap: wrap;
} 

.cnt-dst-fixo > div {
  box-sizing: border-box;
  margin-bottom: 20px;
} 

.cnt-dst-fixo > div > div{
  border: 1px solid silver;
  box-sizing: border-box;
  padding: 20px;
  padding-bottom: 0;
  height: 100%;
  overflow: hidden;
  margin: 0 10px;
}


.cnt-dst-fixo img {
  width: 100%;
  max-width: 100px;
  display: block;
  height: auto!important;
  margin-bottom: 10px;
}


.cnt-dst-fixo iframe {
  width: 100%;
  max-width: 500px;
  height: 250px;
  display: block;
  height: auto!important;
  margin-bottom: 10px;
}


.cnt-dst-fixo p {
 font-size: 8px;
 line-height: 10px;
 margin-bottom: 10px;
}

.cnt-dst-fixo h2 {
 font-size: 12px;
 line-height: 10px;
 margin-bottom: 10px;
}

#form-container {
  display: fixo;
  align-items: fixo-end;
  align-content: fixo-end;
  justify-content: fixo-start;
  fixo-wrap: nowrap;
  position: relative;
}

#form-container > div{
  width: 100%;
}


#form-container button {
  margin-bottom: 15px;
}


</style>

<?php include_once "upload_imagem_conteudojs.php"; ?>

<script>

  function verificar() {
    var titulo = document.getElementById("titulo");
    if(titulo.value == "") {
     msg_cnt.style.display="flex";
     msg_info.innerHTML =  "Digite um  nome para o container!";
     return false;
   } 
 }

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

function xxgetElem() {
  var destino = document.querySelectorAll("#destino > div");
  var id = "";
  var ordem = "";

  for (i = 0; i < destino.length; i++) {
    id += destino[i].getAttribute("id") + ",";
    ordem += i + ",";
  } 

  xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php echo myUrl('tao/ordenar_destaques_fixo/') ?>');
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
    xhr.open('POST', '<?php echo myUrl('tao/excluir_destaque/') ?>');
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




<style>
/* Prevent the text contents of draggable elements from being selectable. */
[draggable] {
  -moz-user-select: none;
  -khtml-user-select: none;
  -webkit-user-select: none;
  user-select: none;
  /* Required to make elements draggable in old WebKit */
  -khtml-user-drag: element;
  -webkit-user-drag: element;
}

#cnt-menu {
  width: 100%;
  display: flex;
  align-items: stretch;
  align-content: center;
  justify-content: center;
  flex-wrap: wrap;
  box-sizing: border-box;
}

.column {
  -webkit-border-radius: 5px;
  -ms-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
  cursor: move;
  margin-bottom: 5px;
  text-align: left;
  padding: 10px;
  box-sizing: border-box;
  position: relative;
}

.column a {
  text-decoration: none;
  color: black;
  text-align: center;
  font-size: 13px;
  padding: 3px 10px;
}

.column div:hover {
  background-color: #5499C7;
}

.column > div {
 padding: 10px;
 box-sizing: border-box;
 border: 1px solid #cae1ff ;
 background-color: aliceblue;
}

.column .excluir {
  background-color: white;
  color: white; 
  padding: 10px;
  top: 0;
  right: 0;
  font-size: 0;
  line-height: 0;
  border-radius: 50%;
  border: 1px solid skyblue;
    background-repeat: no-repeat;
  background-size: 50%;
  background-position: center;
  background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' id='Capa_1' x='0px' y='0px' viewBox='0 0 220.889 220.889' style='enable-background:new 0 0 220.889 220.889;' xml:space='preserve' width='512px' height='512px'%3E%3Cg%3E%3Cg%3E%3Cpath d='M206.43,22.883h-19.196h-30.893V7.5c0-4.143-3.357-7.5-7.5-7.5H72.053c-4.143,0-7.5,3.357-7.5,7.5v15.383H33.66H14.459 c-4.143,0-7.5,3.357-7.5,7.5s3.357,7.5,7.5,7.5h12.219l12.578,176.04c0.28,3.925,3.546,6.966,7.481,6.966h127.42 c3.935,0,7.2-3.041,7.48-6.966l12.579-176.04h12.214c4.143,0,7.5-3.357,7.5-7.5S210.572,22.883,206.43,22.883z M79.553,15h61.788 v7.883H79.553V15z M167.173,205.889H53.72L41.715,37.883h30.338h76.788h30.338L167.173,205.889z' data-original='%23000000' class='active-path' data-old_color='%23000000' fill='%23FF0000'/%3E%3Cpath d='M110.445,62.907c-4.143,0-7.5,3.357-7.5,7.5v102.945c0,4.143,3.357,7.5,7.5,7.5s7.5-3.357,7.5-7.5V70.407 C117.945,66.265,114.588,62.907,110.445,62.907z' data-original='%23000000' class='active-path' data-old_color='%23000000' fill='%23FF0000'/%3E%3Cpath d='M77.209,69.873c-0.294-4.132-3.898-7.262-8.015-6.946c-4.132,0.295-7.242,3.884-6.946,8.015l7.354,102.945 c0.281,3.95,3.573,6.966,7.473,6.966c0.18,0,0.36-0.006,0.542-0.02c4.132-0.295,7.242-3.884,6.946-8.015L77.209,69.873z' data-original='%23000000' class='active-path' data-old_color='%23000000' fill='%23FF0000'/%3E%3Cpath d='M143.693,69.873l-7.357,102.945c-0.296,4.131,2.814,7.72,6.946,8.015c0.182,0.014,0.362,0.02,0.542,0.02 c3.898,0,7.19-3.016,7.473-6.966l7.357-102.945c0.296-4.131-2.814-7.72-6.946-8.015C147.593,62.614,143.988,65.741,143.693,69.873z ' data-original='%23000000' class='active-path' data-old_color='%23000000' fill='%23FF0000'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E%0A");

}
.column .excluir:after {
  content: "xxxxxxx";
  color: green;
}

.column header {
  color: #fff;
  text-shadow: #000 0 1px;
  box-shadow: 5px;
  padding: 5px;
  background: -moz-linear-gradient(left center, rgb(0,0,0), rgb(79,79,79), rgb(21,21,21));
  background: -webkit-gradient(linear, left top, right top,
   color-stop(0, rgb(0,0,0)),
   color-stop(0.50, rgb(79,79,79)),
   color-stop(1, rgb(21,21,21)));
  background: -webkit-linear-gradient(left center, rgb(0,0,0), rgb(79,79,79), rgb(21,21,21));
  background: -ms-linear-gradient(left center, rgb(0,0,0), rgb(79,79,79), rgb(21,21,21));
  border-bottom: 1px solid #ddd;
  -webkit-border-top-left-radius: 10px;
  -moz-border-radius-topleft: 10px;
  -ms-border-radius-topleft: 10px;
  border-top-left-radius: 10px;
  -webkit-border-top-right-radius: 10px;
  -ms-border-top-right-radius: 10px;
  -moz-border-radius-topright: 10px;
  border-top-right-radius: 10px;
}

</style>

<?php include_once "upload_imagem_conteudojs.php"; ?>

<script>


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
       /* alert(xhr.status); */
     }
   };
   xhr.send(encodeURI('id_modulo=' + id_modulo + "&modulo=" + modulo));
 }

 function getElem(id, ordem) {

  xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php echo myUrl('tao/ordenar_destaques_fixo/') ?>');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  xhr.onload = function() {
    if (xhr.status === 200) {
      msg_cnt.style.display="flex";
      msg_info.innerHTML =  xhr.responseText;
    }
    else if (xhr.status !== 200) {
     /* alert(xhr.status); */
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


function getIds() {
  var divs = document.querySelectorAll("#cnt-menu > div");
  for(var i=0; i < divs.length; i++) {
    var ids = divs[i].querySelector("div");
    var id = ids.getAttribute('id');
    getElem(id, i);
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
  classe.value = this.innerText;
  lista_classes.style.display = "none"; 
}); 

}


</script>

</body>
</html>

