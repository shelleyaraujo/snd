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
      <h1>Blocos de Destaques</h1>
      <form id="form-destaques" method="POST" onsubmit="return verificar()"  action="<?php echo myUrl('tao/containers_fixo/?idcontainer=' . $idcontainer) ?>">
       <label>Nome do Container:</label>
       <input type="text" name="titulo" id="titulo" value="" placeholder="Nome do Container">
       <input type="hidden" name="add_container" value="add_container">
       <input type="hidden" name="popup" value="<?php echo $popup ?>">
       <button type="submit">Criar Container</button>
     </form> 

     <?php echo $containers_fixo; ?>
   </div>
   <div class="p-c"> 
    x
  </div>
</div>

<?php include_once "footer.php"; ?>


<style>

#form-destaques input {
  width: 100%;
  max-width:500px;
}

</style>

<script>

  function verificar() {
    var titulo = document.getElementById("titulo");
    if(titulo.value == "") {
     msg_cnt.style.display="flex";
     msg_info.innerHTML =  "Digite um  nome para o container!";
     return false;
   } 
 }

 function excluir_container(id) {

   var row = document.getElementById("row"+id);

   var r = confirm("Tem certeza que quer excluir este container?");
   if (r == true) {
    var id = id,
    xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo myUrl('tao/excluir_container_fixo/') ?>');
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

</script>


</body>

</html>

