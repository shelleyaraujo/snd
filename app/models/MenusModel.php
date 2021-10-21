<?php

class MenusModel extends Model {

	function __construct($id='') {
    parent::__construct('uid','users'); //primary key = uid; tablename = users
    $this->rs['uid'] = '';
    $this->rs['username'] = '';
    $this->rs['password'] = '';
    $this->rs['fullname'] = '';
    $this->rs['created_dt'] = '';
    if ($id)
    	$this->retrieve($id);
}

function create() {
	$this->rs['created_dt']=date('Y-m-d H:i:s');
	return parent::create();
}

function menuInstitucional() {

	$st_query = "
	SELECT id, titulo, modulo, idcategoria, idconteudo, ordem, url
	FROM modulos
	WHERE idcategoria=0
	AND menu2 = 1
	ORDER BY ordem";

	$dbh=getdbh();
	$stmt = $dbh->query($st_query);

	$r = "";
	$url = "";

	$modulos = "<ul id='m-inst' class='sm sm-inst'>";
	
	try {

		$i = 0;
		while ($row = $stmt->fetch()) {
			$url = $this->montaUrl($row["modulo"], $row["idconteudo"], $row["id"], $row["url"], $row["titulo"]);

			$modulos .= "<li>";

			$target="";
			if($row["url"] != "") {
				$target="target='_blank'";
			}

			if ($this->numItens($row["id"]) > 0) {
				$modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "' ". $target. ">" . $row["titulo"] . "</a>";
       $modulos .= $this->itens_recursivo($row["id"]); // SE PRECISAR FAZER NOVOS SUBMENUS //
   } else {
   	$modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "' ".$target.">" . $row["titulo"] . "</a>";
   }

   $modulos .= "</li>";
}
} catch (PDOException $e) {

}

$modulos .= "</ul>";

return $modulos;
}

function menuGeral() {

	$st_query = "
	SELECT id, titulo, modulo, idcategoria, idconteudo, ordem, url
	FROM modulos
	WHERE idcategoria=0
	AND menu1 = 1
	AND ar = ''
	ORDER BY ordem";

	$dbh=getdbh();
	$stmt = $dbh->query($st_query);

	$r = "";
	$url = "";

	$modulos = "<ul id='m-cat' class='sm sm-cat'>";

	try {

		$i = 0;
		while ($row = $stmt->fetch()) {
			$url = $this->montaUrl($row["modulo"], $row["idconteudo"], $row["id"], $row["url"], $row["titulo"]);

			$modulos .= "<li>";

			$target="";
			if($row["url"] != "") {
				$target="target='_blank'";
			}

			if ($this->numItens($row["id"]) > 0) {
				$modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "' ". $target. ">" . $row["titulo"] . "</a>";
       $modulos .= $this->itens_recursivo($row["id"]); // SE PRECISAR FAZER NOVOS SUBMENUS //
   } else {
   	$modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "' ".$target.">" . $row["titulo"] . "</a>";
   }

   $modulos .= "</li>";
}
} catch (PDOException $e) {

}

$modulos .= "</ul>";

return $modulos;
}


function menuCatalogo() {

	$Config = new ConfigModel();
	$config = $Config->readItensXmlConfig();
	$ordem_menu_catalogo = $config[0]->ordem_menu_catalogo;

	$st_query = "
	SELECT id, titulo, modulo, idcategoria, idconteudo, ordem, url
	FROM modulos
	WHERE idcategoria=0
	AND ativo = 1
	AND modulo = 'Catalogo'
	OR modulo = 'CatalogoCategorias'
	ORDER BY $ordem_menu_catalogo";

	$dbh=getdbh();
	$stmt = $dbh->query($st_query);

	$r = "";
	$url = "";

	$modulos = "<ul id='m-cat' class='sm sm-cat'>";

	try {

		$i = 0;
		while ($row = $stmt->fetch()) {
			$url = $this->montaUrl($row["modulo"], $row["idconteudo"], $row["id"], $row["url"], $row["titulo"]);

			$modulos .= "<li>";

			if ($this->numItens($row["id"]) > 0) {
				$modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "'>" . $row["titulo"] . "</a>";
       $modulos .= $this->itens_recursivo($row["id"]); // SE PRECISAR FAZER NOVOS SUBMENUS //
   } else {
   	$modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "'>" . $row["titulo"] . "</a>";
   }

   $modulos .= "</li>";
}
} catch (PDOException $e) {

}

$modulos .= "</ul>";

return $modulos;
}


function menuLateral() {

	$st_query = "
	SELECT id, titulo, modulo, idcategoria, idconteudo, ordem, url
	FROM modulos
	WHERE idcategoria=0
	AND ativo = 1
	AND modulo = 'Catalogo'
	OR modulo = 'CatalogoCategorias'
	ORDER BY ordem";

	$dbh=getdbh();
	$stmt = $dbh->query($st_query);

	$r = "";
	$url = "";

	$modulos = "<ul id='mlateral'>";

	try {

		$i = 0;
		while ($row = $stmt->fetch()) {

			$target="";
			if($row["url"] != "") {
				$target="target='_blank'";
			}

			$url = $this->montaUrl($row["modulo"], $row["idconteudo"], $row["id"], $row["url"], $row["titulo"]);

			$modulos .= "<li>";

			if ($this->numItens($row["id"]) > 0) {
				$modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "'>" . $row["titulo"] . "</a>";
       $modulos .= $this->itens_recursivo($row["id"]); // SE PRECISAR FAZER NOVOS SUBMENUS //
   } else {
   	$modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "' ".$target.">" . $row["titulo"] . "</a>";
   }

   $modulos .= "</li>";
}
} catch (PDOException $e) {

}

$modulos .= "</ul>";

return $modulos;
}

function menuEspecial_() {

	$st_query = "
	SELECT id, titulo, modulo, idcategoria, idconteudo, ordem, url
	FROM modulos
	WHERE idcategoria=0
	AND ativo = 1
	AND modulo = 'Catalogo'
	OR modulo = 'CatalogoCategorias'
	ORDER BY ordem";

	$dbh=getdbh();
	$stmt = $dbh->query($st_query);

	$r = "";
	$url = "";

	$modulos = "<ul id='mlateral'>";

	try {

		$i = 0;
		while ($row = $stmt->fetch()) {
			$url = $this->montaUrl($row["modulo"], $row["idconteudo"], $row["id"], $row["url"], $row["titulo"]);

			$modulos .= "<li>";

			if ($this->numItens($row["id"]) > 0) {
				$modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "'>" . $row["titulo"] . "</a>";
       $modulos .= $this->itens_recursivo($row["id"]); // SE PRECISAR FAZER NOVOS SUBMENUS //
   } else {
   	$modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "'>" . $row["titulo"] . "</a>";
   }

   $modulos .= "</li>";
}
} catch (PDOException $e) {

}

$modulos .= "</ul>";

return $modulos;
}


function menuEspecial() {

	$st_query = "
	SELECT id, titulo, modulo, idcategoria, idconteudo, ordem, url
	FROM modulos
	WHERE idcategoria=0
	AND ativo = 1
	ORDER BY ordem";

	$dbh=getdbh();
	$stmt = $dbh->query($st_query);

	$r = "";
	$url = "";

	$modulos = "<ul id='menu_especial'>";

	try {

		$i = 0;
		while ($row = $stmt->fetch()) {
			$url = $this->montaUrl($row["modulo"], $row["idconteudo"], $row["id"], $row["url"], $row["titulo"]);

			$modulos .= "<li>";

			if ($this->numItens($row["id"]) > 0) {
				$modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "'>" . $row["titulo"] . "</a>";
       $modulos .= $this->itens_recursivo($row["id"]); // SE PRECISAR FAZER NOVOS SUBMENUS //
   } else {
   	$modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "'>" . $row["titulo"] . "</a>";
   }

   $modulos .= "</li>";
}
} catch (PDOException $e) {

}


$modulos .= "</ul>";

return $modulos;
}

function menu_rodape() {

	$Config = new ConfigModel();
	$config = $Config->readItensXmlConfig();
	$ordem_menu_catalogo = $config[0]->ordem_menu_catalogo;

	$st_query = "
	SELECT id, titulo, modulo, idcategoria, idconteudo, ordem, url
	FROM modulos
	WHERE idcategoria=0
	AND menu3 = 1
	ORDER BY $ordem_menu_catalogo
	LIMIT 10
	";

	$dbh=getdbh();
	$stmt = $dbh->query($st_query);

	$r = "";
	$url = "";

	$modulos = "<ul id='main-menu-rodape' class='sm sm-rtl sm-vertical sm-rodape'>";

	try {

		$i = 0;
		while ($row = $stmt->fetch()) {
			$url = $this->montaUrl($row["modulo"], $row["idconteudo"], $row["id"], $row["url"], $row["titulo"]);

			$modulos .= "<li>";

			if ($this->numItens($row["id"]) > 0) {
				$modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "'>" . $row["titulo"] . "</a>";
       $modulos .= $this->itens_recursivo($row["id"]); // SE PRECISAR FAZER NOVOS SUBMENUS //
   } else {
   	$modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "'>" . $row["titulo"] . "</a>";
   }

   $modulos .= "</li>";
}
} catch (PDOException $e) {

}

$modulos .= "</ul>";

return $modulos;
}


function menuAr() {

	$st_query = "
	SELECT id, titulo, modulo, idcategoria, idconteudo, ordem, url
	FROM modulos
	WHERE idcategoria=0
	AND ativo = 1
	AND ar <> ''
	ORDER BY ordem";

	$dbh=getdbh();
	$stmt = $dbh->query($st_query);

	$r = "";
	$url = "";

	$modulos = "<ul id='m-inst' class='sm sm-inst'>";
	
	try {

		$i = 0;
		while ($row = $stmt->fetch()) {
			$url = $this->montaUrl($row["modulo"], $row["idconteudo"], $row["id"], $row["url"], $row["titulo"]);

			$modulos .= "<li>";

			$target="";
			if($row["url"] != "") {
				$target="target='_blank'";
			}

			if ($this->numItens($row["id"]) > 0) {
				$modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "' ". $target. ">" . $row["titulo"] . "</a>";
       $modulos .= $this->itens_recursivo($row["id"]); // SE PRECISAR FAZER NOVOS SUBMENUS //
   } else {
   	$modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "' ".$target.">" . $row["titulo"] . "</a>";
   }

   $modulos .= "</li>";
}
} catch (PDOException $e) {

}

$modulos .= "</ul>";

return $modulos;
}


function itens_recursivo($idcategoria) {
	$url = "";
	$dr = array();

	$dr = $this->readItensByIdCategoria($idcategoria, "ordem");

	$modulos = "<ul>";
	for ($i = 0; $i < count($dr); $i++) {
		$url = $this->montaUrl($dr[$i][3], $dr[$i][4], $dr[$i][0], $dr[$i][6], $dr[$i][1]);


		$target="";
		if($dr[$i][6] != "") {
			$target="target='_blank'";
		}


		$modulos .= "<li>";

		$modulos .= "<a class='' href='" . $url . "' title='" . $dr[$i][1] . "'>" . $dr[$i][1] . "</a>";


		if ($this->numItens($dr[$i][0]) > 0) {

            $modulos .= $this->itens_recursivo($dr[$i][0]); // ITENS RECURSIVO //
        }


        $modulos .= "</li>";
    }
    $modulos .= "</ul>";

    $dr [0] = $modulos;

    return $modulos;
}






function readItensByIdCategoria($idcategoria, $ordenar) {

	$Config = new ConfigModel();
	$config = $Config->readItensXmlConfig();
	$ordem_menu_catalogo = $config[0]->ordem_menu_catalogo;

	$st_query = "
	SELECT id, titulo, modulo, idcategoria, idconteudo, ordem, url
	FROM modulos
	WHERE idcategoria=$idcategoria  and ativo = 1
	ORDER BY $ordem_menu_catalogo";

	$dr = array();

	$dbh=getdbh();

	try {
		$stmt = $dbh->query($st_query);

		$i = 0;
		while ($row = $stmt->fetch()) {
			$dr[$i][0] = $row["id"];
			$dr[$i][1] = $row["titulo"];
			$dr[$i][2] = $row["idcategoria"];
			$dr[$i][3] = $row["modulo"];
			$dr[$i][4] = $row["idconteudo"];
			$dr[$i][5] = $row["ordem"];
			$dr[$i][6] = $row["url"];

			$i++;
		}
	} catch (PDOException $e) {

	}

	return $dr;
}

function numItens($idcategoria) {
	$st_query = "
	SELECT * FROM modulos WHERE idcategoria=$idcategoria and ativo=1";

	$dbh=getdbh();

	try {
		$stmt = $dbh->query($st_query);

		$r = array();
		$i = 0;
		while ($row = $stmt->fetch()) {
			$i++;
		}
	} catch (PDOException $e) {

	}
	return $i;
}

public function readItensCategorias($idcategoria,$ordem_registros) {
	$st_query = "
	SELECT id, titulo, modulo, idcategoria, idconteudo, ordem, url
	FROM modulos
	WHERE idcategoria=$idcategoria 
	AND ativo = 1
	ORDER BY ordem";

	$r = "";
	$url = "";
	$i = 1;

	$modulos = "<ul id='sm-categorias' class=''>";

	try {

		$dbh=getdbh();
		$stmt = $dbh->query($st_query);

		while ($row = $stmt->fetch()) {

			$url = $this->montaUrl($row["modulo"], $row["idconteudo"], $row["id"], $row["url"], $row["titulo"]);

			$modulos .= "<li>";

			if ($this->numItens($row["id"]) > 0) {
				$modulos .= "<a class='' href='#'>" . $row["titulo"] . "</a>";
       $modulos .= $this->itens_recursivo($row["id"]); // SE PRECISAR FAZER NOVOS SUBMENUS //
   } else {
   	$modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "'>" . $row["titulo"] . "</a>";
   }

   $modulos .= "</li>";
   $i++;
}
} catch (PDOException $e) {

}

$modulos .= "</ul>";

return $modulos;
}



function montaUrl($c, $id, $ididcategoria, $url, $titulo) {
	$r = "";
	$acao = "index";
	$comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú');
	$semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U');
	
	if ($c == "Index") {
		$acao = "index";
		$c = "main";
	}

	if ($url != "") {
		$r = $url;
	} else {
		$titulo = str_replace($comAcentos, $semAcentos, $titulo);	
		$titulo = strtolower($titulo);
		$r = myUrl(strtolower($c) . "/" . $acao . "/" . $id . "/" . $ididcategoria . "/0/0/"  . str_replace(" ","-", $titulo));
	}

	return $r;
}

/*TAO*/



function read_menutao($credencial) {

	$st_query = "
	SELECT *
	FROM menutao
	WHERE credencial >= $credencial
	AND idcategoria = 0
	ORDER BY ordem
	";

	$r = "";

	$menu  = "<ul>";

	try  {
		$i=0;
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);
		while ($row = $stmt->fetch()) {
			$menu .= "<li class='xxx'>";
			$menu .= "<a class='' href='javascript:void(0)'>". $row["titulo"] ."</a>";    
			$menu .=  $this->readItensMenuTaoNivel1($row["id"], $credencial);  
			$menu .= "</li>";
		}
	}
	catch(PDOException $e)
	{}  

	$menu .= "</ul>";

	return $menu;
}   

public function readItensMenuTaoNivel1($idcategoria,$credencial) {

	$st_query = "
	SELECT *
	FROM menutao
	WHERE idcategoria =$idcategoria
	AND credencial >= $credencial
	ORDER BY ordem
	";

	$r="";
	$menu ="";
	$xxx="0";
	$y="";
	$i=0;

	try
	{

		$dbh=getdbh();
		$stmt = $dbh->query($st_query);
		while ($row = $stmt->fetch()) {
			$y .= "<li>";
			## RETIRAR A PALAVRA zentao/ ##
			$y .= "<a class='' href='/" . $GLOBALS['alias'] . $row["controle"] ."/". $row["acao"] ."'>". $row["titulo"] ."</a>";    
  //$y .= "<a class='' href='/". $row["controle"] ."/". $row["acao"] ."'>". $row["titulo"] ."</a>";    
			$y .= "</li>";
		}

	}
	catch(PDOException $e)
	{}  

	$r = "<ul>";
	$r .= $y;
	$r .= "</ul>";

	if($y=="") {$r = "";}

	return $r;
}   





public function readCredenciais() {

	$st_query = " SELECT id, titulo, credencial, icone, ordem
	FROM menutao 
	WHERE idcategoria = 0
	ORDER BY
	ordem ";

	$r  = "<div class='tabela-flex'>";

	$r .= "<div class='w5'>";
	$r .= "Id";
	$r .= "</div>";

	$r .= "<div class='w5'>";
	$r .= "Icone";
	$r .= "</div>";

	$r .= "<div class='w20'>";
	$r .= "Credencial";
	$r .= "</div>";

	$r .= "<div class='w60'>";
	$r .= "Titulo do Menu";
	$r .= "</div>";

	$r .= "<div class='w10'>";
	$r .= "Ordem";
	$r .= "</div>";

	$r .= "</div>";
	$i=0;


	try
	{
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);
		while ($row = $stmt->fetch()) {

			$r .= "<div class='tabela-flex'>";

			$r .= "<div class='w5'>";
			$r .= $row["id"];   
			$r .= "</div>";

			$r .= "<div class='w25'>";
			$r .=  $this->montaCredenciais($row["id"], $row["credencial"]); 
			$r .= "</div>";

			$r .= "<div class='w60'>";
			$r .=  $row["titulo"];  
			$r .= "</div>";

			$r .= "<div class='w10'>";
			$r .=  $this->montaOrdem($row["id"], $row["ordem"]);  
			$r .= "</div>";

			$r .= "</div>";

			$r .= $this->readCredenciaisNivel1($row["id"]);
		}
	}
	catch(PDOException $e)
	{}  


	return $r;
}   


public function readCredenciaisNivel1($idcategoria) {

	$st_query = " SELECT id, titulo, credencial, icone, ordem 
	FROM menutao 
	WHERE idcategoria = $idcategoria
	ORDER BY
	ordem ";

	$r  = "";


	$i=0;

	try
	{
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);
		while ($row = $stmt->fetch()) {

			$r .= "<div class='tabela-flex' style='background-color: #ebebeb'>";

			$r .= "<div class='w5'>";
			$r .= $row["id"];   
			$r .= "</div>";


			$r .= "<div class='w25'>";
			$r .=  $this->montaCredenciais($row["id"], $row["credencial"]); 
			$r .= "</div>";

			$r .= "<div class='w60'>";
			$r .=  $row["titulo"];  
			$r .= "</div>";

			$r .= "<div class='w10'>";
			$r .=  $this->montaOrdem($row["id"], $row["ordem"]);  
			$r .= "</div>";

			$r .= "</div>";

		}
	}
	catch(PDOException $e)
	{}  


	return $r;
}   


public function get_menu($idcategoria, $ordem) {
	$st_query = "
	SELECT id, titulo, modulo, ordem
	FROM modulos
	WHERE idcategoria=$idcategoria 
	AND modulo <> 'Catalogo'
	AND modulo <> 'CatalogoCategorias'
	ORDER BY $ordem";

	$r = "";
	$url = "";
	$i = 1;
	$menu = "<div id='cnt-menu'>";

	try {
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);

		while ($row = $stmt->fetch()) {
			$menu .= "<div class='column' draggable='true'>";
			$menu .= "<div id='". $row["id"] ."' >";

			$menu .= $row["titulo"];

			$total = $this->get_total($row['id']);
			if($total > 0) {
				$menu .= "<a href='". myUrl("tao/menu/?idcat=".$row["id"] ."") ."'>". $total ."</a>";
			}
			$menu .= "</div>";
			$menu .= "</div>";
			$i++;
		}
	} catch (PDOException $e) {

	}

	$menu .= "</div>";

	return $menu;
}


public function get_menu_catalogo($idcategoria, $ordem) {
	$st_query = "
	SELECT id, titulo, modulo, ordem
	FROM modulos
	WHERE idcategoria = $idcategoria 
	AND modulo = 'Catalogo'
	OR modulo = 'CatalogoCategorias'
	ORDER BY $ordem";

	$r = "";
	$url = "";
	$i = 1;
	$menu = "<div id='cnt-menu'>";

	try {
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);

		while ($row = $stmt->fetch()) {
			$menu .= "<div class='column' draggable='true'>";
			$menu .= "<div id='". $row["id"] ."' >";

			$menu .= "<p>" . $row["titulo"] . "</p>";

			$total = $this->get_total($row['id']);
			if($total > 0) {
				$menu .= "<a href='". myUrl("tao/menu/?modulo=Catalogo&idcat=".$row["id"] ."") ."'>". $total ."</a>";
			}
			$menu .= "</div>";
			$menu .= "</div>";
			$i++;
		}
	} catch (PDOException $e) {

	}

	$menu .= "</div>";

	return $menu;
}


public function get_total($idcategoria) {

	$dbh=getdbh();
	$totallinhas = current($dbh->query("select count(*) from modulos WHERE idcategoria=".$idcategoria)->fetch());

	return $totallinhas;
}


public function get_menu_mudar_categoria($idcategoria, $modulo, $ordem) {

	switch ($modulo) {
		case 'Catalogo':
		$st_query = "
		SELECT id, titulo, modulo, ordem
		FROM modulos
		WHERE idcategoria = 0 
		AND modulo = 'CatalogoCategorias'
		OR modulo = 'Catalogo'
		ORDER BY ordem AND idcategoria";
		break;

		case 'Todos':
		$st_query = "
		SELECT id, titulo, modulo, ordem
		FROM modulos
		WHERE idcategoria=0
		AND ativo = 1
		ORDER BY ordem AND idcategoria"; 
		break;

		default:
		$st_query = "
		SELECT id, titulo, modulo, ordem
		FROM modulos
		WHERE idcategoria=0
		AND ativo = 1
		AND modulo <> 'Catalogo'
		AND modulo <> 'CatalogoCategorias'
		ORDER BY ordem AND idcategoria";    
		break;
	}


	$r = "";
	$url = "";
	$i = 1;

	$menu = "<ul class='ul-main'>";

	try {
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);

		while ($row = $stmt->fetch()) {
			$menu .= "<li>";
			$menu .= "<input type='radio'  onclick=setOrigem(". $row["id"] . ")>";
			$menu .= $row["titulo"];
			$menu .= $this->c1($row["id"]);
			$menu .= "</li>";
			$i++;
		}
	} catch (PDOException $e) {

	}

	$menu .= "</ul>";

	return $menu;
}

public function c1($idcategoria) {
	$st_query = "
	SELECT id, titulo, modulo, ordem
	FROM modulos
	WHERE idcategoria = $idcategoria
	ORDER BY ordem AND idcategoria";

	$r = "";
	$url = "";
	$i = 1;

	$menu = "<ul>";

	try {
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);

		while ($row = $stmt->fetch()) {
			$menu .= "<li>";
			$menu .= "<input type='radio' onclick=setOrigem(". $row["id"] . ")>";
			$menu .= $row["titulo"];
			$menu .= $this->c2($row["id"]);
			$menu .= "</li>";
			$i++;
		}
	} catch (PDOException $e) {

	}

	$menu .= "</ul>";

	return $menu;

}



public function c2($idcategoria) {
	$st_query = "
	SELECT id, titulo, modulo, ordem
	FROM modulos
	WHERE idcategoria = $idcategoria
	ORDER BY ordem AND idcategoria";

	$r = "";
	$url = "";
	$i = 1;

	$menu = "<ul>";

	try {
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);

		while ($row = $stmt->fetch()) {
			$menu .= "<li>";
			$menu .= "<input type='radio'  onclick=setOrigem(". $row["id"] . ")>";
			$menu .= $row["titulo"];
			$menu .= $this->c3($row["id"]);
			$menu .= "</li>";
			$i++;
		}
	} catch (PDOException $e) {

	}

	$menu .= "</ul>";

	return $menu;

}


public function c3($idcategoria) {
	$st_query = "
	SELECT id, titulo, modulo, ordem
	FROM modulos
	WHERE idcategoria = $idcategoria
	ORDER BY ordem AND idcategoria";

	$r = "";
	$url = "";
	$i = 1;

	$menu = "<ul>";

	try {
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);

		while ($row = $stmt->fetch()) {
			$menu .= "<li>";
			$menu .= "<input type='radio'  onclick=setOrigem(". $row["id"] . ")>";
			$menu .= $row["titulo"];
			$menu .= $this->c4($row["id"]);
			$menu .= "</li>";
			$i++;
		}
	} catch (PDOException $e) {

	}

	$menu .= "</ul>";

	return $menu;

}



public function c4($idcategoria) {
	$st_query = "
	SELECT id, titulo, modulo, ordem
	FROM modulos
	WHERE idcategoria = $idcategoria
	ORDER BY ordem AND idcategoria";

	$r = "";
	$url = "";
	$i = 1;

	$menu = "<ul>";

	try {
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);

		while ($row = $stmt->fetch()) {
			$menu .= "<li>";
			$menu .= "<input type='radio'  onclick=setOrigem(". $row["id"] . ")>";
			$menu .= $row["titulo"];
			$menu .= $this->c5($row["id"]);
			$menu .= "</li>";
			$i++;
		}
	} catch (PDOException $e) {

	}

	$menu .= "</ul>";

	return $menu;

}


public function c5($idcategoria) {
	$st_query = "
	SELECT id, titulo, modulo, ordem
	FROM modulos
	WHERE idcategoria = $idcategoria
	ORDER BY ordem AND idcategoria";

	$r = "";
	$url = "";
	$i = 1;

	$menu = "<ul>";

	try {
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);

		while ($row = $stmt->fetch()) {
			$menu .= "<li>";
			$menu .= "<input type='radio'  onclick=setOrigem(". $row["id"] . ")>";
			$menu .= $row["titulo"];
			$menu .= $this->c6($row["id"]);
			$menu .= "</li>";
			$i++;
		}
	} catch (PDOException $e) {

	}

	$menu .= "</ul>";

	return $menu;

}



public function c6($idcategoria) {
	$st_query = "
	SELECT id, titulo, modulo, ordem
	FROM modulos
	WHERE idcategoria = $idcategoria
	ORDER BY ordem AND idcategoria";

	$r = "";
	$url = "";
	$i = 1;

	$menu = "<ul>";

	try {
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);

		while ($row = $stmt->fetch()) {
			$menu .= "<li>";
			$menu .= "<input type='radio'  onclick=setOrigem(". $row["id"] . ")>";
			$menu .= $row["titulo"];
    //$menu .= $this->c2($row["id"]);
			$menu .= "</li>";
			$i++;
		}
	} catch (PDOException $e) {

	}

	$menu .= "</ul>";

	return $menu;

}

public function get_menu_mudar_categoria2($idcategoria, $modulo, $ordem) {

	switch ($modulo) {
		case 'Catalogo':
		$st_query = "
		SELECT id, titulo, modulo, ordem
		FROM modulos
		WHERE idcategoria = 0 
		AND modulo = 'CatalogoCategorias'
		OR modulo = 'Catalogo'
		ORDER BY ordem AND idcategoria";
		break;

		case 'Todos':
		$st_query = "
		SELECT id, titulo, modulo, ordem
		FROM modulos
		WHERE idcategoria=0
		AND ativo = 1
		ORDER BY ordem AND idcategoria"; 
		break;

		default:
		$st_query = "
		SELECT id, titulo, modulo, ordem
		FROM modulos
		WHERE idcategoria=0
		AND ativo = 1
		AND modulo <> 'Catalogo'
		AND modulo <> 'CatalogoCategorias'
		ORDER BY ordem AND idcategoria";    
		break;
	}

	$r = "";
	$url = "";
	$i = 1;

	$menu = "<ul class='ul-main'>";

	try {
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);

		while ($row = $stmt->fetch()) {
			$menu .= "<li>";
			$menu .= "<input type='radio' name='cat' onclick=update_item(". $row["id"] .")>" . $row["titulo"];
			$menu .= $this->cc1($row["id"]);
			$menu .= "</li>";
			$i++;
		}
	} catch (PDOException $e) {

	}

	$menu .= "</ul>";

	return $menu;
}

public function cc1($idcategoria) {
	$st_query = "
	SELECT id, titulo, modulo, ordem
	FROM modulos
	WHERE idcategoria =$idcategoria 
	ORDER BY ordem AND idcategoria";

	$r = "";
	$url = "";
	$i = 1;

	$menu = "<ul>";

	try {
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);

		while ($row = $stmt->fetch()) {
			$menu .= "<li>";
			$menu .= "<input type='radio' name='cat' onclick=update_item(". $row["id"] .")>" . $row["titulo"];
			$menu .= $this->cc2($row["id"]);
			$menu .= "</li>";
			$i++;
		}
	} catch (PDOException $e) {

	}

	$menu .= "</ul>";

	return $menu;
}




public function cc2($idcategoria) {
	$st_query = "
	SELECT id, titulo, modulo, ordem
	FROM modulos
	WHERE idcategoria =$idcategoria 
	ORDER BY ordem AND idcategoria";

	$r = "";
	$url = "";
	$i = 1;

	$menu = "<ul>";

	try {
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);

		while ($row = $stmt->fetch()) {
			$menu .= "<li>";
			$menu .= "<input type='radio' name='cat' onclick=update_item(". $row["id"] .")>" . $row["titulo"];
			$menu .= $this->cc3($row["id"]);
			$menu .= "</li>";
			$i++;
		}
	} catch (PDOException $e) {

	}

	$menu .= "</ul>";

	return $menu;
}



public function cc3($idcategoria) {
	$st_query = "
	SELECT id, titulo, modulo, ordem
	FROM modulos
	WHERE idcategoria =$idcategoria 
	ORDER BY ordem AND idcategoria";

	$r = "";
	$url = "";
	$i = 1;

	$menu = "<ul>";

	try {
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);

		while ($row = $stmt->fetch()) {
			$menu .= "<li>";
			$menu .= "<input type='radio' name='cat' onclick=update_item(". $row["id"] .")>" . $row["titulo"];
			$menu .= $this->cc4($row["id"]);
			$menu .= "</li>";
			$i++;
		}
	} catch (PDOException $e) {

	}

	$menu .= "</ul>";

	return $menu;
}


public function cc4($idcategoria) {
	$st_query = "
	SELECT id, titulo, modulo, ordem
	FROM modulos
	WHERE idcategoria =$idcategoria 
	ORDER BY ordem AND idcategoria";

	$r = "";
	$url = "";
	$i = 1;

	$menu = "<ul>";

	try {
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);

		while ($row = $stmt->fetch()) {
			$menu .= "<li>";
			$menu .= "<input type='radio' name='cat' onclick=update_item(". $row["id"] .")>" . $row["titulo"];
			$menu .= $this->cc5($row["id"]);
			$menu .= "</li>";
			$i++;
		}
	} catch (PDOException $e) {

	}

	$menu .= "</ul>";

	return $menu;
}




public function cc5($idcategoria) {
	$st_query = "
	SELECT id, titulo, modulo, ordem
	FROM modulos
	WHERE idcategoria =$idcategoria 
	ORDER BY ordem AND idcategoria";

	$r = "";
	$url = "";
	$i = 1;

	$menu = "<ul>";

	try {
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);

		while ($row = $stmt->fetch()) {
			$menu .= "<li>";
			$menu .= "<input type='radio' name='cat' onclick=update_item(". $row["id"] .")>" . $row["titulo"];
			$menu .= $this->cc6($row["id"]);
			$menu .= "</li>";
			$i++;
		}
	} catch (PDOException $e) {

	}

	$menu .= "</ul>";

	return $menu;
}



public function cc6($idcategoria) {
	$st_query = "
	SELECT id, titulo, modulo, ordem
	FROM modulos
	WHERE idcategoria =$idcategoria 
	ORDER BY ordem AND idcategoria";

	$r = "";
	$url = "";
	$i = 1;

	$menu = "<ul>";

	try {
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);

		while ($row = $stmt->fetch()) {
			$menu .= "<li>";
			$menu .= "<input type='radio' name='cat' onclick=update_item(". $row["id"] .")>" . $row["titulo"];
			$menu .= $this->cc7($row["id"]);
			$menu .= "</li>";
			$i++;
		}
	} catch (PDOException $e) {

	}

	$menu .= "</ul>";

	return $menu;
}



public function cc7($idcategoria) {
	$st_query = "
	SELECT id, titulo, modulo, ordem
	FROM modulos
	WHERE idcategoria =$idcategoria 
	ORDER BY ordem AND idcategoria";

	$r = "";
	$url = "";
	$i = 1;

	$menu = "<ul>";

	try {
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);

		while ($row = $stmt->fetch()) {
			$menu .= "<li>";
			$menu .= "<input type='radio' name='cat' onclick=update_item(". $row["id"] .")>" . $row["titulo"];
    //$menu .= $this->cc8($row["id"]);
			$menu .= "</li>";
			$i++;
		}
	} catch (PDOException $e) {

	}

	$menu .= "</ul>";

	return $menu;
}









public function update_ordem_menu($id,$ordem)
{
	$st_query = "
	UPDATE modulos
	SET
	ordem = $ordem
	WHERE
	id = $id
	";  

	$dbh=getdbh();
	$stmt = $dbh->prepare($st_query);
	try
	{
		$stmt->execute();
	}
	catch (PDOException $e)
	{
		throw $e;
	}

	return false;
}


public function update_item($id,$idcategoria)
{
	$st_query = "
	UPDATE modulos
	SET
	idcategoria = $idcategoria
	WHERE
	id = $id
	";  

	$dbh=getdbh();
	$stmt = $dbh->prepare($st_query);
	try
	{
		$stmt->execute();
	}
	catch (PDOException $e)
	{
		throw $e;
	}

	return false;
}


public function get_menu_itens($modulo, $idcategoria, $ordem) {

	switch ($modulo) {
		case 'Catalogo':
		$tipo="Produtos";
		break;
		case 'Blog':
		$tipo="Posts";
		break;
		case 'Galeria':
		$tipo="Imagens";
		break;
		default:
		$tipo="Itens";
	}


	$st_query = "
	SELECT id, dma, titulo, modulo, ordem, idconteudo, ativo, menu1, menu2, menu3
	FROM modulos
	WHERE idcategoria = " . $idcategoria . "
	AND modulo = '$modulo'
	ORDER BY $ordem";

	$r = "";
	$url = "";
	$i = 1;
	$checkedm1="";
	$checkedm2="";
	$checkedm3="";

	$menu = "<ul class='cnt-cnt-menu'>";

	$menu .= "<div class='w100' style='padding: 20px 0'>Módulo: " . $tipo ."</div>";


	try {
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);

		$total = 0;

		while ($row = $stmt->fetch()) {

			if($row["menu1"] == 1) {$checkedm1="checked";}
			if($row["menu2"] == 1) {$checkedm2="checked";}
			if($row["menu3"] == 1) {$checkedm3="checked";}

			$total = $this->get_total($row["id"]);

			$menu .= "<li id='". $row["id"] ."'>";
			$menu .= "<div>";
			$menu .= "<div class='cnt-edicao' >";
			$menu .= "<div>";
			$menu .= "<a href='javascript:void(0)' onclick=open_itens_categoria('". $row["modulo"] ."','". $row["id"] ."') >";

			$menu .= $row["titulo"];

			if($total > 0) {
				$menu .= "<span class='mais-filhos'> " . $total . "</span><span class='loader' id='loader". $row["id"] ."'></span>";
			}

			$menu .= "</a>";
			$menu .= "</div>";

			$menu .= "<div>";
			$menu .= "<a href=". myUrl('tao/itens_modulo/?modulo=' . str_replace("Categorias","",$row["modulo"]) .  '&idmodulo=' . $row["id"]) ." ><span class='itens'>". $this->getTotal($row["modulo"],$row["id"]) ."</span></a>";
			$menu .= "</div>";

			$menu .= "<div>";
			$menu .= "<a href='javascript:void(0)' onclick=mudar_categoria('". $row["id"] ."')>Categoria</a>";
			$menu .= "</div>";

			$menu .= "<div>";
			$menu .= "<a href=". myUrl('tao/editar_modulo/?idconteudo=' . $row["id"]) ." ><span class='icone_lapis'></span></a>";
			$menu .= "</div>";

			$menu .= "<div style='position:relative;cursor:pointer'>";

			$menu .= "<a href='javascript: void(0)' onclick=abreMenus('menus".$row["id"]."')>";
			$menu .= "Menu";
			$menu .= "</a>";

			$menu .= "<div id='menus". $row["id"] ."' class='ativar-menus'>";
			$menu .= "<a href='javascript: void(0)' onclick=fechaMenus('menus".$row["id"]."')>X</a>";
			$menu .= "<label>Menu Principal";
			$menu .= "<input id='m1".$row["id"]."' type='checkbox' ".$checkedm1."  onclick=setMenu('1','". $row["id"]  ."')>";
			$menu .= "</label>";
			$menu .= "<label>Menu Secundário";
			$menu .= "<input id='m2".$row["id"]."' type='checkbox' ".$checkedm2." onclick=setMenu('2','". $row["id"]  ."')>";
			$menu .= "</label>";
			$menu .= "<label>Menu Rodapé";
			$menu .= "<input id='m3".$row["id"]."' type='checkbox' ".$checkedm3." onclick=setMenu('3','". $row["id"]  ."')>";
			$menu .= "</label>";
			$menu .= "</div>";

			$menu .= "</div>";

			$menu .= "<div class='w20'>";
			$menu .= "<a href='javascript:void(0)' onclick=excluir_moodulo('". $row["id"] ."')><span class='icone-lixo'>Excluir</span></a>";
			$menu .= "</div>";

			$menu .= "</div>";

			$menu .= "<div id='itens". $row["id"] ."'>";
			$menu .= "</div>";
			$menu .= "</div>";
			$menu .= "</li>";

				$checkedm1="";
	$checkedm2="";
	$checkedm3="";


			$i++;
		}
	} catch (PDOException $e) {

	}

	$menu .= "</ul>";

	return $menu;
}

public function get_menu_itens2($modulo, $idcategoria, $ordem) {
	$st_query = "
	SELECT id, dma, titulo, modulo, ordem, idconteudo, ativo
	FROM modulos
	WHERE idcategoria=$idcategoria
	ORDER BY $ordem";

	$r = "";
	$url = "";
	$i = 1;
	$ativo="0";

	$menu = "<ul class='cnt-cnt-menu'>";


  /*
  $menu .= "<li>";
  $menu .= "<div class='cnt-edicao gravata'>";
  $menu .= "<div>Titulo</div>";
  $menu .= "<div>Itens</div>";
  $menu .= "<div>Editar</div>";
  $menu .= "<div>Visivel</div>";
  $menu .= "<div>X</div>";  
  $menu .= "</div>";
  $menu .= "</li>";
  */

  try {
  	$dbh=getdbh();
  	$stmt = $dbh->query($st_query);

  	$total = 0;

  	while ($row = $stmt->fetch()) {

  		$checked="";

  		if($row["ativo"] == 1) {
  			$checked="checked";
  		}

  		$total = $this->get_total($row["id"]);

  		$menu .= "<li id='". $row["id"] ."'>";
  		$menu .= "<div>";
  		$menu .= "<div class='cnt-edicao' >";
  		$menu .= "<div>";
  		$menu .= "<a href='javascript:void(0)' onclick=open_itens_categoria('". $row["modulo"] ."','". $row["id"] ."') >";

  		$menu .= $row["titulo"];

  		if($total > 0) {
  			$menu .= "<span class='mais-filhos'> " . $total . "</span><span class='loader' id='loader". $row["id"] ."'></span>";
  		}

  		$menu .= "</a>";
  		$menu .= "</div>";

  		$menu .= "<div>";
  		$menu .= "<a href=". myUrl('tao/itens_modulo/?modulo=' . str_replace("Categorias","",$row["modulo"]) .  '&idmodulo=' . $row["id"]) ." ><span class='itens'>". $this->getTotal($row["modulo"],$row["id"]) ."</span></a>";
  		$menu .= "</div>";

  		$menu .= "<div>";
  		$menu .= "<a href='javascript:void(0)' onclick=mudar_categoria('". $row["id"] ."')>Categoria</a>";
  		$menu .= "</div>";

  		$menu .= "<div>";
  		$menu .= "<a href=". myUrl('tao/editar_modulo/?idconteudo=' . $row["id"]) ." ><span class='icone_lapis'></span></a>";
  		$menu .= "</div>";

  		$menu .= "<div>";
  		$menu .= "<a href='javascript: void(0)'>";
  		$menu .= "<input id='checkbox".$row["id"]."' type='checkbox' $checked  value='". $ativo ."' onclick=setAtivo('". $row["id"]  ."')>";
  		$menu .= "</a>";
  		$menu .= "</div>";

			$menu .= "<div class='w20'>";
  		$menu .= "<a href='javascript:void(0)' onclick=excluir_moodulo('". $row["id"] ."')><span class='trash icon'>Excluir</span></a>";
  		$menu .= "</div>";

  		$menu .= "</div>";

  		$menu .= "<div id='itens". $row["id"] ."'>";
  		$menu .= "</div>";
  		$menu .= "</div>";
  		$menu .= "</li>";
  		$i++;
  	}
  } catch (PDOException $e) {

  }

  $menu .= "</ul>";

  return $menu;
}

public function get_menu_itens_todos($idcategoria, $ordem) {
	$st_query = "
	SELECT id, dma, titulo, modulo, ordem, idconteudo, ativo
	FROM modulos
	ORDER BY titulo";

	$r = "";
	$url = "";
	$i = 1;
	$ativo="0";

	$menu = "<ul class='cnt-cnt-menu'>";


	$menu .= "<li>";
	$menu .= "<div class='cnt-edicao gravata'>";
	$menu .= "<div>Titulo</div>";
	$menu .= "<div>Itens</div>";
	$menu .= "<div>Categorias</div>";
	$menu .= "<div>Editar</div>";
	$menu .= "<div>Visivel</div>";
	$menu .= "<div>X</div>";  
	$menu .= "</div>";
	$menu .= "</li>";

	try {
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);

		$total = 0;

		while ($row = $stmt->fetch()) {

			$checked="";

			if($row["ativo"] == 1) {
				$checked="checked";
			}

			$total = $this->get_total($row["id"]);

			$menu .= "<li id='". $row["id"] ."'>";
			$menu .= "<div>";
			$menu .= "<div class='cnt-edicao' >";
			$menu .= "<div>";
			$menu .= "<a href='javascript:void(0)' onclick=open_itens_categoria('". $row["modulo"] ."','". $row["id"] ."') >";

			$menu .= $row["titulo"];

			if($total > 0) {
    //  $menu .= "<span class='mais-filhos'> " . $total . "</span>";
			}

			$menu .= "</a>";
			$menu .= "</div>";

			$menu .= "<div>";
			$menu .= "<a href=". myUrl('tao/itens_modulo/?modulo=' . str_replace("Categorias","",$row["modulo"]) .  '&idmodulo=' . $row["id"]) ." ><span class='itens'>". $this->getTotal($row["modulo"],$row["id"]) ."</span></a>";
			$menu .= "</div>";

			$menu .= "<div>";
			$menu .= "<a href='javascript:void(0)' onclick=mudar_categoria('". $row["id"] ."')>Categoria</a>";
			$menu .= "</div>";

			$menu .= "<div>";
			$menu .= "<a href=". myUrl('tao/editar_modulo/?idconteudo=' . $row["idconteudo"]) ." ><span class='icone_lapis'></span></a>";
			$menu .= "</div>";

			$menu .= "<div>";
			$menu .= "<a href='javascript: void(0)'>";
			$menu .= "<input id='checkbox".$row["id"]."' type='checkbox' $checked  value='". $ativo ."' onclick=setAtivo('". $row["id"]  ."')>";
			$menu .= "</a>";
			$menu .= "</div>";

			$menu .= "<div class='w20'>";
			$menu .= "x<a href='javascript:void(0)' onclick=excluir_moodulo('". $row["id"] ."')><span class='trash icon'>Excluir</span></a>";
			$menu .= "</div>";

			$menu .= "</div>";

			$menu .= "<div id='itens". $row["id"] ."'>";
			$menu .= "</div>";
			$menu .= "</div>";
			$menu .= "</li>";
			$i++;
		}
	} catch (PDOException $e) {

	}

	$menu .= "</ul>";

	return $menu;
}

public function get_menu_itens_busca($busca,$modulo) {

	if($modulo == "") {
		$st_query = "
		SELECT id, dma, titulo, modulo, ordem, idconteudo, ativo
		FROM modulos
		WHERE titulo LIKE '%" . $busca . "%'
		ORDER BY 'titulo' ";
	} else {
		$st_query = "
		SELECT id, dma, titulo, modulo, ordem, idconteudo, ativo
		FROM modulos
		WHERE titulo LIKE '%" . $busca . "%'
		AND modulo = '". $modulo ."'
		ORDER BY 'titulo' ";
	}

	$r = "";
	$url = "";
	$i = 1;
	$ativo="0";

	$menu = "<ul class='cnt-cnt-menu'>";

	$menu .= "<li>";
	$menu .= "<div class='cnt-edicao gravata'>";
	$menu .= "<div>Titulo</div>";
	$menu .= "<div>Itens</div>";
	$menu .= "<div>Categorias</div>";
	$menu .= "<div>Editar</div>";
	$menu .= "<div>Visivel</div>";
	$menu .= "<div>X</div>";  
	$menu .= "</div>";
	$menu .= "</li>";

	try {
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);

		$total = 0;

		while ($row = $stmt->fetch()) {

			$checked="";

			if($row["ativo"] == 1) {
				$checked="checked";
			}

			$total = $this->get_total($row["id"]);

			$menu .= "<li id='". $row["id"] ."'>";
			$menu .= "<div>";
			$menu .= "<div class='cnt-edicao' >";
			$menu .= "<div>";
			$menu .= "<a href='javascript:void(0)' onclick=open_itens_categoria('". $row["modulo"] ."','". $row["id"] ."') >";

			$menu .= $row["titulo"];

			if($total > 0) {
				$menu .= "<span class='mais-filhos'> " . $total . "</span>";
			}

			$menu .= "</a>";
			$menu .= "</div>";

			$menu .= "<div>";
			$menu .= "<a href=". myUrl('tao/itens_modulo/?modulo=' . str_replace("Categorias","",$row["modulo"]) .  '&idmodulo=' . $row["id"]) ." ><span class='itens'>". $this->getTotal($row["modulo"],$row["id"]) ."</span></a>";
			$menu .= "</div>";

			$menu .= "<div>";
			$menu .= "<a href='javascript:void(0)' onclick=mudar_categoria('". $row["id"] ."')>Categoria</a>";
			$menu .= "</div>";

			$menu .= "<div>";
			$menu .= "<a href=". myUrl('tao/editar_modulo/?idconteudo=' . $row["idconteudo"]) ." ><span class='icone_lapis'></span></a>";
			$menu .= "</div>";

			$menu .= "<div>";
			$menu .= "<a href='javascript: void(0)'>";
			$menu .= "<input id='checkbox".$row["id"]."' type='checkbox' $checked  value='". $ativo ."' onclick=setAtivo('". $row["id"]  ."')>";
			$menu .= "</a>";
			$menu .= "</div>";

			$menu .= "<div class='w20'>";
			$menu .= "<a href='javascript:void(0)' onclick=excluir_moodulo('". $row["id"] ."')><span class='trash icon'>Excluir</span></a>";
			$menu .= "</div>";

			$menu .= "</div>";

			$menu .= "<div id='itens". $row["id"] ."'>";
			$menu .= "</div>";
			$menu .= "</div>";
			$menu .= "</li>";
			$i++;
		}
	} catch (PDOException $e) {

	}

	$menu .= "</ul>";

	return $menu;
}

function getTotal($modulo,$idcategoria) {

	switch ($modulo) {
		case 'Blog':
		$o_modulo = new BlogModel();
		break;
		case 'Catalogo':
		$o_modulo = new CatalogoModel();
		break;
		case 'Galeria':
		$o_modulo = new GaleriaModel();
		break;
		case 'Downloads':
		$o_modulo = new DownloadsModel();
		break;
		case 'Imoveis':
		$o_modulo = new ImoveisModel();
		break;
		case 'Institucionalar':
		$o_modulo = new InstitucionalArModel();
		break;

		case 'Landingpage':
		$o_modulo = new LandingpageModel();
		break;		
		default:
		$o_modulo = new InstitucionalModel();
		break;
	}

	$total = $o_modulo->getTotalRegistrosCategoria($idcategoria);

	return $total;
}


public function montaCredenciais($id,$credencial) {

	$r="";

	$dr = array();
	$dr[0][0] = "-1";
	$dr[0][1] = "0";
	$dr[0][2] = "1";
	$dr[0][3] = "2";

	$dr[1][0] = "Selecione um item...";
	$dr[1][1] = "Administrador Geral";
	$dr[1][2] = "Editor de Conteudo";
	$dr[1][3] = "Assinante do Site";


	$r .= "<select id='item". $id ."' name='credenciais' onchange='updateCredencial(". $id .");'>";

	for($i=0;$i<4;$i++) {
		if($credencial == $i-1) {
			$r .= "<option value=" . $dr[0][$i] . " selected >" . $dr[1][$i] . "</option>";
		} else {
			$r .= "<option value=" . $dr[0][$i] . " >" . $dr[1][$i] . "</option>";
		}

	}

	$r .= "</select>";

	return $r;

}



public function montaOrdem($id,$ordem) {

	$r="";

	$dr = array();

	for ($i=0; $i<200; $i++) {
		$dr[0][$i] = $i;
		$dr[1][$i] = $i;
	}

	$r .= "<select id='itemCredencialOrdem". $id ."' name='credencialOrdem' onchange='update_credencial_ordem(". $id .");'>";

	for($i=0;$i<200;$i++) {
		if($ordem == $i) {
			$r .= "<option value=" . $dr[0][$i] . " selected >" . $dr[1][$i] . "</option>";
		} else {
			$r .= "<option value=" . $dr[0][$i] . " >" . $dr[1][$i] . "</option>";
		}

	}

	$r .= "</select>";

	return $r;

}

public function update_credencial_ordem($id,$ordem)
{
	$st_query = "
	UPDATE menutao
	SET
	ordem = $ordem
	WHERE
	id = $id
	";  

	$dbh=getdbh();
	$stmt = $dbh->prepare($st_query);
	try
	{
		$stmt->execute();
	}
	catch (PDOException $e)
	{
		throw $e;
	}

	return false;
}


public function addMenu() {

	$dma = gmdate("y/m/d G.i:", time());

	$st_query = "
	INSERT INTO menutao (
	dma,
	titulo,
	controle,
	acao,   
	modulo,
	credencial,
	idcategoria,
	icone
	)
	VALUES
	(
	'$dma',
	'$this->titulo',
	'$this->controle',
	'$this->acao',
	'$this->modulo',
	0,
	'$this->idcategoria',
	'$this->icone'

);";

try
{
	if($this->o_db->exec($st_query) > 0)
	{
		$this->o_db->getAttribute(PDO::ATTR_DRIVER_NAME) === 'sqlite';
		$r = $this->o_db->lastInsertId();
	}
}
catch (PDOException $e)
{
	throw $e;
}
return $r;        
}


public function update_credencial($id,$credencial)
{
	$st_query = "
	UPDATE menutao
	SET
	credencial = $credencial
	WHERE
	id = $id
	";  

	$dbh=getdbh();
	$stmt = $dbh->prepare($st_query);
	try
	{
		$stmt->execute();
	}
	catch (PDOException $e)
	{
		throw $e;
	}

	return false;
}

function get_modulo_by_id ($id) {

	$st_query = "
	SELECT *
	FROM modulos
	WHERE id = $id
	";

	$r = "";

	$menu  = "<h2>";

	try  {
		$i=0;
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);
		while ($row = $stmt->fetch()) {
			$menu .= $row["titulo"];    
		}
	}
	catch(PDOException $e)
	{}  

	$menu .= "</h2>";

	return $menu;
}   

/*SITEMAP XML*/


function gera_site_map() {

	$Config = new ConfigModel();
	$config = $Config->readItensXmlConfig();
	$dns = $config[0]->dns;
	$dma = gmdate("Y-m-d", time());

	$st_query = "
	SELECT id, titulo, modulo, idcategoria, idconteudo, ordem, url
	FROM modulos
	WHERE ativo = 1";

	$dbh=getdbh();
	$stmt = $dbh->query($st_query);

	$r = "";



	try {

		$i = 0;
		while ($row = $stmt->fetch()) {

			$url = $this->montaUrl($row["modulo"], $row["idconteudo"], $row["id"], $row["url"], "");
			
			$r .= "<url>";
			$r .= "<loc>https://". $dns . $url ."</loc>";
			$r .= "<lastmod>". $dma ."</lastmod>";
			$r .= "<priority>1.00</priority>";
			$r .= "</url>";

		}

	} catch (PDOException $e) {

	}

	return $r;
}

} 

?>


