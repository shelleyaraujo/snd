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

      <h1>Imóveis Comprar</h1>

      <form id="cadastrar-modulo" method="POST" onsubmit="return verificar()" action="<?php echo myUrl('tao/imoveis_comprar/') ?>">
        <label>Titulo do Menu:</label>
        <input type="text" name="titulo" id="titulo" value="Titulo do menu" placeholder="titulo da página">
        <input type="hidden" name="adicionar_pagina" value="">
        <button type="submit">Criar Página</button>
      </form>

      <div class="modulos"> 
       <div class="cnt-botoes">
        <a class="button-vazado" href="<?php echo myUrl("tao/imoveis_alugar/"); ?>">Imóveis para Alugar</a>
        <a class="button-vazado" href="<?php echo myUrl("tao/imoveis_vitrine/"); ?>">Imóveis em Destaque</a>
        <a class="button-vazado" href="<?php echo myUrl("tao/imoveis_desativados/"); ?>"">Imóveis Desativados</a>
      </div>
      
      <div>
       <?php echo $catalogo; ?>
     </div>
   </div>

 </div>
 <div class="p-c"> 
       <?php echo $catalogo; ?>

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

#form-busca input {
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

