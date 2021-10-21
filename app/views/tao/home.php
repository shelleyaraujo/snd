 <?php include_once "head.php"; ?>

 <body>

 	<?php include_once "header.php"; ?>

 	<div class="painel"> 
 		<div class="p-a"> 
 			<div class="menu-tao">
 				<?php include_once "menutao.php"; ?>
 			</div>
 		</div>
 		<div class="p-b bg"> 

 			<div class="box-bem-vindo">
 			<p>TAO System</p>
 			<p>Sistema de Gerenciamento de Conteúdo</p>
 			
 			 	<?php echo $usuario; ?>
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


.bg  {
background-image: url('<?php echo myUrl("app/views/tao/imagens/site-tao.png")?>');
background-position: center;
background-repeat: no-repeat;
background-size: cover;
}

.painel .p-b{
	background-color: #F3F3F3;
}

.box-bem-vindo {
	width: 100%;
	max-width: 300px;
	background-color: #5499C7;
	background-color: #5499C7;
	padding: 20px;
	box-sizing: border-box;
	color: white;
}

 </style>

 </body>

 </html>

