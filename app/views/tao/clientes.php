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

			<h1>Clientes</h1> 


			<div class="cnt-clientes">
				<form>
					<input type="text" name="buscar" placeholder="Buscar por email">
					<input type="hidden" name="tipo" value="email" placeholder="Buscar por email">
					<button>Buscar por Email</button>
				</form>
				<form>
					<input type="text" name="buscar" placeholder="Buscar por nome">
					<input type="hidden" name="tipo" value="nome" placeholder="Buscar por email">
					<button>Buscar por Email</button>
				</form>


			</div>

			<div class="cnt-clientes">
				<?php echo $clientes; ?>
			</div>

		</div>

		<div class="p-c"> 
			<h3>Novo Cliente</h3>
			<form id="form-cabecalho" method="POST" action="<?php echo myUrl('tao/clientes/') ?>">
				<label>Nome:</label>
				<input type="text" name="nome" maxlength="100">
				<input type="hidden" value="1">
				<br><br>
				<button type="submit">Salvar</button>
			</form> 
		</div>
	</div>

	<style>

.cnt-clientes td {
text-align: left;
}

.cnt-clientes td:first-child {
text-align: center;
}
.cnt-clientes td:last-child {
text-align: center;
}
</style>

	<?php include_once "footer.php"; ?>

	<script>

		function set_credencial(id) {

			var credencial = document.getElementById("credencial"+id).value;

			xhr = new XMLHttpRequest();
			xhr.open('POST', '<?php echo myUrl('tao/set_credencial/') ?>');
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhr.onload = function() {
				if (xhr.status === 200) {
					info.style.display="block";
					info.innerHTML =  xhr.responseText;
				}
				else if (xhr.status !== 200) {
					alert(xhr.status);
				}
			};
			xhr.send(encodeURI('id=' + id + "&credencial=" + credencial));

		}


		function excluir_cliente(id) {

			var row = document.getElementById("row"+id);

			var r = confirm("Tem certeza que quer excluir este cliente?");
			if (r == true) {
				var id = id,
				xhr = new XMLHttpRequest();
				xhr.open('POST', '<?php echo myUrl('tao/excluir_cliente/') ?>');
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

