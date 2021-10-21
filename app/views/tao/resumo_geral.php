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

 			<h1>Resumo Geral</h1>

 			<h2>Padrão</h2>
 			<div class="cnt-resumo">
 				<?php echo $config; ?>
 				<h2>Módulos</h2>
 				<?php echo $modulos; ?>
 				<h2>Registros</h2>
 				<?php echo $resgistros; ?>
 				<h2>Paginação</h2>
 				<?php echo $paginacaoos; ?>
 			</div>

 		</div>

 		<div class="p-c"> 
 			
 		</div>
 	</div>

 	<?php include_once "footer.php"; ?>

 	<style>

 	.cnt-resumo td {
 		text-align: left;
 	}


 </style>

 </body>

 </html>

