<?php

require_once("app/controllers/core.php");

function _fornecedores() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

	$data["fornecedores"] = "";

	if(isset($_POST["nome"])) {
		$nome = $_POST["nome"];
		$email = $_POST["email"];
		$imagem = "sem-imagem.jpg";
		if(strlen($nome) > 2) {
			$fornecedores = new FornecedoresModel();
			$fornecedores->setNome($nome);
			$fornecedores->setEmail($email);
			$fornecedores->setImagem($imagem);
			if($fornecedores->existeFornecedor($nome)==0){
				$fornecedores->add_fornecedor();
			} else {
				$data["fornecedores"] = "<div id='info2' onclick='close_info2(this)'>Fornecedor já cadastrado !</div>";
			}
		}

	} 

	$data["fornecedores"] .= get_rows();

	View::do_dump(VIEW_PATH. 'tao/fornecedores.php',$data);

}


function get_rows()	{

	$x = "0";
	$y = "0";
	$pg="";

	if(isset($_GET["x"]))
	{
		$x = $_GET["x"];
	}

	if(isset($_GET["y"]))
	{
		$y = $_GET["y"];
	}

	$dr = array();
	$drfornecedores = array();
	$fornecedores = new FornecedoresModel();

	$drfornecedores = $fornecedores->get_rows("100", $x, $y, "nome");

	$r="<table>";
	$r.="<thead>";
	$r.="<tr>";

	$r.="<th class='w50'>";
	$r.="Nome";
	$r.="</th>";

	$r.="<th class='w30'>";
	$r.="Email";
	$r.="</th>";

	$r.="<th class='w15'>";
	$r.="Imagem";
	$r.="</th>";

	$r.="<th class='w5'>";
	$r.="Excluir";
	$r.="</th>";  
	$r.="</thead>";

	$credencial = "";
	$selected = "";

	for ($x=0; $x <= count($drfornecedores); $x++) {

		if(isset($drfornecedores[$x][0])) {

			if($drfornecedores[$x][0] > 0) {

				$r .= "<tr id='row".$drfornecedores[$x][0]."'>";

				$r .= "<td width='50' style='text-align: left'>";
				$r .= "<a href='". myUrl("tao/editar_fornecedor/?idfornecedor=" . $drfornecedores[$x][0	]) ."'>" . $drfornecedores[$x][2] . "</a>";
				$r .= "</td>";

				$r .= "<td width='30'>";
				$r .= "<small style='color: skyblue'>" .$drfornecedores[$x][3] . "</small>";
				$r .= "</td>";

				$r .= "<td width='15'>";
       			$r .= "<img src='" . myUrl("ImageImagens.php?imagem=" . $drfornecedores[$x][4] . "&w=100&h=50&dir=fornecedores") . "'>";
				$r .= "</td>";

				$r .= "<td>";
				$r .= "<a class='trash icon' href='javascript:void(0)' onclick='excluir_fornecedor(".$drfornecedores[$x][0].")'>";
				$r .= "";
				$r .= "</a>";
				$r .= "</td>";

				$r .= "</td>";

				$r .= "</tr>";
			}

			if($drfornecedores[$x][0] == "#p#") {
				$pg = str_replace("page","Fornecedores",$drfornecedores[$x][1]);
				$pg = str_replace("?controle=page&acao=open&id=",myUrl("tao/fornecedores/?x=". $x . "&y=". $y . ""),$drfornecedores[$x][1]);
				$pg = str_replace("&idcategoria=","",$pg);
			}
		}
	}


	$r .= "</table>";


	$r .= "<div>";
	$r .= $pg;
	$r .= "</div>";

	return $r;

}

?>

