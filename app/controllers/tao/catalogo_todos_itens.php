<?php

require_once("app/controllers/core.php");

function _catalogo_todos_itens() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

	$info="";

	if(isset($_GET["idcatalogo"])) {
		$info .= delete_produto_item($_GET["idcatalogo"]);
	}

	$data["catalogo"] = $info . "<br>"; 
	$data["catalogo"] .= get_catalogo();

	View::do_dump(VIEW_PATH. 'tao/catalogo.php',$data);

}

function get_catalogo() {

	$Config = new ConfigModel();
	$config = $Config->readItensXmlConfig();

	$ln=25; 
	$x=0;
	$y=0; 
	$ordem="titulo";

	if(isset($_GET["x"]))
	{
		$x = $_GET["x"];
	}

	if(isset($_GET["y"]))
	{
		$y = $_GET["y"];
	}

	$Catalogo = new XscanModel();
	$drCatalogo = $Catalogo->read_todos_os_produtos($ln, $x, $y, $ordem);

	$r = "<div class='catalogo-todos-itens'>";
	$i = 0;

	foreach ($drCatalogo as $row[]) {

		if ($row[$i][0] == "#p#") {

			$pg = str_replace("page","Catalogo",$row[$i][1]);
			$pg = str_replace("?controle=page&acao=open&id=",myUrl("tao/catalogo_todos_itens/"),$row[$i][1]);
			$pg = str_replace("&idcategoria=","",$pg);
			$pg = str_replace("&x=","/?x=",$pg);
      		//$pg = str_replace("&y =","/",$pg);

		} else if ($row[$i][0] > 0) {   
			$r .= "<div id='row". $row[$i][0] ."'>";  
			$r .= "<div class='w10'>";
			$r .= "<img style='width:50px; float: left; margin-right: 25px;' src='" . myUrl("imagens/imagem.php?&dir=catalogo&w=300&h=225&imagem=" . get_imagens($row[$i][0])) . "'>";
			$r .= "</div>";
			$r .= "<div class='w85'>";
			$r .= "<a href='/tao/catalogo_detalhes/?idcatalogo=". $row[$i][0] ."'>" .$row[$i][4] . " - <span style='color: #e9ecef'>(Categoria: " . get_catalogo_pai($row[$i][2]) . ")</span></a>";
			$r .= "</div>";
			$r .= "<div class='w5'>";
			$r .= "<a class='icone-lixo' href='javascript:void(0)' onclick=exclui_item(". $row[$i][0]  .")></a>";
			$r .= "</div>";
			$r .= "</div>";

		}

		$i++;
	}

	$r .= "</div>";

	$r .= "<div>";
	$r .= $pg;
	$r .= "</div>";



	return $r;
}

function get_catalogo_pai($id) {

	$Modulos = new XscanModel();
	$drModulos = $Modulos->get_catalogo_pai($id);

	$r = "";
	$i = 0;

	$pai = "";
	$x= 0;

	if(isset($drModulos[0])) {
		$pai =$drModulos[1];
		$x = $drModulos[0];
	}

	if($pai == "") {
		$pai = "<span style='color:red'>Sem pai</span>";
	}

	$r .= $pai . "-" . $x;


	return $r;

}

function delete_produto_item($idcatalogo) {

	$Config = new ConfigModel();
	$config = $Config->readItensXmlConfig();

	$Catalogo = new XscanModel();
	$drCatalogo = $Catalogo->delete_produto_item($idcatalogo);

	return $drCatalogo;
}

function get_imagens($id) {

	$Catalogo = new CatalogoModel();
	$Catalogo -> setId($id);
	$drCatalogo = $Catalogo->readItemMiniaturas();

	$r = "";
	$i = 0;

	foreach ($drCatalogo as $row[]) {
		$r .= $row[$i][2];
		$i++;
	}

	return $r;

}

?>
