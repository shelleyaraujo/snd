<?php include_once "head.php"; ?>

<body>

 <?php include_once "header.php"; ?>

 <div class="painel">

   <div class="p-a">
    <?php include_once "menutao.php"; ?>
  </div>

  <div class="p-b">

    <a href="<?php

    if(isset($_SESSION["voltar_editar_modulo"])) {
     echo $_SESSION["voltar_editar_modulo"];
   }
      ?>" class="voltar">Voltar</a>
  
    <h1>Posts</h1> 

    <label>Titulo do Post</label>
    <input type="text" id="titulo_Institucional" value="" placeholder="Titulo" style="width: 80%">
    <a href="javascript:void(0)" onclick="adicionar_item_modulo('<?php echo $_GET["idmodulo"]; ?>','<?php echo $_GET["modulo"]; ?>')" class='button'>Adicionar</a>

    <?php echo $itens ?>

    <button id="btn_ordem" onclick="getIds()">Salvar Ordenação</button>

  </div>

  <div class="p-c">
    <!--
   <div class="logotipo-topo">
    <label>Galerria de  Imagena</label>
    <div id="uploader">
      <p>&nbsp;Arraste a imagem <span style="color:red">.jpg</span> aqui</p>
      <div id="loader"></div>
    </div>
  -->
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

select {
  width: 100%;
  max-width: 100px;
}

</style>

</body>

<?php include_once "footer.php"; ?>

<style>

#uploader {
  position: relative;
}

#loader {
  position: absolute;
  display: none;
  border: 2px dashed mediumvioletred; 
  border-right: 2px dashed mediumvioletred; 
  border-top: 2px dashed mediumvioletred; 
  border-bottom: 2px dashed mediumvioletred; 
  border-radius: 100%;
  width: 30px;
  height: 30px;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

#uploader {
  width: 100%;
  height: 120px; 
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

#xcke_editor1  {
  height: 600px!important;  
}

.xcke_reset {
  height: 450px!important;  
}


fieldset {
  padding: 15px;
  border: 1px solid #5499C7;
  box-sizing: border-box;
  margin-bottom: 20px;
}

</style>

<?php include_once "upload_imagem_Institucionaljs.php"; ?>

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


function excluir_item(id) {

  var row = document.getElementById("row" + id);

  console.log(row);

  var r = confirm("Tem certeza que quer excluir este post?");

  if (r == true) {

    var imagem = imagem,
    xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo myUrl('tao/excluir_blog/') ?>');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
        row.style.display="none";
      }
      else if (xhr.status !== 200) {
        alert(xhr.status);
      }
    };
    xhr.send(encodeURI('id=' + id));
  }
}




function adicionar_item_modulo(id_modulo, modulo) {

 var titulo = document.getElementById("titulo_Institucional").value;

  xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php echo myUrl('tao/adicionar_item_modulo/') ?>');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      /*info.style.display="block";
      info.innerHTML = xhr.responseText;*/
    }
    else if (xhr.status !== 200) {
      alert(xhr.status);
    }
  };

  xhr.send(encodeURI('id_modulo=' + id_modulo + '&modulo=' + modulo + '&titulo=' + titulo));

  setTimeout(function(){  
    window.location.href =  "";  
  }, 300);
}

/* ORDENACAO DOS REGISTROS */

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

  var divs = document.querySelectorAll("#cnt-menu tr input");
  
  for(var i=0; i < divs.length; i++) {

    var id = divs[i].value;

    if(id > 0) {
      getElem(id, i);
    }
  }

}



function getElem(id, ordem) {

  xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php echo myUrl('tao/ordenar_itens_Institucional/') ?>');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  info.innerHTML =  "Salvando..."

  xhr.onload = function() {
    if (xhr.status === 200) {
      info.style.display="block";
      info.innerHTML =  xhr.responseText;
    }
    else if (xhr.status !== 200) {
     /* alert(xhr.status); */
   }
 };
 xhr.send(encodeURI('id=' + id + "&ordem=" + ordem));

}


var ordem_registros = document.querySelector("#ordem_registros");
var text = ordem_registros.options[ordem_registros.selectedIndex].text;
var btn_ordem = document.querySelector("#btn_ordem");
  btn_ordem.style.display = "none";

if(text == "ordem") {
  btn_ordem.style.display = "block";
}

</script>

</body>
</html>

