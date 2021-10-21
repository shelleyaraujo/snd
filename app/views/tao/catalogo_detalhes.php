 <?php include_once "head.php"; ?>

 <?php 
 $checked = "";
 if($vitrine == "1") {
 	$checked = "checked";
 }

 $checked_a = "";
 if($ativo == "1") {
 	$checked_a = "checked";
 }

 ?>

 <body>

 	<?php include_once "header.php"; ?>

 	<div class="painel"> 
 		<div class="p-a"> 
 			<div class="menu-tao">
 				<?php include_once "menutao.php"; ?>
 			</div>
 		</div>
 		<div class="p-b">

 			<a href="
 			<?php 
 			if(isset($_SESSION["voltar_itens_catalogo"])) {
 				echo $_SESSION["voltar_itens_catalogo"];
 			}

 			?>" class="voltar">Voltar</a>

 			<h1>Detalhes do Produto/Serviço</h1>

 			<?php $data = new DateTime($dma); ?>

 			<p><?php echo "Data do Cadastro: <span style='color:skyblue'>" .$data->format('d/m/Y h:i:s') . "</span>"; ?></p>

 			<?php echo $ondeestou_tao; ?>


 			<div class="id-estique-vitrine">

 				<div><?php echo "Id: " . $id; ?></div>
 				<div><?php echo "Estoque: " . $estoque; ?></div>

 				<div><input type="checkbox" id="checkbox-ativo" onclick="set_ativo(<?php echo $id; ?>)" <?php echo $checked_a; ?> value="<?php echo $id; ?>">Ativo
 				</div>

 				<div><input type="checkbox" id="checkbox-vitrine" onclick="set_vitrine(<?php echo $id; ?>)" <?php echo $checked; ?> value="<?php echo $id; ?>">Vitrine
 				</div>    
 				<div class="''">
 					<button onclick="get_categorias()" class="button-vazado">Relacionados</button>
 					<div id="categorias"></div>
 				</div>

 				<div class="''">
 					<button onclick="get_categorias_mudar()" class="button-vazado">Mudar Categoria</button>
 					<div id="categorias-mudar"></div>
 				</div>        
 			</div>

 			<form id="item-catalogo" method="POST" onsubmit="return verificar()" action="<?php echo myUrl('tao/catalogo_detalhes/') ?>">
 				<div class="titulo">
 					<label>Titulo / Produto / Serviço:</label>
 					<input type="text" name="titulo" id="titulo" value="<?php echo $titulo; ?>" placeholder="titulo">
 				</div>
 				<div class="descricao_simplificada">
 					<label>Descrição Simplificada:</label>
 					<textarea name="descricao_simplificada" id="descricao_simplificada"><?php echo $descricao_simplificada ?></textarea>
 				</div>

 				<div class="cnt-preco">
 					<div>
 						<label>Preço: (R$)</label>
 						<input type="text" name="preco" id="preco" value="<?php echo number_format($preco/100,2,",","."); ?>" placeholder="preco">
 					</div>
 					<div>
 						<label>Preço Promocional: (R$)</label>
 						<input type="text" name="precocusto" id="precocusto" value="<?php echo number_format($precocusto/100,2,",","."); ?>" placeholder="preço custo">
 					</div>
 					<div>
 						<label>Peso (Gramas 1kg = 1000)</label>
 						<input type="text" name="peso" id="peso" value="<?php echo $peso; ?>" placeholder="peso">
 					</div>
 					<div>
 						<label>Estoque</label>
 						<input type="text" name="estoque" id="estoque" value="<?php echo $estoque; ?>" placeholder="estoque">
 					</div>      </div>

 					<div class="cnt-codigo">
 						<div>
 							<label>Código do Produto / Serviço:</label>
 							<input type="text" name="codigo" id="codigo" value="<?php echo $codigo; ?>" placeholder="codigo">
 						</div>
 						<div>
 							<label>Código do Fornecedor</label>
 							<input type="text" name="codigofornecedor" id="codigofornecedor" value="<?php echo $codigofornecedor; ?>" placeholder="fornecedor">
 						</div>
 						<div>
 							<label>Fornecedor</label>
 							<!--<input type="text" name="idfornecedor" id="idfornecedor" value="<?php echo $idfornecedor; ?>" placeholder="codigofornecedor">-->
 							<?php echo $fornecedores; ?>
 						</div>
 					</div>

 					<div class="cnt-mod-tam-cor">
 						<div>
 							<label>Modelos:</label>
 							<div class="cnt-modelos">
 								<input type="text" id="modelo" value="" placeholder="modelo">
 								<a onclick="adicionar_modelo()" href="javascript:void(0)" class="icone-mais">+</a>
 							</div>
 							<?php echo $modelos ?>
 						</div>

 						<div>
 							<label>Tamanhos:</label>
 							<div class="cnt-tamanhos">
 								<input type="text" id="tamanho" value="" placeholder="tamanho">
 								<a onclick="adicionar_tamanho()" href="javascript:void(0)" class="icone-mais-tamanho">+</a>
 							</div>
 							<?php echo $tamanhos ?>
 						</div>
 						<div>
 							<label>Cores:</label>
 							<div class="cnt-cores">
 								<input type="text" id="cor" value="" placeholder="cor">
 								<a href="javascript:void(0)" onclick="adicionar_cor()" class="button">+</a>
 								<a href="javascript:void(0)" onclick="open_cores()" class="icone-cores">Cores</a>
 								<div id="paleta-cores">
 									<p><a href="javascript:void(0)" onclick="close_cores()">X</a></p>

 									<div id="tabela-cores" class="tabela-cores">

 										<div style="background:#fffafa">Snow</div>
 										<div style="background:#f8f8ff">GhostWhite</div>
 										<div style="background:#f5f5f5">WhiteSmoke</div>
 										<div style="background:#dcdcdc">Gainsboro</div>
 										<div style="background:#fffaf0">FloralWhite</div>
 										<div style="background:#fdf5e6">OldLace</div>
 										<div style="background:#faf0e6">Linen</div>
 										<div style="background:#faebd7">AntiqueWhite</div>
 										<div style="background:#ffefd5">PapayaWhip</div>
 										<div style="background:#ffebcd">BlanchedAlmond</div>


 										<div style="background:#ffe4c4">Bisque</div>


 										<div style="background:#ffdab9">PeachPuff</div>


 										<div style="background:#ffdead">NavajoWhite</div>


 										<div style="background:#ffe4b5">Moccasin</div>


 										<div style="background:#fff8dc">Cornsilk</div>


 										<div style="background:#fffff0">lightblue</div>


 										<div style="background:#fffacd">LemonChiffon</div>


 										<div style="background:#fff5ee">Seashell</div>


 										<div style="background:#f0fff0">Honeydew</div>


 										<div style="background:#f5fffa">MintCream</div>


 										<div style="background:#f0ffff">Azure</div>


 										<div style="background:#f0f8ff">AliceBlue</div>


 										<div style="background:#e6e6fa">#e9ecef</div>


 										<div style="background:#fff0f5">#e9ecefBlush</div>


 										<div style="background:#ffe4e1">MistyRose</div>


 										<div style="background:#ffffff">White</div>


 										<div style="background:#000000">Black</div>


 										<div style="background:#2f4f4f">DarkSlateGray</div>


 										<div style="background:#696969">DimGrey</div>


 										<div style="background:#708090">SlateGrey</div>


 										<div style="background:#778899">LightSlateGray</div>


 										<div style="background:#bebebe">Grey</div>


 										<div style="background:#1c1c1c">grey11</div>


 										<div style="background:#363636">grey21</div>


 										<div style="background:#4f4f4f">grey31</div>


 										<div style="background:#696969">grey41</div>


 										<div style="background:#828282">grey51</div>


 										<div style="background:#9c9c9c">grey61</div>


 										<div style="background:#b5b5b5">grey71</div>


 										<div style="background:#cfcfcf">grey81</div>


 										<div style="background:#e8e8e8">grey91</div>


 										<div style="background:#d3d3d3">LightGray</div>


 										<div style="background:#a9a9a9">DarkGrey</div>


 										<div style="background:#00008b">DarkBlue</div>


 										<div style="background:#008b8b">DarkCyan</div>


 										<div style="background:#8b008b">DarkMagenta</div>


 										<div style="background:#8b0000">DarkRed</div>


 										<div style="background:#90ee90">#5499C7</div>


 										<div style="background:#191970">MidnightBlue</div>


 										<div style="background:#000080">NavyBlue</div>


 										<div style="background:#6495ed">CornflowerBlue</div>


 										<div style="background:#483d8b">DarkSlateBlue</div>


 										<div style="background:#6a5acd">SlateBlue</div>


 										<div style="background:#7b68ee">MediumSlateBlue</div>


 										<div style="background:#8470ff">LightSlateBlue</div>


 										<div style="background:#0000cd">#5499C7</div>


 										<div style="background:#4169e1">#5499C7</div>


 										<div style="background:#0000ff">Blue</div>


 										<div style="background:#1e90ff">#5499C7</div>


 										<div style="background:#00bfff">Deep#e9ecef</div>


 										<div style="background:#87ceeb">#e9ecef</div>


 										<div style="background:#87cefa">Light#e9ecef</div>


 										<div style="background:#4682b4">#5499C7</div>


 										<div style="background:#b0c4de">Light#5499C7</div>


 										<div style="background:#add8e6">LightBlue</div>


 										<div style="background:#b0e0e6">PowderBlue</div>


 										<div style="background:#afeeee">PaleTurquoise</div>


 										<div style="background:#00ced1">DarkTurquoise</div>


 										<div style="background:#48d1cc">MediumTurquoise</div>


 										<div style="background:#40e0d0">Turquoise</div>


 										<div style="background:#00ffff">Cyan</div>


 										<div style="background:#e0ffff">LightCyan</div>


 										<div style="background:#5f9ea0">CadetBlue</div>


 										<div style="background:#66cdaa">Medium#e9ecef</div>


 										<div style="background:#7fffd4">#e9ecef</div>


 										<div style="background:#006400">DarkGreen</div>


 										<div style="background:#556b2f">DarkOliveGreen</div>


 										<div style="background:#8fbc8f">#e9ecef</div>


 										<div style="background:#2e8b57">skyblue</div>


 										<div style="background:#3cb371">Mediumskyblue</div>


 										<div style="background:#20b2aa">#5499C7</div>


 										<div style="background:#98fb98">skyblue</div>


 										<div style="background:#00ff7f">SpringGreen</div>


 										<div style="background:#7cfc00">LawnGreen</div>


 										<div style="background:#00ff00">Green</div>


 										<div style="background:#7fff00">Chartreuse</div>


 										<div style="background:#00fa9a">MedSpringGreen</div>


 										<div style="background:#adff2f">#5499C7</div>


 										<div style="background:#32cd32">#5499C7</div>


 										<div style="background:#9acd32">YellowGreen</div>


 										<div style="background:#228b22">ForestGreen</div>


 										<div style="background:#6b8e23">OliveDrab</div>


 										<div style="background:#bdb76b">DarkKhaki</div>


 										<div style="background:#eee8aa">lightblue</div>


 										<div style="background:#fafad2">LtlightblueenrodYello</div>


 										<div style="background:#ffffe0">aliceblue</div>


 										<div style="background:#ffff00">Yellow</div>


 										<div style="background:#ffd700">lightblue</div>


 										<div style="background:#eedd82">Lightlightblueenrod</div>


 										<div style="background:#daa520">lightblueenrod</div>


 										<div style="background:#b8860b">Darklightblueenrod</div>


 										<div style="background:#bc8f8f">RosyBrown</div>


 										<div style="background:#cd5c5c">IndianRed</div>


 										<div style="background:#8b4513">SaddleBrown</div>


 										<div style="background:#a0522d">Sienna</div>


 										<div style="background:#cd853f">Peru</div>


 										<div style="background:#deb887">Burlywood</div>


 										<div style="background:#f5f5dc">Beige</div>


 										<div style="background:#f5deb3">Wheat</div>


 										<div style="background:#f4a460">SandyBrown</div>


 										<div style="background:#d2b48c">Tan</div>


 										<div style="background:#d2691e">Chocolate</div>


 										<div style="background:#b22222">Firebrick</div>


 										<div style="background:#a52a2a">Brown</div>


 										<div style="background:#e9967a">DarkSalmon</div>


 										<div style="background:#fa8072">Salmon</div>


 										<div style="background:#ffa07a">LightSalmon</div>


 										<div style="background:#ffa500">skyblue</div>


 										<div style="background:#ff8c00">Darkskyblue</div>


 										<div style="background:#ff7f50">Coral</div>


 										<div style="background:#f08080">LightCoral</div>


 										<div style="background:#ff6347">Tomato</div>


 										<div style="background:#ff4500">skyblue</div>


 										<div style="background:#ff0000">Red</div>


 										<div style="background:#ff69b4">HotPink</div>


 										<div style="background:#ff1493">DeepPink</div>


 										<div style="background:#ffc0cb">Pink</div>


 										<div style="background:#ffb6c1">LightPink</div>


 										<div style="background:#db7093">PaleVioletRed</div>


 										<div style="background:#b03060">Maroon</div>


 										<div style="background:#c71585">MediumVioletRed</div>


 										<div style="background:#d02090">VioletRed</div>


 										<div style="background:#ff00ff">Magenta</div>


 										<div style="background:#ee82ee">Violet</div>


 										<div style="background:#dda0dd">Plum</div>


 										<div style="background:#da70d6">Orchid</div>


 										<div style="background:#ba55d3">MediumOrchid</div>


 										<div style="background:#9932cc">DarkOrchid</div>


 										<div style="background:#9400d3">DarkViolet</div>


 										<div style="background:#8a2be2">BlueViolet</div>


 										<div style="background:#a020f0">Purple</div>


 										<div style="background:#9370db">MediumPurple</div>


 										<div style="background:#d8bfd8">Thistle</div>


 										<div style="background:#fffafa">Snow1</div>


 										<div style="background:#eee9e9">Snow2</div>


 										<div style="background:#cdc9c9">Snow3</div>


 										<div style="background:#8b8989">Snow4</div>


 										<div style="background:#fff5ee">Seashell1</div>


 										<div style="background:#eee5de">Seashell2</div>


 										<div style="background:#cdc5bf">Seashell3</div>


 										<div style="background:#8b8682">Seashell4</div>


 										<div style="background:#ffefdb">AntiqueWhite1</div>


 										<div style="background:#eedfcc">AntiqueWhite2</div>


 										<div style="background:#cdc0b0">AntiqueWhite3</div>


 										<div style="background:#8b8378">AntiqueWhite4</div>


 										<div style="background:#ffe4c4">Bisque1</div>


 										<div style="background:#eed5b7">Bisque2</div>


 										<div style="background:#cdb79e">Bisque3</div>


 										<div style="background:#8b7d6b">Bisque4</div>


 										<div style="background:#ffdab9">PeachPuff1</div>


 										<div style="background:#eecbad">PeachPuff2</div>


 										<div style="background:#cdaf95">PeachPuff3</div>


 										<div style="background:#8b7765">PeachPuff4</div>


 										<div style="background:#ffdead">NavajoWhite1</div>


 										<div style="background:#eecfa1">NavajoWhite2</div>


 										<div style="background:#cdb38b">NavajoWhite3</div>


 										<div style="background:#8b795e">NavajoWhite4</div>


 										<div style="background:#fffacd">LemonChiffon1</div>


 										<div style="background:#eee9bf">LemonChiffon2</div>


 										<div style="background:#cdc9a5">LemonChiffon3</div>


 										<div style="background:#8b8970">LemonChiffon4</div>


 										<div style="background:#fff8dc">Cornsilk1</div>


 										<div style="background:#eee8cd">Cornsilk2</div>


 										<div style="background:#cdc8b1">Cornsilk3</div>


 										<div style="background:#8b8878">Cornsilk4</div>


 										<div style="background:#fffff0">lightblue1</div>


 										<div style="background:#eeeee0">lightblue2</div>


 										<div style="background:#cdcdc1">lightblue3</div>


 										<div style="background:#8b8b83">lightblue4</div>


 										<div style="background:#f0fff0">Honeydew1</div>


 										<div style="background:#e0eee0">Honeydew2</div>


 										<div style="background:#c1cdc1">Honeydew3</div>


 										<div style="background:#838b83">Honeydew4</div>


 										<div style="background:#fff0f5">#e9ecefBlush1</div>


 										<div style="background:#eee0e5">#e9ecefBlush2</div>


 										<div style="background:#cdc1c5">#e9ecefBlush3</div>


 										<div style="background:#8b8386">#e9ecefBlush4</div>


 										<div style="background:#ffe4e1">MistyRose1</div>


 										<div style="background:#eed5d2">MistyRose2</div>


 										<div style="background:#cdb7b5">MistyRose3</div>


 										<div style="background:#8b7d7b">MistyRose4</div>


 										<div style="background:#f0ffff">Azure1</div>


 										<div style="background:#e0eeee">Azure2</div>


 										<div style="background:#c1cdcd">Azure3</div>


 										<div style="background:#838b8b">Azure4</div>


 										<div style="background:#836fff">SlateBlue1</div>


 										<div style="background:#7a67ee">SlateBlue2</div>


 										<div style="background:#6959cd">SlateBlue3</div>


 										<div style="background:#473c8b">SlateBlue4</div>


 										<div style="background:#4876ff">#5499C71</div>


 										<div style="background:#436eee">#5499C72</div>


 										<div style="background:#3a5fcd">#5499C73</div>


 										<div style="background:#27408b">#5499C74</div>


 										<div style="background:#0000ff">Blue1</div>


 										<div style="background:#0000ee">Blue2</div>


 										<div style="background:#0000cd">Blue3</div>


 										<div style="background:#00008b">Blue4</div>


 										<div style="background:#1e90ff">#5499C71</div>


 										<div style="background:#1c86ee">#5499C72</div>


 										<div style="background:#1874cd">#5499C73</div>


 										<div style="background:#104e8b">#5499C74</div>


 										<div style="background:#63b8ff">#5499C71</div>


 										<div style="background:#5cacee">#5499C72</div>


 										<div style="background:#4f94cd">#5499C73</div>


 										<div style="background:#36648b">#5499C74</div>


 										<div style="background:#00bfff">Deep#e9ecef1</div>


 										<div style="background:#00b2ee">Deep#e9ecef2</div>


 										<div style="background:#009acd">Deep#e9ecef3</div>


 										<div style="background:#00688b">Deep#e9ecef4</div>


 										<div style="background:#87ceff">#e9ecef1</div>


 										<div style="background:#7ec0ee">#e9ecef2</div>


 										<div style="background:#6ca6cd">#e9ecef3</div>


 										<div style="background:#4a708b">#e9ecef4</div>


 										<div style="background:#b0e2ff">Light#e9ecef1</div>


 										<div style="background:#a4d3ee">Light#e9ecef2</div>


 										<div style="background:#8db6cd">Light#e9ecef3</div>


 										<div style="background:#607b8b">Light#e9ecef4</div>


 										<div style="background:#c6e2ff">SlateGray1</div>


 										<div style="background:#b9d3ee">SlateGray2</div>


 										<div style="background:#9fb6cd">SlateGray3</div>


 										<div style="background:#6c7b8b">SlateGray4</div>


 										<div style="background:#cae1ff">Light#5499C71</div>


 										<div style="background:#bcd2ee">Light#5499C72</div>


 										<div style="background:#a2b5cd">Light#5499C73</div>


 										<div style="background:#6e7b8b">Light#5499C74</div>


 										<div style="background:#bfefff">LightBlue1</div>


 										<div style="background:#b2dfee">LightBlue2</div>


 										<div style="background:#9ac0cd">LightBlue3</div>


 										<div style="background:#68838b">LightBlue4</div>


 										<div style="background:#e0ffff">LightCyan1</div>


 										<div style="background:#d1eeee">LightCyan2</div>


 										<div style="background:#b4cdcd">LightCyan3</div>


 										<div style="background:#7a8b8b">LightCyan4</div>


 										<div style="background:#bbffff">PaleTurquoise1</div>


 										<div style="background:#aeeeee">PaleTurquoise2</div>


 										<div style="background:#96cdcd">PaleTurquoise3</div>


 										<div style="background:#668b8b">PaleTurquoise4</div>


 										<div style="background:#98f5ff">CadetBlue1</div>


 										<div style="background:#8ee5ee">CadetBlue2</div>


 										<div style="background:#7ac5cd">CadetBlue3</div>


 										<div style="background:#53868b">CadetBlue4</div>


 										<div style="background:#00f5ff">Turquoise1</div>


 										<div style="background:#00e5ee">Turquoise2</div>


 										<div style="background:#00c5cd">Turquoise3</div>


 										<div style="background:#00868b">Turquoise4</div>


 										<div style="background:#00ffff">Cyan1</div>


 										<div style="background:#00eeee">Cyan2</div>


 										<div style="background:#00cdcd">Cyan3</div>


 										<div style="background:#008b8b">Cyan4</div>


 										<div style="background:#97ffff">DarkSlateGray1</div>


 										<div style="background:#8deeee">DarkSlateGray2</div>


 										<div style="background:#79cdcd">DarkSlateGray3</div>


 										<div style="background:#528b8b">DarkSlateGray4</div>


 										<div style="background:#7fffd4">#e9ecef1</div>


 										<div style="background:#76eec6">#e9ecef2</div>


 										<div style="background:#66cdaa">#e9ecef3</div>


 										<div style="background:#458b74">#e9ecef4</div>


 										<div style="background:#c1ffc1">#e9ecef1</div>


 										<div style="background:#b4eeb4">#e9ecef2</div>


 										<div style="background:#9bcd9b">#e9ecef3</div>


 										<div style="background:#698b69">#e9ecef4</div>


 										<div style="background:#54ff9f">skyblue1</div>


 										<div style="background:#4eee94">skyblue2</div>


 										<div style="background:#43cd80">skyblue3</div>


 										<div style="background:#2e8b57">skyblue4</div>


 										<div style="background:#9aff9a">skyblue1</div>


 										<div style="background:#90ee90">skyblue2</div>


 										<div style="background:#7ccd7c">skyblue3</div>


 										<div style="background:#548b54">skyblue4</div>


 										<div style="background:#00ff7f">SpringGreen1</div>


 										<div style="background:#00ee76">SpringGreen2</div>


 										<div style="background:#00cd66">SpringGreen3</div>


 										<div style="background:#008b45">SpringGreen4</div>


 										<div style="background:#00ff00">Green1</div>


 										<div style="background:#00ee00">Green2</div>


 										<div style="background:#00cd00">Green3</div>


 										<div style="background:#008b00">Green4</div>


 										<div style="background:#7fff00">Chartreuse1</div>


 										<div style="background:#76ee00">Chartreuse2</div>


 										<div style="background:#66cd00">Chartreuse3</div>


 										<div style="background:#458b00">Chartreuse4</div>


 										<div style="background:#c0ff3e">OliveDrab1</div>


 										<div style="background:#b3ee3a">OliveDrab2</div>


 										<div style="background:#9acd32">OliveDrab3</div>


 										<div style="background:#698b22">OliveDrab4</div>


 										<div style="background:#caff70">DarkOliveGreen1</div>


 										<div style="background:#bcee68">DarkOliveGreen2</div>


 										<div style="background:#a2cd5a">DarkOliveGreen3</div>


 										<div style="background:#6e8b3d">DarkOliveGreen4</div>


 										<div style="background:#fff68f">Khaki1</div>


 										<div style="background:#eee685">Khaki2</div>


 										<div style="background:#cdc673">Khaki3</div>


 										<div style="background:#8b864e">Khaki4</div>


 										<div style="background:#ffec8b">Lightlightblueenrod1</div>


 										<div style="background:#eedc82">Lightlightblueenrod2</div>


 										<div style="background:#cdbe70">Lightlightblueenrod3</div>


 										<div style="background:#8b814c">Lightlightblueenrod4</div>


 										<div style="background:#ffffe0">aliceblue1</div>


 										<div style="background:#eeeed1">aliceblue2</div>


 										<div style="background:#cdcdb4">aliceblue3</div>


 										<div style="background:#8b8b7a">aliceblue4</div>


 										<div style="background:#ffff00">Yellow1</div>


 										<div style="background:#eeee00">Yellow2</div>


 										<div style="background:#cdcd00">Yellow3</div>


 										<div style="background:#8b8b00">Yellow4</div>


 										<div style="background:#ffd700">lightblue1</div>


 										<div style="background:#eec900">lightblue2</div>


 										<div style="background:#cdad00">lightblue3</div>


 										<div style="background:#8b7500">lightblue4</div>


 										<div style="background:#ffc125">lightblueenrod1</div>


 										<div style="background:#eeb422">lightblueenrod2</div>


 										<div style="background:#cd9b1d">lightblueenrod3</div>


 										<div style="background:#8b6914">lightblueenrod4</div>


 										<div style="background:#ffb90f">Darklightblueenrod1</div>


 										<div style="background:#eead0e">Darklightblueenrod2</div>


 										<div style="background:#cd950c">Darklightblueenrod3</div>


 										<div style="background:#8b658b">Darklightblueenrod4</div>


 										<div style="background:#ffc1c1">RosyBrown1</div>


 										<div style="background:#eeb4b4">RosyBrown2</div>


 										<div style="background:#cd9b9b">RosyBrown3</div>


 										<div style="background:#8b6969">RosyBrown4</div>


 										<div style="background:#ff6a6a">IndianRed1</div>


 										<div style="background:#ee6363">IndianRed2</div>


 										<div style="background:#cd5555">IndianRed3</div>


 										<div style="background:#8b3a3a">IndianRed4</div>


 										<div style="background:#ff8247">Sienna1</div>


 										<div style="background:#ee7942">Sienna2</div>


 										<div style="background:#cd6839">Sienna3</div>


 										<div style="background:#8b4726">Sienna4</div>


 										<div style="background:#ffd39b">Burlywood1</div>


 										<div style="background:#eec591">Burlywood2</div>


 										<div style="background:#cdaa7d">Burlywood3</div>


 										<div style="background:#8b7355">Burlywood4</div>


 										<div style="background:#ffe7ba">Wheat1</div>


 										<div style="background:#eed8ae">Wheat2</div>


 										<div style="background:#cdba96">Wheat3</div>


 										<div style="background:#8b7e66">Wheat4</div>


 										<div style="background:#ffa54f">Tan1</div>


 										<div style="background:#ee9a49">Tan2</div>


 										<div style="background:#cd853f">Tan3</div>


 										<div style="background:#8b5a2b">Tan4</div>


 										<div style="background:#ff7f24">Chocolate1</div>


 										<div style="background:#ee7621">Chocolate2</div>


 										<div style="background:#cd661d">Chocolate3</div>


 										<div style="background:#8b4513">Chocolate4</div>


 										<div style="background:#ff3030">Firebrick1</div>


 										<div style="background:#ee2c2c">Firebrick2</div>


 										<div style="background:#cd2626">Firebrick3</div>


 										<div style="background:#8b1a1a">Firebrick4</div>


 										<div style="background:#ff4040">Brown1</div>


 										<div style="background:#ee3b3b">Brown2</div>


 										<div style="background:#cd3333">Brown3</div>


 										<div style="background:#8b2323">Brown4</div>


 										<div style="background:#ff8c69">Salmon1</div>


 										<div style="background:#ee8262">Salmon2</div>


 										<div style="background:#cd7054">Salmon3</div>


 										<div style="background:#8b4c39">Salmon4</div>


 										<div style="background:#ffa07a">LightSalmon1</div>


 										<div style="background:#ee9572">LightSalmon2</div>


 										<div style="background:#cd8162">LightSalmon3</div>


 										<div style="background:#8b5742">LightSalmon4</div>


 										<div style="background:#ffa500">skyblue1</div>


 										<div style="background:#ee9a00">skyblue2</div>


 										<div style="background:#cd8500">skyblue3</div>


 										<div style="background:#8b5a00">skyblue4</div>


 										<div style="background:#ff7f00">Darkskyblue1</div>


 										<div style="background:#ee7600">Darkskyblue2</div>


 										<div style="background:#cd6600">Darkskyblue3</div>


 										<div style="background:#8b4500">Darkskyblue4</div>


 										<div style="background:#ff7256">Coral1</div>


 										<div style="background:#ee6a50">Coral2</div>


 										<div style="background:#cd5b45">Coral3</div>


 										<div style="background:#8b3e2f">Coral4</div>


 										<div style="background:#ff6347">Tomato1</div>


 										<div style="background:#ee5c42">Tomato2</div>


 										<div style="background:#cd4f39">Tomato3</div>


 										<div style="background:#8b3626">Tomato4</div>


 										<div style="background:#ff4500">skyblue1</div>


 										<div style="background:#ee4000">skyblue2</div>


 										<div style="background:#cd3700">skyblue3</div>


 										<div style="background:#8b2500">skyblue4</div>


 										<div style="background:#ff0000">Red1</div>


 										<div style="background:#ee0000">Red2</div>


 										<div style="background:#cd0000">Red3</div>


 										<div style="background:#8b0000">Red4</div>


 										<div style="background:#ff1493">DeepPink1</div>


 										<div style="background:#ee1289">DeepPink2</div>


 										<div style="background:#cd1076">DeepPink3</div>


 										<div style="background:#8b0a50">DeepPink4</div>


 										<div style="background:#ff6eb4">HotPink1</div>


 										<div style="background:#ee6aa7">HotPink2</div>


 										<div style="background:#cd6090">HotPink3</div>


 										<div style="background:#8b3a62">HotPink4</div>


 										<div style="background:#ffb5c5">Pink1</div>


 										<div style="background:#eea9b8">Pink2</div>


 										<div style="background:#cd919e">Pink3</div>


 										<div style="background:#8b636c">Pink4</div>


 										<div style="background:#ffaeb9">LightPink1</div>


 										<div style="background:#eea2ad">LightPink2</div>


 										<div style="background:#cd8c95">LightPink3</div>


 										<div style="background:#8b5f65">LightPink4</div>


 										<div style="background:#ff82ab">PaleVioletRed1</div>


 										<div style="background:#ee799f">PaleVioletRed2</div>


 										<div style="background:#cd6889">PaleVioletRed3</div>


 										<div style="background:#8b475d">PaleVioletRed4</div>


 										<div style="background:#ff34b3">Maroon1</div>


 										<div style="background:#ee30a7">Maroon2</div>


 										<div style="background:#cd2990">Maroon3</div>


 										<div style="background:#8b1c62">Maroon4</div>


 										<div style="background:#ff3e96">VioletRed1</div>


 										<div style="background:#ee3a8c">VioletRed2</div>


 										<div style="background:#cd3278">VioletRed3</div>


 										<div style="background:#8b2252">VioletRed4</div>


 										<div style="background:#ff00ff">Magenta1</div>


 										<div style="background:#ee00ee">Magenta2</div>


 										<div style="background:#cd00cd">Magenta3</div>


 										<div style="background:#8b008b">Magenta4</div>


 										<div style="background:#ff83fa">Orchid1</div>


 										<div style="background:#ee7ae9">Orchid2</div>


 										<div style="background:#cd69c9">Orchid3</div>


 										<div style="background:#8b4789">Orchid4</div>


 										<div style="background:#ffbbff">Plum1</div>


 										<div style="background:#eeaeee">Plum2</div>


 										<div style="background:#cd96cd">Plum3</div>


 										<div style="background:#8b668b">Plum4</div>


 										<div style="background:#e066ff">MediumOrchid1</div>


 										<div style="background:#d15fee">MediumOrchid2</div>


 										<div style="background:#b452cd">MediumOrchid3</div>


 										<div style="background:#7a378b">MediumOrchid4</div>


 										<div style="background:#bf3eff">DarkOrchid1</div>


 										<div style="background:#b23aee">DarkOrchid2</div>


 										<div style="background:#9a32cd">DarkOrchid3</div>


 										<div style="background:#68228b">DarkOrchid4</div>


 										<div style="background:#9b30ff">Purple1</div>


 										<div style="background:#912cee">Purple2</div>


 										<div style="background:#7d26cd">Purple3</div>


 										<div style="background:#551a8b">Purple4</div>


 										<div style="background:#ab82ff">MediumPurple1</div>


 										<div style="background:#9f79ee">MediumPurple2</div>


 										<div style="background:#8968cd">MediumPurple3</div>


 										<div style="background:#5d478b">MediumPurple4</div>
 										<div style="background:#ffe1ff">Thistle1</div>
 										<div style="background:#eed2ee">Thistle2</div>
 										<div style="background:#cdb5cd">Thistle3</div>
 										<div style="background:#8b7b8b">Thistle4</div>
 									</div>
 								</div>

 							</div>
 							<?php echo $cores ?>
 						</div>
 					</div>

 					<br>
 					<br>
 					<div class="descricao">
 						<div class="cnt-upload-imagem-descricao">
 							<a href="javascript:void(0)" class="fechar" onclick="close_upload_imagem_descricao()">X</a>
 							<div id="uploader-descricao">
 								<div id="upload2-descricao">
 									<label for='image-file-descricao'>x</label>
 									<input id="image-file-descricao" type="file" onchange="SavePhotoDescricao(this)" >
 								</div>
 								<div id="loader-descricao"></div>
 								<img id="picture-descricao" src="../../imagens//semimagem.jpg" />
 								<p>&nbsp;Selecionar Imagem</span></p>
 							</div>
 						</div>
 						<label>Descrição do Produto/Serviço <span style='padding: 5px; border: 5px solid skyblue;max-width: 100px; font-size: 10px;'><a href='javascript:void(0)'  onclick="open_upload_imagem_descricao()" class=''>IMAGEM</a></span></label>
 						<textarea name="editor1" id="editor1"><?php echo $descricao ?></textarea>
 						<script>  

 							CKEDITOR.replace( 'editor1', {
 								customConfig: '<?php echo myUrl("app/views/tao/ckeditor/config.js") ?>'
 							} );             

 						</script>
 					</div>

 					<div>
 						<input type="hidden" name="idcatalogo" id="idcatalogo" value="<?php echo $id ?>">
 						<input type="hidden" name="update_catalogo" value="">
 						<input type="hidden" name="imagem" id="imagem" value="imagem">
 					</div>
 					<button type="submit">Salvar</button>


 				</form>


 			</div>

 			<div class="p-c">

 				<div class="cnt-botoes">
 					<a class="button-vazado" href="javascript:void(0)" onclick="open_upload_imagem()">Inserir Imagem</a>
 				</div>

 				<div class="cnt-upload-imagem">
 					<a href="javascript:void(0)" class="fechar" onclick="close_upload_imagem()">X</a>

 					<label>Imagens deste Item</label>
 					<div id="uploader">
 						<div id="upload2">
 							<label for='image-file'>x</label>
 							<input id="image-file" type="file" onchange="SavePhoto(this)" >
 						</div>
 						<img id="picture" src="../../imagens/sem-imagem.jpg" />
 						<div id="loader"></div>
 						<p>&nbsp;Arraste a imagem <span style="color:red">.jpg</span> aqui</p>
 						<?php echo $config_site[0]->crop_imagem_w_catalogo . " x " . $config_site[0]->crop_imagem_h_catalogo . " px" ?> 
 					</div>
 				</div>

 				<div id="cnt-imagens">
 					<?php echo $imagens  ?>
 				</div>
 				<button onclick="getIds()">Aplicar Alterações</button>

 			</div>
 		</div>

 		<style>
 		.tabela-cores {
 			display: flex;
 			align-items: center;
 			align-content: center;
 			justify-content: center;
 			flex-wrap: wrap;
 			width: 100%;
 			background-color: white;
 			border: 1px solid #e9ecef;
 		}

 		.tabela-cores div {
 			overflow: hidden;
 			padding: 0 12px;
 			font-size: 0;
 			margin-top: 1px;
 			margin-left: 1px;
 		}

 		.descricao {
 			position: relative;
 		}

 		.cnt-upload-imagem-descricao {
 			display: none;
 			position: absolute;
 			background-color: #048AC2;
 			z-index: 9999;;
 			left: 50%;
 			margin-left: -50px;
 			padding: 20px;
 			width: 100%;
 			max-width: 200px;
 			color: white;
 		}
	.cnt-upload-imagem-descricao a {
 			color: white;
 		}
 	</style>

 </div>
 <span id="textcolor"></span>
</div>

<?php include_once "footer.php"; ?>

<style>

.id-estique-vitrine {
	display: flex;
	align-items: center;
	align-content: center;
	justify-content: center;
	flex-wrap: wrap;
	border: 1px solid skyblue;
	background-color: #5499C7;
}

.id-estique-vitrine > div {
	margin: 0 10px;
	padding: 5px 10px;
}

.item-catalogo {
	display: flex;
	align-items: center;
	align-content: center;
	justify-content: center;
	flex-wrap: wrap;
} 

.item-catalogo > div {
	width: 100%;
}

.cnt-preco {
	display: flex;
	align-items: center;
	align-content: center;
	justify-content: flex-start;
	flex-wrap: wrap;
	margin-bottom: 20px;
}

.cnt-preco > div {
	width: 50%;
	padding-right: 10px;
	box-sizing: border-box;
}

.cnt-preco > div:last-child {
	padding-right: 0;
}

.cnt-codigo {
	display: flex;
	align-items: center;
	align-content: center;
	justify-content: flex-start;
	flex-wrap: wrap;
}

.cnt-codigo > div {
	width: 100%;
	padding-right: 10px;
	box-sizing: border-box;
}

.cnt-codigo > div:last-child {
	padding-right: 0;
}

#cnt-imagens ul {
	margin: 0;
	padding: 0;
	list-style: none;
	display: flex;
	align-items: flex-start;
	align-content: flex-start;
	justify-content: flex-start;
	flex-wrap: wrap;
}

#cnt-imagens li {
	width: 25%;
	border: 1px solid white;
	box-sizing: border-box;
	position: relative;
}

#cnt-imagens li a {
	position: absolute;
	top: 0;
	right: 0;
	background: red;
	color: white;
	padding: 0 5px;
	display: block;
}

.cnt-mod-tam-cor {
	display: flex;
	align-items: flex-start;
	align-content: flex-start;
	justify-content: flex-start;
	flex-wrap: wrap;
}

.cnt-mod-tam-cor ul {
	list-style: none;
}

.cnt-mod-tam-cor > div {
	width: 100%;
	box-sizing: border-box;
}

.cnt-modelos {
	display: flex;
	align-items: flex-start;
	align-content: flex-start;
	justify-content: flex-start;
	flex-wrap: nowrap;
}

.cnt-modelos input {
	width: 70%;
	max-width: 100px;
	box-sizing: border-box;
}

.cnt-modelos button {
	width: 10%;
	max-width: 30px;
	box-sizing: border-box;
}

.cnt-tamanhos input {
	width: 70%;
	max-width: 100px;
	box-sizing: border-box;
}

.cnt-tamanhos button {
	width: 10%;
	max-width: 30px;
	box-sizing: border-box;
}

.cnt-cores {
	position: relative;
}

.cnt-cores input {
	width: 70%;
	max-width: 100px;
	box-sizing: border-box;
}

.cnt-cores button {
	width: 10%;
	max-width: 30px;
	box-sizing: border-box;
}

.cnt-mod-tam-cor li  {
	position: relative;
	padding-left: 20px;
}

.cnt-mod-tam-cor li a {
	position: absolute;
	top: 0;
	left: 0;
	color: red;
	padding: 0;
	display: block;
	width: 15px;
}

#textcolor {
	width: 300px;
}

#paleta-cores {
	display: none;
	position: absolute;
	top: 30px;
	left: 0;
	width: 100%;
	z-index: 99999;
}

#paleta-cores p {
	display: block;
	text-align: right;
	margin: 0;
}


#paleta-cores a {
	background-color: red;
	padding: 0 10px;
	color: white;
	width: 10px;
	text-align: right;
}


#mydiv  {
	position: absolute;
	top: 0;
}


#categorias {
	background-color: aliceblue;
	border: 1px solid navy;
	padding: 15px;
	box-sizing: border-box;
	margin-bottom: 20px;
	display: none;
	max-width: 200px;
	background-color: aliceblue;
	position: absolute;
	z-index: 99999!important;
}

#categorias ul{
	margin: 0;
	padding: 0;
}

#categorias li{
	font-size: 10px;
	z-index: 999999999;
	list-style: none;
}


#categorias-mudar {
	background-color: aliceblue;
	border: 1px solid navy;
	padding: 15px;
	box-sizing: border-box;
	margin-bottom: 20px;
	display: none;
	max-width: 200px;
	background-color: aliceblue;
	position: absolute;
	z-index: 99999!important;
}

#categorias-mudar ul{
	margin: 0;
	padding: 0;
}

#categorias-mudar li{
	font-size: 10px;
	z-index: 999999999;
	list-style: none;
}




#cnt-menu {
	width: 100%;
	display: flex;
	align-items: center;
	align-content: center;
	flex-wrap: wrap;
	justify-content: flex-start;
	box-sizing: border-box;
}

.column {
	-webkit-border-radius: 5px;
	-ms-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	cursor: move;
	margin-bottom: 5px;
	text-align: left;
	padding: 0;
	box-sizing: border-box;
	position: relative;
	width: 33.33%;
}

.column img{
	width: 100%;
}

.column a {
	text-decoration: none;
	color: black;
	text-align: center;
	font-size: 12px;
	padding: 3px 10px;
	color: red;
	font-weight: bold;
}

.column > div {
	padding: 0;
	box-sizing: border-box;
	border: 1px solid #cae1ff ;
	background-color: aliceblue;
	height: 80px;
	background-repeat: no-repeat;
	background-position: center;
}

.column .excluir {
	background-color: red;
	color: white; 
	padding: 2px 0;
	top: 0;
	right: 0;
	font-size: 10px;
	border-radius: 100%;
}


.column header {
	color: #fff;
	text-shadow: #000 0 1px;
	box-shadow: 5px;
	padding: 5px;
	background: -moz-linear-gradient(left center, rgb(0,0,0), rgb(79,79,79), rgb(21,21,21));
	background: -webkit-gradient(linear, left top, right top,
		color-stop(0, rgb(0,0,0)),
		color-stop(0.50, rgb(79,79,79)),
		color-stop(1, rgb(21,21,21)));
	background: -webkit-linear-gradient(left center, rgb(0,0,0), rgb(79,79,79), rgb(21,21,21));
	background: -ms-linear-gradient(left center, rgb(0,0,0), rgb(79,79,79), rgb(21,21,21));
	border-bottom: 1px solid #ddd;
	-webkit-border-top-left-radius: 10px;
	-moz-border-radius-topleft: 10px;
	-ms-border-radius-topleft: 10px;
	border-top-left-radius: 10px;
	-webkit-border-top-right-radius: 10px;
	-ms-border-top-right-radius: 10px;
	-moz-border-radius-topright: 10px;
	border-top-right-radius: 10px;
}

.icone-cores {
	position: relative;
	color: transparent;
	font-size: 0;
}

.icone-cores:before {
	content: "";
	position: absolute;
	border-top: 10px solid green;
	border-bottom: 10px solid blue;
	border-left: 10px solid red;
	border-right: 10px solid lightblue;
	border-radius: 50%;
}

.icone-mais {
	position: relative;
	font-size: 0;
	line-height: 0;
}

.icone-mais:before {
	content: "";
	position: absolute;
	border-top: 5px solid green;
	padding: 0 8px;
	top: 5px;
}

.icone-mais:after {
	content: "";
	position: absolute;
	border-right: 5px solid green;
	padding: 8px 0;
	left: 5px;
}


.icone-mais-tamanho {
	position: relative;
	font-size: 0;
	line-height: 0;
	margin: 0;
	padding: 0;
}
.icone-mais-tamanho:before {
	content: "";
	position: absolute;
	border-top: 5px solid green;
	padding: 0 8px;
	top: -17px;
}

.icone-mais-tamanho:after {
	content: "";
	position: absolute;
	border-right: 5px solid green;
	padding: 8px 0;
	left: 5px;
	top: -22px;
}

@media (min-width: 550px) {

	.cnt-preco > div {
		width: 25%;
		padding-right: 10px;
		box-sizing: border-box;
	}

	.cnt-codigo > div {
		width: 33.33%;
		padding-right: 10px;
		box-sizing: border-box;
	}

	.cnt-mod-tam-cor > div {
		width: 33.33%;
		box-sizing: border-box;
	}


}

</style>

<?php include_once "upload_imagem_catalogojs.php"; ?>



<script>

	function verificar() {
		var titulo = document.getElementById("titulo");
		if(titulo.value == "") {
			alert("Digite o titula do Produto ou Serviço.");
			return false;
		} 
		var descr = document.getElementById("titulo");
		if(preco.value == "") {
			alert("Digite o preço");
			return false;
		} 

	}


	function set_vitrine(id) {

		var vitrine="0";
		var checkBox = document.getElementById("checkbox-vitrine");


		if (checkBox.checked == true){
			vitrine="1";
		} 

		xhr = new XMLHttpRequest();
		xhr.open('POST', '<?php echo myUrl('tao/set_vitrine/') ?>');
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
		xhr.send(encodeURI('id=' + id + "&vitrine=" + vitrine));

	}


	function set_ativo(id) {

		var ativo="0";
		var checkBox = document.getElementById("checkbox-ativo");

		if (checkBox.checked == true){
			ativo="1";
		} 

		xhr = new XMLHttpRequest();
		xhr.open('POST', '<?php echo myUrl('tao/set_ativo/') ?>');
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
		xhr.send(encodeURI('id=' + id + "&ativo=" + ativo));

	}


	function adicionar_modelo() {

		var idcatalogo = document.getElementById("idcatalogo").value;
		var modelo = document.getElementById("modelo").value; 
		var ul = document.getElementById("list-modelos");
		var li = document.createElement("li");
		li.appendChild(document.createTextNode(modelo));

		if(modelo == "") {
			alert("Digite o modelo!");
		} else {
			xhr = new XMLHttpRequest();
			xhr.open('POST', '<?php echo myUrl('tao/insere_modelo_catalogo/') ?>');
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhr.onload = function() {
				if (xhr.status === 200) {
					info.style.display="block";
					ul.appendChild(li);
					info.innerHTML =  xhr.responseText;
				}
				else if (xhr.status !== 200) {
					alert(xhr.status);
				}
			};
			xhr.send(encodeURI('id=' + idcatalogo + "&modelo=" + modelo));
		}

	}

	function adicionar_tamanho() {

		var idcatalogo = document.getElementById("idcatalogo").value;
		var tamanho = document.getElementById("tamanho").value;
		var ul = document.getElementById("list-tamanhos");
		var li = document.createElement("li");
		li.appendChild(document.createTextNode(tamanho));

		if(tamanho == "") {
			alert("Digite o tamanho!");
		} else {
			xhr = new XMLHttpRequest();
			xhr.open('POST', '<?php echo myUrl('tao/insere_tamanho_catalogo/') ?>');
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhr.onload = function() {
				if (xhr.status === 200) {
					info.style.display="block";
					ul.appendChild(li);
					info.innerHTML =  xhr.responseText;
				}
				else if (xhr.status !== 200) {
					alert(xhr.status);
				}
			};
			xhr.send(encodeURI('id=' + idcatalogo + "&tamanho=" + tamanho));
		}
	}

	function adicionar_cor() {
		var idcatalogo = document.getElementById("idcatalogo").value;
		var cor = document.getElementById("cor").value;
		var ul = document.getElementById("list-cores");
		var li = document.createElement("li");
		li.appendChild(document.createTextNode(cor));

		if(cor == "") {
			alert("Digite o numero da cor!");
		} else {
			xhr = new XMLHttpRequest();
			xhr.open('POST', '<?php echo myUrl('tao/insere_cor_catalogo/') ?>');
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhr.onload = function() {
				if (xhr.status === 200) {
					info.style.display="block";
					ul.appendChild(li);
					info.innerHTML =  xhr.responseText;
					setTimeout(function(){  
						window.location.href =  window.location.href;  
					}, 500);
				}
				else if (xhr.status !== 200) {
					alert(xhr.status);
				}
			};
			xhr.send(encodeURI('id=' + idcatalogo + "&cor=" +  cor.replace("#","")));
		}
		return false;
	}



	function excluir_modelo(id) {

		var r = confirm("Tem certeza que quer excluir este modelo?");
		if (r == true) {
			xhr = new XMLHttpRequest();
			xhr.open('POST', '<?php echo myUrl('tao/excluir_modelo_catalogo/') ?>');
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhr.onload = function() {
				if (xhr.status === 200) {
					info.style.display="block";
					info.innerHTML =  xhr.responseText;
					setTimeout(function(){  
						window.location.href =  window.location.href;  
					}, 500);
				}
				else if (xhr.status !== 200) {
					alert(xhr.status);
				}
			};
			xhr.send(encodeURI('id=' + id));

		}
	}



	function excluir_tamanho(id) {

		var r = confirm("Tem certeza que quer excluir este tamanho?");
		if (r == true) {
			xhr = new XMLHttpRequest();
			xhr.open('POST', '<?php echo myUrl('tao/excluir_tamanho_catalogo/') ?>');
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhr.onload = function() {
				if (xhr.status === 200) {
					info.style.display="block";
					info.innerHTML =  xhr.responseText;
					setTimeout(function(){  
						window.location.href =  window.location.href;  
					}, 500);    }
					else if (xhr.status !== 200) {
						alert(xhr.status);
					}
				};
				xhr.send(encodeURI('id=' + id));

			}
		}

		function excluir_cor(id) {

			var r = confirm("Tem certeza que quer excluir esta cor?");
			if (r == true) {
				xhr = new XMLHttpRequest();
				xhr.open('POST', '<?php echo myUrl('tao/excluir_cor_catalogo/') ?>');
				xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				xhr.onload = function() {
					if (xhr.status === 200) {
						info.style.display="block";
						info.innerHTML =  xhr.responseText;
						setTimeout(function(){  
							window.location.href =  window.location.href;  
						}, 300);
					}
					else if (xhr.status !== 200) {
						alert(xhr.status);
					}
				};
				xhr.send(encodeURI('id=' + id));

			}
		}

		function excluir_imagem(id, imagem) {

			var row = document.querySelector("#row" + id);

			var r = confirm("Tem certeza que quer excluir esta imagem?");
			if (r == true) {
				xhr = new XMLHttpRequest();
				xhr.open('POST', '<?php echo myUrl('tao/excluir_imagem_catalogo_unica/') ?>');
				xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				xhr.onload = function() {
					if (xhr.status === 200) {
						info.style.display="block";
						info.innerHTML =  xhr.responseText;
						row.style.display = "none";
					}
					else if (xhr.status !== 200) {
						alert(xhr.status);
					}
				};
				xhr.send(encodeURI('id=' + id + "&imagem=" + imagem));
			}

		}

	</script>

	<script type="text/javascript">
		function drawColorPalette(stageID, callback) {
			var listColor = ["00", "33", "66", "99", "CC", "FF"];
			var table = document.createElement("table");
			table.border = 1;
			table.cellPadding = 0;
			table.cellSpacing = 0;
			table.style.borderColor = "#666666";
			table.style.borderCollapse = "collapse";
			var tr, td;
			var color = "";
			var tbody = document.createElement("tbody");
			for (var i = 0; i < listColor.length; i++){
				tr = document.createElement("tr");
				for (var x = 0; x < listColor.length; x++) {
					for (var y = 0; y < listColor.length; y++) {
						color = "#"+listColor[i]+listColor[x]+listColor[y];
						td = document.createElement("td");
						td.style.width = "5px";
						td.style.height = "5px";
						td.style.background = color;
						td.color = color;
						td.style.borderColor = "#000";
						td.style.cursor = "pointer";

						if (typeof(callback) == "function") {
							td.onclick = function() {
								callback.apply(this, [this.color]);
							}
						}
						tr.appendChild(td); 
					}
				}
				tbody.appendChild(tr);
			}  
			table.appendChild(tbody);
			var element = document.getElementById(stageID);
			if (element) element.appendChild(table);
			return table;
		}

		window.onload = function() {
    /*
    drawColorPalette("mydiv", function(color) {
      var cor = document.getElementById("cor");
      cor.value = color;
      var paleta_cores = document.getElementById("paleta-cores");
      paleta_cores.style.display = "none";
    }); 
    */

    var tabela = document.querySelector(".tabela-cores");
    var paleta_cores = document.getElementById("paleta-cores");

    div = tabela.querySelectorAll("div");
    var rgb = "";

    for(var i=0;i<div.length; i++) {
    	div[i].addEventListener("click", function(){
    		rgb = this.style.backgroundColor;
    		var cor = document.getElementById("cor");
    		cor.value = rgb2hex(rgb).replace("#","");
    		paleta_cores.style.display = "none";
    	}, false);
    }

}

function rgb2hex(rgb){
	rgb = rgb.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i);
	return (rgb && rgb.length === 4) ? "#" +
	("0" + parseInt(rgb[1],10).toString(16)).slice(-2) +
	("0" + parseInt(rgb[2],10).toString(16)).slice(-2) +
	("0" + parseInt(rgb[3],10).toString(16)).slice(-2) : '';
}

$('button').click(function(){
	var hex = rgb2hex( $('input').val() );
	$('.result').html( hex );
});

function open_cores () {
	var paleta_cores = document.getElementById("paleta-cores");
	if(paleta_cores.style.display == "" || paleta_cores.style.display == "none") {
		paleta_cores.style.display = "block";
	} else {
		paleta_cores.style.display = "none";
	}
}

function close_cores () {
	var paleta_cores = document.getElementById("paleta-cores");
	paleta_cores.style.display = "none";
}

function get_categorias() {
	var categorias = document.getElementById("categorias");
	var idcatalogo = document.getElementById("idcatalogo").value;

	if(categorias.style.display === "none" || categorias.style.display === "") {
		categorias.style.display = "block";
	} else {
		categorias.style.display = "none";
	}

	xhr = new XMLHttpRequest();
	xhr.open('POST', '<?php echo myUrl('tao/modulos_relacionados/') ?>');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhr.onload = function() {
		if (xhr.status === 200) {
			categorias.innerHTML =  xhr.responseText;
		}
		else if (xhr.status !== 200) {
			alert(xhr.status);
		}
	};
	xhr.send(encodeURI("id=" + idcatalogo));
}

function get_categorias_mudar() {
	var categorias_mudar = document.getElementById("categorias-mudar");
	var idcatalogo = document.getElementById("idcatalogo").value;

	if(categorias_mudar.style.display === "none" || categorias_mudar.style.display === "") {
		categorias_mudar.style.display = "block";
	} else {
		categorias_mudar.style.display = "none";
	}

	xhr = new XMLHttpRequest();
	xhr.open('POST', '<?php echo myUrl('tao/modulos_trocar/') ?>');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhr.onload = function() {
		if (xhr.status === 200) {
			categorias_mudar.innerHTML =  xhr.responseText;
		}
		else if (xhr.status !== 200) {
			alert(xhr.status);
		}
	};
	xhr.send(encodeURI("id=" + idcatalogo));
}


function set_relacionado(idmodulo) {

	var idcatalogo = document.getElementById("idcatalogo").value;
	var relacionado = document.getElementById("relacionado" + idmodulo);

	xhr = new XMLHttpRequest();
	xhr.open('POST', '<?php echo myUrl('tao/set_relacionado/') ?>');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhr.onload = function() {
		if (xhr.status === 200) {
			alert(xhr.responseText);
		}
		else if (xhr.status !== 200) {
			alert(xhr.status);
		}
	};
	xhr.send(encodeURI("id=" + idcatalogo + "&idmodulo=" + idmodulo + "&relacionado=" + relacionado));
}


function trocar_modulo(idmodulo) {

	var idcatalogo = document.getElementById("idcatalogo").value;

	xhr = new XMLHttpRequest();
	xhr.open('POST', '<?php echo myUrl('tao/set_modulo_trocar/') ?>');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhr.onload = function() {
		if (xhr.status === 200) {
			alert(xhr.responseText);
		}
		else if (xhr.status !== 200) {
			alert(xhr.status);
		}
	};
	xhr.send(encodeURI("id=" + idcatalogo + "&idmodulo=" + idmodulo));
}

function adicionar_item_modulo(id_modulo, modulo) {

	xhr = new XMLHttpRequest();
	xhr.open('POST', '<?php echo myUrl('tao/adicionar_item_modulo/') ?>');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhr.onload = function() {
		if (xhr.status === 200) {
			info.style.display="block";
			info.innerHTML = xhr.responseText;
		}
		else if (xhr.status !== 200) {
			/* alert(xhr.status); */
		}
	};
	xhr.send(encodeURI('id_modulo=' + id_modulo + "&modulo=" + modulo));
}

function getElem(id, ordem) {

	xhr = new XMLHttpRequest();
	xhr.open('POST', '<?php echo myUrl('tao/ordenar_imagens_catalogo/') ?>');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	info.innerHTML =  "Salvando..."

	xhr.onload = function() {
		if (xhr.status === 200) {
			info.style.display="block";
			info.innerHTML =  xhr.responseText;
		}
		else if (xhr.status !== 200) {
			/* alert(xhr.status); */
		}
	};
	xhr.send(encodeURI('id=' + id + "&ordem=" + ordem));

}


function allowDrop(ev)
{
	ev.preventDefault();
}

function drag(ev)
{
	ev.dataTransfer.setData("Text",ev.target.id);
}

function drop(ev)
{
	var data = ev.dataTransfer.getData("Text");
	ev.target.appendChild(document.getElementById(data));

	var x = ev.target.querySelectorAll("div");

	ev.preventDefault();
}

</script>



<style>
.column.over {
	border: 2px dashed #000;
}
</style>

<script>

	function handleDragStart(e) {
		this.style.opacity = '0.4';  
	}

	function handleDragOver(e) {
		if (e.preventDefault) {
			e.preventDefault(); 
		}

		e.dataTransfer.dropEffect = 'move';  

		return false;
	}

	function handleDragEnter(e) {
		this.classList.add('over');
	}

	function handleDragLeave(e) {
		this.classList.remove('over');  
	}

	var cols = document.querySelectorAll('#cnt-menu .column');
	[].forEach.call(cols, function(col) {
		col.addEventListener('dragstart', handleDragStart, false);
		col.addEventListener('dragenter', handleDragEnter, false);
		col.addEventListener('dragover', handleDragOver, false);
		col.addEventListener('dragleave', handleDragLeave, false);
	});

	function handleDrop(e) {
		if (e.stopPropagation) {
			e.stopPropagation(); 
		}
		return false;
	}

	function handleDragEnd(e) {
		[].forEach.call(cols, function (col) {
			col.classList.remove('over');
		});
	}

	var cols = document.querySelectorAll('#cnt-menu .column');
	[].forEach.call(cols, function(col) {
		col.addEventListener('dragstart', handleDragStart, false);
		col.addEventListener('dragenter', handleDragEnter, false)
		col.addEventListener('dragover', handleDragOver, false);
		col.addEventListener('dragleave', handleDragLeave, false);
		col.addEventListener('drop', handleDrop, false);
		col.addEventListener('dragend', handleDragEnd, false);
	});

	var dragSrcEl = null;

	function handleDragStart(e) {
		this.style.opacity = '0.4';
		dragSrcEl = this;
		e.dataTransfer.effectAllowed = 'move';
		e.dataTransfer.setData('text/html', this.innerHTML);
	}

	function handleDrop(e) {
		if (e.stopPropagation) {
    e.stopPropagation(); // Stops some browsers from redirecting.
}
if (dragSrcEl != this) {
	dragSrcEl.innerHTML = this.innerHTML;
	this.innerHTML = e.dataTransfer.getData('text/html');
}
return false;
}


function getIds() {

	var divs = document.querySelectorAll("#cnt-menu > div");
	for(var i=0; i < divs.length; i++) {
		var ids = divs[i].querySelector("div");
		var id = ids.getAttribute('id');
		id = id.replace("row", "");
		getElem(id, i);
	}

}


var upload_imagem = document.querySelector(".cnt-upload-imagem");

function open_upload_imagem() {
	if(upload_imagem.style.display == "none" || upload_imagem.style.display == "" ) {
		upload_imagem.style.display = "block";
	} else {
		upload_imagem.style.display = "none";
	} 

}

var upload_imagem_descricao = document.querySelector(".cnt-upload-imagem-descricao");

function open_upload_imagem_descricao() {
	if(upload_imagem_descricao.style.display == "none" || upload_imagem_descricao.style.display == "" ) {
		upload_imagem_descricao.style.display = "block";
	} else {
		upload_imagem_descricao.style.display = "none";
	} 

}

function close_upload_imagem() {
	upload_imagem.style.display = "none";
}

function close_upload_imagem_descricao() {
	upload_imagem_descricao.style.display = "none";
}

  function passarImagemDescricao(imagem) {
    var img = "<img src='../../imagens/" + imagem + "' alt='" + imagem + "' title='" + imagem + "' />";
    CKEDITOR.instances.editor1.insertHtml(img);
  }   


</script>


</body>
</html>

