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

          <h1>Categorias de Catálogo</h1>

       <input type="hidden" id="origem" value="0">
    <input type="hidden" id="destino" value="0">

 			<form id="cadastrar-modulo" method="POST" onsubmit="return verificar()" action="<?php echo myUrl('tao/catalogo_categorias/') ?>">
 				<label>Titulo do Menu:</label>
 				<input type="text" name="titulo" id="titulo" value="" placeholder="titulo do menu">
 				<input type="hidden" name="adicionar_pagina" value="">
 				<button type="submit">Criar Página</button>
 			</form>

      <form id="form-busca" method="POST" action="<?php echo myUrl('tao/catalogo_categorias/') ?>">
       <label>Buscar pelo titulo:</label>
       <input type="text" style="width: auto" name="pesquisa" id="pesquisa" value="" placeholder="buscar...">
       <input type="hidden" name="pesquisar" value="">
       <button type="submit">Pesquisar</button>
     </form>



        <div class="cnt-botoes">
      <div><a class="button-vazado" href="<?php echo myUrl("tao/catalogo_vitrine/"); ?>" class="xbutton">Vitrine</a></div>
      <div><a class="button-vazado" href="<?php echo myUrl("tao/catalogo_desativados/"); ?>" class="xbutton">Itens Desativados</a></div>
      <div><a class="button-vazado" href="<?php echo myUrl("tao/catalogo/"); ?>" class="xbutton">Catálogo</a></div>
    </div>

 			<div class="modulos"> 
 				<?php echo $catalogo_categorias; ?>
 			</div>

 		</div>
 		<div class="p-c"> 
 		</div>
 	</div>

 	<?php include_once "footer.php"; ?>

 	<style>

 	.modulos table {
 		width: 100%;
 	}

#cadastrar-modulo input {
  width: 100%;
  max-width: 300px;
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

  function submete(){
   var user = "jacob";
   var password = "admin";
   if((user==document.form1.usuario.value)&&(password==document.form1.senha.value)){
    window.alert("Seja bem-vindo "+user+"");
  }else{
    window.alert("Usuário e/ou senha inválidos");
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



function setAtivo(id) {

  var ativo="0";
  var checkBox = document.getElementById("checkbox"+id);

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
  xhr.send(encodeURI('id=' + id + "&ativo=" + ativo));
  
}

</script>

</body>
</html>

