<?php

class SitemapModel extends Model {

	function __construct($id='') {
    parent::__construct('uid','users'); //primary key = uid; tablename = users
    if ($id)
    	$this->retrieve($id);
}

function get_modulos() {

	$st_query = "
	SELECT id, titulo, modulo, idconteudo
	FROM modulos
	WHERE modulo = 'Catalogo'
	";

	$dbh=getdbh();
	$stmt = $dbh->query($st_query);

	$r="";
	
	try {
		$i = 0;
		while ($row = $stmt->fetch()) {
			$r .= $this->get_catalogo($row["idconteudo"],$row["id"]);
		}
	} catch (PDOException $e) {

	}

	return $r;
}


function get_catalogo($idconteudo,$idcategoria) {

	$st_query = "
	SELECT id
	FROM catalogo
	WHERE idcategoria = $idcategoria
	";

	$dbh=getdbh();
	$stmt = $dbh->query($st_query);

	$Config = new ConfigModel();
	$config = $Config->readItensXmlConfig();
	$dns = $config[0]->dns;
	$dma = date("Y-m-d");

	$r="";
	
	try {
		$i = 0;
		while ($row = $stmt->fetch()) {
			$r .= "<url>";
			$r .= "<loc>". $dns . "/catalogo/detalhes/".$idconteudo ."/".$idcategoria ."/" . $row["id"] . "</loc>";
			$r .= "<lastmod>". $dma ."</lastmod>";
			$r .= "<priority>1.00</priority>";
			$r .= "</url>";
		}
	} catch (PDOException $e) {

	}

	return $r;
}

}