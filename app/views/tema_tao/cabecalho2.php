 <?php
 if(isset($_SESSION["credencial"])) {
 	if($_SESSION["credencial"] == "0" || $_SESSION["credencial"] == "1") {
 		echo "<a href='". myUrl("tao/editar_cabecalho/") ."' class='editar'>Editar</a>";
 	}
 }

 $telefones = str_replace("<p>", "<p><span itemprop='telephone'>", $destaques_fixos["telefones"]);
 $telefones = str_replace("</p>", "</span></p>", $telefones);

 ?>

 <div id="icones-topo">
 	<div id="i-m-cat" onclick="abre_m_cat()"></div>
 </div>

 <header>

 	<ul id="gravata-topo">
 		<li class="f-busca">
 			<form id='form-busca' action="<?php echo myUrl('pesquisa/index/1/1') ?>" method='post' onsubmit="return toSubmit();" >
 				<label class="busca-texto">
 					<input type="text" name="busca" id="palavra_a_buscar" placeholder="Buscar:">
 				</label>
 				<button type="submit">Ok</button>
 			</form>
 		</li>
 		<li class="i-loja">
 			<?php echo "<a href='" . myUrl('tao') . "' class='conta'>Minha Conta</a>" ?>
 			<?php echo "<a href='" . myUrl('pedidos/carrinho') . "' class='carrinho'>Carrinho</a>" ?>
 		</li>
 		<li class="htel" itemscope itemtype="http://schema.org/EducationalOrganization">
 			<?php echo $telefones; ?> 			
 		</li>
 		<li class="hsociais">
 			<?php echo $destaques_fixos["redesSociais"] ?>
 		</li>
 	</ul>

 	<div id="xtopo" class="row">
 		<div class="two columns">
 			<a id="logo" href="/" title="<?php echo $GLOBALS['sitename'] ?>"><img id="logo" src="<?php echo myUrl("./imagens/logo.png")?>" alt="<?php echo $GLOBALS['sitename'] ?>" width="300" height="100" title="<?php echo $GLOBALS['sitename'] ?>"></a>
 		</div>
 		<div class="ten columns">
 			<nav id="nav-cat"><?php echo $menu_geral; ?></nav>
 			<div class="descricao">
 				<?php echo $destaques_fixos["descricao"]; ?>
 			</div>
 		</div>
 		
 	</div>


 	<div>


 	</div>


 </header>

 <style>

 	#icones-topo {
 		display: block;
 		height: 50px;
 		position: absolute;
 		top: 16px;
 		left: 10px;
 	}

 	#nav-inst {
 		line-height: 0;
 		text-align: center;
 		display: none;
 		position: absolute;
 		top: 50px;
 	}
 	#m-inst {
 		display: inline-block;
 	}

 	#nav-cat {
 		line-height: 0;
 		text-align: center;
 		position: absolute;
 		top: 57px;
 		left: -2000px;
 		width: 100%;
 		z-index: 999;
 		transition: left 0.5s ease;
 	}

 	
 	#m-cat {
 		display: inline-block;
 	}

 	#i-m-inst {
 		position: relative;
 		width: 30px;
 		height: 30px;
 		display: inline-block;
 		overflow: hidden;
 		cursor: pointer;
 	}

 	#i-m-inst:before {
 		content: "";
 		position: absolute;
 		border-top: 3px solid #264653;
 		border-bottom: 3px solid #264653;
 		padding: 5px 15px;
 		top: 0;
 		display: block;
 	}
 	#i-m-inst:after {
 		content: "";
 		position: absolute;
 		border-top: 3px solid #264653;
 		padding: 5px 15px;
 		top: 25px;
 		display: block;
 	}
 	#i-m-cat {
 		cursor: pointer;
 	}

 	#i-m-cat:before {
 		content: "";
 		position: absolute;
 		border-top: 3px solid black;
 		border-bottom: 3px solid black;
 		padding: 3px 15px;
 		top: 2px;
 		display: block;
 	}
 	#i-m-cat:after{
 		content: "";
 		position: absolute;
 		border-top: 3px solid black;
 		padding: 5px 15px;
 		top: 20px;
 		display: block;
 	}
 	#i-busca {
 		position: relative;
 		width: 30px;
 		height: 30px;
 		display: inline-block;
 		overflow: hidden;
 		cursor: pointer;
 	}

 	#i-busca:before {
 		content: "";
 		position: absolute;
 		left: 0;
 		top: 0;
 		padding: 10px;
 		background-size: cover;
 		background-position: center;
 		background-repeat: no-repeat;
 		background-size: 100%;
 		background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' version='1.1' width='512' height='512' x='0' y='0' viewBox='0 0 310.42 310.42' style='enable-background:new 0 0 512 512' xml:space='preserve' class=''%3E%3Cg%3E%3Cg xmlns='http://www.w3.org/2000/svg'%3E%3Cg%3E%3Cpath d='M273.587,214.965c49.11-49.111,49.109-129.021,0-178.132c-49.111-49.111-129.02-49.111-178.13,0 C53.793,78.497,47.483,140.462,76.51,188.85c0,0,2.085,3.498-0.731,6.312c-16.065,16.064-64.263,64.263-64.263,64.263 c-12.791,12.79-15.836,30.675-4.493,42.02l1.953,1.951c11.343,11.345,29.229,8.301,42.019-4.49c0,0,48.096-48.097,64.128-64.128 c2.951-2.951,6.448-0.866,6.448-0.866C169.958,262.938,231.923,256.629,273.587,214.965z M118.711,191.71 c-36.288-36.288-36.287-95.332,0.001-131.62c36.288-36.287,95.332-36.288,131.619,0c36.288,36.287,36.288,95.332,0,131.62 C214.043,227.996,155,227.996,118.711,191.71z' fill='%23FA991C' data-original='%23000000' style='' class=''/%3E%3Cg%3E%3Cpath d='M126.75,118.424c-1.689,0-3.406-0.332-5.061-1.031c-6.611-2.798-9.704-10.426-6.906-17.038 c17.586-41.559,65.703-61.062,107.261-43.476c6.611,2.798,9.704,10.426,6.906,17.038c-2.799,6.612-10.425,9.703-17.039,6.906 c-28.354-11.998-61.186,1.309-73.183,29.663C136.629,115.445,131.815,118.424,126.75,118.424z' fill='%23ffffff' data-original='%23000000' style='' class=''/%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E"); 
 	}
 	#topo {
 		display: -webkit-box;
 		display: -moz-box;
 		display: -ms-flexbox;
 		display: -webkit-flex;
 		display: flex;  
 		align-items: flex-start;
 		align-content: center;
 		justify-content: space-between;
 		flex-wrap: wrap;
 	}

 	#topo .a {
 		padding: 0;
 		width: 100%;
 		text-align: center;
 	}

 	#topo .b {
 		padding: 0;
 		width: 100%;
 		text-align: center;
 	}

 	#logo img {
 		max-width: 100%;
 		height: auto;
 		display: block;
 		margin: 0 auto;
 		padding: 0 15px 0 15px;
 	}

 	#gravata-topo {
 		display: -webkit-box;
 		display: -moz-box;
 		display: -ms-flexbox;
 		display: -webkit-flex;
 		display: flex;  
 		align-items: center;
 		align-content: center;
 		justify-content: center;
 		flex-wrap: wrap;
 		list-style: none;
 		padding: 0;
 		margin: 0;
 		list-style: none;
 	}

 	#gravata-topo  li {
 		padding: 10px;
 		text-align: left;
 		margin: 0;
 		border-top: 1px solid white;
 		width: 100%;
 	}

 	#form-busca {
 		display: -webkit-box;
 		display: -moz-box;
 		display: -ms-flexbox;
 		display: -webkit-flex;
 		display: flex;  
 		align-content: center;
 		align-items: center;
 		justify-content: flex-end;
 		flex-wrap: wrap;
 		margin: auto;
 		margin-left: 50px;
 	}

 	#form-busca .busca-texto {
 		text-align: left;
 		margin: 0;
 	}
 	#form-busca input {
 		text-align: left;
 		border: 0;
 		width: 100%;
 		margin: 0;
 		height: 30px;
 		border: 1px solid silver;
 	}

 	#form-busca button {
 		text-align: center;
 		width: 35px;
 		height: 35px;
 		display: block;
 		position: relative;
 		font-size: 0;
 		margin: 0;
 		padding: 0;
 		border: 0;
 	}

 	#form-busca button:before {
 		content: "";
 		display: block;
 		position: absolute;
 		left: 11px;
 		top: 8px;
 		padding: 10px;
 		background-size: 100%;
 		background-position: center;
 		background-repeat: no-repeat;
 		background-size: 100%;
 		background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' version='1.1' width='512' height='512' x='0' y='0' viewBox='0 0 310.42 310.42' style='enable-background:new 0 0 512 512' xml:space='preserve' class=''%3E%3Cg%3E%3Cg xmlns='http://www.w3.org/2000/svg'%3E%3Cg%3E%3Cpath d='M273.587,214.965c49.11-49.111,49.109-129.021,0-178.132c-49.111-49.111-129.02-49.111-178.13,0 C53.793,78.497,47.483,140.462,76.51,188.85c0,0,2.085,3.498-0.731,6.312c-16.065,16.064-64.263,64.263-64.263,64.263 c-12.791,12.79-15.836,30.675-4.493,42.02l1.953,1.951c11.343,11.345,29.229,8.301,42.019-4.49c0,0,48.096-48.097,64.128-64.128 c2.951-2.951,6.448-0.866,6.448-0.866C169.958,262.938,231.923,256.629,273.587,214.965z M118.711,191.71 c-36.288-36.288-36.287-95.332,0.001-131.62c36.288-36.287,95.332-36.288,131.619,0c36.288,36.287,36.288,95.332,0,131.62 C214.043,227.996,155,227.996,118.711,191.71z' fill='$23333333' data-original='%23000000' style='' class=''/%3E%3Cg%3E%3Cpath d='M126.75,118.424c-1.689,0-3.406-0.332-5.061-1.031c-6.611-2.798-9.704-10.426-6.906-17.038 c17.586-41.559,65.703-61.062,107.261-43.476c6.611,2.798,9.704,10.426,6.906,17.038c-2.799,6.612-10.425,9.703-17.039,6.906 c-28.354-11.998-61.186,1.309-73.183,29.663C136.629,115.445,131.815,118.424,126.75,118.424z' fill='%23ffffff' data-original='%23000000' style='' class=''/%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E"); 
 	}

 	.htel {
 		display: none;
 	}

 	.hsociais {
 		display: none;
 	}

 	.conta, .carrinho {
 		padding: 5px 10px 5px 25px;
 		display: inline-block;
 		position: relative;
 		color: #333;
 		text-decoration: none;
 		width: auto;
 		text-align: center;
 	}

 	.conta:before {
 		content: "";
 		position: absolute;
 		left: 0;
 		top: 5px;
 		padding: 10px;
 		background-size: 100%;
 		background-position: center;
 		background-repeat: no-repeat;
 		background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' version='1.1' width='512' height='512' x='0' y='0' viewBox='0 0 512 512' style='enable-background:new 0 0 512 512' xml:space='preserve' class=''%3E%3Cg%3E%3Cg xmlns='http://www.w3.org/2000/svg'%3E%3Cg%3E%3Cpath d='M437.02,330.98c-27.883-27.882-61.071-48.523-97.281-61.018C378.521,243.251,404,198.548,404,148 C404,66.393,337.607,0,256,0S108,66.393,108,148c0,50.548,25.479,95.251,64.262,121.962 c-36.21,12.495-69.398,33.136-97.281,61.018C26.629,379.333,0,443.62,0,512h40c0-119.103,96.897-216,216-216s216,96.897,216,216 h40C512,443.62,485.371,379.333,437.02,330.98z M256,256c-59.551,0-108-48.448-108-108S196.449,40,256,40 c59.551,0,108,48.448,108,108S315.551,256,256,256z' fill='black' data-original='%23000000' style=''/%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E%0A"); 	
 	}

 	.carrinho:before {
 		content: "";
 		position: absolute;
 		left: 0;
 		top: 5px;
 		padding: 10px;
 		background-size: 100%;
 		background-position: center;
 		background-repeat: no-repeat;
 		background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' version='1.1' width='512' height='512' x='0' y='0' viewBox='0 0 435.104 435.104' style='enable-background:new 0 0 512 512' xml:space='preserve'%3E%3Cg%3E%3Cg xmlns='http://www.w3.org/2000/svg'%3E%3Cg%3E%3Cg%3E%3Ccircle cx='154.112' cy='377.684' r='52.736' fill='black' data-original='%23000000' style=''/%3E%3Cpath d='M323.072,324.436L323.072,324.436c-29.267-2.88-55.327,18.51-58.207,47.777c-2.88,29.267,18.51,55.327,47.777,58.207 c3.468,0.341,6.962,0.341,10.43,0c29.267-2.88,50.657-28.94,47.777-58.207C368.361,346.928,348.356,326.924,323.072,324.436z' fill='black' data-original='%23000000' style=''/%3E%3Cpath d='M431.616,123.732c-2.62-3.923-7.059-6.239-11.776-6.144h-58.368v-1.024C361.476,54.637,311.278,4.432,249.351,4.428 C187.425,4.424,137.22,54.622,137.216,116.549c0,0.005,0,0.01,0,0.015v1.024h-43.52L78.848,50.004 C77.199,43.129,71.07,38.268,64,38.228H0v30.72h51.712l47.616,218.624c1.257,7.188,7.552,12.397,14.848,12.288h267.776 c7.07-0.041,13.198-4.901,14.848-11.776l37.888-151.552C435.799,132.019,434.654,127.248,431.616,123.732z M249.344,197.972 c-44.96,0-81.408-36.448-81.408-81.408s36.448-81.408,81.408-81.408s81.408,36.448,81.408,81.408 C330.473,161.408,294.188,197.692,249.344,197.972z' fill='black' data-original='%23000000' style=''/%3E%3Cpath d='M237.056,118.1l-28.16-28.672l-22.016,21.504l38.912,39.424c2.836,2.894,6.7,4.55,10.752,4.608 c3.999,0.196,7.897-1.289,10.752-4.096l64.512-60.928l-20.992-22.528L237.056,118.1z' fill='black' data-original='%23000000' style=''/%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E%0A"); 
 	}

 	.i-loja {
 		text-align: center!important;
 	}

 	.descricao{
 		text-align: center;
 		text-transform: uppercase;
 	}

 	@media (min-width: 768px) {


 	.descricao{
 		text-align: left;
 	}


 		#icones-topo {
 			display: none;
 		}
 		#i-m-inst {
 			width: 30px;
 			display: inline-block;
 		}
 		#nav-cat {
 			line-height: 0;
 			text-align: right;
 			display: inline-block;
 			position: static;
 			background: #264653;
 		}
 		#topo .a {
 			width: 20%;
 		}
 		#topo .b {
 			width: 80%;
 			text-align: left;
 		}

 		.htel, .hsociais {
 			display: inline-block;
 			width: auto;
 		}

 		#gravata-topo {
 			justify-content: flex-end;
 		}

 		 	#gravata-topo  li {
 		width: auto;
 		border: 0;
 	}

 	}

 </style>

 <script>

 	function toSubmit(){
 		var s = document.querySelector("#palavra_a_buscar").value;
 		if(s == "") {
 			alert('Digite uma palavra!');
 			return false;
 		}
 	}

 	function abre_m_inst() {
 		var e = document.querySelector("#nav-inst");
 		if(e.style.display == "" || e.style.display=="none"){
 			e.style.display="block";
 		} else {
 			e.style.display="none";
 		}
 	}

 	function abre_m_cat() {
 		var e = document.querySelector("#nav-cat");

 		if(e.style.left == "-2000px" || e.style.left == "") {
 			e.style.left = "0";
 		} else {
 			e.style.left = "-2000px";
 		}
 	}

 	function abre_busca() {
 		var e = document.querySelector("#form-busca");
 		if(e.style.display == "" || e.style.display=="none"){
 			e.style.display="block";
 		} else {
 			e.style.display="none";
 		}
 	}
 	function fecha_busca() {
 		var e = document.querySelector("#form-busca");
 		if(e.style.display == "" || e.style.display=="none"){
 			e.style.display="block";
 		} else {
 			e.style.display="none";
 		}
 	}


 </script>
