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

 			<form id="form-cabecalho" method="POST" onsubmit="return verificar()"  action="<?php echo myUrl('tao/containers_flex/?idcontainer=' . $idcontainer) ?>">
 				<label>Titulo do Container:</label>
 				<input type="text" name="titulo" id="titulo" value="" placeholder="Tiruo do Container">
 				<input type="hidden" name="add_container" value="add_container">
 				<button type="submit">Adicionar Container</button>
 			</form> 


 			<?php echo $containers_flex; ?>
 		</div>
 		<div class="p-c"> 
 			x
 		</div>
 	</div>

 	<?php include_once "footer.php"; ?>




<script>

    function verificar() {
    var titulo = document.getElementById("titulo");
    if(titulo.value == "") {
      alert("Digite o titula da página");
      return false;
    } 
  }

function excluir_container(id) {

	var row = document.getElementById("row"+id);

  var r = confirm("Tem certeza que quer excluir este container?");
  if (r == true) {
    var id = id,
    xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo myUrl('tao/excluir_container/') ?>');
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

