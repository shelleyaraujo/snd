<?php

require_once("app/controllers/core.php");

function _carrinho($id="0",$idcategoria="0") { 

	$core=new Core();
	$data = $core->getData($id,$idcategoria);
	$dr = $core->getData(1,0);
	$acao = "";

	if($dr["botao_comprar"] == "1") {
		$data["titulo"] = "Carrinho de Compra";
	}

	if(isset($_POST["remover"])) {
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
				if($_POST["i"] == $_SESSION["cart_item"][$k]["i"])
					unset($_SESSION["cart_item"][$k]);				
				if(empty($_SESSION["cart_item"]))
					unset($_SESSION["cart_item"]);
			}
		}
	}

	if(isset($_POST["quantidade_mais"])) {
		foreach($_SESSION["cart_item"] as $k => $v) {
			if(isset($_SESSION["cart_item"][$k]["i"])) {
				if($_POST["i"] == $_SESSION["cart_item"][$k]["i"]) {
					//echo $_SESSION["cart_item"][$k]["id"];	
					$_SESSION["cart_item"][$k]["quantidade"] += 1;
					break;
				}
			}
		}
	}

	if(isset($_POST["quantidade_menos"])) {
		foreach($_SESSION["cart_item"] as $k => $v) {
			if(isset($_SESSION["cart_item"][$k]["i"])) {
				if($_POST["i"] == $_SESSION["cart_item"][$k]["i"]) {
					//echo $_SESSION["cart_item"][$k]["id"];	
					if($_SESSION["cart_item"][$k]["quantidade"] > 1) {
						$_SESSION["cart_item"][$k]["quantidade"] -= 1;
					}

					break;
				}
			}
		}
	}

	$idcatalogo = 0;
	$quantidade = 1;
	$id = 0;
	$tamanhox ="";
	$corx="";
	$modelox="";
	$moelo = "";

	if(isset($_POST["idcatalogo"])) {
		$idcatalogo = $_POST["idcatalogo"];
	}

	$data["carrinho"] = "";

	if(isset($_POST["acao"])) {

		switch($_POST["acao"]) {
			case "addPedidoItem":


			if(($quantidade > 0)) {

				$Catalogo = new CatalogoModel();
				$Catalogo->setId($idcatalogo); 
				$catalogo = $Catalogo->readItem();
				
				$ja_tem=0;
				$i="";
				$i = gmdate("Y") . "-";
				$i .= gmdate("m") . "-";
				$i .= gmdate("d") . " ";
				$i .= gmdate("H"). ":";
				$i .= gmdate("i") . ":";
				$i .= gmdate("s");
				$id = $catalogo[0];
				$nome=$catalogo[4];
				$peso = $catalogo[13];
				$codigo=$catalogo[3];
				$preco=$catalogo[5];
				$imagem = $Catalogo->readItemMiniaturas();
				$quantidade=$_POST["quantidade"];
				$cor = "";
				if(isset($_POST["cor"])) { $cor = $_POST["cor"]; }
				$modelo = "";
				if(isset($_POST["modelo"])) { $modelo = $_POST["modelo"]; }
				$tamanho="";
				if(isset($_POST["tamanho"])) { $tamanho = $_POST["tamanho"]; }

				$itemArray = array($catalogo[0]=>array(

					'id'=>$id,
					'nome'=>$nome,
					'codigo'=>$codigo,
					'cor'=>$cor,
					'modelo'=>$modelo,
					'quantidade'=>$quantidade,
					'preco'=>$preco,
					'tamanho'=>$tamanho,
					'peso'=>$peso,
					'i'=>$i,
					'imagem'=>$imagem[0][2]));

				if(!empty($_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $k => $v) {

						if($_SESSION["cart_item"][$k]["nome"] == $nome && $_SESSION["cart_item"][$k]["modelo"] == $modelo) {
							$ja_tem=1;
						}
						if($_SESSION["cart_item"][$k]["nome"] == $nome && $_SESSION["cart_item"][$k]["cor"] == $modelo) {
							$ja_tem=1;
						} 
						if($_SESSION["cart_item"][$k]["nome"] == $nome && $_SESSION["cart_item"][$k]["tamanho"] == $modelo) {
							$ja_tem=1;
						} 
					}

					if($ja_tem == 0) {
						$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
					}
					
				} else {
					$_SESSION["cart_item"] = $itemArray;
				}
			}
			break;
			case "limpar":
			unset($_SESSION["cart_item"]);
			break;	
		}
	}

	if(isset($_SESSION["cart_item"])){
		$total_quantidade = 0;
		$total_price = 0;
		$codigo = 0;
		$id = 0;
		$i = 0;
	}

	$data["carrinho"] = "<div class='cnt-cnt-carrinho'>";

	if(isset($_SESSION["cart_item"])) {
		$valortotal = 0;
		foreach ($_SESSION["cart_item"] as $item){
			if(isset($item["id"])) {
				$preco_total = $item["quantidade"]*$item["preco"];

				$data["carrinho"] .= "<div class='cnt-carrinho'>";
				$data["carrinho"] .= "<div>";


				if($item["modelo"] != "") {$modelox = " Modelo: " . $item["modelo"]; }
				if($item["tamanho"] != "") { $tamanhox =  " Tamanho: " . $item["tamanho"]; }
				if($item["tamanho"] != "") { $corx =  " Cor:&nbsp; <span class='span-cor' style='background: #".  $item["cor"] ."'></span>"; }

				$data["carrinho"] .= "<p>";
				$data["carrinho"] .= "<img src='". myUrl("ImageImagens.php?imagem=" .  $item["imagem"] . "&w=80&h=50") ."'>";
				$data["carrinho"] .= $item["nome"] ."<br>";
				$data["carrinho"] .= $modelox .  $tamanhox . "<span>" . $corx . "</span>";
				$data["carrinho"] .= "<br>";
				if($dr["botao_comprar"] == "1") {
					$data["carrinho"] .= "<b>R$ " . number_format($item["preco"]/100,2,",",".") . "</b> cada";
				}
				$data["carrinho"] .= "</p>";
				$data["carrinho"] .= "</div>";

				$data["carrinho"] .= "<div>" . quantidade_menos($item["i"],$item["quantidade"]) . $item["quantidade"] .quantidade_mais($item["i"],$item["quantidade"]) . "</div>";
				##$data["carrinho"] .= "<div>" . $item["quantidade"] . "</div>";

				if($dr["botao_comprar"] == "1") {
					$data["carrinho"] .= "<div><b>" . "R$ " . number_format($preco_total/100,2,",",".") . "</b></div>";
				}
				$data["carrinho"] .= "<div>". remover($item["i"]) ."</div>";
				$data["carrinho"] .= "</div>";
				
				$valortotal = $preco_total + $valortotal;
				$total_quantidade += $item["quantidade"];
				$preco_total = ($item["preco"]*$total_quantidade);

				$tamanhox ="";
				$corx="";
				$modelox="";
			}
		}

		if(isset($preco_total)) {
			$data["carrinho"] .= "<div class='cnt-carrinho'>";
			$data["carrinho"] .= "<div></div>";
			$data["carrinho"] .= "<div>". $total_quantidade ." itens</div>";
			
			if($dr["botao_comprar"] == "1") {
				$data["carrinho"] .= "<div><small>Sub-Total:</small>&nbsp;&nbsp;" .  "<b>R$ " . number_format($valortotal/100,2,",",".")  . "</b></div>";
			}
			
			$data["carrinho"] .= "<div></div>";
			$data["carrinho"] .= "</div>";

			$_SESSION["valor_carrinho"] = "R$ " . number_format($valortotal/100,2,",",".");
			$_SESSION["total_itens_carrinho"] = $total_quantidade;
		}

	}

	if(isset($_SESSION["total_itens_carrinho"]) && isset($_SESSION["cart_item"])){
		if($dr["botao_comprar"] == "1") {
			$data["carrinho"] .= "<div class='cnt-calcular-frete'>";
			$data["carrinho"] .= "<form action='javascript:void(0)' onsubmit='calcular_frete()'>";
			$data["carrinho"] .= "<span>Cep: </span><input type='text' id='cep_destino' value='' maxlength='9' placeholder='ex:13000000'>";
			$data["carrinho"] .= "<button type='submit'>Calcular Frete</button>";
			$data["carrinho"] .= "</form>";
			$data["carrinho"] .= "<div id='valor_do_frete'></div>";
			$data["carrinho"] .= "</div>";
			$data["carrinho"] .= "</div";
		}
	} else {
		$data["carrinho"] .= "<h2>Carrinho Vazio.</h2>";
		$data["carrinho"] .= "<p>Carrinho de compra vazio. Clicque no botão abaixo para ir na loja e escolha os itens que você deseja.</p>";
		$data["carrinho"] .= "<div class='car_botoes'>       
		<a class='button button-primary' href='/'>Ir para a loja</a>
		</div>";
	}

	$data["carrinho"] .= "
	<form  method='POST' action='" . myUrl("pedidos/carrinho") . "' onsubmit='return verifica_tipo_frete()'>
	<input type='hidden' name='acao' value='limpar'>   
	<input type='hidden' name='idcatalogo' value='0'> 
	<div class='car_botoes'>       
	<a class='button button-primary' href='".myUrl("/")  . "'>Continuar Escolhendo </a>
	&nbsp;
	<!--<button class='button button-primary xlimpar-carrinho' type='submit'>Esvaziar</button>
	&nbsp;-->
	<a class='button button-primary' href='".myUrl("usuario/login/")  . "' onclick='verifica_tipo_frete()'>Finalizar</a>
	</div>
	</form>";

	$data["titulo"] = "Lista de Orçamento";

	if($dr["botao_comprar"] == "1") {
		$data["titulo"] = "Carrinho de Compra";
	}

	$tema = $data["config_site"][0]->tema;
	View::do_dump(VIEW_PATH. $tema . '/carrinho_compra.php',$data);
}

function remover($i) {

	$r  = "<form  method='POST' action='" . myUrl('pedidos/carrinho') . "'>";
	$r .= "<input type='hidden' name='remover' value='x'>"; 
	$r .= "<input type='hidden' name='i' value='". $i ."'>"; 
	$r .= "<button class='icone-lixo' type='submit' class='button'>X</button>";
	$r .= "</form>";

	return $r;

}


function quantidade_mais($i,$quant) {

	$r  = "<form id='xadd-item' method='POST' action='" . myUrl('pedidos/carrinho') . "'>";
	$r .= "<input type='hidden' name='quantidade_mais' value=''". $quant ."''>"; 
	$r .= "<input type='hidden' name='i' value='". $i ."'>"; 
	$r .= "<input type='hidden' name='quant' value='". $quant ."'>"; 
	$r .= "<button class='icone-somar' type='submit'>+</button>";
	$r .= "</form>";

	return $r;

}


function quantidade_menos($i,$quant) {

	$r  = "<form  method='POST' action='" . myUrl('pedidos/carrinho') . "'>";
	$r .= "<input type='hidden' name='quantidade_menos' value=''". $quant ."''>"; 
	$r .= "<input type='hidden' name='i' value='". $i ."'>"; 
	$r .= "<input type='hidden' name='quant' value='". $quant ."'>"; 
	$r .= "<button class='icone-subtrair' type='submit'>-</button>";
	$r .= "</form>";

	return $r;

}

?>