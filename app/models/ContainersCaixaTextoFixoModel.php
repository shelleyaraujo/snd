<?php
/*
* @author TAO  
* @version 0.1.1
*/
class ContainersCaixaTextoFixoModel extends Model
{
	private $in_id;

	function __construct()
	{
		parent::__construct();
	}

	public function setId( $in_id )
	{
		$this->in_id = $in_id;
		return $this;
	}
	
	public function getId()	{
		return $this->in_id;
	}
	
	public function readContainersById() {
		$st_query = "
		SELECT id, titulo, classe, ordem
		FROM containers
		WHERE id = $this->in_id";
		
		$dr = array();	

		try
		{
			$o_data = $this->o_db->query($st_query);
			$r = array();
			while($o_ret = $o_data->fetchObject())	{
				$dr[0] = $o_ret->id;
				$dr[1] = $o_ret->titulo;
				$dr[2] = $o_ret->classe;
				$dr[3] = $o_ret->ordem;
			}
		}
		catch(PDOException $e)
		{}	
		return $dr;
	} 	


	public function readContainerById() {
		$st_query = "
		SELECT id, titulo, classe, ordem
		FROM containers
		WHERE id = $this->in_id";
		
		$dr = array();	

		try
		{
			$o_data = $this->o_db->query($st_query);
			$r = array();
			while($o_ret = $o_data->fetchObject())	{
				$dr[0] = $o_ret->id;
				$dr[1] = $o_ret->titulo;
				$dr[2] = $o_ret->classe;
				$dr[3] = $o_ret->ordem;
			}
		}
		catch(PDOException $e)
		{}	
		return $dr;
	} 	

	/*TAO*/

	public function getRows() {
		$st_query = "
		SELECT id, titulo, classe, ordem
		FROM containers
		ORDER BY titulo";
		$dr = array();	
		$r = array();
		$i=0;

		try
		{
			$dbh=getdbh();
			$stmt = $dbh->query($st_query);
			while ($row = $stmt->fetch()) {
				$dr[$i][0] = $row["id"];
				$dr[$i][1] = $row["titulo"];
				$dr[$i][2] = $row["classe"];
				$dr[$i][3] = $row["ordem"];
				$i++;
			}
		}
		catch(PDOException $e)
		{}	
		return $dr;
	} 	

	/* TAO */

	
	public function readContainers($ordenar, $popup)
	{

		if($popup == "1") {
			$st_query = "
			SELECT id, titulo, visivel, classe, ordem
			FROM containers
			WHERE classe = 'popup'
			ORDER BY " . $ordenar;
		} else {
			$st_query = "
			SELECT id, titulo, visivel, classe, ordem
			FROM containers
			WHERE classe <> 'popup'
			ORDER BY " . $ordenar;
		}
		
		$dr = array();	
		$r = array();
		$i=0;

		try
		{
			$dbh=getdbh();
			$stmt = $dbh->query($st_query);
			while ($row = $stmt->fetch()) {
				$dr[$i][0] = $row["id"];
				$dr[$i][1] = $row["titulo"];
				$dr[$i][2] = $row["visivel"];
				$dr[$i][3] = $row["classe"];
				$dr[$i][4] = $row["ordem"];
				$i++;
			}
		}
		catch(PDOException $e)
		{}	
		return $dr;
	} 

	public function add_container($titulo,$classe)  {

		$dbh=getdbh();
		$totallinhas = current($dbh->query("select count(*) from containers")->fetch());

		$st_query = "
		INSERT INTO containers
		(
		titulo,
		classe,
		ordem
		)
		VALUES
		(
		'$titulo',
		'". $classe ."',
		ordem = $totallinhas + 1
	);";

	$dbh=getdbh();

	try
	{
		if($dbh->exec($st_query) > 0)
		{
			$dbh->getAttribute(PDO::ATTR_DRIVER_NAME) === 'sqlite';
		}
	}
	catch (PDOException $e)
	{
		throw $e;
	}
	return false;       
} 


public function delete_container($id)
{

	$st_query = "
	DELETE FROM containers
	WHERE id = $id";
	$dbh=getdbh();
	try
	{
		if($dbh->exec($st_query) > 0)
		{
			$dbh->getAttribute(PDO::ATTR_DRIVER_NAME) === 'sqlite';
		}
	}
	catch (PDOException $e)
	{
		throw $e;
	}

	return false;
}



public function delete_destaque($id)
{

	$st_query = "
	DELETE FROM destaques
	WHERE id = $id";
	$dbh=getdbh();
	try
	{
		if($dbh->exec($st_query) > 0)
		{
			$dbh->getAttribute(PDO::ATTR_DRIVER_NAME) === 'sqlite';
		}
	}
	catch (PDOException $e)
	{
		throw $e;
	}

	return false;
}


public function getRow($id)
{
	$st_query = "
	SELECT id, titulo, classe
	FROM containers 
	WHERE id = $id";
	$r = array(); 

	try
	{
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);
		while ($row = $stmt->fetch()) {
			$r[0] = $row["id"];
			$r[1] = $row["titulo"];
			$r[2] = $row["classe"];
		}
	}
	catch(PDOException $e)
	{}  
	$r = str_replace("-iframe","<iframe",$r);
	$r = str_replace("-/iframe-","></iframe>",$r);
	return $r;
}



public function update_container($id,$titulo,$classe)
{
	$st_query = "
	UPDATE containers
	SET
	titulo = '$titulo',
	classe = '$classe'
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


public function add_destaque($idcontainer)  {
	$dma = date("Y-m-d H:i:s");
	$st_query = "
	INSERT INTO destaques
	(
	dma,
	idcontainer,
	titulo,
	texto,
	classe
	)
	VALUES
	(
	'$dma',
	$idcontainer,
	'Titulo',
	'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat.',
	'25'
);";

$dbh=getdbh();

try
{
	if($dbh->exec($st_query) > 0)
	{
		$dbh->getAttribute(PDO::ATTR_DRIVER_NAME) === 'sqlite';
	}
}
catch (PDOException $e)
{
	throw $e;
}

return false;       
} 

public function getRowsConteudos($idcontainer) {
	$st_query = "
	SELECT id, titulo, classe, idcontainer, texto
	FROM destaques
	WHERE idcontainer = $idcontainer
	ORDER BY ordem";
	$dr = array();	
	$r = array();
	$i=0;

	try
	{
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);
		while ($row = $stmt->fetch()) {
			$dr[$i][0] = $row["id"];
			$dr[$i][1] = $row["titulo"];
			$dr[$i][2] = $row["classe"];
			$dr[$i][3] = $row["idcontainer"];
			$dr[$i][4] = $row["texto"];
			$i++;
		}
	}
	catch(PDOException $e)
	{}	
	return $dr;
} 	


public function getRowDestaque($iddestaque)
{
	$st_query = "
	SELECT id, titulo, classe
	FROM destaques
	WHERE id = $iddestaque";
	$r = array(); 

	try
	{
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);
		while ($row = $stmt->fetch()) {
			$r[0] = $row["id"];
			$r[1] = $row["titulo"];
			$r[2] = $row["classe"];
		}
	}
	catch(PDOException $e)
	{}  
	$r = str_replace("-iframe","<iframe",$r);
	$r = str_replace("-/iframe-","></iframe>",$r);
	return $r;
}

public function update_conteudo($id,$titulo,$classe,$texto)
{
	$st_query = "
	UPDATE destaques
	SET
	titulo = '$titulo',
	texto = '$texto',
	classe = '$classe'
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


public function update_classe_destaque($id,$classe)
{

	$st_query = "
	UPDATE destaques
	SET
	classe = '$classe'
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


public function getUltimoRegsitro()
{
	$r = "0";
	$st_query = "SELECT id FROM destaques WHERE id=(SELECT MAX(id) FROM destaques)";

	$dbh=getdbh();

	$o_data = $dbh->query($st_query);
	$o_ret = $o_data->fetchObject();
	$dr = array();
	$r = $o_ret->id;
	return $r;
}


public function update_destaque($id,$ordem)
{
	$st_query = "
	UPDATE destaques
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

}


?>