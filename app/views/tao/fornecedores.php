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

			<h1>Fornecedores</h1> 

			<div class="cnt-fornecedors">
				<?php echo $fornecedores; ?>
			</div>

		</div>

		<div class="p-c"> 
			<h3>Cadastrar Fornecedor</h3>
			<form id="form-cabecalho" method="POST" action="<?php echo myUrl('tao/fornecedores') ?>">
				<label>Nome:</label>
				<input type="text" name="nome" maxlength="15">
				<label>Email:</label>
				<input type="text" name="email" maxlength="50">
				<br><br>
				<button type="submit">Cadastrar</button>
			</form> 
		</div>
	</div>

	<style>

.cnt-fornecedors td {
text-align: left;
}

.cnt-fornecedors td:first-child {
text-align: center;
}
.cnt-fornecedors td:last-child {
text-align: center;
}
</style>

	<?php include_once "footer.php"; ?>

	<script>

		function excluir_fornecedor(id) {

			var row = document.getElementById("row"+id);

			var r = confirm("Tem certeza que quer excluir esta página?");
			if (r == true) {
				var id = id,
				xhr = new XMLHttpRequest();
				xhr.open('POST', '<?php echo myUrl('tao/excluir_fornecedor/') ?>');
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

