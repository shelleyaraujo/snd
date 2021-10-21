<?php include_once "head.php"; ?>

<body>

 <?php include_once "header.php"; ?>

 <div class="painel">

   <div class="p-a">
    <?php include_once "menutao.php"; ?>
  </div>

  <div class="p-b">
    <h1>Ordenar Itens do Menu</h1>
       <?php echo $menu_titulo ?>

    <div class="cnt-botoes">
      <a class="button-vazado" href="?modulo=">Menu Padrão</a>
      <a class="button-vazado" href="?modulo=Catalogo">Menu de Catálogo</a>
       <a class="button-vazado" href="<?php echo myUrl('tao/menu_mudar_categoria/') ?> ">Alterar Categorias</a>
    </div>


    <?php echo $menu ?>
    <button onclick="getIds()">Aplicar Alterações</button>

  </div>

  <div class="p-c">

  </div>
</div>

<?php include_once "footer.php"; ?>

<style>

.cnt-link-ordenar-menu  {
  margin-bottom: 20px;
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
  border: 1px solid #cae1ff;
  background-color: aliceblue;
}

.cnt-menu > div a {
  position: relative;
  padding: 5px;
  text-decoration: none;
}


.cnt-menu > div:active {
  background-color: lightblue;
}

.cnt-menu > div:after {
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


</style>



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
  width: 500px;
}

#cnt-menu .column > div  {
   display: flex;
  align-items: center;
  align-content: center;
  justify-content: space-between;
  flex-wrap: wrap;
}

#cnt-menu div:hover  {
  background-color: lightblue;
}


#cnt-menu .column > div p  {
  width: 80%;
  margin: 0;
}
#cnt-menu .column > div a  {
  width: 20%;
  text-align: left;
}
.column {
  height: auto;
  width: 500px;
  max-width: 500px;
  border: 1px solid #cae1ff;
  background-color: aliceblue;
  cursor: move;
  margin-bottom: 5px;
  text-align: left;
  padding: 2px 10px;
}

.column a {
  text-decoration: none;
  float: right;
  color: red;
  text-align: center;
  padding: 3px 10px;
  position: relative;
  padding-left: 20px;
  text-align: left;
}
.column a:after {
  content: " filhos";
  color: green;
}

.column a:before {
  content: "";
  padding: 0;
  width: 5px;
  height: 5px;
  font-size: 0;
  line-height: 0;
  top: 8px;
  left: 0;
  position: absolute;
  border: 2px solid #1C9D58;
  border-top: 2px solid transparent;
  border-left: 2px solid transparent;
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=45);
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
  xhr.open('POST', '<?php echo myUrl('tao/ordenar_menu/') ?>');
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

</script>

</body>
</html>

