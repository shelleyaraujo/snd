<?php include_once "_compress_code.php"; ?>
<?php include_once "head.php"; ?>

<body>

	<a class="skip-link xxx" href="#maincontent">Skip to main</a>

	<?php include_once "cabecalho.php"; ?>
	<?php include_once "slider.php"; ?>

	<main id="maincontent">

		<div class="container">
			<h1><?php echo $titulotextomodulo; ?></h1>
		</div>

		<div class="container">
			<?php echo $textomodulo; ?>
		</div>

	</main>

	<div class="container">
		<?php echo $vitrine; ?>
	</div>

	<div class="xcontainer">
		<?php echo $destaques; ?>
	</div>


	<div class="container">
		<?php echo $posts_home; ?>
	</div>

	<?php include_once "sliders_logos.php"; ?>
	<?php include_once "rodape.php"; ?>


	<style>

	.posts-recents {
		margin-top: 50px;
		border-top: 1px solid silver;
		padding: 20px 0;
	}

	.conteudo-vitrine:empty {
		display: none;
	}

	.conteudo-vitrine {
		position: relative;
		padding-top: 40px;
	}

	.conteudo-vitrine:before {
		content: "Posts em Destaque";
		font-size: 1.2em;
		line-height: 1.2em;
		position: absolute;
		top: 0;
		background: #264653;
		color: white;
		text-transform: uppercase;
		padding: 5px 15px;
	}

	.conteudo-vitrine {
		display: flex;
		max-width: 1200px;
		margin: auto;
		flex-wrap: wrap;
		margin-bottom: 20px;
		border: 1px solid #ebebeb;
	}

	.conteudo-vitrine div {
		flex: 1 1 350px;
		margin: 10px;
		padding: 0;
	}

	.conteudo-vitrine > div {
		border-bottom:  1px solid #ebebeb;
	}

	.cnt-catalogo {

		margin: 0 auto;
		display: -webkit-box;
		display: -moz-box;
		display: -ms-flexbox;
		display: -webkit-flex;
		display: flex;  
		align-items: stretch;
		align-content: center;
		justify-content: center;
		flex-wrap: wrap;
		width: 100%;
		max-width: 1200px;
	}
	.cnt-catalogo > div{
		width: 50%;
		width: calc(50% - 30px);
		overflow: hidden;
		margin: 0 15px;
		margin-bottom: 30px;
		padding: 0;
	}

	.cnt-catalogo img{
		width: 100%;
		max-width: 400px;
		height: auto;
		border: 1px solid silver;
	}

	.cnt-catalogo a{
		text-decoration: none;
		color: black;
	}

	.detalhes-de {
		text-decoration: line-through;
		margin-bottom: 0;
		font-size: 1em;
		line-height: 1em;
		margin-top: 20px;
		color: #555;
	}

	.detalhes-por {
		font-size: 1.4em;
		font-weight: bold;
	}

	.cnt-catalogo p{
		margin-bottom: 5px;
	}

	.cnt-catalogo h2 {
		margin-bottom: 20px;
		font-size: 1.4em;
		font-weight: bold;
		margin-top: 20px;
	}


	@media (min-width: 768px) {

		.cnt-catalogo > div{
			width: 25%;
			width: calc(25% - 30px);
		}

	}

</style>

<script>


/*popup botao fechar*/

if(document.querySelectorAll(".popup") != null) {
  var popup = document.querySelectorAll(".popup > div")[0];
  popup.innerHTML += "<a class='fechar-popup' onclick=fechar_popup()>x</a>"
}
function fechar_popup() {
  var cntpopup = document.querySelectorAll(".popup")[0];
  cntpopup.style.display = "none";
}

</script>


</body>

</html>

<?php include_once "_final.php"; ?>
