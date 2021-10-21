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
          <h1>Credenciais</h1>
 		
 			<div class="modulos"> 
 				<?php echo $credenciais; ?>
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

function updateCredencial(id) {

  var selectBox = document.getElementById("item"+id);
  var credencial = selectBox.options[selectBox.selectedIndex].value;

  xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php echo myUrl('tao/update_credencial/') ?>');
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
  xhr.send(encodeURI('id=' + id + "&credencial=" + credencial));
  
}


function update_credencial_ordem(id) {


  var selectBox = document.getElementById("itemCredencialOrdem"+id);
  var ordem = selectBox.options[selectBox.selectedIndex].value;

  xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php echo myUrl('tao/update_credencial_ordem/') ?>');
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
  xhr.send(encodeURI('id=' + id + "&ordem=" + ordem));
  
}

</script>

</body>
</html>


