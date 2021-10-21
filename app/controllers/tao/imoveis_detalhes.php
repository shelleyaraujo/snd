<?php

require_once("app/controllers/core.php");

function _imoveis_detalhes() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

	$idimovel = 0;

	if(isset($_GET["idimovel"])) {
		$idimovel = $_GET["idimovel"];
	}

 	if(isset($_POST["idimovel"])) {
		$idimovel = $_POST["idimovel"];
	}

	if(isset($_POST["update_imovel"])) {
		$idimovel=$_POST["idimovel"];
		$codigo=$_POST["codigo"];
		$perfil=$_POST["perfil"];
		$forma=$_POST["forma"];
		$preco=$_POST["preco"];
		$preco = setDecimal($preco);
		$area=$_POST["area"];
		$dormitorios=$_POST["dormitorios"];
		$suites=$_POST["suites"];
		$bairro=$_POST["bairro"];
		$cidade=$_POST["cidade"];
		$estado=$_POST["estado"];
		$descricao=$_POST["editor1"];
		$descricao = str_replace("'", "´", $descricao); 

		$o_imoveis = new ImoveisModel();
		$o_imoveis->setId($idimovel);
		$o_imoveis->setCodigo($codigo);
		$o_imoveis->setPerfil($perfil);
		$o_imoveis->setForma($forma);
		$o_imoveis->setPreco($preco);
		$o_imoveis->setArea($area);
		$o_imoveis->setDormitorios($dormitorios);
		$o_imoveis->setSuites($suites);
		$o_imoveis->setBairro($bairro);
		$o_imoveis->setCidade($cidade);
		$o_imoveis->setEstado($estado);
		$o_imoveis->setDescricao($descricao);

		$dr_imoveis = $o_imoveis->update_item_imovel();
	}

	/* DETALHES */

	$o_imoveis = new ImoveisModel();
	$dr_imoveis = $o_imoveis->setId($idimovel);
	$dr_imoveis = $o_imoveis->getRow();

	$data["id"] = $dr_imoveis[0]; 
	$data["dma"] = $dr_imoveis[1];    
	$data["codigo"] = $dr_imoveis[3];
	$data["perfil"] = $dr_imoveis[4];
	$data["forma"] = $dr_imoveis[5];
	$data["preco"] = $dr_imoveis[6];
	$data["area"] = $dr_imoveis[7];
	$data["dormitorios"] = $dr_imoveis[8];
	$data["suites"] = $dr_imoveis[9];
	$data["bairro"] = $dr_imoveis[10];
	$data["cidade"] = $dr_imoveis[11];
	$data["estado"] = $dr_imoveis[12];
	$data["descricao"] = $dr_imoveis[15];
	$data["vitrine"] = $dr_imoveis[16];
	$data["ativo"] = $dr_imoveis[17];
	/*IMAGENS*/

	$dr_imoveis = $o_imoveis->setId($idimovel);
	$dr_imoveis = $o_imoveis->readItemImagems();

	$imagem = "semimagem.jpg";

	$imagens = "<div id='cnt-menu'>";
	$i=0;
	foreach ($dr_imoveis as $row[]) {

		if($row[$i][2] != "") { 
			$imagem = trim($row[$i][2]);
		}
		$imagens .= "<div class='column ". $row[$i][2] ."' draggable='true'>";
		$imagens .= "<div id='". $row[$i][0] ."' style='background-image: url(" . myUrl("ImageImagens.php?imagem=" . $imagem . "&w=100&h=225&dir=imoveis") .");'>";
		$imagens .= "<a href='javascript:void(0)' onclick=excluir_imagem('" . $row[$i][0] . "','" . $imagem . "')>X</a>";
		$imagens .= "</div>";
		$imagens .= "</div>";
		$i++;
	}

	$imagens .= "</div>";

	$data["imagens"] = $imagens;

	View::do_dump(VIEW_PATH. 'tao/imoveis_detalhes.php',$data);
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

function getModelos($idimovel) {
	$r="";
	$o_imoveis = new ImoveisModel();
	$o_imoveis->setId($idimovel);
	$dr_imoveis = $o_imoveis->get_Modelos();
	return $dr_imoveis;
}   
function getTamanhos($idimovel) {
	$r="";
	$o_imoveis = new ImoveisModel();
	$o_imoveis->setId($idimovel);
	$dr_imoveis = $o_imoveis->get_Tamanhos();
	return $dr_imoveis;
}   
function getCores($idimovel) {
	$r="";
	$o_imoveis = new ImoveisModel();
	$o_imoveis->setId($idimovel);
	$dr_imoveis = $o_imoveis->get_Cores();
	return $dr_imoveis;
}   
