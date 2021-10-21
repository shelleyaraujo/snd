<?php

require_once("app/controllers/core.php");

function _carrinho_simplificado() { 

	$core=new Core();
	$data = $core->getData(1,0);
	$dr = $core->getData(1,0);
	$acao = "";

	if($dr["botao_comprar"] == "1") {
		$data["titulo"] = "Carrinho de Compra";
	}


	$idcatalogo = 0;
	$quantidade = 1;
	$id = 0;
	$tamanhox ="";
	$corx="";
	$modelox="";
	$moelo = "";
	$valortotal = 0;


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

	$data["carrinho"] .= "<div id='produtos-carrinho'>";

	if(isset($_SESSION["cart_item"])) {
		foreach ($_SESSION["cart_item"] as $item){
			if(isset($item["id"])) {
				$preco_total = $item["quantidade"]*$item["preco"];

				$data["carrinho"] .= "<div class='Xcnt-carrinho'>";
				$data["carrinho"] .= "<div><img src='". myUrl("ImageImagens.php?imagem=" .  $item["imagem"] . "&w=50&h=50") ."'>";
				$data["carrinho"] .= $item["nome"] ."<br>";
				$data["carrinho"] .= "R$ " . number_format($item["preco"]/100,2,",",".") . " <small>cada</small>";
				if($item["quantidade"] > 1) {
					$data["carrinho"] .= "</br>" . $item["quantidade"] . " = R$ " . number_format($preco_total/100,2,",",".");
				}
				$data["carrinho"] .= "</div>";
				$data["carrinho"] .= "<hr>";

				$valortotal = $preco_total + $valortotal;
				$total_quantidade += $item["quantidade"];
				$preco_total = ($item["preco"]*$total_quantidade);
				$tamanhox ="";
				$corx="";
				$modelox="";
			}
		}


	}

	if($valortotal > 0 ) {
			$_SESSION["valor_carrinho"] = "R$ " . number_format($valortotal/100,2,",",".");
			$_SESSION["total_itens_carrinho"] = $total_quantidade;
		echo $data["carrinho"];

	} else {
		$_SESSION["valor_carrinho"] = "R$ 0,00";
		$_SESSION["total_itens_carrinho"] = "0";
		echo "Carrinho Vazio!";
	}

	
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