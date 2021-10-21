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
 	<ul id="icones-loja">
 		<li class="minha-conta">
 			<?php echo "<a href='" . myUrl('tao') . "' >Minha Conta</a>" ?>
 		</li>
 		<li class="meu-carrinho">
 			<?php echo "<a href='" . myUrl('pedidos/add_item') . "' >Carrinho</a>" ?>
 		</li>
 	</ul>


 	<div id="topo">
 		<div class="a">
 			<a id="logo" href="/" title="<?php echo $GLOBALS['sitename'] ?>"><img id="logo" src="<?php echo myUrl("./imagens/logo.png")?>" alt="<?php echo $GLOBALS['sitename'] ?>" width="300" height="100" title="<?php echo $GLOBALS['sitename'] ?>"></a>
 		</div>
 		<div class="b">
 			<div class="descricao">
 				<?php echo $destaques_fixos["descricao"]; ?>
 			</div>
 		</div>
 		<div class="c" itemscope itemtype="http://schema.org/EducationalOrganization">
 			<!--<div id="i-m-inst" onclick="abre_m_inst()"></div>-->
 			<div class="htel">
 				<?php echo $telefones; ?>
 			</div>
 			<div class="hsociais">
 				<?php echo $destaques_fixos["redesSociais"] ?>
 			</div>
 			<!--<nav id="nav-inst"><?php echo $menu_institucional; ?></nav>-->
 			<div id="i-busca" onclick="abre_busca()"></div>
 		</div>
 	</div>

 	<form id='form-busca' action="<?php echo myUrl('pesquisa/index/1/1') ?>" method='post' onsubmit="return toSubmit();" >
 		<a href="javascript:void(0)" onclick="fecha_busca()"></a>
 		<label class="busca-texto">Procurar por:</label><input type="text" name="busca" id="palavra_a_buscar">
 		<input type="submit" class='button' value="Buscar">
 	</form>

 </header>

 <style>

 	#icones-topo {
 		display: block;
 		height: 50px;
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
 		display: none;
 		position: absolute;
 		top: 40px;
 		width: 100%;
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
 		border-top: 3px solid #264653;
 		border-bottom: 3px solid #264653;
 		padding: 5px 15px;
 		top: 0;
 		display: block;
 	}
 	#i-m-cat:after{
 		content: "";
 		position: absolute;
 		border-top: 3px solid #264653;
 		padding: 5px 15px;
 		top: 25px;
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
 		align-content: center;
 		align-items: center;
 		justify-content: space-between;
 		flex-wrap: wrap;
 		max-width: 1200px;
 		margin: 0 auto;
 	}

 	#topo .a {
 		border: 1px solid #264653;
 		padding: 15px;
 		width: 100%;
 	}
 	#topo .b {
 		border: 1px solid #264653;
 		padding: 15px;
 		width: 100%;
 	}
 	#topo .c{
 		border: 1px solid #264653;
 		padding: 15px;
 		width: 100%;
 		position: relative;
 	}

 	#logo img {
 		width: 100%;
 		max-width: 300px;
 		height: auto;
 	}

 	#icones-loja {
 		display: -webkit-box;
 		display: -moz-box;
 		display: -ms-flexbox;
 		display: -webkit-flex;
 		display: flex;  
 		align-content: center;
 		align-items: center;
 		justify-content: flex-end;
 		flex-wrap: wrap;
 		background: #e9ecef;
 		list-style: none;
 		margin: 0;
 	}

 	#icones-loja li a {
 		display: block;
 		padding: 10px;
 		color: white;
 		text-decoration: none;
 	}
 	#icones-loja li a:hover {
 		display: block;
 		padding: 10px;
 		background: #264653;
 	}

 	#form-busca {
 		background: #264653;
 		padding: 20px;
 		max-width: 400px;
 		position: absolute;
 		top: 50px;
 		left: 0;
 		right: 0;
 		margin: 0 auto;
 		display: -webkit-box;
 		display: -moz-box;
 		display: -ms-flexbox;
 		display: -webkit-flex;
 		display: flex;  
 		align-content: center;
 		align-items: center;
 		justify-content: center;
 		flex-wrap: wrap;
 		display: none;
 		z-index: 9999999;
 	}
 	#form-busca .busca-texto {
 		width: 100%;
 		text-align: left;
 	}
 	#form-busca .busca-radio-tabela {
 		width: 40%;
 		text-align: center;
 		display: inline-block;
 		margin-bottom: 20px;
 	}
 	#form-busca input {
 		width: 100%;
 		text-align: left;
 		border: 0;
 	}
 	#form-busca input[type="text"] {
 		margin-bottom: 20px;
 	}

 	#form-busca input[type="radio"] {
 		text-align: center;
 		width: 30px;
 		border: 5px solid red;
 	}
 	#form-busca input[type="submit"] {
 		text-align: center;
 		width: 100%;
 		display: block;
 	}
 	#form-busca a {
 		display: block;
 		position: relative;
 		margin-bottom: 20px;
 	}
 	#form-busca a:before {
 		content: "";
 		display: block;
 		position: absolute;
 		right: 0;
 		top: 0;
 		padding: 8px 0px;
 		border-left: 3px solid white;
 		-ms-transform: rotate(45deg); 
 		-webkit-transform: rotate(45deg); 
 		transform: rotate(45deg);
 		background: lightblue;
 	}
 	#form-busca a:after {
 		content: "";
 		display: block;
 		position: absolute;
 		right: 0;
 		top: 0;
 		padding: 8px 0px;
 		border-left: 3px solid white;
 		-ms-transform: rotate(-45deg); 
 		-webkit-transform: rotate(-45deg); 
 		transform: rotate(-45deg);
 	}
 	@media (min-width: 768px) {

 		#icones-topo {
 			display: none;
 		}
 		#i-m-inst {
 			width: 30px;
 			display: inline-block;
 		}
 		#nav-cat {
 			line-height: 0;
 			text-align: center;
 			display: inline-block;
 			position: static;
 			background: #264653;
 		}
 		#topo .a {
 			width: 25%;
 		}
 		#topo .b {
 			width: 50%;
 		}
 		#topo .c {
 			width: 25%;
 		}


 		#htel {
 			display: inline-block;
 			width: auto;
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
 		if(e.style.display == "" || e.style.display=="none"){
 			e.style.display="block";
 		} else {
 			e.style.display="none";
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
