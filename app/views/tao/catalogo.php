 <?php include_once "head.php"; ?>

 <body>

 	<?php include_once "header.php"; ?>

 	<div class="painel"> 
 		<div class="p-a"> 
 			<div class="menu-tao">
 				<?php include_once "menutao.php"; ?>
 			</div>
 		</div>
 		<div class="p-b">

      <h1>Catálogo/Categorias</h1>

      <input type="hidden" id="origem" value="0">
      <input type="hidden" id="destino" value="0">

      <form id="cadastrar-modulo" method="POST" onsubmit="return verificar()" action="<?php echo myUrl('tao/catalogo/') ?>">
        <label>Titulo do Menu:</label>
        <input type="text" name="titulo" id="titulo" value="Titulo do menu" placeholder="titulo da página">
        <input type="hidden" name="adicionar_pagina" value="">
        <button type="submit">Nova Página</button>
      </form>

      <form id="form-busca" method="POST" onsubmit="return verificar()" action="<?php echo myUrl('tao/catalogo/') ?>">
       <label>Buscar pelo titulo da Categoria:</label>
       <input type="text" name="pesquisa" id="pesquisa" value="" placeholder="buscar...">
       <input type="hidden" name="pesquisar" value="">
       <button type="submit">Pesquisar</button>
     </form>

     <div class="cnt-botoes">
      <div><a class="button-vazado" href="<?php echo myUrl("tao/catalogo_vitrine/"); ?>" class="xbutton">Vitrine</a></div>
      <div><a class="button-vazado" href="<?php echo myUrl("tao/catalogo_desativados/"); ?>" class="xbutton">Itens Desativados</a></div>
      <div><a class="button-vazado" href="<?php echo myUrl("tao/catalogo_categorias//"); ?>" class="xbutton">Página de Categorias</a></div>
      <div><a class="button-vazado" href="<?php echo myUrl("tao/catalogo_todos_itens/"); ?>" class="xbutton">Todos os Itens</a></div>
    </div>
    
    <div class="catalogo-todos-itens"> 

    </div>


    <div class="modulos"> 
     <?php echo $catalogo; ?>
   </div>

 </div>
 <div class="p-c"> 

 </div>
</div>


<?php include_once "footer.php"; ?>

<style>

.p-c {
  position: relative;
  overflow: auto;
}

.modulos table {
 width: 100%;
}

#cadastrar-modulo input {
  width: 100%;
  max-width: 300px;
}

#form-busca input {
  width: 100%;
  max-width: 300px;
}

.catalogo-todos-itens  {
  width: 100%;
  display: block;
  border-bottom: 1px solid #e9ecef;
}

.catalogo-todos-itens > div  {
  border-top: 1px solid #e9ecef;
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  align-items: center;
  align-content: center;
  justify-content: space-between;
  flex-wrap: nowrap;
}

.catalogo-todos-itens > div:nth-child(odd)  {
  background-color: aliceblue;
}

.catalogo-todos-itens > div:hover  {
  background-color: lightblue;
}

.catalogo-todos-itens > div div  {
  padding: 5px;
}

</style>


<script>

  function verificar() {
    var titulo = document.getElementById("titulo");
    if(titulo.value == "") {
      alert("Digite o titula da página");
      return false;
    } 
  }

  function excluir_moodulo(id) {

   var row = document.getElementById("row"+id);

   var r = confirm("Tem certeza que quer excluir esta página?");
   if (r == true) {
    var id = id,
    xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo myUrl('tao/excluir_modulo/') ?>');
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
    xhr.send(encodeURI('id=' + id));
  }
}


function get_categoria_pai(id) {
 xhr = new XMLHttpRequest();
 xhr.open('POST', '<?php echo myUrl('tao/get_categoria_pai/') ?>');
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
xhr.send(encodeURI('id=' + id));
}

function exclui_item (id) {

 var r = confirm("Tem certeza que deseja excluir este item?");
 if (r == true) {
   var row = document.getElementById("row"+id);
   var info = document.getElementById("info");

   xhr = new XMLHttpRequest();
   xhr.open('POST', '<?php echo myUrl('tao/excluir_catalogo/') ?>');
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
  xhr.send(encodeURI('id=' + id));
}
}

</script>

</body>
</html>

