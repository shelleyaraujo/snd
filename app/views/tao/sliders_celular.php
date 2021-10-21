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
      <h1>Banner Celular</h1>

      <form id="cadastrar-slider" method="POST" onsubmit="return verificar()" action="<?php echo myUrl('tao/sliders_celular/') ?>">
       <label>Titulo</label>
       <input type="text" name="titulo" id="titulo" value="" placeholder="titulo do slider">
       <input type="hidden" name="adicionar_slider" value="">
       <input type="hidden" name="tipo" value="1">
       <button type="submit">Criar Slider</button>
     </form>
     <div class="modulos cnt-sliders"> 
       <?php echo $sliders; ?>
     </div>
   </div>
   <div class="p-c"> 
    <p>
      É aconselhável não adicionar muitas sliders para não
      sobrecarregar a página e assim ser penalizada pelos buscadores.
      Pos a página precisar ser carregada o mais rápido possível.
    </p>
    <p>
      Aplicar apenas 3 no máximo.
    </p>
  </div>
</div>

<?php include_once "footer.php"; ?>

<style>

.modulos table {
 width: 100%;
}

#cadastrar-slider input {
  width: 100%;
  max-width: 300px;
}

.cnt-sliders img {
  width: 100%;
  max-width: 100%;
  height: auto;
}

</style>


<script>

  function verificar() {
    var titulo = document.getElementById("titulo");
    if(titulo.value == "") {
      alert("Digite o titulo do slider");
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

function excluir_slider(id) {

	var row = document.getElementById("row"+id);

  var r = confirm("Tem certeza que quer excluir este slider?");
  if (r == true) {
    var id = id,
    xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo myUrl('tao/excluir_slider/') ?>');
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

