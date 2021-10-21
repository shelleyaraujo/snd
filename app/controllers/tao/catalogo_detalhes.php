<?php

require_once("app/controllers/core.php");

function _catalogo_detalhes() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

	$idcatalogo = 0;

	if(isset($_GET["idcatalogo"])) {
		$idcatalogo = $_GET["idcatalogo"];
	}

	if(isset($_POST["idcatalogo"])) {
		$idcatalogo = $_POST["idcatalogo"];
	}

	if(isset($_POST["update_catalogo"])) {
		$idcatalogo=$_POST["idcatalogo"];
		$titulo=$_POST["titulo"];
		$descricao_simplificada=$_POST["descricao_simplificada"];
		$preco=$_POST["preco"];
		$preco = setDecimal($preco);
		$precocusto=$_POST["precocusto"];
		$precocusto = setDecimal($precocusto);
		$peso=$_POST["peso"];
		$peso=validNumero($peso);
		$estoque=$_POST["estoque"];
		$estoque=validNumero($estoque);
		$codigo=$_POST["codigo"];
		$idfornecedor=$_POST["idfornecedor"];
		$codigofornecedor=$_POST["codigofornecedor"];
		$descricao=$_POST["editor1"];

		$titulo = str_replace("'", "-", $titulo); 
		$descricao_simplificada = str_replace("'", "-", $descricao_simplificada); 
		$descricao = str_replace("'", "-", $descricao); 

		$o_catalogo = new CatalogoModel();
		$o_catalogo->setId($idcatalogo);
		$o_catalogo->setProduto($titulo);
		$o_catalogo->setDescricaoSimplificada($descricao_simplificada);
		$o_catalogo->setPreco($preco);
		$o_catalogo->setPrecoCusto($precocusto);
		$o_catalogo->setPeso($peso);
		$o_catalogo->setEstoque($estoque);
		$o_catalogo->setCodigo($codigo);
		$o_catalogo->setIdFornecedor($idfornecedor);
		$o_catalogo->setCodigoFornecedor($codigofornecedor);
		$o_catalogo->setDescricao($descricao);

		$dr_catalogo = $o_catalogo->update_item_catalogo();
	}

	/* DETALHES */

	$o_catalogo = new CatalogoModel();
	$dr_catalogo = $o_catalogo->setId($idcatalogo);
	$dr_catalogo = $o_catalogo->getRow();

	$data["id"] = $dr_catalogo["0"]; 
	$data["dma"] = $dr_catalogo["1"];    
	$data["idcategoria"] = $dr_catalogo["2"];    
	$data["codigo"] = $dr_catalogo["4"];
	$data["titulo"] = $dr_catalogo["3"];
	$data["descricao"] = $dr_catalogo["6"];
	$data["descricao_simplificada"] = $dr_catalogo["5"];
	$data["imagem"] = $dr_catalogo["7"];
	$data["ordem"] = $dr_catalogo["8"];
	$data["estoque"] = $dr_catalogo["9"];  
	$data["preco"] = $dr_catalogo["10"];  
	$data["precocusto"] = $dr_catalogo["11"];  
	$data["codigofornecedor"] = $dr_catalogo["12"];  
	$data["idfornecedor"] = $dr_catalogo["13"];  
	$data["cor"] = $dr_catalogo["14"];  
	$data["tamanho"] = $dr_catalogo["15"];  
	$data["peso"] = $dr_catalogo["16"];  
	$data["vitrine"] = $dr_catalogo["17"];  
	$data["ativo"] = $dr_catalogo["18"];  

	/*IMAGENS*/

	$dr_catalogo = $o_catalogo->setId($idcatalogo);
	$dr_catalogo = $o_catalogo->readItemImagems();

	$imagem = "semimagem.jpg";

	$imagens = "<div id='cnt-menu'>";
	$i=0;
	foreach ($dr_catalogo as $row[]) {

		if($row[$i][2] != "") { 
			$imagem = trim($row[$i][2]);
		}
		$imagens .= "<div class='column ". $row[$i][2] ."' draggable='true'>";
		$imagens .= "<div id='row". $row[$i][0] ."' style='background-image: url(" . myUrl("ImageImagens.php?&imagem=" . $imagem . "&w=100&h=225&dir=catalogo") .")'>";
		$imagens .= "<a href='javascript:void(0)' onclick=excluir_imagem('" . $row[$i][0] . "','" . $imagem . "')>X</a>";
		$imagens .= "</div>";
		$imagens .= "</div>";
		$i++;
	}

	$imagens .= "</div>";

	$data["imagens"] = $imagens;

	/* MODELO - TAMANHO - COR */

	$data["modelos"] = getModelos($idcatalogo);
	$data["tamanhos"] = getTamanhos($idcatalogo);
	$data["cores"] = getCores($idcatalogo);
	$data["fornecedores"] = getFornecedores($data["idfornecedor"]);


	$Modulos = new ModulosModel();
	$data['ondeestou_tao'] = "<ul class='onde-estou'><li>Onde Estou: </li>" . $Modulos->onde_estou_tao($data["idcategoria"]) . "</ul>";

	View::do_dump(VIEW_PATH. 'tao/catalogo_detalhes.php',$data);
}

function setDecimal($s) {
	$r=0;

	$s = str_replace(",", "", $s);
	$s = str_replace(".", "", $s);      
	$s = str_replace(" ", "", $s);
	$s = str_replace("-", "", $s);
	$s = str_replace(";", "", $s);
	$s = str_replace(":", "", $s);

	if(is_numeric($s)){
		$r=$s;
	}

    //$decimal = substr($r,-2);
    //$numero = substr($r,0,-2);
    //$r = $numero . "." . $decimal;

	return $r;
}

function validNumero($s) {
	$r=0;
	if(is_numeric($s)){
		$r=$s;
	}
	return $r;
}   

function getModelos($idcatalogo) {
	$r="";
	$o_catalogo = new CatalogoModel();
	$o_catalogo->setId($idcatalogo);
	$dr_catalogo = $o_catalogo->get_Modelos();
	return $dr_catalogo;
}   
function getTamanhos($idcatalogo) {
	$r="";
	$o_catalogo = new CatalogoModel();
	$o_catalogo->setId($idcatalogo);
	$dr_catalogo = $o_catalogo->get_Tamanhos();
	return $dr_catalogo;
}   
function getCores($idcatalogo) {
	$r="";
	$o_catalogo = new CatalogoModel();
	$o_catalogo->setId($idcatalogo);
	$dr_catalogo = $o_catalogo->get_Cores();
	return $dr_catalogo;
} 

function getFornecedores($idfornecedor) {

	$r = "<select name='idfornecedor'>";
	
	$o_fornecedores = new FornecedoresModel();
	$dr_fornecedores = $o_fornecedores->get_fornecedores();

    $i=0;
    $selected = "selected";

	$r .= "<option value='0'>Sem Fornecedor</option>";

	foreach ($dr_fornecedores as $row[]) {

		if($row[$i][0] == $idfornecedor) {
		$r .= "<option ". $selected ." value='" .$row[$i][0] . "'>" .$row[$i][1] . "</option>";
		} else {
		$r .= "<option value='" .$row[$i][0] . "'>" .$row[$i][1] . "</option>";
		}
		$i++;
	}

	$r .= "</select>";


	return $r;
}   




