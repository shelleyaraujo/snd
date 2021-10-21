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
			<h1>Configurações</h1>

			<form id="form-config" method="POST" action="<?php echo myUrl('tao/config/') ?>">
			
				<?php echo $config_geral; ?>
				<?php echo $config_paginacao; ?>
				<?php echo $config_catalogo; ?>
				
				<input type="hidden" name="update_config">
			
				<div id="botao">
					<button type='submit' id='adicionar' name='adicionar' class='button'>Aplicar Alterações</button>
				</div>

			</form>  

		</div>
		<div class="p-c"> 

		</div>
	</div>

	<?php include_once "footer.php"; ?>

	<style>

	#form-config input[type=checkbox] {
		width: 32px;
		display: inline-block;
	}
	#form-config input[type=checkbox] + p {
		width: 95%;
		display: inline-block;
	}
	#form-config input[type=checkbox]:before {
		left: 8px;
	}


	#cat_botao_comprar {
		width: 100%;
		max-width: 200px;
	}

	#botao {
		width: 100%;
		display: block;
		margin-top: 20px;
	}

	#form-config table {
		width: auto;
	}

	#form-config td {
		text-align: left;
	}

</style>

</body>

</html>

